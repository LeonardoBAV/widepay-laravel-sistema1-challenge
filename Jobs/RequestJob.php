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

class RequestJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $time;
    private $response;

    public function __construct(public Url $url) {}

    public function handle()
    {
        $this->doRequest();
        $this->sendResponse();
    }

    private function doRequest(){
        $this->time = Carbon::now()->format('Y-m-d H:i:s');
        $this->response = Http::get($this->url->url); 
    }

    private function sendResponse(){
        $user_id = $this->url->user_id;
        $time = $this->time;
        $statusCode = $this->response->status();
        $body = $this->response->body();

        (new JobService())->dispatchRequestData($user_id, $time, $statusCode, $body);
    }

}
