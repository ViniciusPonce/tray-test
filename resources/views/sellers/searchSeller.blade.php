<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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
            <button type="button" class="btn btn-dark mb-3" onclick="history.go(-1);">
                <i class="bi bi-arrow-left-short"></i>
                Voltar
            </button>
            <table id="tableSellers" class="table table-striped table-bordered table-condensed table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Comissão</th>
                    </tr>
                </thead>
                <tbody class="text-center">

                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript">

    function constructLine(sellers){
        var line = "<tr>" +
            "<td>" + sellers.id + "</td>" +
            "<td>" + sellers.name + "</td>" +
            "<td>" + sellers.email + "</td>" +
            "<td>" + sellers.comission + "</td>" +
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
</body>
</html>
