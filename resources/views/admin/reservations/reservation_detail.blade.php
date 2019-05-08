@include('layout.header')

        <link rel="stylesheet" href="{{asset('datatables/dataTables.bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('responsive-tables/responsivetables.css')}}">
        <!-- Icons -->
        <link href="{{asset('icons/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('icons/themify-icons/themify-icons.css')}}" rel="stylesheet">
        <!--animate css-->
        <link href="{{asset('js/sweetalert/sweetalert.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('animate.css')}}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('css/main-style.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/skins/all-skins.css')}}">
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <!--
      |---------------------------------------------------------|
      |LAYOUT OPTIONS | fixed                                   |
      |               | layout-boxed                            |
      |               | sidebar-collapse                        |
      |               | sidebar-mini                            |
      |---------------------------------------------------------|
    -->
    <body class="skin-yellow sidebar-mini fixed">
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
                        Lista de reservas
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/admin"><i class="fa fa-home"></i>Inicio</a></li>
                        <li>Reservas</li>
                        <li class="active">Lista</li>
                    </ol>
                </section>
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                </div>
                                <div class="box-body">
                                    <table id="payments" class="table responsive">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>Usuario</th>
                                                <th>Huésped(es)</th>
                                                <th>Estado</th>
                                                <th>Check In</th>
                                                <th>Check Out</th>
                                                <th>Tipo de pago</th>
                                                <th>Tipo de habitación</th>
                                                <th>Habitación</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{$reserv->id_res}}</td>
                                                <td><a href="user-profile/{{$reserv->userR->id}}">{{$reserv->userR->name}} {{$reserv->userR->lName}}</a></td>
                                                <td>
                                                @foreach($pGroups as $pg)
                                                    @if($pg->reservation_id == $reserv->id_res)
                                                        <li><a href="passenger-profile/{{$pg->passengersR[0]->id_passenger}}">{{$pg->passengersR[0]->name_1}} {{$pg->passengersR[0]->lName_1}}</a></li>
                                                    @endif
                                                @endforeach
                                                </td>
                                                <td>
                                                    @if($reserv->status == "started")
                                                        <span class="badge bg-green">Iniciada</span>
                                                    @elseif($reserv->status == "cancelled")
                                                        <span class="badge bg-red">Cancelada</span>
                                                    @elseif($reserv->status == "waiting")
                                                        <span class="badge bg-yellow">En espera</span>
                                                    @elseif($reserv->status == "finished")
                                                        <span class="badge bg-blue">Finalizada</span>
                                                    @endif
                                                </td>
                                                <td>{{date('d-m-Y', strtotime($reserv->check_in))}}</td>
                                                <td>{{date('d-m-Y', strtotime($reserv->check_out))}}</td>
                                                <td>{{$reserv->payment_m}}</td>
                                                <td>{{$reserv->roomType}}</td>
                                                <td>@if($reserv->room_id == null)
                                                        <select id="room" class="form-control">
                                                            <option selected="selected" value="">--</option>
                                                            @foreach($rooms as $ras)
                                                                <option value="{{$ras->id_room}}">{{$ras->id_room}}</option>
                                                            @endforeach
                                                        </select>
                                                    @else
                                                        <a href="/admin/room-detail/{{$reserv->room_id}}">{{$reserv->room_id}}</a>
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class='form-group'>
                                @if($reserv->status != "waiting")
                                    <button id="confirm" type="button" class="btn btn-primary btn-block disabled">
                                        Confirmar
                                    </button>
                                @else
                                    <button id="confirm" type="button" class="btn btn-primary btn-block">
                                        Confirmar
                                    </button>
                                @endif      
                            </div>
                        </div>
                    	<div class="col-md-2">
                            <div class='form-group'>
                            	@if($reserv->status != "waiting")
                                	<button id="btn_chIn" type="button" class="btn btn-primary btn-block disabled">
                                		Check in
                            		</button>
                            	@else
                                    <button id="btn_chIn" type="button" class="btn btn-primary btn-block">
                                		Check in
                            		</button>
                            	@endif   	
                            </div>
                    	</div>
                    	<div class="col-md-2">
                            <div class='form-group'>
                            	@if($reserv->status != "started")
                                	<button id="btn_chOut" type="button" class="btn btn-primary btn-block disabled">
                                		Check out
                            		</button>
                            	@else
                                    <button id="btn_chOut" type="button" class="btn btn-primary btn-block">
                                		Check out
                            		</button>
                            	@endif 
                            </div>
                    	</div>
                    	<div class="col-md-3">
                            <div class='form-group'>
                            	@if($reserv->status != "started" or $reserv->status != "cancelled")
                                	<button id="btn_cancel" type="button" class="btn btn-primary btn-block disabled">
                                		Cancelar
                            		</button>
                            	@else
                                    <button id="btn_cancel" type="button" class="btn btn-primary btn-block">
                                		Cancelar
                            		</button>
                            	@endif 
                            </div>
                    	</div>
                        <div class="col-md-2">
                            <div class='form-group'>
                                @if($reserv->status != "finished")
                                    <button id="invoice" type="button" class="btn btn-primary btn-block disabled">
                                        Boleta
                                    </button>
                                @else
                                    <button id="invoice" type="button" class="btn btn-primary btn-block disabled">
                                        Boleta
                                    </button>
                                @endif 
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
        <script src="{{asset('js/jquery-fullscreen/jquery.fullscreen-min.js')}}"></script>
        <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/slimScroll/jquery.slimscroll.min.js')}}"></script>
        <script src="{{asset('js/fastclick/fastclick.min.js')}}"></script>
        <!-- DataTables -->
        <script src="{{asset('datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('js/sweetalert/sweetalert.min.js')}}"></script>
        <script src="{{asset('datatables/dataTables.bootstrap.min.js')}}"></script>
        <script src="{{asset('responsive-tables/responsivetables.js')}}"></script>
        <script src="{{asset('js/app2.js')}}"></script>
        <!-- Slimscroll is required when using the fixed layout. -->
        <script>

    $('#btn_chIn').on('click',function(e){

        e.preventDefault();

        var id = {{$reserv->id_res}};

        var room = document.getElementById("room").value;
        if(room == ""){
                swal({
                    title:"Ups!!",
                    text: "No puedes validar un check in si no asignas una habitación a la reserva",
                    type: "warning"
                });
        }
        else{
        swal({
            title:"Esta seguro?",
            text: "Esta por validar el check in de esta reserva y asignar la habitación "+room,
            type: "success",
            html: true,
            showCancelButton: true,
            CancelButtonText: "cancelar",
        }, function () {

            $.ajax({
                // En data puedes utilizar un objeto JSON, un array o un query string
               data:{id:id, room:room, "_token": "{{ csrf_token() }}"},
                //Cambiar a type: POST si necesario
                type: 'PUT',
                // Formato de datos que se espera en la respuesta
                dataType: "json",
                // URL a la que se enviará la solicitud Ajax
                url: '/admin/reservations/checkin' , //this is different because it can change user type
                success:function(data){
                        swal({
                            title:"Actualizado!!",
                            text: "<strong>"+data.message+"</strong>",
                            type: "success",
                            html: true,
                        },function () {
                            window.location.reload(true);
                        });
                }
            }); 
        });
        }


    });

    $('#btn_chOut').on('click',function(e){

        e.preventDefault();

        var id = {{$reserv->id_res}};

        swal({
            title:"Esta seguro?",
            text: "Esta por validar el check out de esta reserva",
            type: "success",
            html: true,
            showCancelButton: true,
            CancelButtonText: "cancelar",
        }, function () {

	        $.ajax({
	            // En data puedes utilizar un objeto JSON, un array o un query string
	           data:{id:id, "_token": "{{ csrf_token() }}"},
	            //Cambiar a type: POST si necesario
	            type: 'PUT',
	            // Formato de datos que se espera en la respuesta
	            dataType: "json",
	            // URL a la que se enviará la solicitud Ajax
	            url: '/admin/reservations/checkout' , //this is different because it can change user type
	            success:function(data){
                    swal({
                        title:"Actualizado!!",
                        text: "<strong>"+data.message+"</strong>",
                        type: "success",
                        html: true,
                    },function () {
                        window.location.reload(true);
                    });
	            }
	        }); 
    	});
    });

    $('#invoice').on('click',function(e){

        e.preventDefault();

        var id = {{$reserv->id_res}};

        swal({
            title:"Esta seguro?",
            text: "Esta por emitir un comprobante del cobro asociado a esta reserva",
            type: "warning",
            html: true,
            showCancelButton: true,
            CancelButtonText: "cancelar",
        }, function () {

            $.ajax({
                // En data puedes utilizar un objeto JSON, un array o un query string
               data:{id:id, "_token": "{{ csrf_token() }}"},
                //Cambiar a type: POST si necesario
                type: 'PUT',
                // Formato de datos que se espera en la respuesta
                dataType: "json",
                // URL a la que se enviará la solicitud Ajax
                url: '/admin/reservations/invoice' , //this is different because it can change user type
                success:function(data){
                        swal({
                            title:"Actualizado!!",
                            text: "<strong>"+data.message+"</strong>",
                            type: "success",
                            html: true,
                        },function () {
                            window.location.reload(true);
                        });
                }
            }); 
        });
    });

    $('#btn_cancel').on('click',function(e){

        e.preventDefault();

        var id = {{$reserv->id_res}};

        swal({
            title:"Esta seguro?",
            text: "Esta por cancelar esta reserva",
            type: "success",
            html: true,
            showCancelButton: true,
            CancelButtonText: "cancelar",
        }, function () {

	        $.ajax({
	            // En data puedes utilizar un objeto JSON, un array o un query string
	           data:{id:id, "_token": "{{ csrf_token() }}"},
	            //Cambiar a type: POST si necesario
	            type: 'PUT',
	            // Formato de datos que se espera en la respuesta
	            dataType: "json",
	            // URL a la que se enviará la solicitud Ajax
	            url: '/admin/reservations/cancel' , //this is different because it can change user type
	            success:function(data){
	                    swal({
	                        title:"Actualizado!!",
	                        text: "<strong>"+data.message+"</strong>",
	                        type: "success",
	                        html: true,
	                    },function () {
	                        window.location.reload(true);
	                    });
	            }
	        }); 
    	});
    });

        </script>
    </body>
</html>