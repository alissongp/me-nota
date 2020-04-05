<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Raleway&family=Ubuntu:ital,wght@0,300;1,400&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/style.css')}}">
    <script src="{{url('assets/js/script.js')}}"></script>
</head>
<body id="top">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light barra-top" id="topbar">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <section class="row container-fluid d-flex justify-content-between ">
                    <!-- Left Side Of Navbar -->
                        @guest

                        @else
                            <section class="left-side ">
                                <section class="row title-quadro">
                                    <h4>Quadro de tarefas</h4>
                                </section>
                                
                                <ul class="row opcoes nav nav-tabs pull-left ulist sel-list" role="tablist">
                                    <li role="presentation" class="f-item active temp">
                                        <a href="{{url('tarefas/lista')}}" id="lista" onclick="menu(this.id)" role="tab">Lista</a>
                                    </li>
                                    <li role="presentation" class="f-item active">
                                        <a href="{{url('tarefas/quadro')}}" id="quadro" onclick="menu(this.id)" role="tab">Quadro</a >
                                    </li>
                                    <li role="presentation" class="f-item active">
                                        <a href="{{url('tarefas/visao')}}" id="visao" onclick="menu(this.id)" role="tab">Visão geral</a>
                                    </li>
                                </ul>
                            </section>
                        @endguest

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Entrar') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Cadastrar') }}</a>
                                    </li>
                                @endif
                            @else
                                <hr id="perfil-row">
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><img src=\assets\img\search.png> </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><img src=\assets\img\notification.png> </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </section>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
