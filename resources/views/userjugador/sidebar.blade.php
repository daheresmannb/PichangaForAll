@section('sidebar')
	<div class="sidebar"  data-active-color="danger">
    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    PichangaForAll
                    <i class="fa fa-futbol-o" aria-hidden="true"></i>
                </a>
            </div>

            <ul class="nav">

                <li id="per" class="active">
                    <a href="user.html">
                        <i class="ti-user"></i>
                        <p>Perfil</p>
                    </a>
                </li>
                <li>
                    <a id="map" href="#">
                        <i class="ti-map"></i>
                        <p>Jugadores Cercanos</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>
@endsection