<div class="mt-3">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if(session()->has('alert-success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Sucesso: </strong>{!! session()->get('alert-success') !!}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
</div>