<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Товар</title>

    <!-- For Live Search  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/form-validation.css" rel="stylesheet">

    <!-- Для блока відповіді -->
    <script type="text/javascript">
        <!--
        function viewdiv(id){
            var el=document.getElementById(id);
            if(el.style.display=="block"){
                el.style.display="none";
            } else {
                el.style.display="block";
            }
        }
        //-->
    </script>

    <style>


        .titleBox {
            background-color:#fdfdfd;
            padding:10px;
        }
        .titleBox label{
            color:#444;
            margin:0;
            display:inline-block;
        }

        .commentBox {
            padding:10px;
            border-top:1px dotted #bbb;
        }
        .commentBox .form-group:first-child, .actionBox .form-group:first-child {
            width:80%;
        }
        .commentBox .form-group:nth-child(2), .actionBox .form-group:nth-child(2) {
            width:18%;
        }
        .actionBox .form-group * {
            width:100%;
        }
        .taskDescription {
            margin-top:10px 0;
        }
        .commentList {
            padding:0;
            list-style:none;
            max-height:200px;
        }
        .commentList li {
            margin:0;
            margin-top:10px;
        }
        .commentList li > div {
            display:table-cell;
        }
        .commenterImage {
            width:30px;
            margin-right:5px;
            height:100%;
            float:left;
        }
        .commenterImage img {
            width:100%;
            border-radius:50%;
        }
        .commentText p {
            margin:0;
        }
        .sub-text {
            color:#aaa;
            font-family:verdana;
            font-size:11px;
        }
        .actionBox {
            border-top:1px dotted #bbb;
            padding:10px;
        }
    </style>
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


        <div class="detailBox">
            <div class="titleBox">
                <label>Назва: {{ $get_product[0]->name }}</label>
                <p class="taskDescription">Підназва: {{ $get_product[0]->name2 }}</p>
                <p class="taskDescription">Ссылка: {{ $get_product[0]->link }}</p>
                <p class="taskDescription">Відгуків позитивних: {{ $get_count_comment[0]->plus }}</p>
                <p class="taskDescription">Відгуків негативних: {{ $get_count_comment[0]->minus }}</p>
            </div>
            <div class="actionBox">
                <ul class="commentList">
                    @foreach($get_comments as $comment)
                        <li style="@if ($comment->plus == 1) background-color: #daffd4; @else background-color: #ffd4d4; @endif">
                            <div class="commenterImage">
                                <img src="https://img.icons8.com/ios/1600/user-male-circle-filled.png" />
                            </div>
                            <div class="commentText">
                                <p style="font-weight: bold;">{{ $comment->name }}</p>
                                <p>{{ $comment->text }}</p>
                                <span class="date sub-text">{{ $comment->created_at }}</span>
                            </div>
                            <!-- перевірка чи юзер авторизувався -->
                            @if (Auth::check())
                                <!-- перевірка чи юзер є менеджером -->
                                @if (Auth::user()->role == 1)
                                    <!-- перевірка чи цей менеджер вже відповів -->
                                    @if (\App\Answers::has_answer($comment->id, Auth::user()->id) == null)
                                        <a href="javascript:void(0);" onclick="viewdiv('otvet');">Відповісти</a>
                                            <div id="otvet" style="display:none;">
                                                <form class="form-inline" role="form" action="{{ url('new_answer') }}" method="POST">
                                                    {{ csrf_field() }}
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="text" value="" placeholder="Відповідь..." />
                                                        <input type="hidden" name="id_comment" value="{{ $comment->id }}">
                                                        <input type="hidden" name="id_product" value="{{ $get_product[0]->id }}">
                                                        <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <button class="btn btn-default" type="submit">Відповісти</button>
                                                    </div>
                                                </form>
                                            </div>
                                    @endif
                                @endif
                            @endif

                        @foreach(\App\Answers::get_answer($comment->id) as $answer)
                                    <li style="padding-left: 50px;">
                                        <div class="commenterImage">
                                            <img src="https://image.flaticon.com/icons/png/512/306/306473.png" />
                                        </div>
                                        <div class="commentText">
                                            <p style="font-weight: bold;">{{ $answer->name }}</p>
                                            <p class="">{{ $answer->text }}</p> <span class="date sub-text">{{ $answer->created_at }}</span>

                                        </div>
                                    </li>
                        @endforeach

                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</body>
@extends('layouts.search')
</html>

