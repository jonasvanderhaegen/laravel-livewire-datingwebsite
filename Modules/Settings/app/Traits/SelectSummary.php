<?php

declare(strict_types=1);

namespace Modules\Settings\Traits;

use Illuminate\Support\Collection;

use function PHPUnit\Framework\isEmpty;

trait SelectSummary
{
    public function getTranslateKeyFromSelectFromConfig(
        string|int|null $value,
        string $configKey,
        string $labelKey = 'name',
        string|bool|null $custom = false
    ): string {

        if (is_null($value) && isEmpty($value)) {
            return '';
        }

        if ($value === 'custom' && ! empty($custom)) {
            return $custom;
        }

        $configArray = config($configKey, []);

        // Als value een string is, zoek op 'identifier'
        if (is_string($value)) {
            $match = collect($configArray)->firstWhere('identifier', $value);

            return __($match[$labelKey]) ?? '';
        }

        if (is_numeric($value)) {
            $index = (int) $value - 1;

            return __($configArray[$index][$labelKey]) ?? '';
        }

        return '';
    }

    public function summarizeSelect(
        array|Collection $values,
        string $configKey,
        string $labelKey = 'name',
    ): string {
        $configArray = config($configKey, []);

        $names = Collection::wrap($values)
            ->map(function ($index) use ($configArray, $labelKey) {
                $zeroBasedIndex = (int) $index - 1;

                return $configArray[$zeroBasedIndex][$labelKey] ?? null;
            })
            ->filter();

        $count = $names->count();

        return match (true) {
            $count === 0 => '',
            $count === 1 => __($names->first()),
            default => __($names->first()).', +'.($count - 1).' more',
        };
    }
}
