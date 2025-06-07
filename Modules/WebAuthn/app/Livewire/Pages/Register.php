<?php

declare(strict_types=1);

namespace Modules\WebAuthn\Livewire\Pages;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Modules\CustomTheme\Livewire\Layouts\General;
use Modules\WebAuthn\Events\Registered as WebAuthnRegistered;
use Modules\WebAuthn\Livewire\Actions\GeneratePasskeyRegisterOptionsAction;
use Modules\WebAuthn\Livewire\Forms\RegisterForm;
use Spatie\LaravelPasskeys\Actions\StorePasskeyAction;
use Spatie\LaravelPasskeys\Support\Config;
use Throwable;
use Webauthn\Exception\InvalidDataException;

final class Register extends General
{
    public RegisterForm $form;

    public ?string $ulid = null;

    protected User $user;

    public function mount(): void
    {
        $this->form->firstname = fake('nl_BE')->firstName();
        $this->form->lastname = fake('nl_BE')->lastName();
        $this->form->email = fake('nl_BE')->email();
        $this->form->dob = '23-04-1991';
        $this->form->terms = true;
    }

    /**
     * @throws InvalidDataException
     */
    public function submit(): void
    {
        $this->form->validate();

        $this->ulid = (string) Str::ulid();

        $this->user = User::createOrFirst([
            'email' => $this->form->email,
            'name' => $this->form->getFullName(),
        ]);

        $this->dispatch('passkeyPropertiesValidated', [
            'passkeyOptions' => json_decode((string) $this->generatePasskeyOptions()),
        ]);
    }

    public function updatedFormEmail(): void
    {
        $this->validateOnly('form.email');
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

            Auth::login($user);
            $this->redirectRoute('protected.discover', navigate: true);

        } catch (Throwable $e) {

            ray($e->getMessage());

            throw ValidationException::withMessages([
                'name' => __('passkeys::passkeys.error_something_went_wrong_generating_the_passkey'),
            ])->errorBag('passkeyForm');
        }
    }

    public function render(): View
    {
        return view('webauthn::livewire.pages.register')
            ->title('Register');
    }

    /**
     * @throws InvalidDataException
     */
    protected function generatePasskeyOptions(): mixed
    {
        /*
        $action = Config::getAction('generate_passkey_register_options',
            GeneratePasskeyRegisterOptionsAction::class);

        $options = $action->execute($this->user);
        */

        $action = app(GeneratePasskeyRegisterOptionsAction::class);
        $options = $action->execute($this->user);

        session()->put('passkey-registration-options', $options);

        return $options;
    }

    protected function previouslyGeneratedPasskeyOptions(): ?string
    {
        return session()->pull('passkey-registration-options');
    }
}
