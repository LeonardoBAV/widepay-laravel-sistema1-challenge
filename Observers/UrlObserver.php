<?php

namespace Modules\WidePayLaravelSistema1Challenge\Observers;

use Modules\WidePayLaravelSistema1Challenge\Entities\Url;
use Modules\WidePayLaravelSistema1Challenge\Jobs\DispatchUrlJob;
use Modules\WidePayLaravelSistema1Challenge\Services\JobService;

class UrlObserver
{

    function __construct(public JobService $jobService){}

    public function created(Url $url){
        $this->jobService->dispatchUrl($url);
    }

	public function updated(Url $url)
	{
        if($url->isDirty('url')){
            $this->jobService->dispatchUrl($url);
        }
	}

}