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
            <div class="text-center">
                <h1 class="mb-4 bi bi-receipt-cutoff" style="font-weight: bold">Consultar Vendas</h1>
                <h5 class="mb-5">Pesquise as vendas por ID do vendedor ou na listagem de todos vendedores cadastrados no sistema</h5>
            </div>
            <div class="row">
                <div class="col">
                    <form class="form-group" id="formSale">
                        <div class="form-group mb-3">
                            <label>Digite o ID do vendedor</label>
                            <input type="number" class="form-control" id="inputIdSeller" placeholder="ID">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary mb-3">Pesquisar</button>
                        </div>
                    </form>
                </div>
                <div class="col">
                    <div class="form-group" id="selectSale">
                        <label>Selecione o vendedor</label>
                        <div class="input-group mb-3">
                            <select class="form-select" id="selectSeller">

                            </select>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary mb-3 " onclick="searchSaleSelect()">Pesquisar</button>
                        </div>
                    </div>
                </div>
            </div>
            <table id="tableSale" class="table table-striped table-bordered table-condensed table-hover" style="width:100%">
                <thead class="text-center">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Comissão</th>
                    <th>Valor da Venda</th>
                    <th>Data da Venda</th>
                </tr>
                </thead>
                <tbody class="text-center">

                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">

    {{--$.ajaxSetup({--}}
    {{--    headers: {--}}
    {{--        'X-CSRF-TOKEN': "{{ csrf_token() }}"--}}
    {{--    }--}}
    {{--});--}}
    function selectSeller(){
        $.getJSON('/api/sellers', function(sellers){
                for (i=0;sellers.data.length; i++) {
                    option = '<option value ="' + sellers.data[i].id + '">' +
                        sellers.data[i].id + ' - ' + sellers.data[i].name + '</option>';
                    // $('#selectSeller').append(option)
                    $('#selectSeller').append(option);
                }
        })
    }
    function constructLine(sellers){
        var line = "<tr>" +
            "<td>" + sellers.id + "</td>" +
            "<td>" + sellers.name + "</td>" +
            "<td>" + sellers.email + "</td>" +
            "<td>" + sellers.comission_sale.toLocaleString('pt-br', {style: 'currency', currency: 'BRL'}) + "</td>" +
            "<td>" + sellers.sale_value.toLocaleString('pt-br', {style: 'currency', currency: 'BRL'}) + "</td>" +
            "<td>" + sellers.created_at + "</td>" +
            "</tr>";
        return line;
    }

    function searchSaleInput() {
        $.ajax({
            type: 'GET',
            url: '/api/sales/' + $("#inputIdSeller").val()
        }).done(function (data) {
            if (data.success) {
                if ($('#tableSale>tbody>tr').text() !== ""){
                    $('#tableSale>tbody>tr').remove();
                }
                for (i = 0; i < data[0].length; i++) {
                        line = constructLine(data[0][i]);
                        $('#tableSale>tbody').append(line);
                }
                Swal.fire({
                    title: 'Sucesso!',
                    text: 'Encontrado com sucesso',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 2000
                })
                // location.reload()
            } else {
                Swal.fire({
                    title: 'Oops!',
                    text: 'ID não encontrado',
                    icon: 'warning',
                    showConfirmButton: false,
                    timer: 2000
                })
            }
        }).fail(function () {
            Swal.fire({
                title: 'Erro!',
                text: 'Houve um erro no processo',
                icon: 'error',
                showConfirmButton: false,
                timer: 2000
            })
        })
    }
    function searchSaleSelect() {
        // var id = $("#selectSeller").val();
        // var idInt = id.toNumber()
        $.ajax({
            type: 'GET',
            url: '/api/sales/' + Number($("#selectSeller").val())
        }).done(function (data) {
            if (data.success) {
                if ($('#tableSale>tbody>tr').text() !== ""){
                    $('#tableSale>tbody>tr').remove();
                }
                for (i = 0; i < data[0].length; i++) {
                    line = constructLine(data[0][i]);
                    $('#tableSale>tbody').append(line);
                }
                Swal.fire({
                    title: 'Sucesso!',
                    text: 'Encontrado com sucesso',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 2000
                })
                // location.reload()
            } else {
                Swal.fire({
                    title: 'Oops!',
                    text: 'Este vendedor nao possui venda cadastrada',
                    icon: 'warning',
                    showConfirmButton: false,
                    timer: 2000
                })
            }
        }).fail(function () {
            Swal.fire({
                title: 'Erro!',
                text: 'Houve um erro no processo',
                icon: 'error',
                showConfirmButton: false,
                timer: 2000
            })
        })
    }

    $(document).ready(function(){
        selectSeller()
    })

    $('#formSale').submit( function(event){
        event.preventDefault();
        searchSaleInput();
    })

    $('#selectSale').submit( function(event){
        event.preventDefault();
        searchSaleSelect()
    })
</script>
@endsection
