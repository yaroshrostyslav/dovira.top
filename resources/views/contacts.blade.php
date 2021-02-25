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
                                <input type="text" name="name_product" class="form-control who2" placeholder="Пошук..." autocomplete="off" style="color: #fff;">
                                <button type="submit" class="btn btn-default">OK</button>
							</div>
                        </form>
                        <div class="dropdown-menu search_result2" style="width: 100%; padding:10px; left: 1px;">
                          -->  <!-- вставляємо li - ajax --> <!--
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

<!--ABOUT PAGE SECTION-->

<div class="container"  >
    <div class="row top-pad">
        <div  class="col-md-12" >
            <h1>КОНТАКТИ</h1>
        </div>
    </div>
</div>
<section id="contact-sec">
    <div class="container">
        <div class="row g-pad-bottom">
            <div class="col-md-6">
                <h2>Зворотній зв'язок</h2>
                @include('errors')
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <form action="{{ url('contacts') }}" method="POST" class="needs-validation">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" required="required" placeholder="Ім'я" />
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <input type="text" name="email" class="form-control" required="required" placeholder="E-mail" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="form-group">
                                <textarea name="message" id="message" required="required" class="form-control" rows="3" placeholder="Повідомлення"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Відправити</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
				<div class="panel-body" align="center">
				<h3>Довіра.топ висловлює подяку:</h3>
                <p><strong>Розробник: <a href="https://freelance.ua/user/yaroshrostyslav/portfolio/">Ростислав Ярош</a>
				</br>
				<a href="mailto:yaroshrostyslav@gmail.com">yaroshrostyslav@gmail.com</a></strong></p>
				</div>
            </div>
        </div>
   </div>
</section>
    <section >
        <div class="container">
           
                <div class="row">
                  
                    <div class="col-md-12">
                       <div class="panel panel-default">
                       
                        <div class="panel-body">
                             <h4 class="adjst" align="center">Довіра.топ</h4>
        <p style="text-indent: 20px"> <strong>Це майданчик, де кожен може вільно висловити свою власну довіру або недовіру до будь-якого продукту, 
		товару, послуги, підприємства, роботодавця та будь чого іншого. Також кожен має можливість знайти та прочитати думки інших людей.</strong> </p>
						</div>
					   </div>
					 </div>
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
<script src="assets/plugins/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP CORE SCRIPT   -->
<script src="assets/plugins/bootstrap.min.js"></script>
<!-- ISOTOPE SCRIPT   -->
<script src="assets/plugins/jquery.isotope.min.js"></script>
<!-- PRETTY PHOTO SCRIPT   -->
<script src="assets/plugins/jquery.prettyPhoto.js"></script>
<!-- CUSTOM SCRIPTS -->
<script src="assets/js/custom.js"></script>
</body>