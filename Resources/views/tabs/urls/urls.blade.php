<x-alert />
@if($url)
{{ Form::model($url, ['route' => ['urls.update', $url], 'method'=> 'put', 'class' => 'mt-3 mb-3 d-flex flex-row']) }}
    {{ Form::hidden('client_id', auth()->user()->id) }}
    {{ Form::text('url', null, ['class' => 'form-control', 'placeholder' => 'Insira uma URL válida']) }}
    {{ Form::submit('Salvar', ['class' => 'btn btn-primary ms-3']) }}
    <a href="{{ route('home', 1) }}" class="btn btn-secondary ms-3">Cancelar</a>
{!! Form::close() !!}
@else
{{ Form::open(['route' => 'urls.store', 'class' => 'mt-3 mb-3 d-flex flex-row']) }}
    {{ Form::hidden('client_id', auth()->user()->id) }}
    {{ Form::text('url', null, ['class' => 'form-control', 'placeholder' => 'Insira uma URL válida']) }}
    {{ Form::submit('Salvar', ['class' => 'btn btn-primary ms-3']) }}
{!! Form::close() !!}
@endif
<table class="table table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th scope="col">Cód.</th>
            <th scope="col">Url</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @each('widepaylaravelsistema1challenge::tabs.urls.tr', $urls, 'url')
    </tbody>
</table>