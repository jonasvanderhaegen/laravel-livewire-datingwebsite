<?php

declare(strict_types=1);

namespace Modules\Core\Concerns;

use Illuminate\Support\Facades\RateLimiter;
use Modules\Core\Exceptions\TooManyRequestsException;

trait WithRateLimiting
{
    // Livewire will pick this up as a public property on the component
    public int $secondsUntilReset = 0;

    /**
     * Call this in your component's mount or constructor
     * to initialize the countdown for a given method.
     */
    public function initRateLimitCountdown(
        ?string $method = null,
        ?string $component = null,
        string|bool $auth = false
    ): void {
        if (session()->has("{$auth}_email") && $auth) {
            $email = session("{$auth}_email");
            $key = "{$auth}_email:$email";

            $this->secondsUntilReset = RateLimiter::availableIn($key);

            return;
        }

        $this->secondsUntilReset = $this->secondsUntilReset($method, $component);
    }

    protected function rateLimitByEmail(int $maxAttempts, int $decaySeconds, string $email, $auth): void
    {
        if (app()->environment(['local'])) {
            return;
        }

        $key = "{$auth}_email:$email";

        if (RateLimiter::tooManyAttempts($key, $maxAttempts)) {
            $seconds = RateLimiter::availableIn($key);

            // Store in session so mount() / initRateLimitCountdown() can pick it up
            session([
                "{$auth}_email" => $email,
            ]);

            throw new TooManyRequestsException(
                static::class,
                'rateLimitByEmail',
                request()->ip(),
                $seconds
            );
        }

        RateLimiter::hit($key, $decaySeconds);
    }

    protected function clearRateLimiter($method = null, $component = null): void
    {
        $method ??= debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, limit: 2)[1]['function'];

        $component ??= static::class;

        $key = $this->getRateLimitKey($method, $component);

        RateLimiter::clear($key);
    }

    protected function getRateLimitKey($method, $component = null)
    {
        $method ??= debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, limit: 2)[1]['function'];

        $component ??= static::class;

        return 'livewire-rate-limiter:'.sha1($component.'|'.$method.'|'.request()->ip());
    }

    protected function hitRateLimiter($method = null, $decaySeconds = 60, $component = null)
    {
        $method ??= debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, limit: 2)[1]['function'];

        $component ??= static::class;

        $key = $this->getRateLimitKey($method, $component);

        RateLimiter::hit($key, $decaySeconds);
    }

    protected function rateLimit($maxAttempts, $decaySeconds = 60, $method = null, $component = null)
    {
        $method ??= debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, limit: 2)[1]['function'];

        $component ??= static::class;

        $key = $this->getRateLimitKey($method, $component);

        if (RateLimiter::tooManyAttempts($key, $maxAttempts)) {
            $ip = request()->ip();
            $secondsUntilAvailable = RateLimiter::availableIn($key);

            throw new TooManyRequestsException($component, $method, $ip, $secondsUntilAvailable);
        }

        $this->hitRateLimiter($method, $decaySeconds, $component);
    }

    private function secondsUntilReset(?string $method = null, ?string $component = null): int
    {
        $method ??= debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2)[1]['function'];
        $component ??= static::class;

        $key = $this->getRateLimitKey($method, $component);

        return RateLimiter::availableIn($key);
    }
}
