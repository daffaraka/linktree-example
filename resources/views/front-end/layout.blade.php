<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }} </title>
    <link href="{{ asset('css/style.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/front-end.css') }}">
    <script src="https://use.fontawesome.com/c7e1e2d123.js"></script>
</head>

<body>

    <div class="container-fluid py-4" id="body-first">
        @yield('content')

    </div>

</body>
