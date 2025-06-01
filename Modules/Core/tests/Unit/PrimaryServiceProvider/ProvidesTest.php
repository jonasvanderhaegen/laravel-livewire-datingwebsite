<?php

declare(strict_types=1);

namespace Modules\Core\Tests\Unit\PrimaryServiceProvider;

use Modules\Core\Providers\PrimaryServiceProvider;
use Tests\TestCase;

final class ProvidesTest extends TestCase
{
    public function test_provides_returns_empty_array(): void
    {
        $provider = new PrimaryServiceProvider($this->app);

        // Calling provides() directly will hit line 79.
        $this->assertSame([], $provider->provides());
    }
}
