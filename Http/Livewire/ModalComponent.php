<?php

namespace Modules\WidePayLaravelSistema1Challenge\Http\Livewire;

use Livewire\Component;
use Modules\WidePayLaravelSistema1Challenge\Entities\Request;

class ModalComponent extends Component
{

    protected $listeners = ['showBody'];

    public $url;
    public $body;

    public function render()
    {
        return view('widepaylaravelsistema1challenge::components.livewire.modal', ['url' => $this->url, 'body' => $this->body]);
    }


    public function showBody(Request $request)
    {
        $this->url = $request->url;                                                                                     
        $this->body = $request->body;
            
        $this->dispatchBrowserEvent('show-modal');
    }

}
