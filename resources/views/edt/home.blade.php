@extends('layout.layout')

@section('nav-menu')
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-2">
    <a class="navbar navbar-expand-lg" href="{{ route('logout') }}">Sair</a>
</nav>
@endsection

@section('content')
<a href="edt/criar" class="btn btn-dark mb-2">Adicionar</a>

<ul class="list-group">
    @foreach($posts as $post)
    <li class="list-group-item">
        {{ $post->titulo }}
        {{ $post->descricao }}
        <a href="edt/atualizar/{{ $post->id }}" class="btn btn-dark mb-2">Atualizar</a>
        <form method="post" action="edt/deletar/{{ $post->id }}">
            @csrf
            @method('DELETE')
            <button  class="btn btn-dark mb-2">Excluir</button>
        </form>
    </li>

    @endforeach
</ul>
@endsection
