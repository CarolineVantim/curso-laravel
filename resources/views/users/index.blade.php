@extends('layouts.app')

@section('title', 'Listagem dos Usuários')

@section('content')
<h1 class="text-2x1 font-semibold text-lg leading-tigh py-2">Listagem dos Usuários</h1>

<form class="py-5" id="form" action="{{ route('users.index')}}" method="GET">
    <input type="text" name="search" placeholder="Pesquisar" id="inputSearch" class="md:w-2/6 bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-green-500">
    <button class="shadow bg-green-300 hover:bg-green-400 rounded-2xl px-2 text-white font-bold py-2 px-4 rounded">Pesquisar</button>
</form>

<a class="bg-green-300 rounded-full text-white px-4 text-sm" href="{{ route('users.create')}}">+ Novo </a>

<table class="min-w-full leading-normal shadow-md rounded-lg overflow-hidden">
        <thead>
            <tr>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                    Nome
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                    E-mail
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                    Comentários
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                    Ações 
                </th>
            </tr>
        </thead>
        <tbody>
    @foreach ($users as $user)
        <tr>
            <td class="px-5 py-5 border-b border-gray text-black">{{ $user->name}}</td>
            <td class="px-5 py-5 border-b border-gray">{{ $user->email}}</td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <a class="bg-green-200 rounded-full py-2 px-6" href="{{ route('comments.index', $user->id)}}"> Anotações (0) </a>
            </td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <a class="bg-green-200 rounded-full py-2 px-6" href="{{ route('users.edit', $user->id)}}"> Editar </a>
                <a class="bg-green-200 rounded-full py-2 px-6" href="{{ route('users.show', $user->id)}}"> Detalhes </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>   
@endsection
