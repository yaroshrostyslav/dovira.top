@extends('layouts.app')

@section('content')
<div class="container"  >
    <div class="row top-pad">
        <div  class="col-md-12" >
            <h1>Реєстрація</h1>
        </div>
    </div>
</div>
    <div class="container">
                <div class="row">
                  
                    <div class="col-md-12">
                       <div class="panel panel-default">
                       
                        <div class="panel-body" align="center">
        <form method="POST" action="{{ route('register') }}" class="form-signin" role="form">
            @csrf

            <!-- <h2 class="form-signin-heading">Реєстрація</h2> -->

            <input id="name" placeholder="Ім'я" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
            @if ($errors->has('name'))
                <div class="alert alert-danger">
                    <strong>{{ $errors->first('name') }}</strong>
                </div>
            @endif
<p></p>
            <input id="login" placeholder="Логін" type="login" class="form-control{{ $errors->has('login') ? ' is-invalid' : '' }}" name="login" value="{{ old('login') }}" required autofocus>
            @if ($errors->has('login'))
                <div class="alert alert-danger">
                    <strong>{{ $errors->first('login') }}</strong>
                </div>
            @endif
<p></p>
                <!--
            <input id="name" placeholder="Link" type="text" class="form-control{{ $errors->has('link') ? ' is-invalid' : '' }}" name="link" value="{{ old('link') }}" autofocus>
            @if ($errors->has('link'))
                <div class="alert alert-danger">
                    <strong>{{ $errors->first('link') }}</strong>
                </div>
            @endif
<p></p>-->
            <input id="email" placeholder="E-mail" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
            @if ($errors->has('email'))
                <div class="alert alert-danger">
                    <strong>{{ $errors->first('email') }}</strong>
                </div>
            @endif
<p></p>
            <input id="password" placeholder="Пароль" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
            @if ($errors->has('password'))
                <div class="alert alert-danger">
                    <strong>{{ $errors->first('password') }}</strong>
                </div>
            @endif

            <input id="password-confirm" placeholder="Підтвердження пароля" type="password" class="form-control" name="password_confirmation" required>

            <button class="btn btn-lg btn-primary btn-block" type="submit">{{ __('Реєстрація') }}</button>
        </form>
						</div>
					   </div>
					 </div>
				</div>
    </div><!-- /.container -->
@endsection

