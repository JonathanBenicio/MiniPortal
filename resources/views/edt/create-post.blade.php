@extends('layout.layout')

@section('titulo')
Cadastro Post
@endsection

@section('titulo-page')
<h1>Cadastro Post</h1>
@endsection


@section('content')




        <form method="post">
@csrf

            <fieldset>
                <div  class="form-group">
                    <label for="titulo">Digite seu Titulo: </label>
                    <input type="text" class="form-control" name="titulo" id="titulo" required>
                </div>
                <div  class="form-group">
                    <label for="descricao">Digite seu Descrição: </label>
                    <input type="text" class="form-control" name="descricao" id="descricao" required>
                </div>

            </fieldset>

            <button type="submit" class="btn btn-primary" name="ok">Cadastrar-se</button>
        </form>


@endsection
