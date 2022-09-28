@extends('layouts.app')

@section('title', 'Novo usuário')

@section('content')
<h1>Listagem dos Usuários</h1>

<h1>Novo usuário</h1>

@include('includes.validations-form')

<form action="{{ route('users.store') }}" method="post">
    @include('users._partials.form')
</form>
    
@endsection
