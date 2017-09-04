@section('contacto')
<div id="contact" class="contact">
			<!-- container -->
			<div class="container">
				<div class="contact-hedding wow bounceIn" data-wow-delay="0.4s">
					<h3>Contact us.</h3>
				</div>
				<p class="wow bounceIn" data-wow-delay="0.4s">123A Building, Road Street, Orlando District, US
					<span>+01 234 567 89 - +01 234 567 89 | contact@book.com</span>
				</p>
				<div class="social-icons wow bounceIn" data-wow-delay="0.4s">
					<ul>
						<li class="twit"></li>
						<li class="fb"></li>
						<li class="google"></li>
						<li class="pinterest"></li>
						<li class="rect"></li>
						<li class="youtube"></li>
						<li class="skip"></li>
						<li class="dribbble"></li>
					</ul>
				</div>
				<div class="col-md-8 text-fields">
					<div class="text-fields-left">
						<div class="text-field-email">
							<form>
								<input type="text" class="text" value="EMAIL" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'EMAIL';}">
							</form>
							<div class="msg-img"></div>
						</div>
						<div class="text-field-name">
							<form>
								<input type="text" class="text" value="NAME" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'NAME';}">
							</form>
							<div class="user-img"></div>
						</div>
						<div class="clearfix"> </div>
						<div class="text-field-area wow fadeInLeft">
							<form>
								<textarea value="MESSAGE:" onfocus="if(this.value == 'MESSAGE') this.value='';" onblur="if(this.value == '') this.value='MESSAGE';">MESSAGE</textarea>
							</form>
							<div class="pen-img"></div>
						</div>
					</div>
				</div>
				<div class="col-md-4 text-fields">
					<div class="text-fields-right wow fadeInRight">
						<form>
							<input type="submit" value="Submit">
						</form>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<!-- container -->
		</div>
@endsection