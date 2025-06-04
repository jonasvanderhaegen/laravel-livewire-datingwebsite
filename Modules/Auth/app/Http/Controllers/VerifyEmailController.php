<?php

declare(strict_types=1);

namespace Modules\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

final class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    //
    // @codeCoverageIgnoreStart
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        /** @var MustVerifyEmail $user */
        $user = $request->user();

        // By the time Laravel invokes this controller, $user is guaranteed
        // to be non-null and to implement MustVerifyEmail, so no need for a null check.

        if ($user->hasVerifiedEmail()) {
            return redirect()->intended(route('protected.discover', absolute: false).'?verified=1');
        }

        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }

        return redirect()->intended(route('protected.discover', absolute: false).'?verified=1');
    }
    // @codeCoverageIgnoreEnd
}
