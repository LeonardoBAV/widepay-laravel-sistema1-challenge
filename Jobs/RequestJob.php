<?php

namespace Modules\WidePayLaravelSistema1Challenge\Jobs;

use Carbon\Carbon;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Modules\WidePayLaravelSistema1Challenge\Entities\Url;
use Modules\WidePayLaravelSistema1Challenge\Services\JobService;

class RequestJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $time;
    private $status;
    private $body;


    public function __construct(public Url $url)
    {
    }

    public function handle()
    {
        $this->doRequest();
        $this->sendResponse();
    }

    private function doRequest()
    {
        $this->time = Carbon::now()->format('Y-m-d H:i:s');
        try {
            $response = Http::get($this->url->url);
            $this->status = $response->status();
            $this->body = $response->body();
            Log::info('Request Sucess: '.$this->url->url);
        } catch (Exception $e) {
            Log::error('Request Error: '.$this->url->url);
            Log::error($e->getMessage());
            $this->status = 404;
            $this->body = null;
        }
    }

    private function sendResponse()
    {
        $user_id = $this->url->user_id;
        $url = $this->url->url;
        $time = $this->time;
        $statusCode = $this->status;
        $body = $this->body;

        (new JobService())->dispatchRequestData($user_id, $url, $time, $statusCode, $body);
    }
}
