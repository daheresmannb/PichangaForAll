
@extends('funcionesjs')
@if(session('respuesta'))
    <?php 
        $resp = session('respuesta');
    ?>
    <script type="text/javascript">
        $(document).ready(

            function(e) {
                InfoModal(
                    "Respuesta",
                    "<?php echo $resp['msg'];?>"
                );
            }
        );
    </script>
@endif
<style>
       #contus {
        height: 370px;
        width: 100%;
       }
</style>

<div id="contus" class="container">
  <div class="mainbody container-fluid">
    <div class="row">
        <div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="media">
                        <div align="center">
                            <img class="thumbnail img-responsive" src="https://lut.im/7JCpw12uUT/mY0Mb78SvSIcjvkf.png" width="300px" height="300px">
                        </div>

                        <div class="media-body">
                            <hr>
                            <h3><strong>Perfil</strong></h3>
                            <hr>
                            <p>Nombre</p>
                            <p>Apellido</p>
                            <hr>
                            <h3><strong>Historial</strong></h3>
                            <hr>
                            <p>Partidos asistidos: 21</p>
                            <p>Partidos faltados:  2</p>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
           


            <!-- ejemplo post -->
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="pull-left">
                        <a href="#">
                            <img class="media-object img-circle" src="http://files.elamorporeducar.webnode.cl/200000014-7ef0d7fec1/uct.png" width="50px" height="50px" style="margin-right:8px; margin-top:-5px;">
                        </a>
                    </div>
                    <h4><a href="#" style="text-decoration:none;"><strong>Universidad Católica de Temuco</strong></a> – <small><small><a href="#" style="text-decoration:none; color:grey;"><i><i class="fa fa-clock-o" aria-hidden="true"></i>  Publicado 23 de agosto </i></a></small></small></h4>
               
                    <hr>
                    <div class="post-content">
                        <p>Campeonato UCT.</p>
                        <p>participa en el campeonato organizado por la universidad católica de Temuco el sábado 9 de septiembre en dependencias de la universidad campus san juan Pablo segundo.</p>
                    </div>
                    <hr>
                    <div>
                        <div class="pull-right btn-group-xs">
                            <a class="btn btn-default btn-xs"></i> Saber mas </a>
                            <a class="btn btn-default btn-xs"></i> Asistir </a>
                        </div>

                        <br>
                    </div>
                    
                </div>
            </div>

            <!-- ejemplo post -->
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="pull-left">
                        <a href="#">
                            <img class="media-object img-circle" src="https://www.leylobby.gob.cl/img/logos/Municipalidad%20de%20Temuco_logo.jpg" width="50px" height="50px" style="margin-right:8px; margin-top:-5px;">
                        </a>
                    </div>
                    <h4><a href="#" style="text-decoration:none;"><strong>Municipalidad de Temuco</strong></a> – <small><small><a href="#" style="text-decoration:none; color:grey;"><i><i class="fa fa-clock-o" aria-hidden="true"></i>  Publicado 10 de agosto </i></a></small></small></h4>
            
                    <hr>
                    <div class="post-content">
                        <p>Campeonato municipal Temuco.</p>
                        <p>participa en el campeonato organizado por la municipalidad de Temuco el sábado 9 de septiembre en el gimnasio municipal.</p>
                    </div>
                    <hr>
                    <div>
                        <div class="pull-right btn-group-xs">
                            <a class="btn btn-default btn-xs"></i> Saber mas </a>
                            <a class="btn btn-default btn-xs"></i> Asistir </a>
                        </div>

                        <br>
                    </div>
                    
                </div>
            </div>    


        </div>
    </div>
</div>
    <!--
<script type="application/x-javascript"> 
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })

    $(function () {
      $('[data-toggle="popover"]').popover()
    })
</script>
    -->
    <!--
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"></div>

                <div class="panel-body">
                    @if (!Auth::guest())
                        <h2>
                            Bienvenido {{ Auth::user()->name }}
                        </h2>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
    -->
