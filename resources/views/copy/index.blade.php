<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Головна</title>

    <!-- Для живого пошуку  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/form-validation.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container">

    @if (Route::has('login'))
        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
            <h5 class="my-0 mr-md-auto font-weight-normal"></h5>

            <form action="{{ url('product') }}" method="POST" class="needs-validation">
                {{ csrf_field() }}
                <div class="input-group" style="width:250px;">
                    <input type="text" name="name_product" class="form-control who2" value="" placeholder="Пошук товара..." autocomplete="off">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">OK</button>
                    </div>
                    <div class="dropdown-menu search_result2" style="width: 100%; padding:10px; left: 1px;">
                        <!-- вставляємо li - ajax -->
                    </div>
                </div>
            </form>
            @auth
                <a class="btn btn-outline-primary" href="{{ url('/') }}">Головна</a>
                <a class="btn btn-outline-primary" href="{{ url('/product') }}">Товари</a>
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
                <a class="btn btn-outline-primary" href="{{ url('/') }}">Головна</a>
                <a class="btn btn-outline-primary" href="{{ url('/product') }}">Товари</a>
                <a class="btn btn-outline-primary" href="{{ route('login') }}">Авторизація</a>

                @if (Route::has('register'))
                    <a class="btn btn-outline-primary" href="{{ route('register') }}">Реєстрація</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Найкращі</span>
                <!--<span class="badge badge-secondary badge-pill">2</span>-->
            </h4>
            <ul class="list-group mb-3">
                @foreach($comments_up as $comment_up)
                    <li class="list-group-item d-flex justify-content-between bg-light">
                        <div class="text-success">
                            <h6 class="my-0"><a href="{{ asset('product') }}/{{ $comment_up->name }}">{{ $comment_up->name }}</a></h6>
                            <small>{{ $comment_up->name2 }}</small>
                        </div>
                        <span class="text-success">+{{ $comment_up->plus }} | -{{ $comment_up->minus }}</span>
                    </li>
                @endforeach
                    <li><a href="{{ url('/products/rate/1') }}">Переглянути більше</a></li>
            </ul>

            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Найгірші</span>
                <!--<span class="badge badge-secondary badge-pill">2</span>-->
            </h4>
            <ul class="list-group mb-3">
                @foreach($comments_down as $comment_down)
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0"><a href="{{ asset('product') }}/{{ $comment_up->name }}">{{ $comment_down->name }}</a></h6>
                            <small class="text-muted">{{ $comment_down->name2 }}</small>
                        </div>
                        <span class="text-muted">+{{ $comment_down->plus }} | -{{ $comment_down->minus }}</span>
                    </li>
                @endforeach
                    <li><a href="{{ url('/products/rate/0') }}">Переглянути більше</a></li>
            </ul>
        </div>


        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Висловити довіру або недовіру</h4>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            @include('errors')
            <form action="{{ url('comment') }}" method="POST" class="needs-validation">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="address">Назва товара:</label>
                        <input type="text" name="name_product" class="form-control who" id="firstName" placeholder="" value=""  autocomplete="off" required>

                        <div class="dropdown-menu search_result" style="width: 100%; padding:10px; left: 1px;">
                            <!-- вставляємо li - ajax -->
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Підназва товара:</label>
                        <input type="text" name="name2_product" class="form-control" id="lastName" placeholder="" value="" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="address">Посилання на товар:</label>
                    <input type="text" name="link" class="form-control" id="address" placeholder="">
                </div>

                <hr class="mb-4">
                <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input id="credit" name="paymentMethod" value="1" type="radio" class="custom-control-input" required>
                        <label class="custom-control-label" for="credit">Позитивний</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="debit" name="paymentMethod" value="0" type="radio" class="custom-control-input" required>
                        <label class="custom-control-label" for="debit">Негативний</label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">Ваше ім'я:</label>
                        <input type="text" name="name_visitor" class="form-control" id="firstName" placeholder="" value="" required>
                    </div>
                </div>


                <div class="mb-3">
                    <label for="comment">Що викликає довіру або недовіру:</label>
                    <textarea class="form-control" name="text_comment" rows="5" id="comment"></textarea>
                </div>

                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Додати</button>
            </form>
        </div>
    </div>

    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2017-2018 Company Name</p>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#">Головна</a></li>
        </ul>
    </footer>
</div>


</body>
@extends('layouts.search')
</html>

