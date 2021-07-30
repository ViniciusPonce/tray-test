<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Tray Test</title>
    <style>
        body {
            background:url("https://res.cloudinary.com/dte7upwcr/image/upload/f_auto,w_1500/blog/blog2/tray-e-bom/tray-e-bom-img_header.jpg") center center/cover no-repeat local ;
            background-attachment: fixed;
        }

    </style>
</head>
<body>

    <div class="container py-lg-4" >
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
    </div>
</body>
</html>
