@extends('layouts.front')
@section('content')
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-center">Cadastrar Vendedor</h5>
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <a href="{{url('seller-register')}}" class="btn btn-primary ">Cadastrar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-center">Consultar Vendedor</h5>
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <a href="{{url('seller-search')}}" class="btn btn-primary ">Pesquisar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-center">Nova Venda</h5>
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <a href="#" class="btn btn-primary ">Venda</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-center">Consultar Vendas</h5>
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <a href="#" class="btn btn-primary ">Consultar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
