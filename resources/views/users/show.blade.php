@extends('layouts.app')

@section('title', 'Dados do Usuário')

@section('content')
<h1>Dados do usuário {{ $user->name }}</h1>

<ul>
    <li>{{ $user->name }}</li>
    <li>{{ $user->email }}</li>
</ul>
@endsection