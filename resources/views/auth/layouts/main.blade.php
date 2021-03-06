<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @include('auth.layouts.style')
    <style>
        .error_input {
            border: red 1px solid;
            border-radius: 10px;
            background-color: #f7dada;
        }

    </style>
</head>

<body>
    @yield('content')
    @include('auth.layouts.js')
</body>

</html>
