@extends('layout.layout')

@section('titulo')
Login
@endsection

@section('titulo-page')
<h1>LOGIN</h1>
@endsection


@section('content')
@if (!empty($erro))
<div class="alert alert-danger">
    {{ $mensagem }}
</div>
@endif
@if (!empty($msg))
<div class="alert alert-success">
    {{ $msg }}
</div>
@endif

<form method="post">
    @csrf




    <div  class="form-group">
        <label for="Email">Digite seu E-mail:</label>
        <input type="email" class="form-control" name="email" id="email" required>
    </div>

    <div  class="form-group">
        <label for="senha">Digite sua Senha:</label>
        <input type="password" class="form-control" name="senha" id="senha" required>
    </div>
<div class="d-flex justify-content-between">
    <a type="button" href="create/edt" class="btn btn-success">Cadastrar-se</a>
    <button type="submit" class="btn btn-info" name="ok">Login</button>
</div>
</form>



@endsection
