<?php

namespace Modules\WidePayLaravelSistema1Challenge\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Modules\WidePayLaravelSistema1Challenge\Entities\Url;
use Modules\WidePayLaravelSistema1Challenge\Policies\UrlPolicy;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
        Url::class => UrlPolicy::class,
    ];


    public function boot()
    {
        $this->registerPolicies();
    }
}
