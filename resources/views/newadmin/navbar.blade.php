

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

            $('#nav').on(
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

            $('#nav').on(
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
            $('#nav').on(
                'click',
                '#recin',
                function(e) {
                    e.preventDefault();
                    $('#content').empty();
                    $('#content').load(
                        "<?php echo url('recintos'); ?>"
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
        <li id="userli" class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="#">
            <i class="ti-user"></i>
            <span class="nav-link-text">Mi Perfil</span>
          </a>
        </li>
        <li id="mapli" class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="#">
            <i class="ti-map"></i>
            <span class="nav-link-text">Jugadores Cercanos</span>
          </a>
        </li>
        <li id="partli" class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="#">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Partidos</span>
          </a>
        </li>
        <li id="usonline" class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="#">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Jugadores en linea</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Example Pages</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
            <li>
              <a href="login.html">Login Page</a>
            </li>
            <li>
              <a href="register.html">Registration Page</a>
            </li>
            <li>
              <a href="forgot-password.html">Forgot Password Page</a>
            </li>
            <li>
              <a href="blank.html">Blank Page</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-sitemap"></i>
            <span class="nav-link-text">Menu Levels</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti">
            <li>
              <a href="#">Second Level Item</a>
            </li>
            <li>
              <a href="#">Second Level Item</a>
            </li>
            <li>
              <a href="#">Second Level Item</a>
            </li>
            <li>
              <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti2">Third Level</a>
              <ul class="sidenav-third-level collapse" id="collapseMulti2">
                <li>
                  <a href="#">Third Level Item</a>
                </li>
                <li>
                  <a href="#">Third Level Item</a>
                </li>
                <li>
                  <a href="#">Third Level Item</a>
                </li>
              </ul>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="#">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">Link</span>
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
            <i class="fa fa-fw fa-envelope"></i>
            <span class="d-lg-none">Messages
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
