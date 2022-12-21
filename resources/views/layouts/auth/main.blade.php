<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title> {{ config('app.name', 'Dadidu Eticket') }} | {{ $data[0] }}</title>

        @include('partials.header.auth.main')
    </head>
    <body>
        @yield('main')
        
        @include('partials.javascript.main')
    </body>
</html>