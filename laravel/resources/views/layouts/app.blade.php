<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('IGVAULT') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/main.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
</head>
<body onload="nbrproduit()">
    <header>
        <div class="container">
            <ul>
                <li class="left"><a class="navbar-brand" href="{{ url('/') }}">
                    <h1 class="logo">{{ config('', 'IGVAULT 2.0') }}</h1>
                </a></li>

                <li class="right">
                @guest
                <div class="right">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}<div><img class="icon" src="{{ asset('img/account.png') }}"></div> </a>
                </div>
                @if (Route::has('register'))
                    <?php $pass = 0 ?>
                    <div class="right">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}<div><img class="icon" src="{{ asset('img/formulaire.png') }}"></div></a>
                    </div>
                @endif
                @else
                <?php $pass = Auth::user()->id ?>
                <div class="right">
                    @if (Auth::user()->Group_id == 2) {{-- 1=>visiteur 2=>administrateur --}}
                        <a href="{{ route('admin') }}">{{ __('Admin') }}<div><img class="icon" src="{{ asset('img/formulaire.png') }}"></div></a>
                    @endif
                    <a  href="{{url('panier')}}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <!-- ICI NOMBRE DE PRODUIT-->
                            <div class="right" id="123456" style="width: 4px; height: 4px;"></div>
                            <div><img class="icon" src="{{ asset('img/panier.png') }}"></div>
                    </a>
                    <a href="{{url('profile')}}/{{$pass}}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <div><img class="icon" src="{{ asset('img/account.png') }}"></div>
                    </a>

                    <div class="right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                            <div><img class="icon" src="{{ asset('img/sorti.png') }}"></div>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
                @endguest
                </li>
            </ul>
        </div>
        <div class="container" id="menu">
            <ul>
                <li class="left"><a href="{{url('home')}}">CATALOGUE</a></li>
                <li class="left"><a href="{{url('profile')}}/{{$pass}}">PROFILE</a></li>
                <li class="left"><a href="{{url('panier')}}">PANIER</a></li>
            </ul>
        </div>
    </header>
    <main class="py-4">
        @yield('content')
    </main>
    <footer>
        <div class="container" id="center">
            <a href="https://fr-fr.facebook.com/"><img src="{{ asset('img/facebook.png') }}" alt="Facebook" class="icons"></a>
            <a href="https://twitter.com/?lang=fr"><img src="{{ asset('img/twitter.png') }}" alt="Twitter" class="icons"></a>
        </div>
    </footer>
</body>
</html>
