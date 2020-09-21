@extends('layout.layout')

@section('titulo')
Atualizar Post
@endsection

@section('titulo-page')
<h1>Atualizar Post</h1>
@endsection


@section('content')




        <form method="post">
@csrf
            <fieldset>
                <div  class="form-group">
                    <label for="titulo">Digite seu Titulo: </label>
                    <input type="text" class="form-control" name="titulo" id="titulo" value="{{ $post->titulo }}" required>
                </div>
                <div  class="form-group">
                    <label for="descricao">Digite seu Descrição: </label>
                    <input type="text" class="form-control" name="descricao" id="descricao" value="{{ $post->descricao }}" required>
                </div>

            </fieldset>

            <button type="submit" class="btn btn-primary" name="ok">Atualizar-se</button>
        </form>


@endsection
