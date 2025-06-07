<?php

declare(strict_types=1);

namespace Modules\Settings\Traits;

use Illuminate\Support\Collection;

trait SelectSummary
{
    /**
     * Given a single “select” value (string identifier or numeric index),
     * look it up in a config array, translate the corresponding label, and return it.
     *
     * @param  string|int|null  $value
     * @param  string  $configKey  The key passed to Laravel’s config() helper
     * @param  string  $labelKey  Which subarray key to translate (default: 'name')
     * @param  string|null  $custom  If $value === 'custom' and $custom is non-empty, return $custom
     *
     * @return string  Always returns a string (empty string if nothing found)
     */
    public function getTranslateKeyFromSelectFromConfig(
        string|int|null $value,
        string $configKey,
        string $labelKey = 'name',
        ?string $custom = null
    ): string {
        // If there is no “meaningful” $value, just return empty.
        if ($value === null || $value === '') {
            return '';
        }

        // If the user explicitly chose “custom” and passed a non-empty $custom, return that.
        if ($value === 'custom' && $custom !== null && $custom !== '') {
            return $custom;
        }

        /**
         * We expect config($configKey) to be an integer-indexed array where each
         * item is an associative array with at least:
         *   - 'identifier' => string
         *   - $labelKey     => string
         *
         * @var array<int, array{identifier: string, name: string}> $configArray
         */
        $configArray = config($configKey, []);

        // If $value is a string (an “identifier”), look for that key.
        if (is_string($value)) {
            $match = collect($configArray)->firstWhere('identifier', $value);

            if (
                is_array($match)
                && array_key_exists($labelKey, $match)
                && is_string($match[$labelKey])
            ) {
                return __($match[$labelKey]);
            }

            return '';
        }

        // If $value is an int, treat it as a 1-based index into the list.
        $index = $value - 1;

        if (
            isset($configArray[$index])
            && is_array($configArray[$index])
            && array_key_exists($labelKey, $configArray[$index])
            && is_string($configArray[$index][$labelKey])
        ) {
            return __($configArray[$index][$labelKey]);
        }

        return '';
    }

    /**
     * Summarize a collection/array of selected indexes by looking up their labels
     * in the config array and returning either:
     *   • '' if none,
     *   • the single translated name if exactly one,
     *   • “FirstName, +N more” otherwise.
     *
     * @param  (int|string)[]|Collection<int, int|string>  $values  A list of selected “indices” (1-based)
     * @param  string  $configKey  The key passed to config()
     * @param  string  $labelKey  Which subarray key to translate
     *
     * @return string  Always returns a string
     */
    public function summarizeSelect(
        array|Collection $values,
        string $configKey,
        string $labelKey = 'name',
    ): string {
        /**
         * We expect config($configKey) to be an array of:
         *   [ 0 => ['identifier' => string, 'name' => string], 1 => […], … ]
         *
         * @var array<int, array{identifier?: string, name: string}> $configArray
         */
        $configArray = config($configKey, []);

        $names = Collection::wrap($values)
            ->map(
            /**
             * @param  int|string  $rawIndex
             * @return string|null
             */
                function ($rawIndex) use ($configArray, $labelKey): ?string {
                    $zeroBasedIndex = (int) $rawIndex - 1;

                    if (
                        isset($configArray[$zeroBasedIndex])
                        && array_key_exists($labelKey, $configArray[$zeroBasedIndex])
                        && is_string($configArray[$zeroBasedIndex][$labelKey])
                    ) {
                        return $configArray[$zeroBasedIndex][$labelKey];
                    }

                    return null;
                }
            )
            ->filter(); // Drops any nulls

        $count = $names->count();

        if ($count === 0) {
            return '';
        }

        if ($count === 1) {
            return __($names->first());
        }

        // More than one: show “FirstTranslatedLabel, +N more”
        $firstName = $names->first(); // guaranteed string after filter()
        return sprintf('%s, +%d more', __($firstName), $count - 1);
    }
}
