@extends('widepaylaravelsistema1challenge::layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-link {{ $tab == 0? 'active': '' }}" href="{{ route('home', 0) }}">Requests</a>
                <a class="nav-link {{ $tab == 1? 'active': '' }}" href="{{ route('home', 1) }}">Urls</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade {{ $tab == 0? 'show active': '' }}">
                @include('widepaylaravelsistema1challenge::tabs.requests')
            </div>
            <div class="tab-pane fade {{ $tab == 1? 'show active': '' }}">
            @include('widepaylaravelsistema1challenge::tabs.urls.urls')
            </div>
        </div>
    </div>
</div>
@endsection
