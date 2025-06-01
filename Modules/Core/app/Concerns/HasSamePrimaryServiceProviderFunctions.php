<?php

declare(strict_types=1);

namespace Modules\Core\Concerns;

use Illuminate\Support\Facades\Blade;
use Nwidart\Modules\Traits\PathNamespace;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

trait HasSamePrimaryServiceProviderFunctions
{
    use PathNamespace;

    /**
     * Register translations.
     */
    // @codeCoverageIgnoreStart
    public function registerTranslations(): void
    {
        $langPath = resource_path('lang/modules/'.$this->nameLower);

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, $this->nameLower);
            $this->loadJsonTranslationsFrom($langPath);
        } else {
            $this->loadTranslationsFrom(module_path($this->name, 'lang'), $this->nameLower);
            $this->loadJsonTranslationsFrom(module_path($this->name, 'lang'));
        }
    }
    // @codeCoverageIgnoreEnd

    /**
     * Register views.
     */
    public function registerViews(): void
    {
        $viewPath = resource_path('views/modules/'.$this->nameLower);
        $sourcePath = module_path($this->name, 'resources/views');

        $this->publishes(
            [$sourcePath => $viewPath],
            ['views', $this->nameLower.'-module-views']
        );

        $this->loadViewsFrom(
            array_merge($this->getPublishableViewPaths(), [$sourcePath]),
            $this->nameLower
        );

        Blade::componentNamespace(
            config('modules.namespace').'\\'.$this->name.'\\View\\Components',
            $this->nameLower
        );
    }

    /**
     * Merge config from the given path recursively.
     */
    protected function merge_config_from(string $path, string $key): void
    {
        $existing = config($key, []);
        $module_config = require $path;

        config([$key => array_replace_recursive($existing, $module_config)]);
    }

    // @codeCoverageIgnoreStart
    protected function registerConfig(): void
    {
        $configPath = module_path(
            $this->name,
            config('modules.paths.generator.config.path')
        );

        if (is_dir($configPath)) {
            $iterator = new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator($configPath)
            );

            foreach ($iterator as $file) {
                if ($file->isFile() && $file->getExtension() === 'php') {
                    // 1) Get the path relative to the module's config folder:
                    $config = str_replace(
                        $configPath.DIRECTORY_SEPARATOR,
                        '',
                        $file->getPathname()
                    );

                    // 2) Replace separators and ".php" → "." or "":
                    $tmp = str_replace(
                        [DIRECTORY_SEPARATOR, '.php'],
                        ['.',             ''],
                        $config
                    );
                    /** @var string $tmp */

                    // 3) Now PHPStan knows $tmp is a string, so assign directly:
                    $config_key = $tmp;

                    // 4) Safe to concatenate:
                    $segments = explode('.', $this->nameLower.'.'.$config_key);

                    // 5) Remove duplicate adjacent segments:
                    $normalized = [];
                    foreach ($segments as $segment) {
                        if (end($normalized) !== $segment) {
                            $normalized[] = $segment;
                        }
                    }

                    $key = ($config === 'config.php')
                        ? $this->nameLower
                        : implode('.', $normalized);

                    $this->publishes(
                        [$file->getPathname() => config_path($config)],
                        'config'
                    );
                    $this->merge_config_from($file->getPathname(), $key);
                }
            }
        }
    }

    /**
     * Find any "modules/core" subfolders in the configured view.paths.
     *
     * @return string[]
     */
    private function getPublishableViewPaths(): array
    {
        $paths = [];

        foreach (config('view.paths') as $path) {
            if (is_dir($path.'/modules/'.$this->nameLower)) {
                $paths[] = $path.'/modules/'.$this->nameLower;
            }
        }

        return $paths;
    }
    // @codeCoverageIgnoreEnd
}
