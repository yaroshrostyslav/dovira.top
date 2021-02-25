<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="Оставить отзыв. Прочитать отзывы. Добавить отзыв. Доверие недоверие. Рейтинг продуктов, товаров, услуг, работодателей." />
    <meta name="Keywords" content="ljdbhf/njg, довира топ, довіра топ, відгуки, отзывы, рейтинг, написать отзыв, прочитать отзыв, компании, услуги, товары." />
    <meta name="author" content="" />
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <![endif]-->
    <title>Довіра.топ</title>

    <!-- Для живого пошуку  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Favicon -->
    <link href="{{ asset('img/favicon.ico') }}" rel="shortcut icon">
    <!--REQUIRED STYLE SHEETS-->
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
    <!-- FONTAWESOME STYLE CSS -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" />
    <!--ANIMATED FONTAWESOME STYLE CSS -->
    <link href="{{ asset('css/font-awesome-animation.css') }}" rel="stylesheet" />
    <!--PRETTYPHOTO MAIN STYLE -->
    <link href="{{ asset('css/prettyPhoto.css') }}" rel="stylesheet" />
    <!-- CUSTOM STYLE CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <style>
        .form-signin {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
        }
        .form-signin .form-signin-heading,
        .form-signin .checkbox {
            margin-bottom: 10px;
        }
        .form-signin .checkbox {
            font-weight: normal;
        }
        .form-signin .form-control {
            position: relative;
            height: auto;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 10px;
            font-size: 16px;
        }
        .form-signin .form-control:focus {
            z-index: 2;
        }
        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }
        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }

    </style>
</head>
<body>
    <div id="app">
        <!-- NAV SECTION -->
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('/') }}">Dovira.top</a>
                </div>

                @if (Route::has('login'))
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                         <!--   <li>
                                <form action="{{ url('product') }}" method="POST" class="navbar-form navbar-left" autocomplete="off">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <input type="text" name="name_product" class="form-control who2" placeholder="Пошук товара..." autocomplete="off" style="color: #fff;">
                                    </div>
                                    <button type="submit" class="btn btn-default">OK</button>
                                </form>
                                <div class="dropdown-menu search_result2" style="width: 100%; padding:10px; left: 1px;">
                                -->    <!-- вставляємо li - ajax --> <!--
                                </div>
                            </li> -->
                            @auth
                                <li><a href="{{ url('/') }}">Головна</a></li>
                                <li><a href="{{ url('/product') }}">Товари</a></li>
                                <li><a href="{{ url('/contacts') }}">Контакти</a></li>
                                <li class="nav-item dropdown" style="list-style: none;">
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
                            @else
                                <li><a href="{{ url('/') }}">Головна</a></li>
                                <li><a href="{{ url('/product') }}">Товари</a></li>
                                <li><a href="{{ route('login') }}">Увійти</a></li>
                                @if (Route::has('register'))
                                    <li><a href="{{ route('register') }}">Реєстрація</a></li>
                                @endif
                                <li><a href="{{ url('/contacts') }}">Контакти</a></li>
                            @endauth
                        </ul>
                    </div>
                @endif
            </div>
        </div>
        <!--END NAV SECTION -->

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <!--FOOTER SECTION -->
    <div id="footer">
        2018 -
        <script type='text/javascript'>
            var mdate = new Date();document.write(mdate.getFullYear());
        </script> | © dovira.top
    </div>
    <!-- END FOOTER SECTION -->
    @extends('layouts.search')

</body>
</html>