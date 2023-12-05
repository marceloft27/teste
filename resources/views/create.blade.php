<!DOCTYPE html>

<h1> Nova Dúvida </h1>
<form action="{{route('support.store')}}"method="Post">
    @csrf()
    <input type="text" placeholder="Assunto" name="subject" value ="{{old('subject')}}">
    <textarea name="body" cold="30" rows="5" placeholder="Descrição">{{old('body')}}</textarea>
    <button type="submit"> Enviar</button>
</form>

@if($errors->any())
    @foreach($errors->all() as $error)
    {{$error}}
    @endforeach
@endif
