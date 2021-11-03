<?php

namespace Modules\WidePayLaravelSistema1Challenge\Services;

use App\Models\User;
use Modules\WidePayLaravelSistema1Challenge\Entities\Request;

class RequestService {

    function __construct(){}

    public function list(){
        return Request::all();
    }

    public function listByUser(User $user){
        return Request::where('user_id', $user->id)->get();
    }


    public function create($data){
        return Request::create($data);
    }

}