<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-47715030-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-47715030-2');
</script>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="Оставить отзыв без регистрации. Отзывы о товарах, услугах, работодателях и прочего. Прочитать отзывы. Добавить отзыв. Доверие недоверие. Рейтинг компаний, продуктов, товаров, услуг, работодателей и прочего." />
    <meta name="Keywords" content="ljdbhf/njg, довира топ, довіра топ, відгуки, отзывы, рейтинг, написать отзыв, прочитать отзыв, компании, услуги, товары." />
    <meta name="author" content="" />
	<meta name="google-site-verification" content="jFMaowbByL6QPsKNWO3roZhH2tOKnO7bsYgWfHbGwLg" />
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

<!--Top SECTION-->
<div id="home-sec">
    <div class="container"  >
        <div class="row ">
            <div class="col-md-6 ">
                <div class="panel-body">
                    <h4 class="adjst">Довіра.топ</h4>
                    <p style="text-indent: 20px"><strong>
                            Це майданчик, де кожен може вільно висловити, скориставшись формою нижче, свою власну довіру або недовіру до будь-якого продукту, товару, послуги, підприємства, роботодавця та будь чого іншого. Також кожен має можливість знайти та прочитати думки інших людей щодо зазначеного вище, скориставшись формою пошуку.
                        </strong></p>
                    <p style="text-indent: 20px"><strong>
                            Підприємство, особа, що надає послугу, виробник, власник товару, роботодавець або інший представник також має можливість відстоювати свою позицію та відповідати на зауваження чи подяку, при цьому такому представнику необхідно зареєструватися з прив`язкою до певного товару або послуги.
                        </strong></p>
                    <p style="text-indent: 20px"><strong>
                            Висловлюючись, просимо Вас бути чемними до оточуючих, не порушувати Закони України та бути емоційно стриманними. Висловлюючись, Ви надаєте згоду на передачу своїх персональних даних. Одночасно повідомляємо, що ми використовуємо coockie. Висловлюючись, Ви надаєте згоду з цим положенням. Дякуємо за порозуміння.
                        </strong></p>
                </div>
            </div>
            <div class="col-md-6"><p></p></br></br>
                <form action="{{ url('product') }}" method="POST" class="needs-validation">
                    {{ csrf_field() }}
                    <div class="input-group margin-bottom 20">
                        <input placeholder="Пошук" style="background: #F9F4F4" name="name_product" class="form-control who2" type="text" autocomplete="off"><span class="input-group-addon">
                        <button type="submit" class="btn-primary"><strong>Пошук</strong></button></span>
                    </div>
                    <div class="dropdown-menu search_result2" style="width: 100%; padding:10px; left: 1px;">
                        <!-- вставляємо li - ajax -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--Comment SECTION-->
<section>
    <div class="container">
        <h1>Додати</h1>
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4 class="adjst">Висловити довіру або недовіру</h4>
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
                </div>
            </div>
            <!-- END Comment SECTION-->

            <!--PRODUCTS SECTION-->
            <div class="col-md-3 col-sm-3">
                <div class="panel panel-default">

                    <div class="panel-body">
                        <h4 class="adjst progress-bar-success" align="center">Найкращі</h4>
                        @foreach($comments_up as $comment_up)
                            <div class="panel panel-default panel-body">
                                <strong><a href="{{ asset('product') }}/{{ $comment_up->name }}">{{ $comment_up->name }}</a></strong>
                                </br>{{ $comment_up->type_name }}
                                <span class="pull-right"> <span class="glyphicon glyphicon-thumbs-up"></span> {{ $comment_up->plus }}  &bull; <span class="glyphicon glyphicon-thumbs-down"></span> {{ $comment_up->minus }}</span>
                            </div>
                        @endforeach

                        <a href="{{ url('/products/rate/1') }}" class="label label-success">Переглянути більше</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4 class="adjst progress-bar-danger" align="center">Найгірші </h4>
                        @foreach($comments_down as $comment_down)
                            <div class="panel panel-default panel-body">
                                <strong><a href="{{ asset('product') }}/{{ $comment_down->name }}">{{ $comment_down->name }}</a></strong>
                                </br>{{ $comment_down->type_name }}
                                <span class="pull-right"> <span class="glyphicon glyphicon-thumbs-up"></span> {{ $comment_down->plus }} &bull; <span class="glyphicon glyphicon-thumbs-down"></span> {{ $comment_down->minus }}</span>
                            </div>
                        @endforeach
                        <a href="{{ url('/products/rate/0') }}" class="label label-danger">Переглянути більше</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!--
    <section  >
     <div class="container">
         <h1>   Clients </h1>
             <div class="row g-pad-bottom">

                 <div class="col-md-4 col-sm-4 col-xs-4">

                     <img src="assets/img/c1.jpg" alt="" class="img-responsive" />
                 </div>
                 <div class="col-md-4 col-sm-4 col-xs-4">

                     <img src="assets/img/c2.jpg" alt="" class="img-responsive" />
                 </div>
                   <div class="col-md-4 col-sm-4 col-xs-4">

                     <img src="assets/img/c3.jpg" alt="" class="img-responsive" />
                 </div>
             </div>

     </div>
 </section>
-->

<!--END HOME PAGE SECTION-->





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
