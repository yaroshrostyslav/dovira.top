@extends('layouts.app')

@section('content')
    <div class="container"  >
        <div class="row top-pad">
            <div  class="col-md-12" >
                <h1>{{ __('Зміна паролю') }}</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">

                    <div class="panel-body" align="center">
                        <form method="POST" action="{{ route('password.update') }}" class="form-signin" >
                        {{ csrf_field() }}
                        @csrf
                            <input type="hidden" name="token" value="{{ $token }}">

                            <input id="email" placeholder="E-mail" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif

                            <p></p>

                            <input id="password" placeholder="Пароль" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif

                            <p></p>

                            <input id="password-confirm" placeholder="Підтвердження пароля" type="password" class="form-control" name="password_confirmation" required>
                            <p></p>
                            <button type="submit" class="btn btn-primary">{{ __('Змінити пароль') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container -->
@endsection

