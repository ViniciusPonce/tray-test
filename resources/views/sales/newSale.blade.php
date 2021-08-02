@extends('layouts.front')

@section('content')
<div class="card">
    <div class="card-body">
        <button type="button" class="btn btn-dark mb-3 btn-sm" onclick="history.go(-1);">
            <i class="bi bi-arrow-left-short"></i>
            Voltar
        </button>
        <div class="text-center">
            <h1 style="font-weight: bold" class="bi bi-cart4"> Nova Venda </h1>
        </div>
        <div class="col m-sm-4">
            <form class="form-group" id="formSale">
                <div class="form-group" id="selectSale">
                    <label>Selecione o vendedor</label>
                    <div class="input-group mb-3">
                        <select class="form-select" id="selectSeller">

                        </select>
                    </div>
                </div>
                <div>
                    <div class="form-group mb-3">
                        <label>Valor da Venda</label>
                        <input type="tel" class="form-control maskMonek" id="inputValue" placeholder="Valor">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Realizar Venda</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': "{{ csrf_token() }}"
    }
});

function selectSeller(){
    $.getJSON('/api/sellers', function(sellers){
        for (i=0;sellers.data.length; i++) {
            option = '<option value ="' + sellers.data[i].id + '">' +
                sellers.data[i].id + ' - ' + sellers.data[i].name + '</option>';
            $('#selectSeller').append(option);
        }
    })
}

$(function(){
    $("#inputValue").maskMoney({
        prefix: 'R$ ',
        allowNegative: true,
        thousands: '.',
        decimal: ','
    });
});

function createSale(){
    if ($("#inputValue").val() === "") {
        Swal.fire({
            title: 'Oops!',
            text: 'Preencha os campos',
            icon: 'warning',
            showConfirmButton: false,
            timer: 2000
        })
        location.stop();
    }
    var value = $("#inputValue").maskMoney('unmasked')[0]
    sale = {
        seller_id: Number($("#selectSeller").val()),
        sale_value: value
    };
    $.ajax({
        type: 'POST',
        url: '/api/sales',
        data: sale,
    }).done(function(data){
        if (data.success){
            Swal.fire({
                title: 'Sucesso!',
                text: 'Venda realizada com sucesso',
                icon: 'success',
                showConfirmButton: false,
                timer: 4000
            })
            location.reload();
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
};

$(document).ready(function(){
    selectSeller()
})

$('#formSale').submit( function(event){
    event.preventDefault();
    createSale();
})
</script>
@endsection
