<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Товари</title>

    <!-- For Live Search  -->
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

    <div class="actionBox">
        <table class="table">
            <thead>
            <tr><h3>Товари:</h3></tr>
            <tr>
                <th scope="col">№</th>
                <th scope="col">Назва</th>
                <th scope="col">Підназва</th>
                <th scope="col">Посилання</th>
                <th scope="col">Відгуки +/-</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <th scope="row">{{ $product->id_product }}</th>
                    <td><a href="{{ asset('product') }}/{{ $product->name }}">{{ $product->name }}</a></td>
                    <td>{{ $product->name2 }}</td>
                    <td>{{ $product->link }}</td>
                    <td>+{{ $product->plus }} | -{{ $product->minus }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $products->links() }}
    </div>
</div>
</body>
@extends('layouts.search')
</html>

