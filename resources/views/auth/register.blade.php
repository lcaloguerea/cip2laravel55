<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>CIP Register</title>
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
    

    <body class="skin-yellow register-page">
        <div class="box-register">
            <div class="box-register-body">
                <h3><span><b>CIP</b> Panel</span></h3>
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
                    <div class="form-group input-group{{ $errors->has('department') ? ' has-error' : '' }}">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <div class='form-group'>
                                            <label>Departamento</label>
                                            <select id="department" name="department" class="form-control select2">
                                                <option selected="selected" value=>--</option>
                                                <option value="CIP">CIP</option>
                                                <option value="Arquitectura y Artes">Arquitectura y artes</option>
                                                <option value="Ciencias">Ciencias</option>
                                                <option value="Ciencias Agrarias">Ciencias agrarias</option>
                                                <option value="Cs. Económicas y Administrativas">Cs. Económicas y administrativas</option>
                                                <option value="Cs. Forestales y Recursos Naturales">Cs. Forestales y recursos naturales</option>
                                                <option value="Cs. Jurídicas y Sociales">Cs. Jurídicas y sociales</option>
                                                <option value="Ciencias Veterinarias">Ciencias veterinarias</option>
                                                <option value="Ciencias de la Ingeniería">Ciencias de la ingeniería</option>
                                                <option value="Filosofía y Humanidades">Filosofía y humanidades</option>
                                                <option value="Medicina">Medicina</option>
                                                <option value="Rectoría">Rectoría</option>
                                                <option value="Prorrectoría">Prorrectoría</option>
                                                <option value="Vicerrectoría Académica">Vicerrectoría Académica</option>
                                                <option value="Vicerrectoría Sede Puerto Montt">Vicerrectoría Sede Puerto Montt</option>
                                                <option value="Vicerrectoría de Gestión Económica y Administrativa">Vicerrectoría de Gestión Económica y Administrativa</option>
                                                <option value="Vicerrectoría de Investigación, Desarrollo y Creación">Vicerrectoría de Investigación, Desarrollo y Creación</option>
                                                <option value="Campus Patagonia">Campus Patagonia</option>
                                            </select>
                                        </div>
                    </div>
                    <div class="form-group input-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="phone" class="form-control" type="text" name='phone' placeholder="Telefono" value="{{ old('phone') }}" required autofocus>
                        @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
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
                        |
                        <a href="/">Volver a la página principal</a>
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