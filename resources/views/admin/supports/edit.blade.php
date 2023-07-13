<h1>Editar suporta</h1>

<x-alert/>

<form action="{{ route('supports.update', $support->id) }}" method="post">
    @method('PUT')
    @include('admin.supports.partials.form');
</form>
