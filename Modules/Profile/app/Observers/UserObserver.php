<?php

declare(strict_types=1);

namespace Modules\Profile\Observers;

use App\Models\User;

final class UserObserver
{
    /**
     * Handle the AppModelsUser "created" event.
     */
    public function created(User $user): void {}

    /**
     * Handle the AppModelsUser "updated" event.
     */
    public function updated(User $user): void
    {
        //
    }

    /**
     * Handle the AppModelsUser "deleted" event.
     */
    public function deleted(User $user): void
    {
        //
    }

    /**
     * Handle the AppModelsUser "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the AppModelsUser "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
