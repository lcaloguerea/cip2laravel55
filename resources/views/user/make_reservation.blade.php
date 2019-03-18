@include('layout.header')

        <link rel="stylesheet" href="{{asset('js/iCheck/all.css')}}" /> 

        <!-- Icons -->
        <link href="{{asset('icons/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('icons/themify-icons/themify-icons.css')}}" rel="stylesheet">
        <!--animate css-->
        <link rel="stylesheet" href="{{asset('animate.css')}}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('select2/select2.min.css')}}">

        <link href="{{asset('pickadate.js-3.5.6/lib/themes/default.css')}}" rel="stylesheet">
        <link href="{{asset('pickadate.js-3.5.6/lib/themes/default.date.css')}}" rel="stylesheet">

        <link href="{{asset('js/sweetalert/sweetalert.css')}}" rel="stylesheet">
        
        <link rel="stylesheet" href="{{asset('css/main-style.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/skins/all-skins.css')}}">

         </head>
    <!--
      |---------------------------------------------------------|
      |LAYOUT OPTIONS | fixed                                   |
      |               | layout-boxed                            |
      |               | sidebar-collapse                        |
      |               | sidebar-mini                            |
      |---------------------------------------------------------|
    -->
    <body class="skin-yellow sidebar-mini">
        <div class="page-loader-wrapper" >
            <div class="spinner"></div>
        </div>
        <div class="wrapper">
            <!-- Main Header -->
            @include('layout.top_menu_header')
            <!-- Left side column. contains the logo and sidebar -->
            @include('layout.sidebar_left')
            <!-- Content Wrapper -->
            <div class="content-wrapper">
                <section class="content-title">
                    <h1>
                        Crea tu reserva
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/user/index"><i class="fa fa-home"></i>Inicio</a></li>
                        <li class="active">Crear reserva</li>
                    </ol>
                </section>

                <section class="content">
                <div class="box box-form">
                        <div class="box-header">
                            <h3 class="box-title">Fechas y habitación</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="col-md-12">
                                <div class='row'>
                                    <div class='col-md-6'>
                                        <div class='form-group'>
                                            <label>Checkin</label>
                                            <input value="{{$check_in}}" id="chIn" name="chIn" type="date" class="form-control datepicker">
                                            <input id="in" type="in" name="in" style="display: none">
                                        </div>
                                    </div>
                                    <div class='col-md-6'>
                                        <div class='form-group'>
                                            <label>Checkout</label>
                                            <input value="{{$check_out}}" id="chOut" name="chOut" type="date" class="form-control datepicker2"/>
                                            <input id="out" type="out" name="out" style="display: none">
                                        </div>
                                    </div>
                                </div>                    
                                <div class='row'>
                                    <div class='col-md-12'>
                                        <div class='form-group'>
                                            <button id="validateDates" type="submit" class="btn btn-primary">Validar</button>
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-md-4'>
                                        <div class='form-group'{{ $errors->has('name') ? ' has-error' : '' }}>
                                            <label>Motivo</label>
                                            <input class="form-control" id="motive" name="motive" type="text" required/>
                                        </div>
                                    </div>
                                    <div class='col-md-4'>
                                        <div class='form-group'>
                                            <label>Programa</label>
                                            <input class="form-control" id="program" name="program" type="text" required />
                                        </div>
                                    </div>
                                    <div class='col-md-4'>
                                        <div class='form-group'>
                                            <label>Forma de pago</label>
                                            <select id="payment_m" class="form-control">
                                                    <option selected value="null">- -</option>
                                                    <option id="mp1" value="cash">Efectivo</option>
                                                    <option id="mp2" value="credit_card">Tarjeta de crédito</option>
                                                    <option id="mp3" value="e_transfer">Transferencia</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div id="rooms" class='col-md-6' style="display:none">
                                        <div class="form-group">
                                            <label>Seleccione habitación</label>
                                            <select id="rt" class="form-control">
                                                    <option selected value="null">- -</option>
                                                    <option id="1" value="single">Single</option>
                                                    <option id="2" value="shared">Compartida</option>
                                                    <option id="3" value="matrimonial">Matrimonial</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div id="addGuest" class='col-md-6'  style="display:none">
                                        <div class="form-group">
                                            <label>Huéspedes agregados a la reserva</label><br>
                                            <button id="showGuestForm" title="Agregar Huésped" style="" class="btn btn-circle btn-default"><img style="width: 50px"src="https://cdn1.iconfinder.com/data/icons/ui-5/502/user-512.png" class="img-circle" alt="User Image"></button>
                                            <button id="showGuestForm2" title="Agregar Huésped" style="display: none" class="btn btn-circle btn-default"><img style="width: 50px"src="https://cdn1.iconfinder.com/data/icons/ui-5/502/user-512.png" class="img-circle" alt="User Image"></button>
                                            <label id="lblCapacity"></label>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="infoGuest" class="box box-form" style="display:none">

                        <!-- /.box-header -->
                        <div class="box-body">
                            <form id="form1">
                            <div class="box-header">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h3 class="box-title">Información del huésped 1</h3>
                                    </div>
                                    <div class="col-md-6">
                                        <select id="pSelect" class="form-control select2" style="width: 100%;">
                                            <option></option>
                                            @foreach($passengers as $p)
                                                <option value="{{$p->id_passenger}}">{{$p->name_1}} {{$p->lName_1}}</option>
                                            @endforeach
                                        </select>                              
                                    </div>
                                </div>
                            {{ csrf_field() }}
                            </div>
                            </div>
                            <hr>
                            <div class="col-md-12">
                                <div class='row'>
                                    <div class='col-md-4'>
                                        <div class='form-group'{{ $errors->has('name') ? ' has-error' : '' }}>
                                            <label>Nombre</label>
                                            <input class="form-control" id="name" name="name" type="text" required/>
                                        </div>
                                    </div>
                                    <div class='col-md-4'>
                                        <div class='form-group'>
                                            <label>Apellido paterno</label>
                                            <input class="form-control" id="apellidoP" name="apellidoP" type="text" />
                                        </div>
                                    </div>
                                    <div class='col-md-4'>
                                        <div class='form-group'>
                                            <label>Apellido materno</label>
                                            <input class="form-control" id="apellidoM" name="apellidoP" type="text" />
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-md-4'>
                                        <div class="form-group">
                                            <label>Nacionalidad</label>
                                            <input class="form-control" id="na" name="na" type="text" />
                                        </div>
                                    </div>
                                    <div class='col-md-4'>
                                        <div class="form-group">
                                            <label>País de origen</label>
                                            <select id="po" class="form-control">
                                                <option value=""> -- </option>
                                                @foreach($country as $c)
                                                    <option value="{{$c->iso}}">{{ $c->name }} {{CountryFlag::get($c->iso)}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class='col-md-4'>
                                        <div class="form-group">
                                            <label>País de residencia</label>
                                            <select id="pr" class="form-control">
                                                <option value=""> -- </option>
                                                @foreach($country as $c)
                                                    <option value="{{$c->iso}}">{{ $c->name }} {{CountryFlag::get($c->iso)}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-md-4'>
                                        <div class='form-group{{ $errors->has('email') ? ' has-error' : '' }}'>
                                            <label>Email</label>
                                            <input class="form-control" id="email" name="email" type="text" />
                                        </div>
                                    </div>
                                    <div class='col-md-4'>
                                        <div class='form-group'>
                                            <label>Teléfono</label>
                                            <input class="form-control" id="phone" name="phone" type="text" />
                                        </div>
                                    </div>
                                    <div class='col-md-4'>
                                        <div class='form-group'>
                                            <label>Universidad</label>
                                            <input class="form-control" id="university" name="university" type="text" />
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-md-12'>
                                        <div class='form-group'>
                                            <button id="validateGuest" type="submit" class="btn btn-primary">Validar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                        <!-- /.box-body -->
                    </div>

                    <div id="infoGuest2" class="box box-form" style="display:none">

                        <!-- /.box-header -->
                        <div class="box-body">
                            <form id="form2">
                            <div class="box-header">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h3 class="box-title">Información del huésped 2</h3>
                                    </div>
                                    <div class="col-md-6">
                                        <select id="pSelect2" class="form-control select2" style="width: 100%;">
                                            <option></option>
                                            @foreach($passengers as $p)
                                                <option value="{{$p->id_passenger}}">{{$p->name_1}} {{$p->lName_1}}</option>
                                            @endforeach
                                        </select>                              
                                    </div>
                                </div>
                            {{ csrf_field() }}
                            </div>
                            </div>
                            <hr>
                            <div class="col-md-12">
                                <div class='row'>
                                    <div class='col-md-4'>
                                        <div class='form-group'{{ $errors->has('name') ? ' has-error' : '' }}>
                                            <label>Nombre</label>
                                            <input class="form-control" id="name2" name="name2" type="text" required/>
                                        </div>
                                    </div>
                                    <div class='col-md-4'>
                                        <div class='form-group'>
                                            <label>Apellido paterno</label>
                                            <input class="form-control" id="apellidoP2" name="apellidoP2" type="text" />
                                        </div>
                                    </div>
                                    <div class='col-md-4'>
                                        <div class='form-group'>
                                            <label>Apellido materno</label>
                                            <input class="form-control" id="apellidoM2" name="apellidoP2" type="text" />
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-md-4'>
                                        <div class="form-group">
                                            <label>Nacionalidad</label>
                                            <input class="form-control" id="na2" name="na2" type="text" />
                                        </div>
                                    </div>
                                    <div class='col-md-4'>
                                        <div class="form-group">
                                            <label>País de origen</label>
                                            <select id="po2" class="form-control">
                                                <option value=""> -- </option>
                                                @foreach($country as $c)
                                                    <option value="{{$c->iso}}">{{ $c->name }} {{CountryFlag::get($c->iso)}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class='col-md-4'>
                                        <div class="form-group">
                                            <label>País de residencia</label>
                                            <select id="pr2" class="form-control">
                                                <option value=""> -- </option>
                                                @foreach($country as $c)
                                                    <option value="{{$c->iso}}">{{ $c->name }} {{CountryFlag::get($c->iso)}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-md-4'>
                                        <div class='form-group{{ $errors->has('email') ? ' has-error' : '' }}'>
                                            <label>Email</label>
                                            <input class="form-control" id="email2" name="email2" type="text" />
                                        </div>
                                    </div>
                                    <div class='col-md-4'>
                                        <div class='form-group'>
                                            <label>Teléfono</label>
                                            <input class="form-control" id="phone2" name="phone2" type="text" />
                                        </div>
                                    </div>
                                    <div class='col-md-4'>
                                        <div class='form-group'>
                                            <label>Universidad</label>
                                            <input class="form-control" id="university2" name="university2" type="text" />
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-md-12'>
                                        <div class='form-group'>
                                            <button id="validateGuest2" type="submit" class="btn btn-primary">Validar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                        <!-- /.box-body -->
                    </div>

                    <div d="reservSummary" class="box box-form">
                        <div class="box-body">
                            <div class="row" style="background-color: #222d32; border-radius: 25px;">
                                    <div class="col-md-12">
                                        <label style="text-align: center; display: block; padding-top: 10px; color:white">Detalle de la reserva</label>
                                    </div>   
                                    <div style="position: middle" class="image col-md-4">
                                        <img  id="imgP1" style="width: 80px; height: 80px; margin: 20px;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTxkJot6LRREXu3_W7Yf2nyBpikY_yrpugqrvLWEUq39YAC7mTV" class="img-circle" alt="User Image">
                                        <label id="lblP1" style="color:white">No asignado</label>
                                        <input id="idP1" type="text" name="idP1" style="display:none">
                                    </div>
                                    <div style="position: middle;" class="image col-md-4">
                                         <img id="imgP2"style="width: 80px; height: 80px; margin: 20px;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTxkJot6LRREXu3_W7Yf2nyBpikY_yrpugqrvLWEUq39YAC7mTV" class="img-circle" alt="User Image">
                                        <label id="lblP2" style="color:white">No asignado</label>
                                        <input id="idP2" type="text" name="idP1" style="display:none">
                                    </div>
                                    <div style="position: middle" class="image col-md-4">
                                        <img id="imgR" style="width: 80px; height: 80px; margin: 20px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAbFBMVEX///8AAACenp7V1dXc3NxLS0tWVlb09PQeHh4+Pj7u7u59fX27u7vi4uKkpKT39/ePj49qamovLy+urq41NTUKCgqEhITLy8tcXFxQUFDDw8O0tLRjY2MqKirS0tJra2tERESLi4sTExMSEhKoQdVzAAAECElEQVR4nO2da1fiMBBAXR6CPEoVLCCgsvv//+Muu8dzMkkfmbZpwnrvVxmca0rzmA4+PAAAAAAAAAAAAAAAAAAAAAAAAHw33rPifJymxPFcZO996e0/fqTKx74Hv+0ltkYtl21Hv/VLbIVGXtZdBLPY6XuRtRd8jp27J89tBY+xM/fm+H+P4I1WoziKnbWKkV5wHDtnJWO1YfrThORFK7iNnbEa7dQfO189rzrBVex8W7BSGT7a4dPtfpIS++3UTvFRI7ixo/tYw/fN3k5yowh+k6E/Z8HS7MLsl0zzTRGby1D9XDMM1pydK0Llgk11gQ+KvF1olm47Eam7SQ2JvOXvFJFyX99pixmUtcjzooici8hFsAy7shB5zhWRGKYChtVgmAoYVoNhKmBYDYapgGE1GJrM9qe8WNZy3ZYVpN+31/qwIj/t689PBjCcZc6RVwUHuY9eHTzjplmNZHDDia48lX8dhm3y5hcbPE9iGS5Ved74V609qeOWUQwn6jz/cNw8bJzTZh/KhzGoYcvSzfxt3vyiMkoLLyENh6+fltVAAxrGKL6VjGI4wzgFYvfoPZihU7gZCKf0Esww1oNuH0MZtponesGeM0IZ+i64+ucwjKEsFgyLVUIJZHh1fu8yW9VwGp0r8j2PTnWBmbssvA5i+Gr9Vo/C5KLM8eyx77SX6NYDF2EM7YvUr7bs7ib8KrZWvd26TMMYWjsD3wfK7PW2b2HZWh6exA/DGObt3tUeeu+yq8xFjnwYQ7nr9X864FPEfXrHyb+orNWHMZSzof8THoWIK7zj5CdRzohhDOUHyv9BFPmB8n8eVK7y5ccXw2owxLAMDKsYwlAeOsvZovKw1kH23/j3ucjdqJwtZj0Z5iODTD7zVow8yeTi+5z5Bsp5dCfiWq6vHMN7AUMM0wdDg/torHTxnoLuryPoC8/OIKeP4Y7wamCPVZToB5+ukngn2n1gn4r/Z9fojeb+pV3zmyRNY9PFvQ9h8yC6pcGD9/YhAoV713CKjBb266+alrcYbK52yvWvty/SFPsObXQ5WwWUrl8cMgzWGqz+GF5uxDXNYDGR9//6Jj3ZtHYfQ2gPYn1nvqx++h8zxUUeVtW3rcsrOs32Xxd55FZ/M8UwTTA0wTBNMDTBME0wNMEwTTA0wTBNMDTBME0wNMEwTTA0wTBNMDTBME0wNMEwTTA0wTBNMDT5poaTcapMejJM978FXXoyfBouZSVPGGKIYXQwxBDD+GCI4VcTUfKGVquWwnC8vrGQj1FPH2MivxB2t/ibofUVgArDUuJ+q/CiOcHOhnH/J4vPV6nVvgGGGAYHQwwxxDA8GGL4DQyfGrlENrw0pxg1QQAAAAAAAAAAAAAAAAAAgA78BraMYuNxleD1AAAAAElFTkSuQmCC" class="img-circle" alt="User Image">
                                        <label id="lblR" style="color:white">No seleccionada</label>
                                    </div>
                                    <div style="padding: 20px" class='col-md-12'>
                                            <button id="acceptReserv" type="submit" class="btn btn-primary btn-block" disabled="true">Confirmar reserva</button>
                                    </div>
                                </div>
                        </div>
                    </div>

                </section>
                <!-- /. main content -->
                <span class="return-up"><i class="fa fa-chevron-up"></i></span>
            </div>
            <!-- /. content-wrapper -->
            <!-- Main Footer -->
            @include('layout.footer')
        </div>
        <!-- /. wrapper content-->
        <!-- JS scripts -->
        <script src="{{asset('jQuery/jquery-2.2.3.min.js')}}"></script>
        <script src="{{asset('js/jQueryUI/jquery-ui.min.js')}}"></script>
        <script src="{{asset('js/jquery-fullscreen/jquery.fullscreen-min.js')}}"></script>
        <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/slimScroll/jquery.slimscroll.min.js')}}"></script>
        <script src="{{asset('js/fastclick/fastclick.min.js')}}"></script>
        <script src="{{asset('js/iCheck/icheck.min.js')}}"></script>
        <script src="{{asset('js/pages/jquery-icheck.js')}}"></script>
        <script src="{{asset('select2/select2.min.js')}}"></script>

        <script src="{{asset('js/pages/dialogs.js')}}"></script>
        <script src="{{asset('js/sweetalert/sweetalert.min.js')}}"></script>

        <script src="{{asset('pickadate.js-3.5.6/lib/picker.js')}}"></script>
        <script src="{{asset('pickadate.js-3.5.6/lib/picker.date.js')}}"></script>
        <script src="{{asset('pickadate.js-3.5.6/lib/picker.time.js')}}"></script>
        <script src="{{asset('pickadate.js-3.5.6/lib/translations/es_ES.js')}}"></script>
        <!-- JS app -->
        <script src="{{asset('js/app2.js')}}"></script>
        <!-- Slimscroll is required when using the fixed layout. -->
    </body>
</html>

<script type="text/javascript">

$(document).ready(function(){


    $('.select2').select2({
                minimumResultsForSearch: 5,
                placeholder: "Buscar huésped existente",
                allowClear: true,
            });

        var $input = $('.datepicker').pickadate()
        var picker = $input.pickadate('picker')
        var $input2 = $('.datepicker2').pickadate()
        var picker2 = $input2.pickadate('picker')

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

            $("#pSelect").on("select2:unselecting", function(e) {
                    document.getElementById('name').disabled = false;
                    document.getElementById('apellidoP').disabled = false;
                    document.getElementById('apellidoM').disabled = false;
                    document.getElementById('na').disabled = false;
                    document.getElementById('po').disabled = false;
                    document.getElementById('pr').disabled = false;
                    document.getElementById('email').disabled = false;
                    document.getElementById('phone').disabled = false;
                    document.getElementById('university').disabled = false;
                    //find an efficient way to do this
                    document.getElementById('name').value = "";
                    document.getElementById('apellidoP').value = "";
                    document.getElementById('apellidoM').value = "";
                    document.getElementById('na').value = "";
                    document.getElementById('po').value = "";
                    document.getElementById('pr').value = "";
                    document.getElementById('email').value = "";
                    document.getElementById('phone').value = "";
                    document.getElementById('university').value = "";
            });

            $("#pSelect2").on("select2:unselecting", function(e) {
                    document.getElementById('name2').disabled = false;
                    document.getElementById('apellidoP2').disabled = false;
                    document.getElementById('apellidoM2').disabled = false;
                    document.getElementById('na2').disabled = false;
                    document.getElementById('po2').disabled = false;
                    document.getElementById('pr2').disabled = false;
                    document.getElementById('email2').disabled = false;
                    document.getElementById('phone2').disabled = false;
                    document.getElementById('university2').disabled = false;
                    //find an efficient way to do this
                    document.getElementById('name2').value = "";
                    document.getElementById('apellidoP2').value = "";
                    document.getElementById('apellidoM2').value = "";
                    document.getElementById('na2').value = "";
                    document.getElementById('po2').value = "";
                    document.getElementById('pr2').value = "";
                    document.getElementById('email2').value = "";
                    document.getElementById('phone2').value = "";
                    document.getElementById('university2').value = "";
            });


            //to capture the passenger dropdown selected
            $('#pSelect').on('change', function(e){

                e.preventDefault();

                var idP = $('#pSelect').val();
                if (idP != "" ){


                    $.ajax({
                        // in data you can use JSON, an array or a query string
                       data:{idP:idP, "_token": "{{ csrf_token() }}"},
                        //type of method
                        type: 'POST',
                        // type of data expected from method
                        dataType: "json",
                        // URL where we send our Ajax petition
                        url: '/user/load-guest' ,
                        success:function(data){
                        $('#name').val(data.name_1);
                        $('#apellidoP').val(data.lName_1);
                        $('#apellidoM').val(data.lName_2);
                        $('#na').val(data.nationality);
                        document.getElementById("po").selectedIndex = data.country_o
                        document.getElementById("pr").selectedIndex = data.country_r
                        $('#email').val(data.email);
                        $('#phone').val(data.phone);
                        $('#university').val(data.university);
                        document.getElementById('name').disabled = true;
                        document.getElementById('name').disabled = true;
                        document.getElementById('apellidoP').disabled = true;
                        document.getElementById('apellidoM').disabled = true;
                        document.getElementById('na').disabled = true;
                        document.getElementById('po').disabled = true;
                        document.getElementById('pr').disabled = true;
                        document.getElementById('email').disabled = true;
                        document.getElementById('phone').disabled = true;
                        document.getElementById('university').disabled = true;
                        }
                    }); 
                }
            });

            $('#pSelect2').on('change', function(e){

                e.preventDefault();

                var idP = $('#pSelect2').val();
                if (idP != "" ){


                    $.ajax({
                        // in data you can use JSON, an array or a query string
                       data:{idP:idP, "_token": "{{ csrf_token() }}"},
                        //type of method
                        type: 'POST',
                        // type of data expected from method
                        dataType: "json",
                        // URL where we send our Ajax petition
                        url: '/user/load-guest' ,
                        success:function(data){
                        $('#name2').val(data.name_1);
                        $('#apellidoP2').val(data.lName_1);
                        $('#apellidoM2').val(data.lName_2);
                        $('#na2').val(data.nationality);
                        document.getElementById("po2").selectedIndex = data.country_o
                        document.getElementById("pr2").selectedIndex = data.country_r
                        $('#email2').val(data.email);
                        $('#phone2').val(data.phone);
                        $('#university2').val(data.university);
                        document.getElementById('name2').disabled = true;
                        document.getElementById('name2').disabled = true;
                        document.getElementById('apellidoP2').disabled = true;
                        document.getElementById('apellidoM2').disabled = true;
                        document.getElementById('na2').disabled = true;
                        document.getElementById('po2').disabled = true;
                        document.getElementById('pr2').disabled = true;
                        document.getElementById('email2').disabled = true;
                        document.getElementById('phone2').disabled = true;
                        document.getElementById('university2').disabled = true;
                        }
                    }); 
                }
            });


            //to show and manage the guest form
            $("#showGuestForm").on('click', function(e){
                $("#infoGuest").show(1000);
            });

            $("#showGuestForm2").on('click', function(e){
                $("#infoGuest2").show(1000);
            });


            $('#rt').on('change', function(e){
                e.preventDefault();

                var $selected = $('#rt').val();
                if($selected == 'single'){
                    document.getElementById('lblR').innerHTML = "Habitación <br> simple";
                    document.getElementById('lblCapacity').innerHTML = "0/1 (Asignado/Capacidad)";
                    $("#addGuest").show(700);
                    //$("#infoGuest1").show(1000);
                    //$("#infoGuest2").hide(1000);

                }else if($selected == 'shared'){
                    $("#addGuest").show(700);
                    document.getElementById('lblR').innerHTML = "Habitación <br> compartida";
                    document.getElementById('lblCapacity').innerHTML = "0/2 (Asignado/Capacidad)";

                    //$("#infoGuest1").show(1000);
                    //$("#infoGuest2").hide(1000);
                }else if($selected == 'matrimonial'){
                    document.getElementById('lblR').innerHTML = "Habitación <br> Matrimonial";
                    document.getElementById('lblCapacity').innerHTML = "0/2 (Asignado/Capacidad)";
                    $("#addGuest").show(700);
                    //$("#infoGuest1").show(1000);
                    //$("#infoGuest2").show(1000);
                }else if($selected == 'null'){
                    $("#addGuest").hide(1000);
                    $("#infoGuest").hide(1000);
                }
            });

            $('#validateDates').on('click',function(e){

            e.preventDefault();

            var hola = picker.get("select","yyyy-mm-dd");
            var inFormatedForUser = picker.get("select","dd-mm-yyyy");
            $('#in').text(inFormatedForUser);
            var hola2 = picker2.get("select","yyyy-mm-dd");
            var outFormatedForUser = picker2.get("select","dd-mm-yyyy");
            $('#out').text(outFormatedForUser);

            var checkIn = hola;
            var checkOut = hola2;
            document.getElementById('in').value = checkIn;
            document.getElementById('out').value = checkOut;

             if ((inFormatedForUser == '') || (outFormatedForUser == '')){
                 swal({
                    title:"Ups!!",
                    text: "Para comenzar una nueva reserva debes ingresar ambas fechas, intenta nuevamente",
                    type: "warning"
                });

            }
            else{

            $.ajax({
                // En data puedes utilizar un objeto JSON, un array o un query string
               data:{checkIn:checkIn, checkOut:checkOut},
                //Cambiar a type: POST si necesario
                type: 'POST',
                // Formato de datos que se espera en la respuesta
                dataType: "json",
                // URL a la que se enviará la solicitud Ajax
                url: '/disp' ,
                success:function(data){

                    $("#rooms").hide(1000);
                    $("#addGuest").hide(1000);
                    $("#infoGuest1").hide(1000);
                    $("#infoGuest2").hide(1000);
                    $("#infoGuest").hide(1000);

                    $("#form1").trigger('reset');
                    $("#form2").trigger('reset');

                    //seting options for rooms select
                    $("#1").hide();
                    $("#2").hide();
                    $("#3").hide();

                    //checking availability to show only them
                    if(data.single > 0){$("#1").show();}
                    if(data.compartida > 0){$("#2").show();}
                    if(data.matrimonial > 0){$("#3").show();}

                    if (data.single != 0 || data.compartida != 0 || data.matrimonial != 0){
                        swal({
                            title:"Tenemos disponibilidad!!",
                            text: "Para la fecha seleccionada tenemos <br> <strong>Single</strong>: "+data.single+" disponibles <br> <strong>Compartida</strong>: "+data.compartida+" disponibles <br> <strong>Matrimonial</strong>: "+data.matrimonial+" disponibles <br><br> Para continuar seleccione el tipo de habitación que desea reservar",
                            type: "success",
                            html: true,
                        }, function () {
                            $("#rt").val(0);
                            $("#rooms").show(1000);
                        });
                    }else{
                         swal({
                            title:"Lo sentimos...",
                            text: "No tenemos disponibilidad para el intervalo seleccionado, Intente nuevamente con otras fechas",
                            imageUrl: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQI4XksKnQ5DoAJSNGyiH7Nrtni1jsKRBgMtIMeLX5M0H3EsKDa"
                        });
                    }

                    }
                });

            } 

        });

            $('#validateGuest').on('click',function(e){


            e.preventDefault();

            var name_1 = $('#name').val();
            var lName_1 = $('#apellidoP').val();
            var lName_2 = $('#apellidoM').val();
            var nationality = $('#na').val();
            var country_o = $('#po').val();
            var country_r = $('#pr').val();
            var email = $('#email').val();
            var phone = $('#phone').val();
            var university = $('#university').val();
            if ($('#rt').val() == 'single'){
                var capacity = 1;
            }
            if($('#rt').val() == 'shared' || $('#rt').val() == 'matrimonial'){
                var capacity = 2;
            }

            $.ajax({
                // En data puedes utilizar un objeto JSON, un array o un query string
               data:{name_1:name_1, lName_1:lName_1, lName_2:lName_2, nationality:nationality, country_o:country_o, country_r:country_r, email:email, phone:phone, university:university, "_token": "{{ csrf_token() }}"},
                //Cambiar a type: POST si necesario
                type: 'POST',
                // Formato de datos que se espera en la respuesta
                dataType: "json",
                // URL a la que se enviará la solicitud Ajax
                url: '/user/validate_guest' ,
                success:function(data){
                    if(data.errors != ""){
                        html = '<p>Por favor corregir los siguientes errores</p><br><div class="alert alert-danger fade in">';
                        jQuery.each(data.errors, function(key, value){
                            html += '<li>' + value + '</li>';
                        });

                        swal({
                        title:"Ups!!",
                        text: html,
                        type: "warning",
                        html: true
                        });
                    }
                    if(data.passenger != ""){
                        if(capacity == 1){
                                swal({
                                title:"Listo!!",
                                text: "<strong>"+data.passenger.name_1+" "+data.passenger.lName_1+"</strong> ha sido agregad@ a su reserva. ha alcanzado la capacidad máxima para este tipo de habitación",
                                type: "success",
                                imageUrl: data.passenger.pAvatar,
                                html: true,
                                });
                            $("#infoGuest").hide(1000);
                            $("#showGuestForm").hide(1000);
                            document.getElementById('imgP1').src= data.passenger.pAvatar;
                            document.getElementById('lblP1').innerHTML = data.passenger.name_1+"<br>"+data.passenger.lName_1;
                            document.getElementById('idP1').value = data.passenger.id_passenger;
                            document.getElementById('acceptReserv').disabled = false;
                            document.getElementById('lblCapacity').innerHTML = "1/"+capacity+" (Asignado/Capacidad)";
                        }
                        else{
                            swal({
                            title:"Listo!!",
                            text: "<strong>"+data.passenger.name_1+" "+data.passenger.lName_1+"</strong> ha sido agregad@ a su reserva",
                            type: "success",
                            imageUrl: data.passenger.pAvatar,
                            html: true,
                            showCancelButton: true,
                            CancelButtonText: "cancelar",
                            confirmButtonColor: "#2ECCFA",
                            confirmButtonText: "¿Desea añadir otro huésped?",
                            closeOnConfirm: false,
                            }, function () {
                                swal("Continuemos!", "completa el siguiente formulario.", "success");
                                $("#infoGuest2").show(700);
                            });
                            $("#infoGuest").hide(1000);
                            $("#showGuestForm").hide(1000);

                            document.getElementById('imgP1').src= data.passenger.pAvatar;
                            document.getElementById('lblP1').innerHTML = data.passenger.name_1+"<br>"+data.passenger.lName_1;
                            document.getElementById('idP1').value = data.passenger.id_passenger;
                            document.getElementById('acceptReserv').disabled = false;
                            document.getElementById('lblCapacity').innerHTML = "1/"+capacity+" (Asignado/Capacidad)";
                            if(capacity == 2){
                                $("#showGuestForm2").show(700);
                            }
                            
                        }

                    }
                    if(data.passengerNew != ""){
                        if(capacity == 1){
                                swal({
                                title:"Listo!!",
                                text: "<strong>"+data.passengerNew.name_1+" "+data.passengerNew.lName_1+"</strong> ha sido creado como nuevo huésped y se ha agregad@ a su reserva. ha alcanzado la capacidad máxima para este tipo de habitación",
                                type: "success",
                                imageUrl: data.passengerNew.pAvatar,
                                html: true,
                                });
                            $("#infoGuest").hide(1000);
                            $("#showGuestForm").hide(1000);
                            document.getElementById('imgP1').src= data.passengerNew.pAvatar;
                            document.getElementById('lblP1').innerHTML = data.passengerNew.name_1+"<br>"+data.passengerNew.lName_1;
                            document.getElementById('idP1').value = data.passengerNew.id;
                            document.getElementById('acceptReserv').disabled = false;
                            document.getElementById('lblCapacity').innerHTML = "1/"+capacity+" (Asignado/Capacidad)";
                        }
                        else{
                            swal({
                            title:"Listo!!",
                            text: "<strong>"+data.passengerNew.name_1+" "+data.passengerNew.lName_1+"</strong> ha sido creado como nuevo huésped y se ha agregad@ a su reserva",
                            type: "success",
                            imageUrl: data.passengerNew.pAvatar,
                            html: true,
                            showCancelButton: true,
                            CancelButtonText: "cancelar",
                            confirmButtonColor: "#2ECCFA",
                            confirmButtonText: "Desea añadir otro huésped?",
                            closeOnConfirm: false,
                            }, function () {
                                swal("Continuemos!", "completa el siguiente formulario.", "success");
                                $("#infoGuest2").show(700);
                            });
                            $("#infoGuest").hide(1000);
                            $("#showGuestForm").hide(1000);

                            document.getElementById('imgP1').src= data.passengerNew.pAvatar;
                            document.getElementById('lblP1').innerHTML = data.passengerNew.name_1+"<br>"+data.passengerNew.lName_1;
                            document.getElementById('idP1').value = data.passengerNew.id;
                            document.getElementById('acceptReserv').disabled = false;
                            document.getElementById('lblCapacity').innerHTML = "1/"+capacity+" (Asignado/Capacidad)";
                            if(capacity == 2){
                                $("#showGuestForm2").show(700);
                            }
                            
                        }
                    }
                }
            }); 

        });


            $('#validateGuest2').on('click',function(e){


            e.preventDefault();

            var name_1 = $('#name2').val();
            var lName_1 = $('#apellidoP2').val();
            var lName_2 = $('#apellidoM2').val();
            var nationality = $('#na2').val();
            var country_o = $('#po2').val();
            var country_r = $('#pr2').val();
            var email = $('#email2').val();
            var phone = $('#phone2').val();
            var university = $('#university2').val();

            if ($('#rt').val() == 'single'){
                var capacity = 1;
            }
            if($('#rt').val() == 'shared' || $('#rt').val() == 'matrimonial'){
                var capacity = 2;
            }

            $.ajax({
                // En data puedes utilizar un objeto JSON, un array o un query string
               data:{name_1:name_1, lName_1:lName_1, lName_2:lName_2, nationality:nationality, country_o:country_o, country_r:country_r, email:email, phone:phone, university:university, "_token": "{{ csrf_token() }}"},
                //Cambiar a type: POST si necesario
                type: 'POST',
                // Formato de datos que se espera en la respuesta
                dataType: "json",
                // URL a la que se enviará la solicitud Ajax
                url: '/user/validate_guest' ,
                success:function(data){
                    console.log(data);
                    if(data.errors != ""){
                        html = '<p>Por favor corregir los siguientes errores</p><br><div class="alert alert-danger fade in">';
                        jQuery.each(data.errors, function(key, value){
                            html += '<li>' + value + '</li>';
                        });

                        swal({
                        title:"Ups!!",
                        text: html,
                        type: "warning",
                        html: true
                        });
                    }
                    if(data.passenger != ""){
                        swal({
                        title:"Listo!!",
                        text: "<strong>"+data.passenger.name_1+" "+data.passenger.lName_1+"</strong> ha sido agregad@ a su reserva. ha alcanzado la capacidad máxima para este tipo de habitación",
                        type: "success",
                        imageUrl: data.passenger.pAvatar,
                        html: true,
                        });
                        $("#infoGuest2").hide(1000);

                        document.getElementById('imgP2').src= data.passenger.pAvatar;
                        document.getElementById('idP2').value = data.passenger.id_passenger;
                        document.getElementById('lblCapacity').innerHTML = "2/"+capacity+" (Asignado/Capacidad)";
                        if(capacity == 2){
                            $("#showGuestForm2").hide(1000);
                        }
                    }
                    if(data.passengerNew != ""){
                                swal({
                                title:"Listo!!",
                                text: "<strong>"+data.passengerNew.name_1+" "+data.passengerNew.lName_1+"</strong> ha sido creado como nuevo huésped y se ha agregad@ a su reserva. ha alcanzado la capacidad máxima para este tipo de habitación",
                                type: "success",
                                imageUrl: data.passengerNew.pAvatar,
                                html: true,
                                });
                            $("#infoGuest").hide(1000);
                            $("#showGuestForm").hide(1000);
                            document.getElementById('imgP2').src= data.passengerNew.pAvatar;
                            document.getElementById('lblP2').innerHTML = data.passengerNew.name_1+"<br>"+data.passengerNew.lName_1;
                            document.getElementById('idP2').value = data.passengerNew.id;
                            document.getElementById('acceptReserv').disabled = false;
                            document.getElementById('lblCapacity').innerHTML = "1/"+capacity+" (Asignado/Capacidad)";
                    }
                }
            }); 

        });

           $('#acceptReserv').on('click',function(e){


            e.preventDefault();

            swal({
                title:"Importante!",
                text: "Esta segur@ de confirmar la reserva con los datos ingresados?",
                type: "warning",
                html: true,
                showCancelButton: true,
                CancelButtonText: "cancelar",
                confirmButtonColor: "#2ECCFA",
                confirmButtonText: "Si, crear reserva!",
                closeOnConfirm: false,
                }, function () {

                    var passenger1 =   $('#idP1').val();
                    var passenger2 =   $('#idP2').val();
                    var roomType = $('#rt').val();
                    var motive = $('#motive').val();
                    var program = $('#program').val();
                    var payment_m = $('#payment_m').val();
                    var checkin = $('#in').val();
                    var checkout = $('#out').val();

                    $.ajax({
                        // En data puedes utilizar un objeto JSON, un array o un query string
                       data:{passenger1:passenger1, passenger2:passenger2, roomType:roomType, motive:motive, program:program, payment_m:payment_m, checkin:checkin, checkout:checkout,  "_token": "{{ csrf_token() }}"},
                        //Cambiar a type: POST si necesario
                        type: 'POST',
                        // Formato de datos que se espera en la respuesta
                        dataType: "json",
                        // URL a la que se enviará la solicitud Ajax
                        url: '/user/create-reservation' ,
                        success:function(data){
                        swal({
                            title:"Reserva registrada!!",
                            text: "Gracias por decidir hospedarte con nosotros, te enviaremos un correo con el detalle de la reserva.",
                            type: "success",
                            html: true,
                        }, function () {
                                window.location.href = "/user";
                        });
                        }
                    }); 
                });
        });

});
</script>