@extends('layout.layout')

@section('titulo-page')
<h1>Bem Vindo</h1>
@endsection

@section('content')
<div class="row p-5">
    <div class="row pr-5">
        <h3>Logar como: </h3>
    </div>
    <div class="d-flex justify-content-around">

        <a type="button" href="/login/adm" class="btn btn-primary mr-5">Administrador</a>
        <a type="button" href="/login/edt" class="btn btn-primary">Editor</a>
    </div>
</div>


@endsection
