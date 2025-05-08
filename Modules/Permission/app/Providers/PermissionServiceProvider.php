<?php

namespace Modules\Permission\app\Providers;
use Illuminate\Support\Facades\Schema; // en haut du fichier
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use ReflectionClass;
use Modules\Permission\Traits\PermissionGenerator;

class PermissionServiceProvider extends ServiceProvider
{
    protected string $moduleName = 'Permission';

    protected string $moduleNameLower = 'permission';

    /**
     * Boot the application events.
     */
    public function boot(): void
    {   $this->generateAllModulePermissions();
        $this->registerCommands();
        $this->registerCommandSchedules();
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->loadMigrationsFrom(module_path($this->moduleName, 'database/migrations'));
  
    }

    /**
     * Register the service provider.
     */
    public function register(): void
    {
        $this->app->register(RouteServiceProvider::class);
    }

    /**
     * Register commands in the format of Command::class
     */
    protected function registerCommands(): void
    {
        // $this->commands([]);
    }

    /**
     * Register command Schedules.
     */
    protected function registerCommandSchedules(): void
    {
        // $this->app->booted(function () {
        //     $schedule = $this->app->make(Schedule::class);
        //     $schedule->command('inspire')->hourly();
        // });
    }

    /**
     * Register translations.
     */
    public function registerTranslations(): void
    {
        $langPath = resource_path('lang/modules/'.$this->moduleNameLower);

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, $this->moduleNameLower);
            $this->loadJsonTranslationsFrom($langPath);
        } else {
            $this->loadTranslationsFrom(module_path($this->moduleName, 'lang'), $this->moduleNameLower);
            $this->loadJsonTranslationsFrom(module_path($this->moduleName, 'lang'));
        }
    }

    /**
     * Register config.
     */
    protected function registerConfig(): void
    {
        $this->publishes([module_path($this->moduleName, 'config/config.php') => config_path($this->moduleNameLower.'.php')], 'config');
        $this->mergeConfigFrom(module_path($this->moduleName, 'config/config.php'), $this->moduleNameLower);
    }

    /**
     * Register views.
     */
    public function registerViews(): void
    {
        $viewPath = resource_path('views/modules/'.$this->moduleNameLower);
        $sourcePath = module_path($this->moduleName, 'resources/views');

        $this->publishes([$sourcePath => $viewPath], ['views', $this->moduleNameLower.'-module-views']);

        $this->loadViewsFrom(array_merge($this->getPublishableViewPaths(), [$sourcePath]), $this->moduleNameLower);

        $componentNamespace = str_replace('/', '\\', config('modules.namespace').'\\'.$this->moduleName.'\\'.config('modules.paths.generator.component-class.path'));
        Blade::componentNamespace($componentNamespace, $this->moduleNameLower);
    }

    /**
     * Get the services provided by the provider.
     */
    public function provides(): array
    {
        return [];
    }

    private function getPublishableViewPaths(): array
    {
        $paths = [];
        foreach (config('view.paths') as $path) {
            if (is_dir($path.'/modules/'.$this->moduleNameLower)) {
                $paths[] = $path.'/modules/'.$this->moduleNameLower;
            }
        }

        return $paths;
    }
    protected function generateAllModulePermissions(): void
    {
        if (!Schema::hasTable('permissions')) {
            // La table n'existe pas encore, on ne fait rien
            return;
        }
    
        $modulesPath = base_path('Modules');
        $modules = File::directories($modulesPath);
    
        foreach ($modules as $modulePath) {
            $moduleName = basename($modulePath);
            $className = "Modules\\$moduleName\\Permission\\{$moduleName}PermissionRegistrar";
    
            if (class_exists($className)) {
                $reflection = new ReflectionClass($className);
                $traitsUsed = class_uses($className);
    
                if (in_array(PermissionGenerator::class, $traitsUsed)) {
                    $instance = app($className);
                    if (method_exists($instance, 'registerPermissions')) {
                        $instance->registerPermissions();
                        info("Permissions du module [$moduleName] générées via $className.");
                    }
                }
            }
        }
    }
}
