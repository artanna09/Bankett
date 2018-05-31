<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Bankett') }}</title>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/js/bootstrap.bundle.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/css/bootstrap.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.min.css') }}" rel="stylesheet">


</head>

<body>
    <div id="app">
        <nav class="navbar navbar-light navbar-expand-md navigation-clean-button">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('img/banquet.png') }}" id="nav-icon2"> Bankett
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    @if ( !Auth::guest() && Auth::user()->isAdmin() )
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav mr-auto">
                        <li class="dropdown">
                            <a aria-expanded="false" href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button">Administratoriem</a>
                            <div role="menu" class="dropdown-menu">
                                <a role="presentation" href="{{ route('addService') }}" class="dropdown-item">Pievienot pakalpojumu</a>
                                <a role="presentation" href="{{ route('addPost') }}" class="dropdown-item">Pievienot ziņu</a>
                            </div>
                        </li>
                    </ul>
                    @endif

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li>
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Ieiet') }}</a>
                        </li>
                        <li>
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Reģistrēties') }}</a>
                        </li>
                        @else
                        <li role="presentation" class="nav-item">
                            <a href="{{ route('blog') }}" class="nav-link">Blogs</a>
                        </li>
                        <li class="dropdown">
                            <a data-toggle="dropdown" aria-expanded="false" href="#" class="dropdown-toggle nav-link dropdown-toggle">Pakalpojumi</a>
                            <div role="menu" class="dropdown-menu">
                                <a role="presentation" href="{{ route('services') }}" class="dropdown-item">Svētku pakalpojumi</a>
                                <a role="presentation" href="{{ route('requestService') }}" class="dropdown-item">Pieprasīt pakalpojumu pievienošanu</a>
                            </div>
                        </li>
                        <li role="presentation" class="nav-item">
                            <a href="{{ route('favorites') }}" class="nav-link">
                                <i class="fa fa-heart" id="navbar-icon"></i>Favorīti
                            </a>
                        </li>
                        <li class="dropdown">
                            <a data-toggle="dropdown" aria-expanded="false" href="#" class="dropdown-toggle nav-link dropdown-toggle">Profils</a>
                            <div role="menu" class="dropdown-menu">
                                <a role="presentation" href="{{ route('userProfile') }}" class="dropdown-item">Mans profils</a>
                                <a class="dropdown-item" role="presentation" href="{{ route('editUserProfile') }}">Rediģēt profilu</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                    {{ __('Iziet') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @include('messages')
        @yield('content')
        <div class="footer-basic">
            <footer>
                <p class="copyright">Latvijas Universitāte 2018</p>
            </footer>
        </div>
    </div>
</body>

</html>