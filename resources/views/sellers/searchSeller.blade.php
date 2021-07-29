<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
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
            <button type="button" class="btn btn-dark" onclick="history.go(-1);">
                <i class="bi bi-arrow-left-short"></i>
                Voltar
            </button>
        </div>
    </div>
</div>
</body>
</html>
