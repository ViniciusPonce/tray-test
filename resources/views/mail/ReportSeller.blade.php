<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h4>Relatório de Vendas do dia {{\Carbon\Carbon::now()->format('d/m/Y')}}</h4>

<p>Quantidade de vendas realizadas: {{$totalSale}}</p>

<p>Valor Total / Fechamento Diario: {{'R$ '.number_format($totalValue, 2, ',', '.')}}</p>


</body>
</html>


