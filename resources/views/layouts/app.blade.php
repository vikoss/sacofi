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
    <section id="app" class="container">
        <header>
            <section>
                <img src="{{ asset('imagess/logo.png') }}"height="40px" width="40px" alt="Logo de sacofi">
            </section>
            <section>
                @guest
                    <h6>Sacofi</h6>
                @else
                    <ul>
                        <li>Plataforma</li>
                        <li>Sacofi</li>
                    </ul>
                @endif
            </section>
            <section>
                @guest

                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Salir') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
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