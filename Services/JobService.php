<?php

namespace Modules\WidePayLaravelSistema1Challenge\Services;

use Modules\WidePayLaravelSistema1Challenge\Entities\Url;
use Modules\WidePayLaravelSistema1Challenge\Jobs\RequestUrlJob;

class JobService {

    function __construct(){}

    public function dispatchUrl(Url $url){
        RequestUrlJob::dispatch($url);
    }

}