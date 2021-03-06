<?php

namespace Modules\WidePayLaravelSistema1Challenge\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\WidePayLaravelSistema1Challenge\Entities\Url;
use Modules\WidePayLaravelSistema1Challenge\Http\Requests\UrlSaveRequest;
use Modules\WidePayLaravelSistema1Challenge\Services\UrlService;

class UrlController extends Controller
{

    function __construct(public UrlService $urlService){}

    public function edit($tab, Url $url)
    {
        return view('widepaylaravelsistema1challenge::index');
    }


    public function store(UrlSaveRequest $request)
    {
        $this->urlService->create($request->all());
        return back()->with('alert-success', 'URL cadastrada.'); 
    }

    
    public function update(UrlSaveRequest $request, Url $url)
    {
        $this->urlService->update($request->all(), $url);
        return redirect()->route('home', ['tab' => 1])->with('alert-success', 'URL atualizada.'); 
    }

    public function destroy(Url $url)
    {
        $this->urlService->destroy($url);
        return redirect()->route('home', ['tab' => 1])->with('alert-success', 'URL removido.'); 
    }
}
