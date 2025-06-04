<?php

declare(strict_types=1);

namespace Modules\Settings\Livewire\Components\Account;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Modules\Profile\Models\Profile;
use Modules\Settings\Livewire\Forms\Account\GeneralForm;

final class GeneralComponent extends Component
{
    public GeneralForm $form;

    public int $userId;

    public Profile $profile;

    /**
     * Initialize form data and cache user
     */
    public function mount(): void
    {
        $this->userId = auth()->id();
        $this->profile = auth()->user()->profile;

        $this->form->first_name = $this->profile->first_name;
        $this->form->last_name = $this->profile->last_name;

        $this->form->name = $this->user->name;
        $this->form->birth_date = $this->profile->birth_date_formatted ?? '';
    }

    public function updatedFormBirthDate(): void
    {
        $this->validateOnly('form.birth_date');
    }

    public function submit(): void
    {
        $this->form->validate();

        $this->invalidateUserCache();

        // Update user name
        auth()->user()->update([
            'name' => $this->form->first_name.' '.$this->form->last_name,
        ]);

        $profile = auth()->user()->profile;

        // Update profile birth_date
        $date = Carbon::createFromFormat('d-m-Y', $this->form->birth_date);
        $profile->update([
            'birth_date' => $date->format('Y-m-d'),
            'first_name' => $this->form->first_name,
            'last_name' => $this->form->last_name,
        ]);

        $this->dispatch('saved');
    }

    /**
     * Computed user property with cache across requests
     */
    #[Computed]
    public function user(): Profile|User
    {
        return cache()->remember(
            "settings:account:general:{$this->userId}",
            now()->addMinutes(60),
            fn() => User::with([
                'profile' => function ($q) {
                    $q->select('user_id', 'birth_date');
                }
            ])
                ->select('id', 'name')
                ->find(auth()->id())
        );
    }

    public function render(): View
    {
        return view('settings::livewire.components.account.general');
    }

    /**
     * Invalidate cache when user updates
     */
    protected function invalidateUserCache(): void
    {
        Cache::forget("settings:account:general:{$this->userId}");
    }
}
