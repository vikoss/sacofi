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
    
    <header style="height: 80px;width: 100%;">
            @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                    

                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <input type="submit" value="Salir">
                    </form>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    
                @endauth
            </div>
        @endif
    </header>

    <main style="text-align: center;">
        <h1>Sacofi</h1>
    </main>


    
</body>
</html>