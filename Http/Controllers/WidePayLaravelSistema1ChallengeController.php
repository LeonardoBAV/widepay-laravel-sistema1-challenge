<?php

namespace Modules\WidePayLaravelSistema1Challenge\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class WidePayLaravelSistema1ChallengeController extends Controller
{

    public function index()
    {
        return view('widepaylaravelsistema1challenge::index');
    }

}
