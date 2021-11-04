<?php

namespace Modules\WidePayLaravelSistema1Challenge\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;
use Modules\WidePayLaravelSistema1Challenge\Services\RequestService;

class StoreJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    public function __construct(public $user_id, public $url, public $time, public $statusCode, public $body) {}


    public function handle()
    {
        $data = [
            'user_id' => $this->user_id,
            'url' => $this->url,
            'time' => $this->time,
            'status_code' => $this->statusCode,
            'body' => $this->body,
        ];
        $request = (new RequestService())->create($data);
        Log::info('Store Sucess: Id genereate for entity request - ('.$request->id.')');
    }
}
