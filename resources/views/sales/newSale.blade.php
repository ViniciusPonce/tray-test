@extends('layouts.front')

@section('content')
<div class="card">
    <div class="card-body">
        <button type="button" class="btn btn-dark mb-3 btn-sm" onclick="history.go(-1);">
            <i class="bi bi-arrow-left-short"></i>
            Voltar
        </button>
        <div class="text-center">
            <h1 style="font-weight: bold">Cadastro de Vendedores</h1>
        </div>
        <form class="form-group" id="formSeller">
            <div class="form-group mb-3">
                <label for="exampleInputEmail1">Nome do Vendedor</label>
                <input type="text" class="form-control" id="inputName" placeholder="Nome">
            </div>
            <div class="form-group mb-3">
                <label for="exampleInputPassword1">Email</label>
                <input type="text" class="form-control" id="inputEmail" placeholder="Email">
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
</div>
@endsection
