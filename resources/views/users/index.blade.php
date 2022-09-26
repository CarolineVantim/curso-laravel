@extends('layouts.app')

@section('title', 'Listagem dos Usuários')

@section('content')
<h1>Listagem dos Usuários</h1>

<a href="{{ route('users.create')}}">+ Novo cadastro</a>

<ul>
    @foreach ($users as $user)
        <li>
            {{ $user->name }}
            {{ $user->email }}
            <a href="{{ route('users.show', $user->id)}}">Ver</a>
        </li>
    @endforeach
</ul>
    
@endsection
