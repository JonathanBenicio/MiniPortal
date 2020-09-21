@extends('layout.layout')

@section('nav-menu')
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-2">
    <a class="navbar navbar-expand-lg" href="{{ route('listar-Editor') }}">Home</a>
</nav>
@endsection

@section('content')
<a href="/criar" class="btn btn-dark mb-2">Adicionar</a>

<ul class="list-group">
    @foreach($Editors as $Editor)
    <li class="list-group-item">
        {{ $post->titulo }}
        {{ $post->descricao }}
    </li>

    @endforeach
</ul>
@endsection
