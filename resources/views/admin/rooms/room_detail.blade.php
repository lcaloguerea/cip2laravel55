@include('layout.header')

        <link rel="stylesheet" href="{{asset('pickadate/themes/default.css')}}">
        <link rel="stylesheet" href="{{asset('pickadate/themes/default-date.css')}}">
        <!-- Icons -->
        <link href="{{asset('icons/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('icons/themify-icons/themify-icons.css')}}" rel="stylesheet">
        <!--animate css-->
        <link rel="stylesheet" href="{{asset('animate.css')}}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('css/main-style.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/skins/all-skins.css')}}">
        
        <link href="{{asset('pickadate.js-3.5.6/lib/themes/default.css')}}" rel="stylesheet">
        <link href="{{asset('pickadate.js-3.5.6/lib/themes/default.date.css')}}" rel="stylesheet">




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
    <body class="skin-yellow sidebar-mini">
        <div class="page-loader-wrapper">
            <div class="spinner"></div>
        </div>
        <div class="wrapper">
            <!-- Main Header -->
            @include('layout.top_menu_header')
            <!-- Left side column. contains the logo and sidebar -->
            @include('layout.sidebar_left')
            <!-- Content Wrapper -->
            <div class="content-wrapper">
                <section class="content">
                    <div class="row">
                        <div class="col-md-4">
                            <!-- Widget: user widget style 1 -->
                            <div class="box box-widget widget-user">
                                <!-- Add the bg color to the header using any of the bg-* classes -->

									<div class="box-body">
                                    <img class="img-responsive pad" src="{{asset('img/single.png')}}" alt="Photo">
                            		</div>

                            </div>
                            <!-- /.widget-user -->
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Información</h3>
                                    <a href="#" class=" btn-box-tool pull-right" data-widget="collapse"><i class="fa fa-plus"></i></a>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <strong>Tipo</strong><p>{{trans('attributes.'.$room->type)}}</p>
                                    @if($room->status == "free")
                                        <strong>Estado</strong><p><span class="badge bg-green">{{trans('attributes.'.$room->status)}}</span></p>
                                    @elseif($room->status == "occupied")
                                        <strong>Estado</strong><p><span class="badge bg-blue">{{trans('attributes.'.$room->status)}}</span></p>
                                    @else
                                        <strong>Estado</strong><p><span class="badge bg-red">{{trans('attributes.'.$room->status)}}</span></p>
                                    @endif
                                </div>
                                <div class="box-footer">
                                    <strong>Limpieza</strong>
                                    <address>
                                        @if($room->sanitization == "done")
                                            <span class="badge bg-green">Al día</span>
                                        @else
                                        <button id="sanitization" type="button" class="btn btn-danger btn-block">
                                            Pendiente
                                        </button>
                                        @endif
                                    </address>
                                </div>

                                @if($room->status == "free")
                                    <div class="box">
                                        <div class="box-body">
                                            <button id="btn_locked" type="button" class="btn btn-raised ripple-effect btn-block btn-danger">Bloquear habitación</button>
                                        </div>
                                    </div> 
                                @elseif($room->status == "locked")
                                    <div class="box">
                                        <div class="box-body">
                                            <button id="btn_unlocked" type="button" class="btn btn-raised ripple-effect btn-block btn-info">Desbloquear habitación</button>
                                        </div>
                                    </div>
                                @endif
                                        
                                <!-- /.box-body -->
                            </div>

                        </div>
                        <div class="col-md-8">
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab_1" data-toggle="tab">Actividad</a></li>
                                    <li><a href="#tab_2" data-toggle="tab">Historial</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1" style="overflow-y: scroll; height: 510px">
                                            @if($rAct->count() == 0)
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

                                                        @foreach($rAct as $a)
                                                            @if($a->created_at->format('d/m/Y') == $d)
                                                                <li>
                                                                @if($a->event == "room_locked")
                                                                    <i class="fa fa-lock bg-black"></i>
                                                                    <div class="timeline-item">
                                                                        @if($d == date('d/m/Y'))
                                                                        <span class="time"><i class="fa fa-clock-o"></i> {{$a->created_at->diffForHumans()}}</span>
                                                                        @else
                                                                        <span class="time"><i class="fa fa-clock-o"></i> {{$a->created_at->format('H:i')}}</span>
                                                                        @endif
                                                                        <h3 class="timeline-header">{{trans('attributes.'.$a->rspnsblR->type)}} <a href="/{{Auth::user()->type}}/users/user-profile/{{$a->rspnsblR->id}}">{{$a->rspnsblR->name}} {{$a->rspnsblR->lName}}</a> ha bloqueado la habitación con la siguiente justificación:</h3>
                                                                        <div class="timeline-body">
                                                                            <blockquote><cite>{{$a->motive}}</cite></blockquote>
                                                                        </div>
                                                                    </div>
                                                                @elseif($a->event == "room_unlocked")
                                                                    <i class="fa fa-unlock bg-green"></i>
                                                                    <div class="timeline-item">
                                                                        @if($d == date('d/m/Y'))
                                                                        <span class="time"><i class="fa fa-clock-o"></i> {{$a->created_at->diffForHumans()}}</span>
                                                                        @else
                                                                        <span class="time"><i class="fa fa-clock-o"></i> {{$a->created_at->format('H:i')}}</span>
                                                                        @endif
                                                                        <h3 class="timeline-header">{{trans('attributes.'.$a->rspnsblR->type)}} <a href="/{{Auth::user()->type}}/users/user-profile/{{$a->rspnsblR->id}}">{{$a->rspnsblR->name}} {{$a->rspnsblR->lName}}</a> ha desbloqueado la habitación con la siguiente justificación:</h3>
                                                                        <div class="timeline-body">
                                                                            <blockquote><cite>{{$a->motive}}</cite></blockquote>
                                                                        </div>
                                                                    </div>
                                                                @elseif($a->event == "room_cleaned")
                                                                    <i class="fa fa-paint-brush bg-blue"></i>
                                                                    <div class="timeline-item">
                                                                        @if($d == date('d/m/Y'))
                                                                        <span class="time"><i class="fa fa-clock-o"></i> {{$a->created_at->diffForHumans()}}</span>
                                                                        @else
                                                                        <span class="time"><i class="fa fa-clock-o"></i> {{$a->created_at->format('H:i')}}</span>
                                                                        @endif
                                                                        <h3 class="timeline-header">{{trans('attributes.'.$a->rspnsblR->type)}} <a href="/{{Auth::user()->type}}/users/user-profile/{{$a->rspnsblR->id}}">{{$a->rspnsblR->name}} {{$a->rspnsblR->lName}}</a> ha realizado y validado la limpieza de la habitación</h3>
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
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="tab_2">
                                        <div class="box box-form no-shadow">
                                            <!-- /.box-header -->
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                </div>
                                <div class="box-body">
                                    <table id="payments" class="table responsive">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Usuario</th>
                                                <th>Huésped(es)</th>
                                                <th>Estado</th>
                                                <th>Check In</th>
                                                <th>Check Out</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($Rsrvs as $item)
                                            <tr class="disabled">
                                                <td><a href="#">{{$item->id_res}}</a></td>
                                                <td><a href="/{{Auth::user()->type}}/users/user-profile/{{$item->userR->id}}">{{$item->userR->name}} {{$item->userR->lName}}</a></td>
                                                <td>
                                                @foreach($pGroups as $pg)
                                                    @if($pg->reservation_id == $item->id_res)
                                                        <li><a href="passenger-profile/{{$pg->passengersR[0]->id_passenger}}">{{$pg->passengersR[0]->name_1}} {{$pg->passengersR[0]->lName_1}}</a></li>
                                                    @endif
                                                @endforeach
                                                </td>
                                                <td>
                                                    @if($item->status == "started")
                                                        <span class="badge bg-green">Iniciada</span>
                                                    @elseif($item->status == "cancelled")
                                                        <span class="badge bg-red">Cancelada</span>
                                                    @elseif($item->status == "waiting")
                                                        <span class="badge bg-yellow">En espera</span>
                                                    @elseif($item->status == "finished")
                                                        <span class="badge bg-blue">Finalizada</span>
                                                    @endif
                                                </td>
                                                <td>{{date('d-m-Y', strtotime($item->check_in))}}</td>
                                                <td>{{date('d-m-Y', strtotime($item->check_out))}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                                            <!-- /.box-body -->
                                        </div>
                                    </div>
                                </div>
                                <!-- /.tab-content -->
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
        <script src="{{asset('material-buttons/ripple-effects.js')}}"></script>

        <script src="{{asset('js/swal2.js')}}"></script>

        <script src="{{asset('js/app2.js')}}"></script>
        <!-- Slimscroll is required when using the fixed layout. -->
    </body>
</html>

<style type="text/css">
 
.swal2-popup {
  font-size: 1.6rem !important;
}    

.swal2-actions {
  z-index: 0;
}

.swal2-progress-steps .swal2-progress-step {
  z-index: 0;
}

.swal2-progress-steps .swal2-progress-step-line {
  z-index: 0;
}

</style>

<script type="text/javascript">
    
    $(document).ready(function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
     

    $('#btn_locked').on('click',function(e){

        var id = {{$room->id_room}};

        Swal.fire({
            title: 'Bloquear habitación',
            text: "Si está seguro(a) de esta operación ingrese a continuación el motivo del bloqueo",
            input: "textarea",
            imageUrl: '/img/icons/lock.png',
            imageWidth: 100,
            imageHeight: 100,
            imageAlt: 'locked',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Si, bloqueala!'
        }).then((result) => {
            if (result.value) {
                if(result.value.length >= 5){
                    console.log(result.value);
                    var motive = result.value;
                    //swal.showLoading();
                    $.ajax({
                        // En data puedes utilizar un objeto JSON, un array o un query string
                        data:{id:id, motive:motive, "_token": "{{ csrf_token() }}"},
                        //Cambiar a type: POST si necesario
                        type: 'POST',
                        // Formato de datos que se espera en la respuesta
                        dataType: "json",
                        // URL a la que se enviará la solicitud Ajax
                        url: '/admin/room-locked' , //this is different because it can change user type
                        success:function(data){
                            Swal.fire({
                                title:"Actualizado!!",
                                html: "<strong>"+data.message+"</strong>",
                                type: "success",
                            }).then((result) => {
                                window.location.reload(true);
                            });
                        }
                    });
                }else{
                    console.log(result)
                    Swal.fire({
                        title:'Muy corto',
                        text:'Debe ingresar un motivo que sea representativo (Mínimo 5 caracteres).',
                        confirmButtonText:'Cerrar',
                        type:'error'
                    })
                }
            }else{
                if(result.dismiss){
                    console.log(result)
                    Swal.fire({
                        title:'Cancelado',
                        text:'Has cancelado el bloqueo de habitación.',
                        confirmButtonText:'Cerrar',
                        type:'error'
                    })
                }else if(result.value.length == 0){
                    Swal.fire({
                        title:'Vacio',
                        text:'No ha ingresado motivo, favor corregir (Mínimo 5 caracteres).',
                        confirmButtonText:'Cerrar',
                        type:'error'
                    })
                }
            }
        })
    });


        $('#btn_unlocked').on('click',function(e){

        var id = {{$room->id_room}};

        Swal.fire({
            title: 'Desbloquear habitación',
            text: "Si está seguro(a) de esta operación ingrese a continuación el motivo por el cual desbloqueará esta habitación",
            input: "textarea",
            imageUrl: '/img/icons/unlocked.ico',
            imageWidth: 100,
            imageHeight: 100,
            imageAlt: 'unlocked',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Si, desbloqueala!'
        }).then((result) => {
            if (result.value) {
                if(result.value.length >= 5){
                    console.log(result.value);
                    var motive = result.value;
                    //swal.showLoading();
                    $.ajax({
                        // En data puedes utilizar un objeto JSON, un array o un query string
                        data:{id:id, motive:motive, "_token": "{{ csrf_token() }}"},
                        //Cambiar a type: POST si necesario
                        type: 'POST',
                        // Formato de datos que se espera en la respuesta
                        dataType: "json",
                        // URL a la que se enviará la solicitud Ajax
                        url: '/admin/room-unlocked' , //this is different because it can change user type
                        success:function(data){
                            Swal.fire({
                                title:"Actualizado!!",
                                html: "<strong>"+data.message+"</strong>",
                                type: "success",
                            }).then((result) => {
                                window.location.reload(true);
                            });
                        }
                    });
                }else{
                    console.log(result)
                    Swal.fire({
                        title:'Muy corto',
                        text:'Debe ingresar un motivo que sea representativo (Mínimo 5 caracteres).',
                        confirmButtonText:'Cerrar',
                        type:'error'
                    })
                }
            }else{
                if(result.dismiss){
                    console.log(result)
                    Swal.fire({
                        title:'Cancelado',
                        text:'Has cancelado el desbloqueo de habitación.',
                        confirmButtonText:'Cerrar',
                        type:'error'
                    })
                }else if(result.value.length == 0){
                    Swal.fire({
                        title:'Vacio',
                        text:'No ha ingresado motivo, favor corregir (Mínimo 5 caracteres).',
                        confirmButtonText:'Cerrar',
                        type:'error'
                    })
                }
            }
        })
    });

        $('#sanitization').on('click',function(e){

        e.preventDefault();

        var id = {{$room->id_room}};

        Swal.fire({
            title:"Esta seguro(a)?",
            text: "Esta apunto de validar la limpieza de esta habitación, esto se registrará vinculandolo(a) a esta acción",
            type: "warning",
            showCancelButton: true,
            CancelButtonText: "cancelar",
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    // En data puedes utilizar un objeto JSON, un array o un query string
                   data:{id:id, "_token": "{{ csrf_token() }}"},
                    //Cambiar a type: POST si necesario
                    type: 'POST',
                    // Formato de datos que se espera en la respuesta
                    dataType: "json",
                    // URL a la que se enviará la solicitud Ajax
                    url: '/admin/room-sanitization' , //this is different because it can change user type
                    success:function(data){
                            Swal.fire({
                                title:"Actualizado!!",
                                html: ""+data.message+"",
                                type: "success",
                            }).then((result) => {
                            window.location.reload(true);
                        });
                    }
                });
            }else{
                Swal.fire(
                'Cancelado',
                'No se ha completado la validación de la limpieza de esta habitación',
                'error'
           )
          }
        })
    });

});

</script>