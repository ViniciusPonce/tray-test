@extends('layouts.front')

@section('content')
<div class="card">
    <div class="card-body">
        <button type="button" class="btn btn-dark mb-3 btn-sm" onclick="history.go(-1);">
            <i class="bi bi-arrow-left-short"></i>
            Voltar
        </button>
        <div class="text-center">
            <h1 class="bi bi-person-plus-fill" style="font-weight: bold"> Cadastro de Vendedores </h1>
        </div>
        <div class="col m-sm-4">
            <form class="form-group" id="formSeller">
                <div class="form-group mb-3">
                    <label for="exampleInputEmail1">Nome do Vendedor</label>
                    <input type="text" class="form-control" id="inputName" placeholder="Nome">
                </div>
                <div class="form-group mb-3">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="text" class="form-control" id="inputEmail" placeholder="Email">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
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

        function createSeller(){
            if ($("#inputName").val() === "" || $("#inputEmail").val() === "") {
                Swal.fire({
                    title: 'Oops!',
                    text: 'Preencha os campos',
                    icon: 'warning',
                    showConfirmButton: false,
                    timer: 2000,
                })
                location.stop();
            }
            seller = {
                name: $("#inputName").val(),
                email: $("#inputEmail").val()
            };
            $.ajax({
                type: 'POST',
                url: '/api/sellers',
                data: seller,
            }).done(function(data){
                if (data.success){
                    Swal.fire({
                        title: 'Sucesso!',
                        text: 'Vendedor cadastrado com sucesso',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 4000
                    })
                    location.reload()
                }else{
                    Swal.fire({
                        title: 'Oops!',
                        text: 'Verifique os dados e tente novamente',
                        icon: 'warning',
                        showConfirmButton: false,
                        timer: 4000
                    })
                }
                }).fail(function(){
                Swal.fire({
                    title: 'Erro!',
                    text: 'Houve um erro no processo',
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 4000
                })
            });
                // location.reload();
        };

        $('#formSeller').submit( function(event){
            event.preventDefault();
            createSeller();
        })
    </script>
@endsection
