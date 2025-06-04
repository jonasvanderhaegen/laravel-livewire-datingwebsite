<?php

declare(strict_types=1);

namespace Modules\WebAuthn\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Modules\WebAuthn\Events\Registered as RegisteredEvent;
use Modules\WebAuthn\Listeners\Registered as RegisteredListener;

final class EventServiceProvider extends ServiceProvider
{
    /**
     * The event handler mappings for the application.
     *
     * @var array<string, array<int, string>>
     */
    protected $listen = [
        RegisteredEvent::class => [
            RegisteredListener::class,
        ],
    ];

    /**
     * Indicates if events should be discovered.
     *
     * @var bool
     */
    protected static $shouldDiscoverEvents = true;

    protected function configureEmailVerification(): void {}
}
