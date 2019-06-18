<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>CIP Login</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="shortcut icon" href="{{asset('img/logo_Mecesup.ico')}}" />
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('js/iCheck/all.css')}}" /> 
        <!-- Icons -->
        <link href="{{asset('icons/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('icons/themify-icons/themify-icons.css')}}" rel="stylesheet">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('css/main-style.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/skins/all-skins.css')}}">
    </head>
    

    <body class="skin-yellow login-page">
        <div class="box-login">
            <div class="box-login-body">
                <h3><span><b>CIP</b> Panel</span></h3>
                <p class="box-login-msg">Inicio de sesion</p>

                @if (Session::has('message'))
                <div class="alert alert-danger alert-dismissable fade in">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {!! Session::get('message') !!}. <a href="">Enviar nuevo código?</a></div>
                @endif

                <form class="login-form" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <div class="form-group input-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input class="form-control" type="email" name='email' placeholder="Email" value="{{ old('email') }}" autofocus/>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group input-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input class="form-control" type="password" name='password' placeholder="Password" />
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif                        
                    </div>
                    <div class="form-group input-group">
                        <div class="checkbox">
                            <label for="terms" style="padding-left: 12px;">
                                <input class="icheck_flat_20" type="checkbox" id="terms" {{ old('remember') ? 'checked' : '' }}> Recordarme
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-default">Ingresar</button>
                    </div>
                    <div class="form-group text-center">
                        <a href="/register">Aún no tengo cuenta</a>
                        |
                        <a href="{{ route('password.request') }}">Olvidaste tu contraseña?</a>
                        <br>
                        <a href="/">Regresar a la página principal</a>

                    </div>
                </form>
            </div>
        </div>

        <!-- JS scripts -->
        <script src="{{asset('jQuery/jquery-2.2.3.min.js')}}"></script>
        <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/iCheck/icheck.min.js')}}"></script>
        <script src="{{asset('js/pages/jquery-icheck.js')}}"></script>
        <script src="{{asset('js/fastclick/fastclick.min.js')}}"></script>
    </body>
</html>


