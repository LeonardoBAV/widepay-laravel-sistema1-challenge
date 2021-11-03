<?php

namespace Modules\WidePayLaravelSistema1Challenge\Http\Livewire;

use Livewire\Component;
use Modules\WidePayLaravelSistema1Challenge\Services\RequestService;

class RequestsComponent extends Component
{


    public function render()
    {
        $requests = (new RequestService())->listByUser(auth()->user());
        return view('widepaylaravelsistema1challenge::components.livewire.requests', ['requests' => $requests]);
    }


}
