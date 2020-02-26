<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>Sacofi</title>
</head>
<body>
    <section id="app">
        <header>
            <section>
                logo
            </section>
            <section>
                Sacofi
            </section>
            <section>
                Nombre usuario
            </section>
        </header>
        <main class="container">
            @yield('main')
        </main>
        <footer>
            <section>

            </section>
            <section>

            </section>
        </footer>
    </section>
</body>
</html>