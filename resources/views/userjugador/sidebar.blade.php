

@section('sidebar')
{!! Html::script('assets/js/jquery-3.2.1.js'); !!}

<script type="text/javascript">
        $(document).ready(
        function(e) {
         //$('#content').load('/gmaps');
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
                '#mapli', 
                function(e) {
                    e.preventDefault();
                    $('#contenido').load('/gmaps');
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
                        <p>Perfil</p>
                    </a>
                </li>
                <li id="mapli" class="">
                    <a href="#">
                        <i class="ti-map"></i>
                        <p>Jugadores Cercanos</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>
@endsection