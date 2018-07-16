<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

<div class="jumbotron jumbotron-fluid center">
    <div class="container">
        <h1 class="display-4">Página não encontrada !</h1>
        <p class="lead">{{ $exception->getMessage() }}</p>
        <a class="btn btn-warning btn-lg" href="{{ url('/') }}" role="button">Página Inicial</a>
    </div>
</div>

</body>
</html>