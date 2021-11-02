<tr>
    <th scope="row">#{{ $url->id }}</th>
    <td>{{ $url->url }}</td>
    <td class="text-end">
        {{ Form::open(['route' => ['urls.destroy', $url], 'method' => 'delete']) }}
        <a href="{{ route('urls.edit', [1, $url]) }}" type="button" class="btn btn-dark">
            Editar
        </a>
        {{ Form::submit('Deletar', ['class' => 'btn btn-danger']) }}
        {!! Form::close() !!}
    </td>
</tr>