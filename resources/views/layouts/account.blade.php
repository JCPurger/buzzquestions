<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BuzzQuestions') }} - @yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body class="tema">

    @yield('form')

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery.form.min.js') }}"></script>
    <script src="{{ asset('js/index.js') }}"></script>

</body>

</html>