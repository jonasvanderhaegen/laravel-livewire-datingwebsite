<?php

declare(strict_types=1);

namespace Modules\Core\Concerns;

trait RateLimitDurations
{
    /**
     * Return one of two values depending on whether we're in a “fast” env.
     *
     * @param  int  $fast  Value to use in local/testing
     * @param  int  $normal  Value to use otherwise
     */
    protected function envDuration(int $fast, int $normal): int
    {
        // treat local & testing as “fast” so your feedback loops are quick
        if (app()->environment(['local'])) {
            return $fast;
        }

        return $normal;
    }

    /**
     * Shorthand for your “short” throttle bucket.
     */
    protected function shortDuration($config = 'auth.passwords.users.throttle', $short = 5, $long = 60): int
    {
        return $this->envDuration($short, config($config, $long));
    }

    /**
     * Shorthand for your “long” throttle bucket.
     */
    protected function longDuration($short = 60, $long = 3600): int
    {
        return $this->envDuration($short, $long);
    }
}
