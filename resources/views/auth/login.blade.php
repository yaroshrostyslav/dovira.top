@extends('layouts.app')

@section('content')
<div class="container"  >
    <div class="row top-pad">
        <div  class="col-md-12" >
            <h1>Увійти</h1>
        </div>
    </div>
</div>
    <div class="container">
                <div class="row">
                  
                    <div class="col-md-12">
                       <div class="panel panel-default">
                       
                        <div class="panel-body" align="center">
        <form method="POST" action="{{ route('login') }}" class="form-signin" role="form">
            @csrf

           <!-- <h2 class="form-signin-heading">Увійти</h2> -->

            <input id="login" placeholder="Логін" type="login" class="form-control{{ $errors->has('login') ? ' is-invalid' : '' }}" name="login" value="{{ old('login') }}" required autofocus>
            @if ($errors->has('login'))
                <div class="alert alert-danger">
                    <strong>{{ $errors->first('login') }}</strong>
                </div>
            @endif
			<p></p>
            <input id="password" placeholder="Пароль" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
            @if ($errors->has('password'))
                <div class="alert alert-danger">
                    <strong>{{ $errors->first('password') }}</strong>
                </div>
            @endif

            <label class="checkbox">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                {{ __("Запам'ятати") }}
            </label>

            <button class="btn btn-lg btn-primary btn-block" type="submit">{{ __('Увійти') }}</button>
            @if (Route::has('password.request'))
                <p><a href="{{ route('password.request') }}">{{ __('Забули пароль?') }}</a></p>
            @endif
        </form>
						</div>
					   </div>
					 </div>
				</div>
    </div><!-- /.container -->
@endsection

