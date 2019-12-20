<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>CIP Reset Password</title>
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
    

    <body class="skin-yellow forgot-page">
        <div class="box-forgot">
            <div class="box-forgot-body">
                <h3><span><b>CIP</b> Panel</span></h3>
                <p class="box-forgot-msg">Resetear contraseña</p>

                @if (Session::has('status'))
                <div class="alert alert-success alert-dismissable fade in">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {!! Session::get('status') !!}</div>
                @endif

                    <form class="form-forgot-form" method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form-group input-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input class="form-control" type="email" name='email' placeholder="Email" value="{{ old('email') }}" autofocus />
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group input-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="password" class="form-control" type="password" name='password' placeholder="Contraseña" required>
                        @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmar contraseña" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-default"><i></i> Restablecer</button>
                    </div>
                    <div class="form-group text-center">
                        <a href="/register">Aún no tengo cuenta</a>
                        |
                        <a href="/login">Ir al login</a>
                        <br>
                        <a href="/">Regresar a la página principal</a>

                    </div>
                </form>
            </div>
        </div>

        <!-- JS scripts -->
        <script src="{{asset('js/password.js')}}"></script>
        <script src="{{asset('js/jquery.buttonloadingindicator.js')}}"></script>
    </body>
</html>

<script type="text/javascript">
    $(document).ready(function(){
        $('.btn').on('click',function(e) {
              $(this).startLoading();
            });
    });
</script>