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
<body>
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
                <!--    <li>
                        <form action="{{ url('product') }}" method="POST" class="navbar-form navbar-left">
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
                                {{ Auth::user()->login }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Вихід') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
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
<div class="container"  >
    <div class="row top-pad">
        <div  class="col-md-12" >
            <h1>ВИ ПЕРЕГЛЯДАЄТЕ</h1>
        </div>
    </div>
</div>
<section>
    <div class="container">
	                <div class="row">
                    <div class="col-md-12">
                    <div class="panel panel-default">
        <div class="panel-body">
            <p>
                <strong></strong> <h3>{{ $get_product[0]->product_name }}</h3><br />
                <strong>Категорія: </strong> {{ $get_product[0]->type_name }}<br />
             <!--   <strong>Ссылка:</strong> {{ $get_product[0]->link }}<br /> -->
                <strong>Відгуків позитивних: </strong> {{ $get_count_comment[0]->plus }} <span class="glyphicon glyphicon-thumbs-up"></span><br />
                <strong>Відгуків негативних: </strong> {{ $get_count_comment[0]->minus }} <span class="glyphicon glyphicon-thumbs-down"></span><br />
            </p>
        </div>
					</div>
					</div>
					</div>
<!-- Spoiler block -->
<p><a href="#spoiler-1" data-toggle="collapse" class="btn btn-success btn-xs pull-right"> Додати </a></p>
<div class="collapse" id="spoiler-1">
    <div class="well">

                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        @include('errors')
                        <form action="{{ url('comment') }}" method="POST" class="needs-validation">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <input type="text" class="form-control who" name="name_product" placeholder="* Назва - Sony, Малятко..."  autocomplete="off" required/>
                                        <!--<div class="dropdown-menu search_result" style="display:none; width: 100%; padding:10px; left: 1px;">
                                             вставляємо li - ajax
                                        </div>-->
                                        <div class="search_result">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <input type="text" class="form-control who1" name="name_type" placeholder="* Категорія - Телевізор, Кафе..." autocomplete="off" required/>
                                        <div class="search_result1">
                                        </div>
                                    </div>
                                </div>
                            <!--    <div class="col-md-12 ">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="link"  placeholder="Введіть http або email до зазначеного, якщо відомо" />
                                    </div>
                                </div> -->
                                <div class="col-md-12 ">
                                    <div class="form-group" align="center">
                                        <strong>Довіряю</strong>	<input type="radio" name="paymentMethod" value="1"  required  />&nbsp;&nbsp;&nbsp;
                                        <strong>Не довіряю</strong>	<input type="radio" name="paymentMethod" value="0" required />
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name_visitor" placeholder="* Ваше ім'я" required/>
                                    </div>
                                </div>

                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <textarea name="text_comment" id="message" class="form-control" rows="3" placeholder="* Що саме викликає довіру або недовіру" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary pull-right col-md-5"> Додати </button>
                                    </div>
                                </div>
                            </div>
                        </form>

    </div>
</div> <!-- End -->

        <div class="actionBox">
            <ul class="commentList list-group">
                @foreach($get_comments as $comment)
                    <li style="@if ($comment->plus == 1) background-color: #daffd4; @else background-color: #ffd4d4; @endif" class="list-group-item">
                        <div class="commenterImage">
                            <img src="https://img.icons8.com/ios/1600/user-male-circle-filled.png" />
                        </div>
                        <div class="commentText">
                            <p style="font-weight: bold;">{{ $comment->name }}</p>
                            <p>{{ $comment->text }}</p>
                            <span class="date sub-text">{{ $comment->created_at }}</span>
                            <!-- Видалення відгуку -->
                            <!-- перевірка чи юзер авторизувався -->
                            @if (Auth::check())
                            <!-- перевірка чи юзер є адміном -->
                                @if (Auth::user()->role == 0)
                                    <div>
                                    <!-- видалення комента -->
                                    <form class="form-inline" role="form" action="{{ url('del_comment') }}" method="POST" style="display: inline-block;">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id_comment" value="{{ $comment->id }}">
                                        <button type="submit" class="btn btn-danger">Видалити</button>
                                    </form>
                                    <!-- блокування відвідувача -->
                                    <form action="{{ url('/admin/banned') }}" method="POST" style="display: inline-block;">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="ip_address" value="{{ $comment->ip_address }}">
                                        <input type="hidden" name="id_user" value="{{ $comment->id }}">
                                        <button class="btn btn-warning" type="submit">Заблокувати</button>
                                    </form>
                                    </div>
                                @endif
                            @endif
                        </div>

                    <!-- перевірка чи юзер авторизувався -->
                    @if (Auth::check())
                        <!-- перевірка чи юзер є менеджером -->
                        @if (Auth::user()->role == 1)
                            <!-- перевірка чи менеджером верифікований -->
                            @if (Auth::user()->verified == 1)
                            <!-- перевірка чи цей менеджер вже відповів -->
                                @if (\App\Answers::has_answer($comment->id, Auth::user()->id) == null)
                                   <strong class="pull-right"> <a href="javascript:void(0);" onclick="viewdiv('otvet{{ $comment->id }}');">Відповісти</a></strong></br>
                                    <div id="otvet{{ $comment->id }}" style="display:none;">
                                        <form class="form-inline" role="form" action="{{ url('new_answer') }}" method="POST">
                                            {{ csrf_field() }}
                                            <div class="input-group">
                                                <input class="form-control" size="100%" type="text" name="text" style="background: #F9F4F4" placeholder="Відповідь..." />
                                                <input type="hidden" name="id_comment" value="{{ $comment->id }}">
                                                <input type="hidden" name="id_product" value="{{ $get_product[0]->id }}">
                                                <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                                            </div></br>
                                            <div class="form-group">
                                                <button class="btn-primary btn-xs" type="submit">Відповісти</button>
                                            </div>
                                        </form>
                                    </div>
                    @endif
                    @endif
                    @endif
                        @endif
                    </li>

                    @foreach(\App\Answers::get_answer($comment->id) as $answer)
                        <li style="margin-left: 50px;" class="list-group-item">
                            <div class="commenterImage">
                                <img src="https://image.flaticon.com/icons/png/512/306/306473.png" />
                            </div>
                            <div class="commentText ">
                                <p style="font-weight: bold;">{{ $answer->name }}  <?php if ($answer->link != null) echo "-"; ?>  <a href="{{ $answer->link }}">{{ $answer->link }}</a></p>
                                <p class="">{{ $answer->text }}</p> <span class="date sub-text">{{ $answer->created_at }}</span>
                                <!-- Видалення відповіді менеджера -->
                                <!-- перевірка чи юзер авторизувався -->
                                @if (Auth::check())
                                <!-- перевірка чи юзер є адміном -->
                                    @if (Auth::user()->role == 0)
                                        <form class="form-inline" role="form" action="{{ url('del_answer') }}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="id_answer" value="{{ $answer->id }}">
                                            <button type="submit" class="btn btn-danger">Видалити</button>
                                        </form>
                                    @endif
                                @endif
                            </div>
                        </li>
                    @endforeach

                @endforeach
            </ul>
        </div>
    </div>
</section>

<!--FOOTER SECTION -->
<div id="footer">
    2018 -
    <script type='text/javascript'>
        var mdate = new Date();document.write(mdate.getFullYear());
    </script> | © dovira.top
</div>
<!-- END FOOTER SECTION -->
@extends('layouts.search')

<!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
<!-- CORE JQUERY  -->
<script src="{{ asset('plugins/jquery-1.10.2.js') }}"></script>
<!-- BOOTSTRAP CORE SCRIPT   -->
<script src="{{ asset('plugins/bootstrap.min.js') }}"></script>
<!-- ISOTOPE SCRIPT   -->
<script src="{{ asset('plugins/jquery.isotope.min.js') }}"></script>
<!-- PRETTY PHOTO SCRIPT   -->
<script src="{{ asset('plugins/jquery.prettyPhoto.js') }}"></script>
<!-- CUSTOM SCRIPTS -->
<script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>
