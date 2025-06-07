<?php

declare(strict_types=1);

namespace Modules\Profile\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Modules\Profile\Models\Profile;
use Modules\Profile\Policies\ProfilePolicy;

final class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the module.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Profile::class => ProfilePolicy::class,
    ];

    /**
     * Register the service provider.
     */
    public function register(): void
    {
        $this->registerPolicies();
    }
}
