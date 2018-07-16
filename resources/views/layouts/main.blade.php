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
    <!-- Bee Icon with CDN -->
    <link rel="shortcut icon" href="https://png.icons8.com/metro/50/000000/bee.png">
</head>

<body>

@include('partials.navbar')

@yield('content')

@include('partials.footer')


<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/jquery.form.min.js') }}"></script>
<script src='{{ asset('js/Chart.min.js') }}'></script>
@yield('scripts')

</body>

</html>