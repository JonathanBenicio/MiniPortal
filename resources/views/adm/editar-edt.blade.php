@extends('layout.layout')

@section('titulo')
Cadastro Editor
@endsection

@section('titulo-page')
<h1>Cadastro Editor</h1>
@endsection


@section('content')
@if (!empty($mensagem))
<div class="alert alert-danger">
    {{ $mensagem }}
</div>
@endif



        <form method="post">
@csrf

            <fieldset>
                <div  class="form-group">
                    <label for="Nome">Digite seu Nome: </label>
                    <input type="text" class="form-control" name="nome" id="nome"  required>
                </div>
                <div  class="form-group">
                    <label for="Email">Digite seu E-mail:</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                </div>
                <div  class="form-group">
                    <label for="CPF">Digite seu CPF:</label>
                    <input type="number" class="form-control" name="cpf" id="cpf" minlength="14" required>
                </div>
                <div  class="form-group">
                    <label for="senha">Digite sua Senha:</label>
                    <input type="password" class="form-control" name="senha" id="senha" required>
                </div>
            </fieldset>

            <button type="submit" class="btn btn-primary" name="ok">Cadastrar-se</button>
        </form>


@endsection
