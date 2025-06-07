<?php

declare(strict_types=1);

namespace Modules\OnboardUser\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Spatie\Onboard\OnboardingStep;
use Symfony\Component\HttpFoundation\Response;

final class RedirectToUnfinishedOnboardingStep
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        if (! $user) {
            return $next($request);
        }

        $onboarding = $user->onboarding();

        if ($onboarding->inProgress()) {
            // get all steps, drop those excluded, then pick the first incomplete
            $nextStep = $onboarding
                ->steps()
                ->filter(fn (OnboardingStep $step) => $step->notExcluded())
                ->first(fn (OnboardingStep $step) => $step->incomplete());

            if ($nextStep) {

                // Safely extract and normalize the path
                $rawPath = parse_url((string) $nextStep->link, PHP_URL_PATH);

                $path = is_string($rawPath) ? $rawPath : '';

                $pattern = mb_ltrim($path, '/');

                if (! $request->is($pattern)) {
                    return redirect($nextStep->link)
                        ->warning('In order to start looking for people we first must have some information about you');
                }
            }
        }

        return $next($request);
    }
}
