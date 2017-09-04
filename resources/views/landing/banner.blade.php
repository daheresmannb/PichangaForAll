@section('banner')
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
					{!! HTML::script('assets/js/modernizr.custom.min.js'); !!}
					{!! Html::style('assets/css/popuo-box.css'); !!}
					{!! HTML::script('assets/js/jquery.magnific-popup.js'); !!}
					
					<!--//pop-up-box -->
				<div id="small-dialog" class="mfp-hide">
					<iframe src="//player.vimeo.com/video/38584262"  frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen> </iframe>
				</div>
				<div id="small-dialog2" class="mfp-hide">
					<div class="signup">
				
							
					
					</div>
				</div>
			</div>
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
@endsection