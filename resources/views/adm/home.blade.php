@extends('layout.layout')

@section('nav-menu')
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-2">
    <a class="navbar navbar-expand-lg" href="{{ route('logout') }}">Sair</a>
@endsection

@section('content')
<a href="/criar" class="btn btn-dark mb-2">Adicionar</a>

<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Editor</th>
        <th scope="col">Quantidade Post</th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
        @foreach($editors as $editor)
    <tr>
        <th scope="row"> {{ $editor->nome }}</th>
        <td>{{ $editor->quant }}</td>
            <td><a href="edt/atualizar/{{ $editor->id }}" class="btn btn-dark mb-2">Atualizar</a></td>
                <td><form method="post" action="edt/deletar/{{ $editor->id }}">
            @csrf
            @method('DELETE')
            @if ( $editor->quant == 0)

            <button  class="btn btn-dark mb-2">Excluir</button>
            @endif
        </form></td>
    </tr>

    @endforeach
</tbody>
</table>
@endsection
