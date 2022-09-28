@extends('layouts.app')

@section('title', 'Listagem dos Usuários')

@section('content')
<h1>Listagem dos Usuários</h1>

<form action="{{ route('users.index')}}" method="GET">
    <input type="text" name="search" placeholder="Pesquisar" >
    <button>Pesquisar</button>
</form>

<a href="{{ route('users.create')}}">+ Novo cadastro</a>

<ul>
    @foreach ($users as $user)
        <li>
            {{ $user->name }}
            {{ $user->email }}
            <a href="{{ route('users.show', $user->id)}}">Ver</a>
            <a href="{{ route('users.edit', $user->id)}}">Editar</a>
        </li>
    @endforeach
</ul>
    
@endsection
