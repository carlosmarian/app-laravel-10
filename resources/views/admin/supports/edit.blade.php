<h1>Editar suporta</h1>
<form action="{{ route('supports.update', $support->id) }}" method="post">
    @csrf
    @method('PUT')
    <input type="text" name="subject" id="subject" placeholder="Assunto" value="{{ $support->subject }}">
    <textarea name="body" id="body" cols="30" rows="5" placeholder="Descrição">{{ $support->body}}</textarea>
    <button type="submit">
        Enviar
    </button>
</form>
