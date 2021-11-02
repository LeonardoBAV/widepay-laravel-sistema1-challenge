<?php

namespace Modules\WidePayLaravelSistema1Challenge\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\WidePayLaravelSistema1Challenge\Entities\Url;

class UrlController extends Controller
{

    public function edit(Request $request, $tab, Url $url)
    {
        return view('widepaylaravelsistema1challenge::index');
    }


    public function store(Request $request)
    {
        $url = Url::create($request->all());
        return back()->with('alert-success', 'URL cadastrada.'); 
    }

    
    public function update(Request $request, Url $url)
    {
        $url->update($request->all());
        return back()->with('alert-success', 'URL atualizada.'); 
    }

    public function destroy(Url $url)
    {
        $url->delete();
        return redirect()->route('home', ['tab' => 1])->with('alert-success', 'URL removido.'); 
    }
}
