<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>CIP Admin</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}" />
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('js/iCheck/all.css')}}" /> 
        <!-- Icons -->
        <link href="{{asset('icons/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('icons/themify-icons/themify-icons.css')}}" rel="stylesheet">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('css/main-style.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/skins/all-skins.css')}}">
    </head>
    

    <body class="skin-yellow register-page">
        <div class="box-register">
            <div class="box-register-body">
                <h3><span><b>CIP</b>Admin</span></h3>
                <p class="box-register-msg">Registrate aquí para comenzar</p>

                <form class="register-form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}



                    <div class="form-group input-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="name" class="form-control" type="text" name='name' placeholder="Nombre" value="{{ old('name') }}" required autofocus>
                        @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group input-group{{ $errors->has('lName') ? ' has-error' : '' }}">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="lName" class="form-control" type="text" name='lName' placeholder="Apellido" value="{{ old('lName') }}" required autofocus>
                        @if ($errors->has('lName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lNname') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group input-group{{ $errors->has('rut') ? ' has-error' : '' }}">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="rut" class="form-control" type="text" name='rut' placeholder="Rut (EJ: 12.345.678-9)" value="{{ old('rut') }}" required autofocus>
                        @if ($errors->has('rut'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rut') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group input-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input id="email" class="form-control" type="email" name='email' placeholder="Email" value="{{ old('email') }}" required>
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
                        <button type="submit" class="btn btn-block btn-default">Registrar</button>
                    </div>
                    <div class="form-group text-center">
                        <a href="/login">Ya tengo cuenta</a>
                    </div>
                </form>
            </div>
        </div>
    </body>
        <!-- JS scripts -->
        <script src="{{asset('jQuery/jquery-2.2.3.min.js')}}"></script>
        <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/iCheck/icheck.min.js')}}"></script>
        <script src="{{asset('js/pages/jquery-icheck.js')}}"></script>
        <script src="{{asset('js/fastclick/fastclick.min.js')}}"></script>
</html>