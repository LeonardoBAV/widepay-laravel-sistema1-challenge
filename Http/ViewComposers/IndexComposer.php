<?php

namespace Modules\WidePayLaravelSistema1Challenge\Http\ViewComposers;


use Illuminate\View\View;

class IndexComposer
{
    
    private $tab;


    public function __construct()
    {
        $this->tab = request()->route()->parameter('tab');
        if($this->tab == null){
            $this->tab = 0;
        }
    }


    public function compose(View $view)
    {
        //dd($view);
        $view->with('tab', $this->tab);
    }
}