<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0,maximum-scale=10">
    <meta name="_token" content="{{csrf_token()}}">
    <title>
        @section('title')
        @show
    </title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    {!! HTML::style('css/bootstrap.min.css') !!}
    {!! HTML::style('css/styles.css') !!}
</head>
<body class="bg-light">

    <div class="container d-flex align-items-center justify-content-center">
        @yield('content')
    </div>


    {!! HTML::script('js/jquery-3.3.1.min.js') !!}
    {!! HTML::script('js/bootstrap.bundle.min.js') !!}
    {!! HTML::script('js/bootstrap.min.js') !!}
    {!! HTML::script('js/custom.js') !!}
</body>
</html>