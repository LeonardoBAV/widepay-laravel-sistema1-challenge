<?php

namespace Modules\WidePayLaravelSistema1Challenge\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use Livewire\Livewire;
use Modules\WidePayLaravelSistema1Challenge\Entities\Client;
use Modules\WidePayLaravelSistema1Challenge\Entities\Url;
use Modules\WidePayLaravelSistema1Challenge\Fortify\CreateNewUser;
use Modules\WidePayLaravelSistema1Challenge\Http\Livewire\ModalComponent;
use Modules\WidePayLaravelSistema1Challenge\Http\Livewire\RequestsComponent;
use Modules\WidePayLaravelSistema1Challenge\Http\ViewComposers\IndexComposer;
use Modules\WidePayLaravelSistema1Challenge\Http\ViewComposers\Tabs\UrlsComposer;
use Modules\WidePayLaravelSistema1Challenge\Observers\UrlObserver;
use Modules\WidePayLaravelSistema1Challenge\Policies\UrlPolicy;

class WidePayLaravelSistema1ChallengeServiceProvider extends ServiceProvider
{

    protected $moduleName = 'WidePayLaravelSistema1Challenge';


    protected $moduleNameLower = 'widepaylaravelsistema1challenge';


    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->loadMigrationsFrom(module_path($this->moduleName, 'Database/Migrations'));

        $this->fortify();
        $this->viewComposers();
        $this->blades();
        $this->observers();
        $this->livewire();
    }

    private function fortify(){
        Fortify::loginView(function () {
            return  view('widepaylaravelsistema1challenge::auth.login');
        });

        Fortify::registerView(function () {
            return view('widepaylaravelsistema1challenge::auth.register');
        });
    }


    private function viewComposers(){
        View::composer('widepaylaravelsistema1challenge::index', IndexComposer::class);
        View::composer('widepaylaravelsistema1challenge::tabs.urls.urls', UrlsComposer::class);
    }


    private function blades(){
        Blade::component('widepaylaravelsistema1challenge::components.alert', 'alert');
    }


    private function observers(){
        Url::observe(UrlObserver::class);
    }


    private function livewire(){
        Livewire::component('requests-component', RequestsComponent::class);
        Livewire::component('modal-component', ModalComponent::class);
    }


    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
        $this->translation();
    }


    private function translation(){
        app()->setLocale('widepaylaravelsistema1challenge');
    }


    protected function registerConfig()
    {
        $this->publishes([
            module_path($this->moduleName, 'Config/config.php') => config_path($this->moduleNameLower . '.php'),
        ], 'config');
        $this->mergeConfigFrom(
            module_path($this->moduleName, 'Config/config.php'), $this->moduleNameLower
        );
    }


    public function registerViews()
    {
        $viewPath = resource_path('views/modules/' . $this->moduleNameLower);

        $sourcePath = module_path($this->moduleName, 'Resources/views');

        $this->publishes([
            $sourcePath => $viewPath
        ], ['views', $this->moduleNameLower . '-module-views']);

        $this->loadViewsFrom(array_merge($this->getPublishableViewPaths(), [$sourcePath]), $this->moduleNameLower);
    }


    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/' . $this->moduleNameLower);

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, $this->moduleNameLower);
        } else {
            $this->loadTranslationsFrom(module_path($this->moduleName, 'Resources/lang'), $this->moduleNameLower);
        }
    }


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
