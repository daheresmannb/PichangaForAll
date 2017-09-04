<?php $__env->startSection('habilidades'); ?>
		<div id="about" class="skills">
			<!-- container -->
			<div class="container">
				<div class="skills-hedding wow bounceIn" data-wow-delay="0.4s">
					<h3>Our skills.</h3>
				</div>
				<div class="col-md-9">
					<div class="col-md-3 skills-grid">
						<div class="circle" id="circles-1"></div>
					</div>
					<div class="col-md-3 skills-grid">
						<div class="circle" id="circles-2"></div>
					</div>
					<div class="col-md-3 skills-grid">
						<div class="circle" id="circles-3"></div>
					</div>
					<div class="col-md-3 skills-grid">
						<div class="circle" id="circles-4"></div>
					</div>
					<div class="clearfix"> </div>
					<!-->
				 <script type="text/javascript" src="js/circles.js"></script>
					         <script>
								var colors = [
										['#FFFFFF', '#42B8DD'], ['#FFFFFF', '#42B8DD'], ['#FFFFFF', '#42B8DD'], ['#FFFFFF', '#42B8DD']
									];
								for (var i = 1; i <= 5; i++) {
									var child = document.getElementById('circles-' + i),
										percentage = 40 + (i * 10);
										
									Circles.create({
										id:         child.id,
										percentage: percentage,
										radius:     80,
										width:      10,
										number:   	percentage / 10,
										text:       '%',
										colors:     colors[i - 1]
									});
								}
						
				</script>
				 -->
					<div class="skills-grid-text">
						<h5 class="plus wow fadeInRight">Something about our skills</h5>
						<p class="wow bounceIn" data-wow-delay="0.4s">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor 
							incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud 
							exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor 
							in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
							Excepteur sint occaecat cupidatat non proident.
						</p>
						<p class="wow bounceIn" data-wow-delay="0.4s">	Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
							totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae 
							dicta.
						</p>
					</div>
				</div>
				<div class="col-md-3">
					<div class="totam">
						<div class="tab1 wow bounceIn" data-wow-delay="0.4s">
							<ul>
								<li><span> </span></li>
								<li class="text">Totam rem aperiam eaque</li>
								<li class="minus">-</li>
							</ul>
							<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.</p>
						</div>
						<div class="tab2 wow bounceIn" data-wow-delay="0.4s">
							<ul>
								<li class="lock"></li>
								<li class="sub-text">Nemo enim ipsam voluptatem</li>
								<li class="char">+</li>
							</ul>
							<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.</p>
						</div>
						<div class="tab3 wow bounceIn" data-wow-delay="0.4s">
							<ul>
								<li class="tower"></li>
								<li class="sub-text">Ut enim ad minima veniam</li>
								<li class="char">+</li>
							</ul>
							<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.</p>
						</div>
						<div class="tab4 wow bounceIn" data-wow-delay="0.4s">
							<ul>
								<li class="phone"></li>
								<li class="sub-text">Quis nostrum exercitationem ullam</li>
								<li class="char">+</li>
							</ul>
							<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.</p>
						</div>
						<div class="tab5 wow bounceIn" data-wow-delay="0.4s">
							<ul>
								<li class="book"></li>
								<li class="sub-text">Neque porro quisquam est qui</li>
								<li class="char">+</li>
							</ul>
							<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.</p>
						</div>
					</div>
					
						<script>
							$(document).ready(function(){
								$(".tab1 p").hide();
								$(".tab2 p").hide();
								$(".tab3 p").hide();
								$(".tab4 p").hide();
								$(".tab5 p").hide();
								$(".tab1 ul").click(function(){
									$(".tab1 p").slideToggle(300);
									$(".tab2 p").hide();
									$(".tab3 p").hide();
									$(".tab4 p").hide();
									$(".tab5 p").hide();
								})
								$(".tab2 ul").click(function(){
									$(".tab2 p").slideToggle(300);
									$(".tab1 p").hide();
									$(".tab3 p").hide();
									$(".tab4 p").hide();
									$(".tab5 p").hide();
								})
								$(".tab3 ul").click(function(){
									$(".tab3 p").slideToggle(300);
									$(".tab4 p").hide();
									$(".tab5 p").hide();
									$(".tab2 p").hide();
									$(".tab1 p").hide();
								})
								$(".tab4 ul").click(function(){
									$(".tab4 p").slideToggle(300);
									$(".tab3 p").hide();
									$(".tab2 p").hide();
									$(".tab1 p").hide();
									$(".tab5 p").hide();
								})
								$(".tab5 ul").click(function(){
									$(".tab5 p").slideToggle(300);
									$(".tab4 p").hide();
									$(".tab3 p").hide();
									$(".tab2 p").hide();
									$(".tab1 p").hide();
									
								})
								
							});
						</script>
						<!-- script -->
				</div>
				<div class="clearfix"> </div>
			</div>
			<!-- container -->
		</div>
				<div class="skills-middle">
			<!-- container -->
			<div class="container">
				<div class="skills-middle-text">
					<form>
						<input type="text" class="text plus wow fadeInLeft" value="Enter your e-mail here..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter your e-mail here...';}">
						<input type="submit" class="text plus wow fadeInRight" value="Subscribe">
					</form>
					<div class="clearfix"> </div>
				</div>
			</div>
			<!-- container -->
		</div>
		<!-- skills-middle -->
		<!-- skills-bottom -->
		<div class="skills-bottom">
			<!-- container -->
			<div class="container">
				<div class="skills-images wow bounceIn" data-wow-delay="0.4s">
					<div class="envato"><img src="images/envato.png" alt="" /></div>
					<div class="envato"><img src="images/word.png" alt="" /></div>
					<div class="envato"><img src="images/dribble.png" alt="" /></div>
					<div class="envato"><img src="images/envato.png" alt="" /></div>
					<div class="envato"><img src="images/word.png" alt="" /></div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<!-- container -->
		</div>
<?php $__env->stopSection(); ?>