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
                <h1 style="font-weight: bold">Consultar Vendas</h1>
            </div>
            <form class="form-group" id="formSale">
                <div class="form-group mb-3">
                    <label>Digite o ID do vendedor</label>
                    <input type="number" class="form-control" id="inputIdSeller" placeholder="ID">
                </div>
                <button type="submit" class="btn btn-primary">Pesquisar</button>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">

    {{--$.ajaxSetup({--}}
    {{--    headers: {--}}
    {{--        'X-CSRF-TOKEN': "{{ csrf_token() }}"--}}
    {{--    }--}}
    {{--});--}}

    {{--function constructLine(sellers){--}}
    {{--    var line = "<tr>" +--}}
    {{--        "<td>" + sellers.id + "</td>" +--}}
    {{--        "<td>" + sellers.name + "</td>" +--}}
    {{--        "<td>" + sellers.email + "</td>" +--}}
    {{--        "<td>" + sellers.comission + "</td>" +--}}
    {{--        "</tr>";--}}
    {{--    return line;--}}
    {{--}--}}

    function searchSale(){
        $.ajax({
            type: 'GET',
            url: '/api/sales/' + $("#inputIdSeller").val()
        }).done(function(data){
            console.log(data)
            if (data.success){
                Swal.fire({
                    title: 'Sucesso!',
                    text: 'Encontrado com sucesso',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 2000
                })
                // location.reload()
            }else{
                Swal.fire({
                    title: 'Oops!',
                    text: 'Verifique os dados e tente novamente',
                    icon: 'warning',
                    showConfirmButton: false,
                    timer: 2000
                })
            }
        }).fail(function(){
            Swal.fire({
                title: 'Erro!',
                text: 'Houve um erro no processo',
                icon: 'error',
                showConfirmButton: false,
                timer: 2000
            })
        });
    }

    {{--$(document).ready(function(){--}}
    {{--    searchSeller()--}}
    {{--})--}}
    $('#formSale').submit( function(event){
        event.preventDefault();
        searchSale();
    })
</script>
@endsection
