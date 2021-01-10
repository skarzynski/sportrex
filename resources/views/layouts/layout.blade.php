<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title')
    </title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/shop-homepage.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/css/bootstrap-notify.css">
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>

    {{--    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>--}}

</head>

<body>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/js/bootstrap-notify.js"></script>--}}


<div id="app">
<!-- Navigation -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ route('welcome') }}">Sportrex</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>
            <!-- Right Side Of Navbar -->
            @if (Route::has('login'))
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('welcome') }}">Strona główna
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('complaint.create') }}">Złóż reklamację</a>
                    </li>
                    <li class="nav-item">
                        @if(Session::has('orderID'))
                            <a class="nav-link" href="{{ route('Order.cart', Session::get('orderID') )}}">Koszyk</a>

                        @else
                            <a class="nav-link" href="{{ route('Order.cart', -1)}}">Koszyk</a>
                        @endif
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('Order.check')}}">Sprawdź status zamówienia</a>
                    </li>
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Logowanie</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Rejestracja</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Wyloguj') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>

                                <a class="dropdown-item" href="{{ url('/myOrders/'.Auth::user()->id) }}"> Moje zamówienia</a>

                            </div>
                        </li>
                    @endguest
                </ul>
            @endif
        </div>
    </div>
</nav>

<main class="py-4 position-ref full-height container">
    @yield('content')
</main>

<!-- Footer -->
{{--<footer class="py-0 bg-dark fixed-bottom">--}}
{{--    <div class="container">--}}
{{--        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>--}}
{{--    </div>--}}
{{--</footer>--}}

<!-- Bootstrap core JavaScript -->
    <script src="{{ asset('js/jquery.js') }}"></script>
{{--    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>--}}
    <script src="{{ asset('js/app.js') }}"></script>

@include('components.notification')


</div>
</body>

</html>
