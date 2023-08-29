<h1>Listagem dos supports</h1>
<a href="{{ route('supports.create') }}">Add suport</a>
<table>
    <thead>
        <th>Assunto</th>
        <th>Status</th>
        <th>Descrição</th>
        <th></th>
    </thead>
<tbody>
@foreach ($supports->items() as $support)
    <tr>
        <td>{{$support->subject}}</td>
        <td>{{$support->status}}</td>
        <td>{{$support->body}}</td>
        <td> <a href="{{ route('supports.show', [$support->id]) }}"> Show </a>
            <a href="{{ route('supports.edit', [$support->id]) }}"> Edit </a>
        </td>
    </tr>
@endforeach
</tbody>
</table>

<x-pagination :paginator="$supports" :appends="$filters" />
