<!doctype html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>PichangaForAll</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    {!! Html::style('assets/css/bootstrap.min.css'); !!}
    {!! Html::style('assets/css/bootstrap.css'); !!}
    {!! Html::script('assets/js/jquery-3.2.1.js'); !!}
    {!! Html::script('assets/js/bootstrap.min.js'); !!}

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>﻿
    {!! Html::style('admin/assets/css/animate.min.css'); !!}
    {!! Html::style('admin/assets/css/paper-dashboard.css'); !!}
    {!! Html::style('admin/assets/css/font-awesome.min.css'); !!}
    {!! Html::style('admin/assets/css/font1.css'); !!}
    {!! Html::style('admin/assets/css/themify-icons.css'); !!}
    {!! Html::script('assets/js/jquery.min.js'); !!}         

<!--datepicker-->
{!!Html::style('assets/css/jquery.datetimepicker.min.css'); !!}
{!!Html::script('assets/js/jquery.datetimepicker.full.js'); !!}

   <script type="text/javascript">
$(document).ready(
    function() {
        $("#listrecinto").change(
            function () {
                $("#recinto_id").val(
                    $('#listrecinto').find(":selected").val()
                );
                $("#recinto_id:text").val(
                    $('#listrecinto').find(":selected").val()
                );
            }
        );
        $.ajax({
            type: 'POST',
            url:  "<?php echo url('recinto/obtener'); ?>",
            headers: {
                'X-CSRF-TOKEN': "<?php echo csrf_token(); ?>"
            },
            data: { 
                _token: {
                    'X-CSRF-TOKEN': "<?php echo csrf_token(); ?>"
                }
            },      
            success: function(data) {
                console.log(data.respuesta);
                $("#listrecinto").empty();
                for (var i = data.respuesta.length - 1; i >= 0; i--) {
                    $("#listrecinto").append(
                        "<option value='"+data.respuesta[i].id+"'>"+ data.respuesta[i].nombre +"</option>"
                    );
                }           
            },
            error: function(xhr, textStatus, thrownError) {
                console.log(thrownError +"error "+ textStatus);
            }
        });
    }
);
</script>


</head>

<body>
<!-- inicio modal-->
              <div  class="modal face" id="creartorneo" tabindex="1" role="dialog" aria-labelledby="creartorneo" aria-hidden="true">
                    <div class="modal-dialog" role="documen">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title"> Crear Torneo</h4>   
                            </div> <!-- fin modal-header-->
                            <div class="modal-body">
{!! Form::open(['route' => array('torneo.crear', ), 'autocomplete' => 'off']) !!}

                                
    <label class="col-md-6 col">seleccione recinto</label>
    <select class="selectpicker" id="listrecinto" name="nombre">
        <option value="0">waaa</option>
    </select>

                                <span class="help-block"></span> 
                                <div class="form-horizontal row" >
                                    <label class="col-md-6 col">fecha y hora de inicio</label>
                                    <input id="partidotime" name="inicio" class="col-md-6 col">
                                </div>
                                <span class="help-block"></span>
                                <div class="form-horizontal row">
                                    <label class="col-md-6 col">fecha y hora de termino</label>
                                    <input id="partidotime2" name="termino" class="col-md-6 col">
                                    <script>
                                        $("#partidotime").datetimepicker({
                                            autoclose: true
                                        });
                                    $("#partidotime2").datetimepicker({
                                      autoclose: true
                                    });
                                    </script>
                                </div>
                                <span class="help-block"></span>
                                 <div class="form-horizontal row">
                            <label class="col-md-6 col">numero de jugadores</label>
                             <input type="number" name="numjugadores" min="2" max="12" step="1"  required="required" class="col-md-6 col">
                            </div>
                            </div> <!-- fin del modal-body-->
                            <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">crear torneo</button>
                           {!! Form::close() !!}
                            </div>

                        </div>
                    </div>
                </div> 
   {!!Html::script('assets/js/bootsrap-select.js'); !!}
    @yield('funcionesjs')
    <div class="wrapper">
        @yield('sidebar')
        <div class="main-panel">
            @yield('navbar')
            <div id="content" class="content">
                    @yield('contenido')
                    @yield('busquedajugador')
                    @yield('infouser')
                    @yield('crearpartido')
                    @yield('creacapeonato')

            </div>
        </div>
    </div>
    
<div id="fade" class="overlay"></div>
<div id="light" class="modal">
    <div id="cabeza">
       <button type="button" id="cerrar" class="close" aria-hidden="true">&times;</button> 
    </div>
    <div id="cuerpo">
          
        <h1>Datos del Jugador</h1>
    </div>   
    <div id="fondo">
        <button id="">ver perfil</button> 
    </div>
</div>

<script type="text/javascript">
    $(document).ready(
        function(e) {
            $("#cerrar").click(
                function(e) {
                    document.getElementById('light2').style.display='none';
                    document.getElementById('fade2').style.display='none';
                }
            );
        }
    );
</script>
<div id="fade2" class="overlay"></div>
    <div id="light2" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 id="titulomodal" class="modal-title"></h4>
                </div>
                <div id="textmodal" class="modal-body  justify-content-center" >
                </div> 
                <div class="modal-footer">
                    <button id='confirma-del' value='' class='btn btn-danger'>Confirmar</button>
                    <button id="confirmamodal" type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>  
        </div>
    </div>
    </div>

    {!! Html::script('assets/js/jquery-3.2.1.js'); !!}
    {!! Html::script('admin/assets/js/chartist.min.js'); !!}
    {!! Html::script('admin/assets/js/bootstrap-notify.js'); !!}
    {!! Html::script('admin/assets/js/paper-dashboard.js'); !!}


<style type="text/css">
    body {
        margin-top: 0%;
        padding-top: 0%;
    }
</style>
</body>
</html>