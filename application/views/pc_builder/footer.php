



    	<!-- FOOTER -->
	<footer id="footer" class="section section-grey">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<!-- footer logo -->
						<div class="footer-logo">
							<a class="logo" href="#">
		            <img src="<?php echo $baseurl ?>assets//img/logo.png" alt="">
		          </a>
						</div>
						<!-- /footer logo -->

						<p>You can buy , build your PC with us, we will suggest you what to buy with which cpu. What goes better for you. If you don't know what to do give the responsiblity to us. Happy Customer, Happy Us. You order we deliver.</p>
					</div>
				</div>
				<!-- /footer widget -->

				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">My Account</h3>
						<ul class="list-links">
							<li><a href="<?php echo $baseurl. "history" ?>"><i class="fas fa-history"></i> History</a></li>
							<li><a href="#"><i class="far fa-smile-beam"></i> My Wishlist</a></li>
							<li><a href="#"><i class="fas fa-exchange-alt"></i> Compare</a></li>
							<li><a href="https://mrrobi.tech/checkout"><i class="fas fa-credit-card"></i> Checkout</a></li>
							<?php if($this->session->userdata("logged_in")!=true) { ?>
                                    <li><a href="<?php echo $baseurl ?>logSign" class="text-uppercase"><i class="fas fa-sign-in-alt"></i> Signin</a>
                                    </li>
									<li><a href="<?php echo $baseurl ?>welcome/regi" class="text-uppercase"><i class="fas fa-user-plus"></i> Signup</a>
                                    </li>
									<?php }else{?>
                                	<li><a href="<?php echo $baseurl ?>welcome\ses_clear" class="text-uppercase"><i
									class='fas fa-sign-out-alt'></i> Logout</a></li>
							<?php } ?>
						</ul>
					</div>
				</div>
				<!-- /footer widget -->

				<div class="clearfix visible-sm visible-xs"></div>

				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">Customer Service</h3>
						<ul class="list-links">
							<li><a href="#"><i class="far fa-address-card"></i> About Us</a></li>
							<li><a href="#"><i class="fas fa-truck"></i> Shiping & Return</a></li>
							<li><a href="#"><i class="fas fa-info-circle"></i> Shiping Guide</a></li>
							<li><a href="#"><i class="fas fa-info-circle"></i> FAQ</a></li>
						</ul>
					</div>
				</div>
				<!-- /footer widget -->

				<!-- footer subscribe -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">Stay Connected</h3>
						<p>Subscribe for our latest offer and news.</p>
						<form>
							<div class="form-group">
								<input class="input" placeholder="Enter Email Address">
							</div>
							<button class="primary-btn">Join Newslatter</button>
						</form>
					</div>
				</div>
				<!-- /footer subscribe -->
			</div>
			<!-- /row -->
			<hr>
			<!-- row -->
			<!-- row -->
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<!-- footer copyright -->
					<div class="footer-copyright">
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						&copy;<script>document.write(new Date().getFullYear());</script> Beta PC All rights reserved
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</div>
					<!-- /footer copyright -->
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</footer>
	<!-- /FOOTER -->

	<!-- jQuery Plugins -->
	<script src="<?php echo base_url(); ?>/assets/js/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>/assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>/assets/js/slick.min.js"></script>
	<script src="<?php echo base_url(); ?>/assets/js/nouislider.min.js"></script>
	<script src="<?php echo base_url(); ?>/assets/js/jquery.zoom.min.js"></script>
	<script src="<?php echo base_url(); ?>/assets/js/main.js"></script>

</body>

</html>