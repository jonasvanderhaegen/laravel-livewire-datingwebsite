<?php

declare(strict_types=1);

namespace Modules\Settings\Livewire\Forms\Profile\General;

use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Form;
use Modules\Settings\Traits\SelectSummary;

final class LanguageForm extends Form
{
    use SelectSummary;

    public bool $prefer_not_say = false;

    /**
     * @var Collection<int, int|string>|null
     */
    public ?collection $languages = null;

    #[Computed('languages')]
    public function selected(): string
    {
        return $this->summarizeSelect(
            $this->languages,
            'profile.languages'         // your config key
        );
    }

    /**
     * @return array<string, string[]>
     */
    public function rules(): array
    {
        return [
            'languages' => ['required_unless:prefer_not_say,true', 'array'],
            'languages.*' => ['integer'],
            'prefer_not_say' => ['boolean'],
        ];
    }
}
