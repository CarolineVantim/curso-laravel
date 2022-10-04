@extends('layouts.app')

@section('title', "Novo comentário")

@section('content')
<h1>Novo Comentário</h1>

@include('includes.validations-form')

<form action="{{ route('comments.store', $user->id) }}" method="POST">
    @include('users.comments._partials.form')
</form>
    
@endsection
