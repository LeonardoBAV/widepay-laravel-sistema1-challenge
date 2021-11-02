<?php

namespace Modules\WidePayLaravelSistema1Challenge\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use Modules\WidePayLaravelSistema1Challenge\Entities\Client;
use Modules\WidePayLaravelSistema1Challenge\Fortify\CreateNewUser;
use Modules\WidePayLaravelSistema1Challenge\Http\ViewComposers\IndexComposer;

class WidePayLaravelSistema1ChallengeServiceProvider extends ServiceProvider
{
    /**
     * @var string $moduleName
     */
    protected $moduleName = 'WidePayLaravelSistema1Challenge';

    /**
     * @var string $moduleNameLower
     */
    protected $moduleNameLower = 'widepaylaravelsistema1challenge';

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->loadMigrationsFrom(module_path($this->moduleName, 'Database/Migrations'));

        Fortify::loginView(function () {
            return  view('widepaylaravelsistema1challenge::auth.login');
        });

        Fortify::registerView(function () {
            return view('widepaylaravelsistema1challenge::auth.register');
        });
        
        Fortify::createUsersUsing(CreateNewUser::class);

        View::composer('widepaylaravelsistema1challenge::index', IndexComposer::class);

        Blade::component('widepaylaravelsistema1challenge::components.alert', 'alert');

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);

        $guards = config('auth.guards');
        $guards['web'] = [
            'driver' => 'session',
            'provider' => 'clients',
        ];

        config(['auth.guards' => $guards]);

        $providers = config('auth.providers');
        $providers['clients'] =  [
            'driver' => 'eloquent',
            'model' => Client::class,
        ];

        config(['auth.providers' => $providers]);


        $passwords = config('auth.passwords');
        $passwords['clients'] =  [
            'provider' => 'clients',
            'table' => 'clients_password_resets',
            'expire' => 60,
        ];
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            module_path($this->moduleName, 'Config/config.php') => config_path($this->moduleNameLower . '.php'),
        ], 'config');
        $this->mergeConfigFrom(
            module_path($this->moduleName, 'Config/config.php'), $this->moduleNameLower
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/' . $this->moduleNameLower);

        $sourcePath = module_path($this->moduleName, 'Resources/views');

        $this->publishes([
            $sourcePath => $viewPath
        ], ['views', $this->moduleNameLower . '-module-views']);

        $this->loadViewsFrom(array_merge($this->getPublishableViewPaths(), [$sourcePath]), $this->moduleNameLower);
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/' . $this->moduleNameLower);

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, $this->moduleNameLower);
        } else {
            $this->loadTranslationsFrom(module_path($this->moduleName, 'Resources/lang'), $this->moduleNameLower);
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }

    private function getPublishableViewPaths(): array
    {
        $paths = [];
        foreach (\Config::get('view.paths') as $path) {
            if (is_dir($path . '/modules/' . $this->moduleNameLower)) {
                $paths[] = $path . '/modules/' . $this->moduleNameLower;
            }
        }
        return $paths;
    }
}
