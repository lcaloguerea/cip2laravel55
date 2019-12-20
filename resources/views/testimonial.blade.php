<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>CIP Send Reset Link</title>
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
    
    @if($guest != null)
    <body class="skin-yellow testimonial-page">
        <div class="box-forgot">
            <div class="box-forgot-body">
                <h3><span><b>Agregar Testimonio</b></span></h3>
                <hr>

                @if (Session::has('status'))
                <div class="alert alert-success alert-dismissable fade in">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {!! Session::get('status') !!}</div>
                @endif

                <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                       <p style="margin-bottom: 0px"><strong>Nombre:</strong> {{$guest->name_1}} {{$guest->lName_1}}</p>
                    </div>
                <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-handshake-o"></i></span>
                       <p style="margin-bottom: 0px"><strong>Patrocinante:</strong> {{$user->name}} {{$user->lName}}</p>
                    </div>                    

                    <form class="form-forgot-form" method="POST" action="{{ route('testimonial.save') }}">
                        {{ csrf_field() }}

                    <div class="form-group input-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input class="form-control" type="email" name='email' placeholder="Ingrese su email" value="{{ old('email') }}" autofocus />
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group input-group{{ $errors->has('testimonial') ? ' has-error' : '' }}">
                        <span class="input-group-addon"><i class="fa fa fa-comment"></i></span>
                        <textarea name="testimonial" class="form-control" id="testimonial" cols="30" rows="4" placeholder="Su testimonio aqui..." required style="resize: none;box-sizing:border-box">{{old('testimonial') }}</textarea>
                        @if ($errors->has('testimonial'))
                            <span class="help-block">
                                <strong>{{ $errors->first('testimonial') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group input-group" style="text-align:center;margin-left:auto;margin-right:auto;">
                        <button style="background-color: white" id="s1" type="button" class="btn btn-circle btn-flat btn-default"><i id="i1" style="font-size: 35px; color:gray" class="fa fa-star"></i></button>
                        <button style="background-color: white" id="s2" type="button" class="btn btn-circle btn-flat btn-default"><i id="i2" style="font-size: 35px; color:gray" class="fa fa-star"></i></button>
                        <button style="background-color: white" id="s3" type="button" class="btn btn-circle btn-flat btn-default"><i id="i3" style="font-size: 35px; color:gray" class="fa fa-star"></i></button>
                        <button style="background-color: white" id="s4" type="button" class="btn btn-circle btn-flat btn-default"><i id="i4" style="font-size: 35px; color:gray" class="fa fa-star"></i></button>
                        <button style="background-color: white" id="s5" type="button" class="btn btn-circle btn-flat btn-default"><i id="i5" style="font-size: 35px; color:gray" class="fa fa-star"></i></button>
                        
                    </div>
                        <input id="score" type="text" name="score" hidden value=0>
                        <input id="code" type="text" name="code" hidden value="{{request()->segment(count(request()->segments()))}}">

                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-default"><i></i> Enviar testimonio</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- JS scripts -->
        <script src="{{asset('js/password.js')}}"></script>
        <script src="{{asset('js/jquery.buttonloadingindicator.js')}}"></script>
    </body>
    @else
<body class="skin-yellow testimonial-page">
        <div class="box-forgot">
            <div class="box-forgot-body">
                <h3><span><b>CIP Testimonio</b></span></h3>
                <hr>
                
                @if (Session::has('statusOk'))
                <div class="alert alert-success alert-dismissable fade in">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {!! Session::get('statusOk') !!}</div>
                @else
                <div class="alert alert-warning alert-dismissable fade in">El enlace entregado en su Check Out para realizar un realizar un testimonio ya no esta vigente. Posibles motivos: <br><br>
                    <ul>
                        <li>Ya ha realizado un testimonio asociado a ese enlace</li>
                        <li>El código es incorrecto o no existe</li>
                    </ul>
                    <br>
                </div>
                @endif
                    <div class="form-group text-center">
                        <a href="/login">Ir al login</a> | 
                        <a href="/">Página principal</a>
                    </div>             

            </div>
        </div>

        <!-- JS scripts -->
        <script src="{{asset('js/password.js')}}"></script>
        <script src="{{asset('js/jquery.buttonloadingindicator.js')}}"></script>
    </body>
    @endif
</html>

<script type="text/javascript">
    $(document).ready(function(){


        $('.btn .btn-block .btn-default').on('click',function(e) {
            $(this).startLoading();
        });

        $('#s1').on('click',function(e){
            document.getElementById('score').value = 1;
            document.getElementById("i1").style.color='#137c00';
            document.getElementById("i2").style.color='gray';
            document.getElementById("i3").style.color='gray';
            document.getElementById("i4").style.color='gray';
            document.getElementById("i5").style.color='gray';
        });

        $('#s2').on('click',function(e){
            document.getElementById('score').value = 2;
            document.getElementById("i1").style.color='#137c00';
            document.getElementById("i2").style.color='#137c00';
            document.getElementById("i3").style.color='gray';
            document.getElementById("i4").style.color='gray';
            document.getElementById("i5").style.color='gray';
        });

        $('#s3').on('click',function(e){
            document.getElementById('score').value = 3;
            document.getElementById("i1").style.color='#137c00';
            document.getElementById("i2").style.color='#137c00';
            document.getElementById("i3").style.color='#137c00';
            document.getElementById("i4").style.color='gray';
            document.getElementById("i5").style.color='gray';
        });

        $('#s4').on('click',function(e){
            document.getElementById('score').value = 4;
            document.getElementById("i1").style.color='#137c00';
            document.getElementById("i2").style.color='#137c00';
            document.getElementById("i3").style.color='#137c00';
            document.getElementById("i4").style.color='#137c00';
            document.getElementById("i5").style.color='gray';
        });

        $('#s5').on('click',function(e){
            document.getElementById('score').value = 5;
            document.getElementById("i1").style.color='#137c00';
            document.getElementById("i2").style.color='#137c00';
            document.getElementById("i3").style.color='#137c00';
            document.getElementById("i4").style.color='#137c00';
            document.getElementById("i5").style.color='#137c00';
        });
    });


</script>