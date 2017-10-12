@section('header')
		<div id="home" class="heder" style="padding-left: 40px;">
		<div class="heder-logo">
			<h1>
				<a href="#">  
					<div class="logo"> 
						PichangaForAll 
				
						{!! Html::image('pelotalogo.png', 'alt') !!}
					</div> 
					
				</a>
			</h1>

		</div>
		<div class="top-nav" style="padding-right: 25px; padding-bottom: 25px; padding-top: 25px;">
					<span class="menu">
						{!! Html::image('assets/img/menu.png', 'alt') !!}
					</span>
						<ul class="nav1">
							<li><a class="scroll" href="#home">Home</a></li>
							<li><a class="scroll" href="#services">Servicios</a></li>
							<li><a class="scroll" href="#about">Acerca</a></li>
							<li style=""><a class="scroll" href="#contact">Contacto</a></li>
							<li>
								<a href="{{ url('/login') }}" class="Signup" >
									iniciar
								</a>
							</li>
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
		
			<!-- container -->
		</div>
@endsection