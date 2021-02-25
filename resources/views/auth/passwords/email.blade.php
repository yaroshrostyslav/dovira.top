@extends('layouts.app')

@section('content')
    <div class="container"  >
        <div class="row top-pad">
            <div  class="col-md-12" >
                <h1>Скинути пароль</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">

                    <div class="panel-body" align="center">
                        <form method="POST" action="{{ route('password.email') }}" class="form-signin" role="form">
                        @csrf

                        <!--    <h2 class="form-signin-heading">Скинути пароль</h2> -->
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <input id="email" placeholder="E-mail" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <div class="alert alert-danger">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </div>
                                @endif
                                </br>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Скинути пароль') }}
                                </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container --></br> </br>
@endsection

