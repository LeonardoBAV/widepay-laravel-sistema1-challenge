<?php

namespace Modules\WidePayLaravelSistema1Challenge\Http\Livewire;

use Livewire\Component;
use Modules\WidePayLaravelSistema1Challenge\Entities\Request;
use Modules\WidePayLaravelSistema1Challenge\Services\RequestService;

class ModalComponent extends Component
{

    protected $listeners = ['showBody'];

    public $url;
    public $body;

    public function render()
    {
        return view('widepaylaravelsistema1challenge::components.livewire.modal', ['url' => $this->url, 'body' => $this->body]);
    }


    public function showBody($requestId)
    {
        $request = Request::find($requestId);
        
        if($request){
            $this->url = $request->url;
            $this->body = $request->body;
        } else {
            $this->url = 'opaaa';
            $this->body = 'kkkk';
        }
        //$request = Request::find($id);
        //if($request){
            
            $this->dispatchBrowserEvent('show-modal');
        //} else {
        //    $this->url = null;
        //    $this->body = null;
        //}
    }

    /*public function updated($value)
    { 
        $this->dispatchBrowserEvent('show-modal');        
    }
*/
    public function updatedBody($value)
    {    
        $this->dispatchBrowserEvent('show-modal');        
    }

}
