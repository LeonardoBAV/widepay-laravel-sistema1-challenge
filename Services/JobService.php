<?php

namespace Modules\WidePayLaravelSistema1Challenge\Services;

use Modules\WidePayLaravelSistema1Challenge\Entities\Url;
use Modules\WidePayLaravelSistema1Challenge\Jobs\RequestJob;
use Modules\WidePayLaravelSistema1Challenge\Jobs\StoreJob;

class JobService {

    function __construct(){}

    public function dispatchUrl(Url $url){
        RequestJob::dispatch($url)->onQueue('urls');
    }

    public function dispatchRequestData($user_id, $url, $time, $statusCode, $body){
        StoreJob::dispatch($user_id, $url, $time, $statusCode, mb_convert_encoding($body, 'UTF-8', 'UTF-8'))->onQueue('requests');
    }

}