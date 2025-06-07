<?php

declare(strict_types=1);

namespace Modules\Settings\Livewire\Forms\Profile\General;

use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Form;
use Modules\Settings\Traits\SelectSummary;

// @codeCoverageIgnoreStart
final class OrientationForm extends Form
{
    use SelectSummary;

    /**
     * @var Collection<int, int|string>|null
     */
    public ?Collection $orientations = null;

    public bool $prefer_not_say = false;

    #[Computed('orientations')]
    public function selected(): string
    {
        return $this->summarizeSelect(
            $this->orientations,
            'profile.orientations'         // your config key
        );
    }

    /**
     * @return array<string, string[]>
     */
    public function rules(): array
    {
        return [
            'orientations' => ['required_unless:prefer_not_say,true', 'array'],
            'orientations.*' => ['integer'], // each item should be an integer value
            'prefer_not_say' => ['boolean'],
        ];
    }
}
// @codeCoverageIgnoreEnd
