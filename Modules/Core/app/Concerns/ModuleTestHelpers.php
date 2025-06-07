<?php

declare(strict_types=1);

namespace Modules\Core\Concerns;

use InvalidArgumentException;
use RuntimeException;

trait ModuleTestHelpers
{
    private static string $statusesPath = __DIR__.'/../../modules_statuses.json';

    /**
     * Read modules_statuses.json into an associative array.
     */
    protected function getRawModuleStatuses(): array
    {
        ray('test');

        $contents = file_get_contents(self::$statusesPath);
        if ($contents === false) {
            throw new RuntimeException('Could not read '.self::$statusesPath);
        }

        $decoded = json_decode($contents, true);
        if (! is_array($decoded)) {
            throw new RuntimeException('modules_statuses.json is not valid JSON or not an object.');
        }

        return $decoded;
    }

    /**
     * Overwrite modules_statuses.json with the given array.
     * This does a JSON_PRETTY_PRINT + JSON_UNESCAPED_SLASHES so it matches original formatting.
     */
    protected function writeModuleStatuses(array $statuses): void
    {
        $json = json_encode($statuses, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        if ($json === false) {
            throw new RuntimeException('Failed to re‐encode module statuses to JSON.');
        }

        file_put_contents(self::$statusesPath, $json.PHP_EOL);
    }

    /**
     * Toggle a single module on/off.
     */
    protected function setModule(string $moduleName, bool $enabled): void
    {
        $statuses = $this->getRawModuleStatuses();

        if (! array_key_exists($moduleName, $statuses)) {
            throw new InvalidArgumentException("Module '{$moduleName}' not found in modules_statuses.json");
        }

        $statuses[$moduleName] = $enabled;

        $this->writeModuleStatuses($statuses);
    }
}
