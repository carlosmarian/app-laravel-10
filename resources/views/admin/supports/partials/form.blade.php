@csrf
<input type="text" name="subject" id="subject" placeholder="Assunto" value="{{ old('subject') ?? $support->subject ?? "" }}">
<textarea name="body" id="body" cols="30" rows="5" placeholder="Descrição">{{ old('body') ??$support->body ?? "" }}</textarea>
<button type="submit">
    Enviar
</button>
