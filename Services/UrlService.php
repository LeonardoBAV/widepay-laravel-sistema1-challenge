<?php

namespace Modules\WidePayLaravelSistema1Challenge\Services;

use Modules\WidePayLaravelSistema1Challenge\Entities\Url;

class UrlService {

    function __construct(){}

    public function list(){
        return Url::all();
    }

    public function edit(Url $url){
        return $url;
    }

    public function create($data){
        return Url::create($data);
    }

    public function update($data, Url $url){
        $url->update($data);
        return $url;
    }

    public function destroy(Url $url){
        $url->delete();
        return $url->id;
    }

}