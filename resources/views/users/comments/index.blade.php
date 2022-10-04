@extends('layouts.app')

@section('title', "Comentários do Usuário {$user->name}")

@section('content')
<h1 class="text-2x1 font-semibold text-lg leading-tigh py-2">Comentários do Usuário {{$user->name}}</h1>

<form class="py-5" id="form" action="{{ route('comments.index' , $user->id)}}" method="GET">
    <input type="text" name="search" placeholder="Pesquisar" id="inputSearch" class="md:w-2/6 bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-green-500">
    <button class="shadow bg-green-900 hover:bg-green-600 rounded-2xl px-2 text-white font-bold py-2 px-4 rounded">Pesquisar</button>
</form>

<a class="bg-blue-900 rounded-full text-white px-4 text-sm" href="{{ route('comments.create', $user->id)}}">+ Novo </a>

<table class="min-w-full leading-normal shadow-md rounded-lg overflow-hidden">
        <thead>
            <tr>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                    Título
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                    Conteúdo
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                    Visibilidade 
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                    Detalhes
                </th>
            </tr>
        </thead>
        <tbody>
    @foreach ($comments as $comment)
        <tr>
            <td class="px-5 py-5 border-b border-gray text-black">{{ $comment->title }}</td>
            <td class="px-5 py-5 border-b border-gray">{{ $comment->body}}</td>
            <td class="px-5 py-5 border-b border-gray">{{ $comment->visible ? 'SIM' : 'NÃO'}}</td>
            <td class="px-5 py-5 border-b border-gray">
                <a href="{{ route('comments.edit' , ['user' => $user->id, 'id' => $comment->id])}}"> Editar </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>   
@endsection
