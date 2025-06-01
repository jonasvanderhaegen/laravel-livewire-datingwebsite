<?php

declare(strict_types=1);

namespace Modules\Core\Tests\Unit\PrimaryServiceProvider;

use Illuminate\Support\Facades\File;
use Modules\Core\Providers\PrimaryServiceProvider;
use ReflectionClass;
use Tests\TestCase;

final class RegisterViewsTest extends TestCase
{
    public function test_get_publishable_view_paths_finds_modules_core_folder(): void
    {
        // 1) Create a fake "resources/views/modules/core" directory.
        $viewModulesCore = resource_path('views/modules/core');
        File::ensureDirectoryExists($viewModulesCore);

        // (By default, config('view.paths') === [ resource_path('views') ], so no need to override it.)

        // 2) Use reflection to invoke the private method:
        $provider = new PrimaryServiceProvider($this->app);
        $ref = new ReflectionClass($provider);
        $method = $ref->getMethod('getPublishableViewPaths');
        $method->setAccessible(true);

        /** @var string[] $paths */
        $paths = $method->invoke($provider);

        // 3) We expect exactly one entry: "resources/views/modules/core"
        $this->assertSame(
            [$viewModulesCore],
            $paths
        );
    }
}
