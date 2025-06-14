<?php

declare(strict_types=1);

namespace Modules\Auth\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Masmerise\Toaster\Toaster;
use Modules\Auth\Livewire\Forms\VerifyEmailForm;
use Modules\Core\Concerns\HasMobileDesktopViews;
use Modules\Core\Concerns\RateLimitDurations;
use Modules\Core\Concerns\WithRateLimiting;
use Modules\Core\Exceptions\TooManyRequestsException;
use Modules\CustomTheme\Livewire\Layouts\General;

final class VerifyEmail extends General
{
    use HasMobileDesktopViews, RateLimitDurations, WithRateLimiting;

    public VerifyEmailForm $form;

    public string $activeTab = 'ios';

    public function isFormValid(): true
    {
        return true;
    }

    // @codeCoverageIgnoreStart
    public function mount(): void
    {
        /** @var User $user */
        $user = Auth::user();

        // At this point, the route/middleware ensures the user is authenticated,
        // so $user cannot be null. PHPStan will respect this PHPDoc.

        if ($user->hasVerifiedEmail()) {
            $this->redirectIntended(
                default: route('protected.discover', absolute: false),
                navigate: true
            );

            return;
        }

        $this->initRateLimitCountdown(
            'resendVerification',
            null,
            'resendVerification'
        );
    }
    // @codeCoverageIgnoreEnd

    /**
     * Send an email verification notification to the user.
     */
    // @codeCoverageIgnoreStart
    public function resendVerification(): void
    {
        /** @var User $user */
        $user = Auth::user();

        // Again, we’ve asserted via PHPDoc that Auth::user() is never null here.

        if ($user->hasVerifiedEmail()) {
            $this->redirectIntended(
                default: route('protected.discover', absolute: false),
                navigate: true
            );

            return;
        }

        try {
            // throttle by email: max 3 sends per 15 min
            $this->rateLimitByEmail(
                3,
                $this->longDuration(),
                $user->email,
                'resendVerification'
            );
        } catch (TooManyRequestsException $e) {
            // store the wait time so your view can show a countdown
            $this->secondsUntilReset = $e->secondsUntilAvailable;

            Toaster::error(
                'You can request another verification link in '
                .$e->minutesUntilAvailable
                .' minutes.'
            );

            return;
        }

        // allowed: send the email
        $user->sendEmailVerificationNotification();
        session()->flash('status', 'verification-link-sent');
    }

    // @codeCoverageIgnoreEnd

    public function render(): View
    {
        return view("auth::livewire.{$this->addTo('verify-email')}")
            ->title(__('Verify Email Address'));
    }
}
