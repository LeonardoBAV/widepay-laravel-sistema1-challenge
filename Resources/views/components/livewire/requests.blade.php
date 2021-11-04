<table class="table table-striped table-hover mt-3" wire:poll>
    <thead class="table-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Url</th>
            <th scope="col" class="text-center">Horário</th>
            <th scope="col" class="text-center">Status Code</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($requests as $number => $request)
        <tr>
            <th scope="row">{{ ($number+1) }}</th>
            <td>{{ $request->url }}</td>
            <td class="text-center">{{ $request->time }}</td>
            <td class="text-center">{{ $request->status_code }}</td>
            <td class="text-end">
                <button type="button" class="btn btn-dark" wire:click="$emit('showBody', '{{ $request->id }}')">
                    Detalhes
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>