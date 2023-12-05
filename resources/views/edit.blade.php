<!DOCTYPE html>

<h1>Dúvida {{ $support->id}} </h1>
<form action="{{route('support.update', $support->id)}}"method="Post">
    @csrf()
    @method('PUT')
    <input type="text" placeholder="Assunto" name="subject" value= "{{ $support->subject}}">
    <textarea name="body" cold="30" rows="5" placeholder="Descrição">{{ $support->body}}</textarea>
    <button type="submit"> Enviar</button>
</form>

