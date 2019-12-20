<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>CIP Unauthorized</title>
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
        <link rel="stylesheet" href="{{asset('css/password.css')}}">
    </head>


    <body class="skin-yellow error-page">
        <div class="box-error">
            <div class="box-error-body">
                <h3><span><b>Error 403</b></span></h3>
                <p class="text-center">No posee los permisos para ingresar a esta sección.</p>
                <form class="error-form"  method="post">
                    <div class="form-group form-action">
                        <a type="submit" href="/{{Auth::user()->type}}" class="btn btn-block btn-default">Volver a mi portal</a>
                    </div>
                </form>
            </div>
        </div>

        <script src="{{asset('js/password.js')}}"></script>
        <script src="{{asset('js/jquery.buttonloadingindicator.js')}}"></script>
    </body>
</html>