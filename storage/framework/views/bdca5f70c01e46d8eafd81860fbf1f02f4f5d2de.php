<?php $__env->startSection('banner'); ?>
		<div class="banner">
			<!-- container -->
			<div class="container">
				<div class="banner-info wow bounceIn" data-wow-delay="0.4s">
					<a class="play-icon popup-with-zoom-anim" href="#small-dialog">
						<span> </span>
					</a>
					<div class="banner-text">
						<h2>Organiza tus partidos de fútbol</h2>
						<p><a class="play-icon popup-with-zoom-anim" href="#small-dialog">Click para ver el video</a></p>
					</div>
					<!-- pop-up-box -->
					<?php echo HTML::script('assets/js/modernizr.custom.min.js');; ?>

					<?php echo Html::style('assets/css/popuo-box.css');; ?>

					<?php echo HTML::script('assets/js/jquery.magnific-popup.js');; ?>

					
					<!--//pop-up-box -->
				<div id="small-dialog" class="mfp-hide">
					<iframe src="//player.vimeo.com/video/38584262"  frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen> </iframe>
				</div>
				<div id="small-dialog2" class="mfp-hide">
					<div class="signup">
						<h3>Sign Up</h3>
						<h4>Please Enter Your Details</h4>
						<input type="text" value="First Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'First Name';}" />
						<input type="text" value="Second Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Second Name';}" />
						<input type="text" class="email"value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}"  />
						<input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}"/>
						<input type="submit"  value="Sign Up"/>
					</div>
				</div>	
				 <script>
						$(document).ready(function() {
						$('.popup-with-zoom-anim').magnificPopup({
							type: 'inline',
							fixedContentPos: false,
							fixedBgPos: true,
							overflowY: 'auto',
							closeBtnInside: true,
							preloader: false,
							midClick: true,
							removalDelay: 300,
							mainClass: 'my-mfp-zoom-in'
						});
																						
						});
				</script>				
				</div>
			</div>
			<!-- container -->
		</div>
<?php $__env->stopSection(); ?>