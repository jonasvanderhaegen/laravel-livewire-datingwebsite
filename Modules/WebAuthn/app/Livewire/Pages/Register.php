<?php

declare(strict_types=1);

namespace Modules\WebAuthn\Livewire\Pages;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Masmerise\Toaster\Toaster;
use Modules\Core\Concerns\HasMobileDesktopViews;
use Modules\Core\Exceptions\TooManyRequestsException;
use Modules\CustomTheme\Livewire\Layouts\General;
use Modules\WebAuthn\Concerns\HandlesPasskeys;
use Modules\WebAuthn\Events\Registered as WebAuthnRegistered;
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

        /*
        $this->form->firstname = fake('nl_BE')->firstName();
        $this->form->lastname = fake('nl_BE')->lastName();
        $this->form->email = fake('nl_BE')->email();
        $this->form->dob = '23-04-1991';
        $this->form->terms = true;
        */
    }

    /**
     * @throws InvalidDataException
     */
    public function submit(): void
    {

        try {
            $this->form->validateAndThrottle();

            $this->ulid = (string) Str::ulid();

            $this->user = User::createOrFirst([
                'email' => $this->form->email,
                'name' => $this->form->getFullName(),
            ]);

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
        }

    }

    public function updated(string $field, string|bool $value): void
    {
        $this->validateOnly($field);
    }

    public function storePasskey(string $passkey): void
    {
        $storePasskeyAction = Config::getAction('store_passkey', StorePasskeyAction::class);

        $user = User::firstWhere('email', $this->form->email);

        try {
            $storePasskeyAction->execute(
                $user,
                $passkey, $this->previouslyGeneratedPasskeyOptions(),
                request()->getHost(),
                ['name' => 'registration']
            );

            event(new Registered($user));
            event(new WebAuthnRegistered($user, $this->form));

            auth()->login($user);
            $this->redirectRoute('protected.discover', navigate: true);

        } catch (Throwable $e) {

            ray($e->getMessage());

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
