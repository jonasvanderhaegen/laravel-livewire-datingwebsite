<?php

declare(strict_types=1);

namespace Modules\Settings\Livewire\Actions;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use Spatie\LaravelPasskeys\Models\Passkey;

// @codeCoverageIgnoreStart
final class DeletePasskey
{
    public function __invoke(Passkey $passkey): RedirectResponse
    {
        auth()->user()->loadCount('passkeys');
        // 1) Authorize that the user owns this passkey
        Gate::authorize('delete', $passkey);

        // 2) Perform the deletion
        $passkey->delete();

        cache()->forget('settings:account:passkeys_list:'.auth()->id());

        // 3) Redirect back (or to index) with a success message
        return redirect()
            ->back()
            ->success('Passkey deleted successfully.');
    }
}
// @codeCoverageIgnoreEnd
