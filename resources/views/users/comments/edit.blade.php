@extends('layouts.app')

@section('title', 'Alterando comentário')

@section('content')
<h1>Editar Comentário {{ $user->name }}</h1>

@if ($errors->any())
    <ul class="errors">
        @foreach ($errors->all() as $error)
        <li class="errors">{{ $error }}</li>
        @endforeach
    </ul>
@endif

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<form action="{{ route('users.update', $user->id)}}" method="POST">

    <!--- Uma forma de ser feito <input type="hidden" name="_method" value="PUT"> -->
    @method('PUT')
    @include('users.comments._partials.form')
</form>
    
@endsection