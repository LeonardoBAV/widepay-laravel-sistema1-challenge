<?php

namespace Modules\WidePayLaravelSistema1Challenge\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Modules\WidePayLaravelSistema1Challenge\Services\RequestService;

class RequestsComponent extends Component
{

    public $requests;

    protected $listeners = ['showBody'];

    public function render()
    {
        $this->requests = (new RequestService())->listByUser(auth()->user());

        return view('widepaylaravelsistema1challenge::components.livewire.requests', ['requests' => $this->requests]);
    }


    public function showBody($requestId)
    {
        $request = $this->requests->first(function($request) use($requestId) { // why arrow function give me syntax error?
            return $request->id == $requestId;
        });

        $this->emitTo('modal-component', 'showBody', $request);
    }

}
