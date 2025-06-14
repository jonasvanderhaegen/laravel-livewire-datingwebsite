<?php

declare(strict_types=1);

namespace Modules\Settings\Livewire\Components\Account;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Modules\Core\Concerns\HasMobileDesktopViews;
use Modules\Profile\Models\Profile;
use Modules\Settings\Livewire\Forms\Account\GeneralForm;

// @codeCoverageIgnoreStart
final class GeneralComponent extends Component
{
    use HasMobileDesktopViews;

    public GeneralForm $form;

    public int $userId;

    public Profile $profile;

    /**
     * Initialize form data and cache user
     */
    public function mount(): void
    {
        $user = auth()->user();
        $this->profile = $user->profile;

        $this->form->first_name = $this->profile->first_name;
        $this->form->last_name = $this->profile->last_name;

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
    public function render(): View
    {
        return view('settings::livewire.components.account.general');
    }

    #[Computed]
    public function isValid(): bool
    {
        return $this->isMobile() || ! empty($this->form->first_name)
            && ! empty($this->form->last_name)
            && ! empty($this->form->birth_date)
            && ! $this->getErrorBag()->any();
    }

    /**
     * Invalidate cache when user updates
     */
    protected function invalidateUserCache(): void
    {
        $id = auth()->id();
        Cache::forget("settings:account:general:$id");
    }
}
// @codeCoverageIgnoreEnd
