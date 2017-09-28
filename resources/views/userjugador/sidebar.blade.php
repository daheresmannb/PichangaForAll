@section('sidebar')
{!! Html::script('assets/js/jquery-3.2.1.js'); !!}
<script type="text/javascript">
    $(document).ready(
        function(e) {
            $('#nav').on(
                'click', 
                'li', 
                function(e) {
                    e.preventDefault();
                    $('#nav li.active').removeClass('active');
                    $(this).addClass('active');
                }
            );

            $('#nav').on(
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

            $('#nav').on(
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

            $('#nav').on(
                'click', 
                '#partli', 
                function(e) {
                    e.preventDefault();
                    $('#content').empty();
                    $('#content').load(
                        "<?php echo url('jugadorescercanos'); ?>"
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
        }
    );
</script>
	<div class="sidebar"  data-active-color="danger">
    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    PichangaForAll
                    <i class="fa fa-futbol-o" aria-hidden="true"></i>
                </a>
            </div>
            <ul class="nav" id="nav">
                <li id="userli" class="active">
                    <a href="#">
                        <i class="ti-user"></i>
                        <p>Mi Perfil</p>
                    </a>
                </li>
                <li id="infouser" class="active">
                    <a href="#">
                        <i class="ti-user"></i>
                        <p>Info user</p>
                    </a>
                </li>                
                <li id="mapli" class="">
                    <a href="#">
                        <i class="ti-map"></i>
                        <p>Jugadores Cercanos</p>
                    </a>
                </li>
                <li id="mapli" class="">
                    <a href="#">
                        <i class="ti-map"></i>
                        <p>Jinfocanos</p>
                    </a>
                <li id="partli" class="">
                    <a href="#">
                        <i class="ti-map"></i>
                        <p>Partidos</p>
                    </a>
                </li>
                <li id="torli" class="">
                    <a href="#">
                        <i class="ti-map"></i>
                        <p>torneos </p>
                    </a>
                </li>
                

            </ul>
    	</div>
    </div>
@endsection