<?php $__env->startSection('header'); ?>
		<div id="home" class="heder">
			<!-- container -->
			<div class="container">
				<div class="header-top">
					<div class="heder-logo">
						<h1><a href="#">PichangaForAll</a></h1>
					</div>
					<div class="top-nav">
					<span class="menu">
						<?php echo Html::image('assets/img/menu.png', 'alt'); ?>

					</span>
						<ul class="nav1">
							<li><a class="scroll" href="#home">Home</a></li>
							<li><a class="scroll" href="#services">Servicios</a></li>
							<li><a class="scroll" href="#portfolio">Portfolio</a></li>
							<li><a class="scroll" href="#about">Acerca</a></li>
							<li style=""><a class="scroll" href="#contact">Coontactontact</a></li>
							
							<li><a class="Signup play-icon popup-with-zoom-anim" href="#small-dialog2">iniciar</a>

							<a class="Signup play-icon popup-with-zoom-anim" href="#small-dialog2">registrar</a></li>
							
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
<?php $__env->stopSection(); ?>