<?php

declare(strict_types=1);

namespace Modules\WebAuthn\Livewire\Pages;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Database\QueryException;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Masmerise\Toaster\Toaster;
use Modules\Auth\Notifications\EmailUsageAlert;
use Modules\Core\Concerns\HasMobileDesktopViews;
use Modules\Core\Exceptions\TooManyRequestsException;
use Modules\CustomTheme\Livewire\Layouts\General;
use Modules\Profile\Models\Profile;
use Modules\Shard\Actions\DeleteUserShard;
use Modules\Shard\Actions\ResolveUserShard;
use Modules\Shard\Actions\StoreUserShardMapping;
use Modules\Shard\Services\ShardResolver;
use Modules\WebAuthn\Concerns\HandlesPasskeys;
use Modules\WebAuthn\Livewire\Forms\RegisterForm;
use Spatie\LaravelPasskeys\Actions\StorePasskeyAction;
use Spatie\LaravelPasskeys\Support\Config;
use Throwable;
use Webauthn\Exception\InvalidDataException;

// @codeCoverageIgnoreStart
final class Register extends General
{
    use HandlesPasskeys, HasMobileDesktopViews;

    public RegisterForm $form;

    public string $activeTab = 'ios';

    public ?string $ulid = null;

    protected User $user;

    public function mount(): void
    {
        $this->form->initRateLimitCountdown('validateAndThrottle', RegisterForm::class, 'register');

        $this->form->firstname = fake('nl_BE')->firstName();
        $this->form->lastname = fake('nl_BE')->lastName();
        $this->form->email = fake('nl_BE')->email();
        $this->form->dob = '23-04-1991';
        $this->form->terms = true;
    }

    /**
     * @throws InvalidDataException
     */
    public function submit(StoreUserShardMapping $storeMapping, ResolveUserShard $resolveUserShard, DeleteUserShard $deleteUserShard): void
    {

        try {
            $shard = ShardResolver::connectionForEmail($this->form->email);

            $this->user = User::on($shard)->create([
                'email' => $this->form->email,
                'name' => $this->form->getFullName(),
            ]);

            $storeMapping($this->form->email, $this->user->id, $shard);

            $this->dispatch('passkeyPropertiesValidated', [
                'passkeyOptions' => json_decode((string) $this->generatePasskeyOptions()),
            ]);

        } catch (TooManyRequestsException $exception) {

            $this->form->secondsUntilReset = $exception->secondsUntilAvailable;
            ray('exception thrown', $exception->getMessage());

        } catch (ValidationException $exception) {
            if ($this->isMobile()) {
                Toaster::error($exception->getMessage());
            }

        } catch (QueryException $e) {

            if (Str::contains($e->getMessage(), 'users_email_unique')) {
                ray('exception thrown', $e->getMessage());
                $result = $resolveUserShard->byEmail($this->form->email);
                $user = User::on($result['shard_id'])->findOrFail($result['user_id']);

                $this->addError('form.email', __('Check your inbox for more information.'));

                $user->notify(
                    new EmailUsageAlert(
                        request()->ip(),
                        now()->format('Y-m-d H:i:s')
                    )
                );

            }
        }

    }

    public function updated(string $field, string|bool $value): void
    {
        $this->validateOnly($field);
    }

    public function passkeyFailed(string $error, ResolveUserShard $resolveUserShard, DeleteUserShard $deleteUserShard): void
    {
        ['user_id' => $user_id, 'shard_id' => $shard_id] = $resolveUserShard->byEmail($this->form->email);
        $user = User::on($shard_id)->firstWhere('id', $user_id);
        $deleteUserShard($this->form->email, $user_id);
        $user->delete();
        Toaster::error(__('passkeys::passkeys.error_something_went_wrong_generating_the_passkey'));
    }

    public function storePasskey(string $passkey, ResolveUserShard $resolveUserShard): void
    {
        $storePasskeyAction = Config::getAction('store_passkey', StorePasskeyAction::class);
        ['user_id' => $user_id, 'shard_id' => $shard_id] = $resolveUserShard->byEmail($this->form->email);
        $user = User::on($shard_id)->firstWhere('id', $user_id);
        event(new Registered($user));

        try {
            $storePasskeyAction->execute(
                $user,
                $passkey, $this->previouslyGeneratedPasskeyOptions(),
                request()->getHost(),
                ['name' => 'registration']
            );

            $profile = Profile::on($shard_id)->create([
                'ulid' => Str::ulid(),
                'user_id' => $user_id,
                'first_name' => $this->form->firstname,
                'last_name' => $this->form->lastname,
                'birth_date' => Carbon::createFromFormat('d-m-Y', $this->form->dob)->format('Y-m-d'),
            ]);

            auth()->loginUsingId($user_id, true);
            session([
                'profile_id' => $profile->id,
                'user_shard' => $shard_id,
            ]);

            $this->redirectRoute('protected.discover', navigate: true);

        } catch (Throwable $e) {

            throw ValidationException::withMessages([
                'name' => __('passkeys::passkeys.error_something_went_wrong_generating_the_passkey'),
            ])->errorBag('passkeyForm');
        }
    }

    #[Computed]
    public function isFormValid(): bool
    {
        return $this->isMobile() || ! $this->getErrorBag()->any()
            && $this->form->firstname !== ''
            && $this->form->lastname !== ''
            && $this->form->email !== ''
            && $this->form->dob !== ''
            && $this->form->terms;
    }

    public function render(): View
    {
        return view("webauthn::livewire.pages.{$this->addTo('register')}")
            ->title('Register');
    }
}
// @codeCoverageIgnoreEnd
