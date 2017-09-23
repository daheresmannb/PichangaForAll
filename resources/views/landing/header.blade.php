@section('header')
		<div id="home" class="heder">
			<!-- container -->
			<div class="container">
				<div class="header-top">
					<div class="heder-logo">
						<h1><a href="#">  <div class="logo"> PichangaForAll </div> </a></h1>
					</div>
					<div class="top-nav">
					<span class="menu">
						{!! Html::image('assets/img/menu.png', 'alt') !!}
					</span>
						<ul class="nav1">
							<li><a class="scroll" href="#home">Home</a></li>
							<li><a class="scroll" href="#services">Servicios</a></li>
							<li><a class="scroll" href="#portfolio">Portfolio</a></li>
							<li><a class="scroll" href="#about">Acerca</a></li>
							<li style=""><a class="scroll" href="#contact">Contacto</a></li>
							
							<li>
								<a href="{{ url('/login') }}" class="Signup" >
									iniciar
								</a>

							<a class="Signup2 play-icon popup-with-zoom-anim" 
								href="{{url('/registro')}}" 
							>registrar</a></li>
							
						</ul>
						<!-- script-for-menu -->
							 <script>
							   $( "span.menu" ).click(function() {
								 $( "ul.nav1" ).slideToggle( 300, function() {
								 // Animation complete.
								  });
								 });
							</script>
						<!-- /script-for-menu -->
					</div>
					<div class="clearfix"> 


					</div>
				</div>
			</div>
			<!-- container -->
		</div>
@endsection