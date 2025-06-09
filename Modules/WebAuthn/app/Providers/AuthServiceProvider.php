<?php

declare(strict_types=1);

namespace Modules\WebAuthn\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Modules\WebAuthn\Policies\PasskeyPolicy;
use Spatie\LaravelPasskeys\Models\Passkey;

final class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the module.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Passkey::class => PasskeyPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
