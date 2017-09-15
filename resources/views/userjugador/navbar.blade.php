@section('navbar')
<nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                    	@if (!Auth::guest())
                            Bienvenido {{ Auth::user()->name }}
                    	@endif
                    </a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="{{ url('/signout') }}">
                                <i class="ti-power-off"></i>
                                <p>Cerrar</p>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
@endsection