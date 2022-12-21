<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title> {{ config('app.name', 'Dadidu Eticket') }} | {{ $data[0] }}</title>

        @include('partials.header.pages.main')
    </head>
    <body class="g-sidenav-show  bg-gray-200">
        @include('partials.sidebar.main')
        
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            @include('partials.nav.main')

            @yield('main')
            
            <div class="container-fluid py-4">
                <footer class="footer py-4  ">
                    <div class="container-fluid">    
                        @include('partials.footer.main')
                    </div>
                </footer>    
            </div>
        </main>

        @include('partials.javascript.main')
    </body>
</html>