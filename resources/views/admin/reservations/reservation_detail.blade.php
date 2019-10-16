@include('layout.header')


<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.5/css/fixedHeader.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">

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
                        <li><a href="/{{Auth::user()->type}}"><i class="fa fa-home"></i>Inicio</a></li>
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
                                    <table id="payments" class="display wrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Usuario</th>
                                                <th>Huésped(es)</th>
                                                <th>Tipo de habitación</th>
                                                <th>Habitación</th>
                                                <th>Check In</th>
                                                <th>Check Out</th>
                                                <th>Tipo de pago</th>
                                                <th>Confirmación</th>
                                                <th>Estado</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><a href="/{{Auth::user()->type}}/users/user-profile/{{$reserv->userR->id}}">{{$reserv->userR->name}} {{$reserv->userR->lName}}</a></td>
                                                <td>
                                                @foreach($pGroups as $pg)
                                                    @if($pg->reservation_id == $reserv->id_res)
                                                        <li><a href="/{{Auth::user()->type}}/passengers/passenger-profile/{{$pg->passengersR[0]->id_passenger}}">{{$pg->passengersR[0]->name_1}} {{$pg->passengersR[0]->lName_1}}</a></li>
                                                    @endif
                                                @endforeach
                                                </td>
                                                <td>{{trans('attributes.'.$reserv->roomType)}}</td>
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
                                                <td>{{date('d-m-Y', strtotime($reserv->check_in))}}</td>
                                                <td>{{date('d-m-Y', strtotime($reserv->check_out))}}</td>
                                                <td>{{trans('attributes.'.$reserv->payment_m)}}</td>
                                                <td>{{trans('attributes.'.$reserv->confirmed)}}</td>
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
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="box-body">
                                    <div class="panel panel-warning">
                                        <div style="padding: 1px 10px" class="panel-heading">
                                            <div class="panel-title">
                                                <h4>Observaciones</h4>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            @if($reserv->user_obs != "")
                                                <p>{{$reserv->user_obs}}</p>
                                            @else
                                                <p>Sin observaciones.</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

        @if($reserv->confirmed == "confirmed" and $reserv->invoice_id == null and Auth::user()->type == "admin")
          <div class="row">

            <!--/.col-->
            <div class="col-sm-6 col-lg-12">
              <div class="info-box">
                <div class="info-box-content">
                  <div class="text-center value">Emitir boleta</div>
                  <br>
                  <div class="box-body no-padding">
                    <div class='row'>
                        @if($reserv->payment_m == "p_code")
                        <div class='col-md-4'>
                            <div class='form-group'>
                                <label>IVA</label>
                                <select id="iva" class="form-control select2" style="width: 100%;">
                            <option selected="selected" value="yes">Con</option>
                            <option value="no">Sin</option>
                        </select>
                            </div>
                        </div>
                        <div class='col-md-4{{ $errors->has('discount') ? ' has-error' : '' }}'>
                            <div class='form-group'>
                                <label>Descuento</label>
                                <input class="form-control" id="discount" name="discount" type="text" placeholder="Dejar vacío si no aplica" />
                                @if ($errors->has('lName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('discount') }}</strong>
                                     </span>
                                @endif
                            </div>
                        </div>
                        <div class='col-md-4'>
                            <div class='form-group'>
                                <label>Código interno</label>
                                <input class="form-control" id="IC" name="IC" type="text"  />
                            </div>
                        </div>
                        @else
                        <div class='col-md-4'>
                            <div class='form-group'>
                                <label>IVA</label>
                                <select id="iva" class="form-control select2" style="width: 100%;">
                            <option selected="selected" value="yes">Con</option>
                            <option value="no">Sin</option>
                        </select>
                            </div>
                        </div>
                        <div class='col-md-8'>
                            <div class='form-group'>
                                <label>Descuento</label>
                                <input class="form-control" id="discount" name="discount" type="text" placeholder="Dejar vacío si no aplica" />
                            </div>
                        </div>
                        <div class='col-md-1' hidden>
                            <div class='form-group'>
                                <label>Código interno</label>
                                <input class="form-control" id="IC" name="IC" type="text"  />
                            </div>
                        </div>
                        @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--/.col-->
          </div>
          @endif

                    <div class="row">
                        <div class="col-md-3 pull-left">
                            <div class='form-group'>
                                @if($reserv->confirmed == "tbc")
                                    <button id="btn_confirm" type="button" class="btn btn-primary btn-block">
                                        Confirmar
                                    </button>
                                    <button id="btn_cancel" type="button" class="btn btn-primary btn-block">
                                        Cancelar
                                    </button>
                                @elseif($reserv->status == "waiting" and $reserv->confirmed == "confirmed")
                                    <button id="btn_chIn" type="button" class="btn btn-primary btn-block">
                                        Check in
                                    </button>
                                @elseif($reserv->status == "started" and $reserv->confirmed == "confirmed")
                                    <button id="btn_chOut" type="button" class="btn btn-primary btn-block">
                                        Check out
                                    </button>
                                @endif   
                            </div> 
                        </div>
                        @if($reserv->confirmed == "confirmed" and $reserv->invoice_id == null and Auth::user()->type == "admin")
                        <div class="col-md-3 pull-left">
                            <div class='form-group'>
                                    <button id="invoice" type="button" class="btn btn-primary btn-block">
                                        Boleta
                                    </button>
                            </div>
                        </div>
                        @endif                      
                    </div>
                                    <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">
                                            @if($act->count() == 0)
                                                <div style="text-align: center" class="alert alert-warning alert-dismissable"><strong>No registra actividad</strong></div>
                                                <ul class="timeline">
                                            @else
                                            <div style="text-align: center" class="alert alert-info alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                <strong>Todas las horas aqui mostradas estan en GTM-4 (Zona horaria Santiago de Chile)</strong></div>
                                                <ul class="timeline">
                                                    @foreach($dates as $d)
                                                        <li class="time-label">
                                                            <span class="">
                                                                @if($d == date('d/m/Y'))
                                                                    Recientemente
                                                                @else
                                                                    {{$d}}
                                                                @endif
                                                            </span>
                                                        </li>
                                                        @foreach($act as $a)
                                                            @if($a->created_at->format('d/m/Y') == $d)
                                                                <li>
                                                                @if($a->event == "rsrv_created")
                                                                    <i class="fa fa-plus bg-green"></i>
                                                                    <div class="timeline-item">
                                                                        @if($d == date('d/m/Y'))
                                                                        <span class="time"><i class="fa fa-clock-o"></i> {{$a->created_at->diffForHumans()}}</span>
                                                                        @else
                                                                        <span class="time"><i class="fa fa-clock-o"></i> {{$a->created_at->format('H:i')}}</span>
                                                                        @endif
                                                                        <h3 class="timeline-header">{{trans('attributes.'.$a->rspnsblR->type)}} <a href="/{{Auth::user()->type}}/users/user-profile/{{$a->rspnsblR->id}}">{{$a->rspnsblR->name}} {{$a->rspnsblR->lName}}</a> ha creado la <a href="/{{Auth::user()->type}}/reservations/reservation-detail/{{$a->actRsrvR->id_res}}">Reserva N°{{$a->actRsrvR->id_res}}</a>  a nombre de <a href="/{{Auth::user()->type}}/passengers/passenger-profile/{{$a->invR->id_passenger}}">{{$a->invR->name_1}} {{$a->invR->lName_1}}</a></h3>
                                                                    </div>
                                                                @elseif($a->event == "rsrv_confirmed")
                                                                    <i class="fa fa-check bg-yellow"></i>
                                                                    <div class="timeline-item">
                                                                        @if($d == date('d/m/Y'))
                                                                        <span class="time"><i class="fa fa-clock-o"></i> {{$a->created_at->diffForHumans()}}</span>
                                                                        @else
                                                                        <span class="time"><i class="fa fa-clock-o"></i> {{$a->created_at->format('H:i')}}</span>
                                                                        @endif
                                                                        <h3 class="timeline-header">{{trans('attributes.'.$a->rspnsblR->type)}} <a href="/{{Auth::user()->type}}/users/user-profile/{{$a->rspnsblR->id}}">{{$a->rspnsblR->name}} {{$a->rspnsblR->lName}}</a> ha confirmado manualmente la <a href="/{{Auth::user()->type}}/reservations/reservation-detail/{{$a->actRsrvR->id_res}}">Reserva N°{{$a->actRsrvR->id_res}}</a>  a nombre de <a href="/{{Auth::user()->type}}/passengers/passenger-profile/{{$a->invR->id_passenger}}">{{$a->invR->name_1}} {{$a->invR->lName_1}}</a></h3>
                                                                    </div>
                                                                @elseif($a->event == "checkin")
                                                                    <i class="fa fa-arrow-right bg-blue"></i>
                                                                    <div class="timeline-item">
                                                                        @if($d == date('d/m/Y'))
                                                                        <span class="time"><i class="fa fa-clock-o"></i> {{$a->created_at->diffForHumans()}}</span>
                                                                        @else
                                                                        <span class="time"><i class="fa fa-clock-o"></i> {{$a->created_at->format('H:i')}}</span>
                                                                        @endif
                                                                        <h3 class="timeline-header">{{trans('attributes.'.$a->rspnsblR->type)}} <a href="/{{Auth::user()->type}}/users/user-profile/{{$a->rspnsblR->id}}">{{$a->rspnsblR->name}} {{$a->rspnsblR->lName}}</a> ha validado el Check in de <a href="/{{Auth::user()->type}}/passengers/passenger-profile/{{$a->invR->id_passenger}}">{{$a->invR->name_1}} {{$a->invR->lName_1}}</a> y ha asignado la habitación <a href="/{{Auth::user()->type}}/room-detail/{{$a->actRsrvR->room_id}}">{{trans('attributes.'.$a->actRsrvR->roomType)}} N°{{$a->actRsrvR->room_id}}</a> referente a la <a href="/{{Auth::user()->type}}/reservations/reservation-detail/{{$a->actRsrvR->id_res}}">Reserva N°{{$a->actRsrvR->id_res}}</a></h3>
                                                                    </div> 
                                                                @elseif($a->event == "checkout")
                                                                    <i class="fa fa-arrow-left bg-orange"></i>
                                                                    <div class="timeline-item">
                                                                        @if($d == date('d/m/Y'))
                                                                        <span class="time"><i class="fa fa-clock-o"></i> {{$a->created_at->diffForHumans()}}</span>
                                                                        @else
                                                                        <span class="time"><i class="fa fa-clock-o"></i> {{$a->created_at->format('H:i')}}</span>
                                                                        @endif
                                                                        <h3 class="timeline-header">{{trans('attributes.'.$a->rspnsblR->type)}} <a href="">{{$a->rspnsblR->name}} {{$a->rspnsblR->lName}}</a> ha validado el Check out de <a href="/{{Auth::user()->type}}/passengers/passenger-profile/{{$a->invR->id_passenger}}">{{$a->invR->name_1}} {{$a->invR->lName_1}}</a> referente a la <a href="/{{Auth::user()->type}}/reservations/reservation-detail/{{$a->actRsrvR->id_res}}">Reserva N°{{$a->actRsrvR->id_res}}</a></h3>
                                                                    </div>
                                                                @elseif($a->event == "rsrv_invoice")
                                                                    <i class="fa fa-file-text-o bg-grey"></i>
                                                                    <div class="timeline-item">
                                                                        @if($d == date('d/m/Y'))
                                                                        <span class="time"><i class="fa fa-clock-o"></i> {{$a->created_at->diffForHumans()}}</span>
                                                                        @else
                                                                        <span class="time"><i class="fa fa-clock-o"></i> {{$a->created_at->format('H:i')}}</span>
                                                                        @endif
                                                                        <h3 class="timeline-header">{{trans('attributes.'.$a->rspnsblR->type)}} <a href="">{{$a->rspnsblR->name}} {{$a->rspnsblR->lName}}</a> ha validado la creación y envío del comprobante de pago referente a la <a href="/{{Auth::user()->type}}/reservations/reservation-detail/{{$a->actRsrvR->id_res}}">Reserva N°{{$a->actRsrvR->id_res}}</a></h3>
                                                                    </div>                                                                
                                                                @elseif($a->event == "rsrv_pay")
                                                                    <i class="fa fa-usd bg-purple"></i>
                                                                    <div class="timeline-item">
                                                                        @if($d == date('d/m/Y'))
                                                                        <span class="time"><i class="fa fa-clock-o"></i> {{$a->created_at->diffForHumans()}}</span>
                                                                        @else
                                                                        <span class="time"><i class="fa fa-clock-o"></i> {{$a->created_at->format('H:i')}}</span>
                                                                        @endif
                                                                        <h3 class="timeline-header">{{trans('attributes.'.$a->rspnsblR->type)}} <a href="">{{$a->rspnsblR->name}} {{$a->rspnsblR->lName}}</a> ha validado y recepcionado el pago de la <a href="/{{Auth::user()->type}}/reservations/reservation-detail/{{$a->actRsrvR->id_res}}">Reserva N°{{$a->actRsrvR->id_res}}</a></h3>
                                                                    </div>
                                                                @elseif($a->event == "rsrv_cancelled")
                                                                    <i class="fa fa-times bg-red"></i>
                                                                    <div class="timeline-item">
                                                                        @if($d == date('d/m/Y'))
                                                                        <span class="time"><i class="fa fa-clock-o"></i> {{$a->created_at->diffForHumans()}}</span>
                                                                        @else
                                                                        <span class="time"><i class="fa fa-clock-o"></i> {{$a->created_at->format('H:i')}}</span>
                                                                        @endif
                                                                        <h3 class="timeline-header">{{trans('attributes.'.$a->rspnsblR->type)}} <a href="">{{$a->rspnsblR->name}} {{$a->rspnsblR->lName}}</a> ha validado la cancelación referente a la <a href="/{{Auth::user()->type}}/reservations/reservation-detail/{{$a->actRsrvR->id_res}}">Reserva N°{{$a->actRsrvR->id_res}}</a></h3>
                                                                    </div>
                                                                @elseif($a->event == "testimonial_created")
                                                                    <i class="fa fa-comment bg-teal"></i>
                                                                    <div class="timeline-item">
                                                                        @if($d == date('d/m/Y'))
                                                                        <span class="time"><i class="fa fa-clock-o"></i> {{$a->created_at->diffForHumans()}}</span>
                                                                        @else
                                                                        <span class="time"><i class="fa fa-clock-o"></i> {{$a->created_at->format('H:i')}}</span>
                                                                        @endif
                                                                        <h3 class="timeline-header"><a href="/{{Auth::user()->type}}/passengers/passenger-profile/{{$a->invR->id_passenger}}">{{$a->invR->name_1}} {{$a->invR->lName_1}}</a> ha realizado un testimonio sobre su estadia referente a la <a href="/{{Auth::user()->type}}/reservations/reservation-detail/{{$a->actRsrvR->id_res}}">Reserva N°{{$a->actRsrvR->id_res}}</a>.</h3>
                                                                        <div class="timeline-body">
                                                                            @foreach($tst as $t)
                                                                            @if($t->passenger_id == $a->invR->id_passenger)
                                                                               <blockquote><cite>{{$t->comment}}</cite></blockquote>
                                                                            @endif
                                                                            @endforeach
                                                                        </div>
                                                                        <div class="timeline-footer">
                                                                            <a href="#!" class="btn btn-warning btn-flat btn-xs">ir a la página de testimonios</a>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                                </li>
                                                            @endif
                                                        @endforeach                                                      
                                                    @endforeach
                                                </ul>
                                            @endif
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
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="{{asset('js/sweetalert/sweetalert.min.js')}}"></script>
        <script src="{{asset('datatables/dataTables.bootstrap.min.js')}}"></script>
        <script src="{{asset('responsive-tables/responsivetables.js')}}"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
        <script src="{{asset('js/app2.js')}}"></script>
        <!-- Slimscroll is required when using the fixed layout. -->
<script>

var table = $('#payments').DataTable( {
        "responsive": true,
        "info": false,
        "paging": false,
        "searching": false,
        "ordering": false,
    } );


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

    $('#btn_confirm').on('click',function(e){

        e.preventDefault();

        var id = {{$reserv->id_res}};

        swal({
            title:"Esta seguro?",
            text: "Esta por confirmar esta reserva ",
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
                url: '/admin/reservations/confirm' , //this is different because it can change user type
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
        var iva = document.getElementById("iva").value;
        var discount = document.getElementById("discount").value;
        var IC = document.getElementById("IC").value;
        swal({
            title:"Esta seguro?",
            text: "Esta por emitir un comprobante del cobro asociado a esta reserva",
            type: "warning",
            html: true,
            showCancelButton: true,
            CancelButtonText: "cancelar",
            confirmButtonColor: "#2ECCFA",
            confirmButtonText: "Si, generar",
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
        }, function () {
            $.ajax({
                // En data puedes utilizar un objeto JSON, un array o un query string
               data:{id:id, iva:iva, discount:discount, IC:IC, "_token": "{{ csrf_token() }}"},
                //Cambiar a type: POST si necesario
                type: 'PUT',
                // Formato de datos que se espera en la respuesta
                dataType: "json",
                // URL a la que se enviará la solicitud Ajax
                url: '/admin/reservations/invoice' , //this is different because it can change user type
                success:function(data){
                            if(data.success){
                                swal({
                                    title:"Boleta emitida!!",
                                    text: "Se ha generado la boleta exitosamente, puede revisarla en el menú pagos",
                                    type: "success",
                                    html: true,
                                },function () {
                                    window.location.reload(true);
                                });
                            }else if(data.errors){
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