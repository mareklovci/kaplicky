<!DOCTYPE html>
<html lang="{{ config('app.locale', 'en') }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Dev') }} - @yield('title')</title>

    <!-- CSS styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
               @yield('breadcrumb')
            </ol>
        </nav>

    <div class="container">
        <div class="content">
            @yield('content')
        </div>

        <hr>
        <footer class="container">
            © 2020
        </footer>
    </div>
</body>
</html>
