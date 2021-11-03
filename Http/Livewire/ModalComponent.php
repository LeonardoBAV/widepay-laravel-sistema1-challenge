<?php

namespace Modules\WidePayLaravelSistema1Challenge\Http\Livewire;

use Livewire\Component;
use Modules\WidePayLaravelSistema1Challenge\Entities\Request;
use Modules\WidePayLaravelSistema1Challenge\Services\RequestService;

class ModalComponent extends Component
{

    protected $listeners = ['showBody'];

    public $request;

    public function render()
    {
        return view('widepaylaravelsistema1challenge::components.livewire.modal', ['request' => $this->request]);
    }


    public function showBody(Request $request){
        $this->request = $request;
        $this->dispatchBrowserEvent('show-modal');
    }

}
