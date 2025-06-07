<?php

declare(strict_types=1);

namespace Modules\Settings\Livewire\Forms\Profile\General;

use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Form;
use Modules\Settings\Traits\SelectSummary;

// @codeCoverageIgnoreStart
final class GenderForm extends Form
{
    use SelectSummary;

    /**
     * @var Collection<int, int|string>|null
     */
    public ?Collection $genders = null;

    /**
     * @return array<string, string[]>
     */
    public function rules(): array
    {
        return [
            'genders' => ['required', 'array', 'min:1'],
            'genders.*' => ['integer'], // each item should be an integer value
        ];
    }

    #[Computed('genders')]
    public function selected(): string
    {
        return $this->summarizeSelect(
            $this->genders,
            'profile.genders'         // your config key
        );
    }

    public function save(): void
    {
        $profile = auth()->user()->profile;
        $profile->update(['genders' => $this->genders]);
    }
}
// @codeCoverageIgnoreEnd
