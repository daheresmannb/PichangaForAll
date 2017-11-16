@section('navbar')
{!! Html::script('assets/js/jquery-3.2.1.js'); !!}
<script type="text/javascript">
    $(document).ready(
        function(e) {
          $("#messagesDropdown").click(
            function () {
              $.ajax({
                    type: 'POST',
                    url:  "<?php echo url('amigo/solicitudes/pendientes'); ?>",
                    headers: {
                      'X-CSRF-TOKEN': "<?php echo csrf_token(); ?>"
                    },
                    data: {
                      _token: "<?php echo csrf_token(); ?>",
                      id: "<?php echo Auth::user()->id; ?>"
                    },
                    success: function(data) {
                      console.log(data);
                      $("#solicitudes").empty();
                      for (var i = data.respuesta.length - 1; i >= 0; i--) {
                				var nombre = data.respuesta[i].user.name;
                        $("#solicitudes").append(
                          "<div class='dropdown-item'><strong>"+nombre+"</strong><span class='small float-right text-muted'>11:21 AM</span><div class='dropdown-message small' style='padding-left: 20%; padding-right: 20%;'><button value='"+data.respuesta[i].user.id+"' onclick='AceptarSolicitud(value)' type='button' class='btn btn-primary btn-xs btn-block'> Aceptar </button></div> </div>"
                        );
                      }
                    },
                    error: function(xhr, textStatus, thrownError) {
                      console.log(thrownError +"error "+ textStatus);
                    }
                });
            }
          );

          $('#content').empty();
          $('#content').load(
            "<?php echo url('homeuser'); ?>"
          );
          $('#userli').addClass('active');

            $('#exampleAccordion').on(
                'click',
                'li',
                function(e) {
                    e.preventDefault();
                    $('#exampleAccordion li.active').removeClass('active');
                    $(this).addClass('active');
                }
            );

            $('#exampleAccordion').on(
                'click',
                '#userli',
                function(e) {
                    e.preventDefault();
                    $('#content').empty();
                    $('#content').load(
                        "<?php echo url('homeuser'); ?>"
                    );
                }
            );

            $('#exampleAccordion').on(
                'click',
                '#mapli',
                function(e) {
                    e.preventDefault();
                    $('#content').empty();
                    $('#content').load(  ///nombre ruta
                        "<?php echo url('jugadorescercanos'); ?>"
                    );
                }
            );

            $('#exampleAccordion').on(
                'click',
                '#partli',
                function(e) {
                    e.preventDefault();
                    $('#content').empty();
                    $('#content').load(
                        "<?php echo url('crearpartido'); ?>"
                    );
                }
            );

            $('#exampleAccordion').on(
                'click',
                '#torli',
                function(e) {
                    e.preventDefault();
                    $('#content').empty();
                    $('#content').load(
                        "<?php echo url('creacapeonato'); ?>"
                    );
                }
            );

            $('#exampleAccordion').on(
                'click',
                '#infouser',
                function(e) {
                    e.preventDefault();
                    $('#content').empty();
                    $('#content').load(
                        "<?php echo url('infouser'); ?>"
                    );
                }
            );
            $('#exampleAccordion').on(
                'click',
                '#recint',
                function(e) {
                    e.preventDefault();
                    $('#content').empty();
                    $('#content').load(
                        "<?php echo url('recintos'); ?>"
                    );
                }
            );

            $("#msgs").click(
                function (e) {
                  e.preventDefault();
                  $('#content').empty();
                  $('#content').load(
                      "<?php echo url('messages'); ?>"
                  );
                }
            );

            $("#crearmsg").click(
                function (e) {
                  e.preventDefault();
                  $('#content').empty();
                  $('#content').load(
                      "<?php echo url('messages/create'); ?>"
                  );
                }
            );

            $('#exampleAccordion').on(
                'click',
                '#usonline',
                function(e) {
                    e.preventDefault();
                    $('#content').empty();
                    $('#content').load(
                        "<?php echo url('usonline'); ?>"
                    );
                }
            );
        }
    );
    function AceptarSolicitud(amigoid) {
              $.ajax({
                    type: 'POST',
                    url:  "<?php echo url('amigo/solicitud/aceptar'); ?>",
                    headers: {
                      'X-CSRF-TOKEN': "<?php echo csrf_token(); ?>"
                    },
                    data: {
                      _token: "<?php echo csrf_token(); ?>",
                      id: "<?php echo Auth::user()->id; ?>",
                      amigo_id: amigoid
                    },
                    success: function(data) {
                      console.log(data);
                      $("#solicitudes").empty();
                    },
                    error: function(xhr, textStatus, thrownError) {
                      console.log(thrownError +"error "+ textStatus);
                    }
                });
    }
</script>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">PichangaForAll</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">



        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="ti-user"></i>
            <span class="nav-link-text">Mi Perfil</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
            <li>
              <a id="userli">Ver Perfil</a>
            </li>
            <li>
              <a id="infouser">Informacion usuario</a>
            </li>

          </ul>
        </li>

       <li id="mapli" class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="#">
            <i class="ti-map"></i>
            <span class="nav-link-text">Jugadores Cercanos</span>
          </a>
        </li>

        <li id="usonline" class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="#">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Jugadores en linea</span>
          </a>
        </li>
         <li id="partli" class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="#">
            <i class="fa fa-fw fa-futbol-o"></i>
            <span class="nav-link-text">Partidos</span>
          </a>
        </li>
       <li id="torli" class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="#">
            <i class="fa fa-fw fa-sitemap"></i>
            <span class="nav-link-text">torneos</span>
          </a>
        </li>

          <li id="recint" class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="#">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Recintos</span>
          </a>
        </li>


      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-users"></i>
            <span class="d-lg-none">solicitudes Pendientes
              <span class="badge badge-pill badge-primary">12 New</span>
            </span>
            <span class="indicator text-primary d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="messagesDropdown" style="min-width: 300px;">
            <div id="solicitudes" class="">

            </div>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">Mostrar todos</a>
          </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="chat" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-envelope"></i>
            <span class="d-lg-none">mensajes
              <span class="badge badge-pill badge-primary">12 New</span>
            </span>
            <span class="indicator text-primary d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="messagesDropdown" style="min-width: 300px;">
            <div align="center">
                <a id="crearmsg" href="#">enviar mensaje</a>
            </div>
            <div class="dropdown-divider"></div>
            <a id="msgs" class="dropdown-item small" href="#">Mostrar todos</a>
          </div>
        </li>

        <li>
          <a href="">
            @if (!Auth::guest())
              {{ Auth::user()->name }}
            @endif
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell"></i>
            <span class="d-lg-none">Alerts
              <span class="badge badge-pill badge-warning">6 New</span>
            </span>
            <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">New Alerts:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-danger">
                <strong>
                  <i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all alerts</a>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Cerrar</a>
        </li>
      </ul>
    </div>
  </nav>
@endsection
