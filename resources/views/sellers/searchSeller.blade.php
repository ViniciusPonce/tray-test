@extends('layouts.front')
@section('content');
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col">
                <button type="button" class="btn btn-dark mb-3 btn-sm" onclick="history.go(-1);">
                    <i class="bi bi-arrow-left-short"></i>
                    Voltar
                </button>
            </div>
            <div class="col d-flex justify-content-end">
                <a href="{{url('seller-register')}}" class="btn btn-success mb-3 btn-sm" role="button" aria-pressed="true">
                    <i class="bi bi-plus-lg"></i>
                    Novo Vendedor
                </a>
        </div>
        <div class="text-center">
            <h1 style="font-weight: bold" class="bi bi-person-circle"> Vendedores </h1>
        </div>
        <div class="table-responsive">
            <table id="tableSellers" class="table table-striped table-bordered table-condensed table-hover" style="width:100%">
                <thead class="text-center">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Comissão</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody class="text-center">

                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        }
    });

    function constructLine(sellers){
        if (sellers.comission_seller == null){
            sellers.comission_seller = 'Sem Comissão'
        }
        var line = "<tr>" +
            "<td>" + sellers.id + "</td>" +
            "<td>" + sellers.name + "</td>" +
            "<td>" + sellers.email + "</td>" +
            "<td>" + sellers.comission_seller.toLocaleString('pt-br', {style: 'currency', currency: 'BRL'}) + "</td>" +
            "<td>" + '<a href=""  role="button" aria-pressed="true"><i class="bi bi-pencil-fill" style="color: black"></i></a> <a href=""  role="button" aria-pressed="true"><i class="bi bi-trash-fill" style="color: black"></i></a>' + "<td>"
            "</tr>";
        return line;
    }

    function searchSeller(){
        $.getJSON('/api/sellers', function(sellers){
            for(i=0; i < sellers.data.length; i++){
                line = constructLine(sellers.data[i]);
                $('#tableSellers>tbody').append(line);
            }
        })
    }

    $(document).ready(function(){
        searchSeller()
    })

    </script>
@endsection
