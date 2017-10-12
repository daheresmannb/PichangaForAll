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
<!--calendario-->
    {!!!Html::script('assets/js/bootstrap-datetimepicker.js')!!}
    {!!Html::script('assets/js/bootstrap-datetimepicker.min.js')!!}



</head>

<!-- inicio modal-->
               
                <div  class="modal face" id="creartorneo" tabindex="1" role="dialog" aria-labelledby="creartorneo" aria-hidden="true">
                    <div class="modal-dialog" role="documen">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title"> Crear Torneo</h4>   
                            </div> <!-- fin modal-header-->
                            <div class="modal-body">
                                <label>seleccione recinto</label>
                                <select class="custom-select">
                                     <option selected>recinto</option>
                                        <option value="1">quilas</option>
                                        <option value="2">pueblo nuevo</option>
                                        <option value="3">cautin</option>
                                </select>
                                <br>
                                <label>fecha</label>
                                    <input size="16" type="text" readonly class="form_datetime">
                                        
                                        <script type="text/javascript">
                                    $(".form_datetime").datetimepicker({format: 'yyyy-mm-dd hh:ii'});
                                        </script> 
                             <!--   <input type="text" name="fehca"> -->


                               <!-- <input type="text" name="fecha">-->
                                <br>
                                <label>numero de equipos</label>
                                <input type="text" name="numero">

                            </div> <!-- fin del modal-body-->
                            <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">cancelar</button>
                            <button type="button" class="btn btn-primary">crear evento</button>  </div>

                        </div>
                    </div>
                </div>
                    <!-- fin modal -->
<body>
    <div class=”container”>
    @yield('sidebar')
    <div class="wrapper">
   
        <div class="main-panel" >
            
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
    {!! Html::script('admin/assets/js/bootstrap.min.js'); !!}
    {!! Html::script('admin/assets/js/chartist.min.js'); !!}
    {!! Html::script('admin/assets/js/bootstrap-notify.js'); !!}
    {!! Html::script('admin/assets/js/paper-dashboard.js'); !!}
</body>
</html>