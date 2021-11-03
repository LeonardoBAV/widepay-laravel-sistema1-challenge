<?php

namespace Modules\WidePayLaravelSistema1Challenge\Jobs;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Http;
use Modules\WidePayLaravelSistema1Challenge\Entities\Url;
use Modules\WidePayLaravelSistema1Challenge\Services\JobService;

class RequestUrlJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(public Url $url) {}

    public function handle()
    {
        $time = $this->getTimeOfRequest();
        $response = $this->doRequest();
        $statusCode = $this->getStatusCode($response);
        $body = $this->getBody($response);
        
        (new JobService())->dispatchRequestData($time, $statusCode, $body);
    }

    private function getTimeOfRequest(){
        return Carbon::now()->format('d-m-Y H:i:s');
    }

    private function doRequest(){
        return Http::get($this->url->url);
    }

    private function getStatusCode($response){
        return $response->status();
    }

    private function getBody($response){
        return $response->body();
    }
}
