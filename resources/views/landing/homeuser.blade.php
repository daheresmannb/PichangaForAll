@extends('layouts.app')
@extends('funcionesjs')
@section('content')
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

<div>
    <a href="{{ url('/signout') }}">Cerrar sesion</a>
</div>

<div class="container">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://bootswatch.com/cosmo/bootstrap.min.css">
<div class="mainbody container-fluid">
    <div class="row">
        <div class="navbar-wrapper">
            <div class="container-fluid">
                <div class="navbar navbar-default navbar-static-top" role="navigation">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span><span
                                    class="icon-bar"></span><span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" style="margin-right:-8px; margin-top:-5px;">
                                <img alt="Brand" href="#"src="https://lut.im/7trApsDX08/GeilMRp1FIm4f2p7.png" width="30px" height="30px">
                            </a>
                            <a class="navbar-brand" href="#">PichangaForAll</a>
                        </div>
                        <div class="navbar-collapse collapse">
                            <ul class="nav navbar-nav">
                                <li><a href="#">Mis Eventos</a></li>
                                <li><a href="#">Invitaciones<i class="fa fa-bell-o fa-lg" aria-hidden="true"></i></a></li>
                                <li><span class="badge badge-important">2</span></li>
                                <li><a href="#">Crear Evento</a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span class="user-avatar pull-left" style="margin-right:8px; margin-top:-5px;">
                                        <img src="https://lut.im/7JCpw12uUT/mY0Mb78SvSIcjvkf.png" class="img-responsive img-circle" title="John Doe" alt="John Doe" width="30px" height="30px">
                                    </span>
                                    <span class="user-name">
                                        @if (!Auth::guest())
                                            {{ Auth::user()->name }}
                                        @endif
                                    </span>
                                    <!--
                                    <script> 
                                    $(function () {
                                      $('[data-toggle="tooltip"]').tooltip()
                                    })

                                    $(function () {
                                      $('[data-toggle="popover"]').popover()
                                    })
                                    </script>
                                    -->
                                    <ul class="dropdown-menu">
                                        <li>
                                            <div class="navbar-content">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <img src="https://lut.im/7JCpw12uUT/mY0Mb78SvSIcjvkf.png" alt="Alternate Text" class="img-responsive" width="120px" height="120px" />
                                                        <p class="text-center small">
                                                            <a href="./3X6zm">Change Photo</a></p>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <span>John Doe</span>
                                                        <p class="text-muted small">
                                                            example@pods.tld</p>
                                                        <div class="divider">
                                                        </div>
                                                        <a href="./56ExR" class="btn btn-default btn-xs"><i class="fa fa-user-o" aria-hidden="true"></i> Profile</a>
                                                        <a href="#" class="btn btn-default btn-xs"><i class="fa fa-address-card-o" aria-hidden="true"></i> Contacts</a>
                                                        <a href="#" class="btn btn-default btn-xs"><i class="fa fa-cogs" aria-hidden="true"></i> Settings</a>
                                                        <a href="#" class="btn btn-default btn-xs"><i class="fa fa-question-circle-o" aria-hidden="true"></i> Help!</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="navbar-footer">
                                                <div class="navbar-footer-content">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <a href="#" class="btn btn-default btn-sm"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Change Passowrd</a>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <a href="#" class="btn btn-default btn-sm pull-right"><i class="fa fa-power-off" aria-hidden="true"></i> Sign Out</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>    
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- panel izquierdo perfil -->
        <div style="padding-top:50px;"> </div>
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
@endsection
