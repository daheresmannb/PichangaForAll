
@section('portafolio')
		<div id="portfolio" class="works">
			<!-- container -->
			<div class="container">
				<div class="works-hedding wow bounceIn" data-wow-delay="0.4s">
					<h3>Our works.</h3>
				</div>
				<ul id="filters">
					<li><span class="filter active wow bounceIn" data-wow-delay="0.4s"" data-filter="app card icon logo web">All</span></li>
					<li><span class="filter wow bounceIn" data-wow-delay="0.4s"" data-filter="app">Website</span></li>
					<li><span class="filter wow bounceIn" data-wow-delay="0.4s"" data-filter="card">Branding</span></li>
				</ul>
				<div id="portfoliolist">
					<div class="portfolio card mix_all" data-cat="card" style="display: inline-block; opacity: 1;">
						<div class="portfolio-wrapper wow bounceIn" data-wow-delay="0.4s">		
							<a href="#small-dialog" class="b-link-stripe b-animate-go">
						     <img src="images/ball.png" alt="" /><div class="b-wrapper"><h2 class="b-animate b-from-left    b-delay03 ">NAME PREJECT</h2>
							 <p class="b-animate b-from-left    b-delay03 ">designed by Authour | May 23, 2014</p>
						  	</div></a>
		                </div>
					</div>				
					<div class="portfolio app mix_all" data-cat="app" style="display: inline-block; opacity: 1;">
						<div class="portfolio-wrapper wow bounceIn" data-wow-delay="0.4s">		
							<a href="#small-dialog1" class="b-link-stripe b-animate-go">
						     <img src="images/hokey.png" alt="" /><div class="b-wrapper"><h2 class="b-animate b-from-left    b-delay03 ">NAME PREJECT</h2>
							 <p class="b-animate b-from-left    b-delay03 ">designed by Authour | May 23, 2014</p>
						  	</div></a>
		                </div>
					</div>		
					<div class="portfolio card mix_all" data-cat="card" style="display: inline-block; opacity: 1;">
						<div class="portfolio-wrapper wow bounceIn" data-wow-delay="0.4s">		
							<a href="#small-dialog2" class="b-link-stripe b-animate-go">
						     <img src="images/Football.png" alt="" /><div class="b-wrapper"><h2 class="b-animate b-from-left    b-delay03 ">NAME PREJECT</h2>
							 <p class="b-animate b-from-left b-delay03" id="para">designed by Authour | May 23, 2014</p>
						  	</div></a>
		                </div>
					</div>				
					<div class="portfolio app mix_all" data-cat="app" style="display: inline-block; opacity: 1;">
						<div class="portfolio-wrapper wow bounceIn" data-wow-delay="0.4s">		
							<a href="#small-dialog3" class="b-link-stripe b-animate-go">
						     <img src="images/Football1.png" alt="" /><div class="b-wrapper"><h2 class="b-animate b-from-left    b-delay03 ">NAME PREJECT</h2>
							 <p class="b-animate b-from-left    b-delay03 ">designed by Authour | May 23, 2014</p>
						  	</div></a>
		                </div>
					</div>	
					<div class="portfolio card mix_all" data-cat="card" style="display: inline-block; opacity: 1;">
						<div class="portfolio-wrapper wow bounceIn" data-wow-delay="0.4s">		
							<a href="#small-dialog4" class="b-link-stripe b-animate-go">
						     <img src="images/Icc.png" alt="" /><div class="b-wrapper"><h2 class="b-animate b-from-left    b-delay03 ">NAME PREJECT</h2>
							 <p class="b-animate b-from-left    b-delay03 ">designed by Authour | May 23, 2014</p>
						  	</div></a>
		                </div>
					</div>			
					<div class="portfolio app mix_all" data-cat="app" style="display: inline-block; opacity: 1;">
						<div class="portfolio-wrapper wow bounceIn" data-wow-delay="0.4s">		
							<a href="#small-dialog5" class="b-link-stripe b-animate-go">
						     <img src="images/ball1.png" alt="" /><div class="b-wrapper"><h2 class="b-animate b-from-left    b-delay03 ">NAME PREJECT</h2>
							 <p class="b-animate b-from-left    b-delay03 ">designed by Authour | May 23, 2014</p>
						  	</div></a>
		                </div>
					</div>
					<div class="clearfix"></div>	
				</div>
				<!-- Script for gallery Here -->
				<script type="text/javascript" src="js/jquery.mixitup.min.js"></script>
					<script type="text/javascript">
					$(function () {
						
						var filterList = {
						
							init: function () {
							
								// MixItUp plugin
								// http://mixitup.io
								$('#portfoliolist').mixitup({
									targetSelector: '.portfolio',
									filterSelector: '.filter',
									effects: ['fade'],
									easing: 'snap',
									// call the hover effect
									onMixEnd: filterList.hoverEffect()
								});				
							
							},
							
							hoverEffect: function () {
							
								// Simple parallax effect
								$('#portfoliolist .portfolio').hover(
									function () {
										$(this).find('.label').stop().animate({bottom: 0}, 200, 'easeOutQuad');
										$(this).find('img').stop().animate({top: -30}, 500, 'easeOutQuad');				
									},
									function () {
										$(this).find('.label').stop().animate({bottom: -40}, 200, 'easeInQuad');
										$(this).find('img').stop().animate({top: 0}, 300, 'easeOutQuad');								
									}		
								);				
							
							}
				
						};
						
						// Run the show!
						filterList.init();	
					});	
					</script>
			<!-- Gallery Script Ends -->
				<div class="clearfix"></div>
				<div class="plus wow fadeInLeft"> 
					<a href="#"><img src="images/plus.png" alt="" /></a>
				</div>
			</div>
			<!-- container -->
		</div>

		<div class="work-bottom">
			<!-- container -->
			<div class="container">
			<!-- banner Slider starts Here -->
	  			<script src="js/responsiveslides.min.js"></script>
			 <script>
			    // You can also use "$(window).load(function() {"
			    $(function () {
			      // Slideshow 4
			      $("#slider4").responsiveSlides({
			        auto: true,
			        pager: true,
			        nav: false,
			        speed: 500,
			        namespace: "callbacks",
			        before: function () {
			          $('.events').append("<li>before event fired.</li>");
			        },
			        after: function () {
			          $('.events').append("<li>after event fired.</li>");
			        }
			      });
			
			    });
			  </script>
			<!--//End-slider-script-->
				<div  id="top" class="callbacks_container">
			      <ul class="rslides" id="slider4">
			        <li>
			          <div class="slider-top wow bounceIn" data-wow-delay="0.4s">
			          	<p>"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiamvoluptatem."</p>
			          	<img src="images/user2.png" alt="" />
						<p class="title">Jack Efron</p>
			          </div>
			        </li>
			        <li>
			          <div class="slider-top wow bounceIn" data-wow-delay="0.4s">
			          	<p>"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiamvoluptatem."</p>
			          	<img src="images/user.png" alt="" />
						<p class="title">Jack Efron</p>
			          </div>
			        </li>
			        <li>
			          <div class="slider-top wow bounceIn" data-wow-delay="0.4s">
			          	<p>"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiamvoluptatem."</p>
			          	<img src="images/user1.png" alt="" />
						<p class="title">Jack Efron</p>
			          </div>
			        </li>
			      </ul>
			    </div>
			    <div class="clearfix"> </div>
	  			<!-- banner Slider Ends Here --> 
			</div>
			<!-- container -->
		</div>
@endsection