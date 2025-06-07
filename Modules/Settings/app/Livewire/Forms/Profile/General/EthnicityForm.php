<?php

declare(strict_types=1);

namespace Modules\Settings\Livewire\Forms\Profile\General;

use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Form;
use Modules\Settings\Traits\SelectSummary;

// @codeCoverageIgnoreStart
final class EthnicityForm extends Form
{
    use SelectSummary;

    public bool $prefer_not_say = false;

    /**
     * @var Collection<int, int|string>|null
     */
    public ?Collection $ethnicities = null;

    /**
     * @return array<string, string[]>
     */
    public function rules(): array
    {
        return [
            'ethnicities' => ['required_unless:prefer_not_say,true', 'array'],
            'ethnicities.*' => ['integer'], // each item should be an integer value
            'prefer_not_say' => ['boolean'],
        ];
    }

    #[Computed('ethnicities')]
    public function selected(): string
    {
        return $this->summarizeSelect(
            $this->ethnicities,
            'profile.ethnicities'         // your config key
        );
    }
}
// @codeCoverageIgnoreEnd
