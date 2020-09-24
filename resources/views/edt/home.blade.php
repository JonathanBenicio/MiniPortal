@extends('layout.layout')



@section('nav-menu')
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-2">
    <a class="navbar navbar-expand-lg" href="{{ route('logout') }}">Sair</a>
</nav>
@endsection

@section('content')
<a href="edt/post/criar" class="btn btn-dark mb-2">Adicionar</a>
<div class="d-flex align-items-center">
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
                <td > {{ $post->titulo }}</td>
                <td class=" d-flex justify-content-end">
                    <a href="edt/post/atualizar/{{ $post->id }}" class="mr-1 btn btn-primary">Atualizar</a>
                    <form method="post" action="edt/post/deletar/{{ $post->id }}">
                        @csrf
                        <button  class="btn btn-danger ">Excluir</button>
                    </form>
                
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection
