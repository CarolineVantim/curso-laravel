@extends('layouts.app')

@section('title', 'Novo usuário')

@section('content')
<h1>Listagem dos Usuários</h1>

<h1>Novo usuário</h1>

@if ($errors->any())
    <ul class="errors">
        @foreach ($errors->all() as $error)
        <li class="errors">{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('users.store') }}" method="post">
    @csrf
    <label for="">Nome</label>
    <input type="text" name="name" placeholder="Insira seu nome" value="{{ old('name')}}">
    
    <label for="">E-mail</label>
    <input type="email" name="email" placeholder="Insira seu email " value="{{ old('email')}}">

    <label for="">Senha</label>
    <input type="password" name="password" placeholder="Insira sua senha">

    <button type="submit">Salvar</button>
</form>
    
@endsection
