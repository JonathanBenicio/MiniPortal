@extends('layout.layout')



@section('nav-menu')
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-2">
    <a class="navbar navbar-expand-lg" href="{{ route('logout') }}">Sair</a>
@endsection

@section('content')
<a href="edt/post/criar" class="btn btn-dark mb-2">Adicionar</a>

<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Titulo</th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
            <tr>
                <th scope="row"> {{ $post->titulo }}</th>
                <td><a href="edt/post/atualizar/{{ $post->id }}" class="btn btn-dark mb-2">Atualizar</a></td>
                <td>
                    <form method="post" action="edt/post/deletar/{{ $post->id }}">
                    @csrf
                    <button  class="btn btn-dark mb-2">Excluir</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
