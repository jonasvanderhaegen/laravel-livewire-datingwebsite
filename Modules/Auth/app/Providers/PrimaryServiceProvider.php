<?php

declare(strict_types=1);

namespace Modules\Auth\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Concerns\HasSamePrimaryServiceProviderFunctions;

final class PrimaryServiceProvider extends ServiceProvider
{
    use HasSamePrimaryServiceProviderFunctions;

    protected string $name = 'Auth';

    protected string $nameLower = 'auth';

    public function boot(): void
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
    }

    public function register(): void
    {
        $this->app->register(EventServiceProvider::class);
        $this->app->register(RouteServiceProvider::class);
    }
}
