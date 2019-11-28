<?php echo $header; ?>
<body>

<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<?php echo $this->session->flashdata('verify_msg'); ?>
	</div>
</div>
		<!-- start: page -->
		<section class="body-sign">
			<div class="center-sign">
				<a href="https://preview.oklerthemes.com/" class="logo float-left">
					<img src="<?php echo base_url() ?>assets/img/logo.png" height="54" alt="Porto Admin" />
				</a>

				<div class="panel card-sign">
					<div class="card-title-sign mt-3 text-right">
						<h2 class="title text-uppercase font-weight-bold m-0"><i class="fas fa-user mr-1"></i> Sign Up</h2>
					</div>
					<div class="card-body">
					<?php $attributes = array("name" => "registrationform");
						echo form_open("welcome/register", $attributes);?>
							<div class="form-group mb-3">
								<label>First Name</label>
								<input class="form-control" name="fname" placeholder="Your First Name" type="text" value="<?php echo set_value('fname'); ?>" />
								<span class="text-danger"><?php echo form_error('fname'); ?></span>
							</div>

							<div class="form-group mb-3">
								<label>Last Name</label>
								<input class="form-control" name="lname" placeholder="Last Name" type="text" value="<?php echo set_value('lname'); ?>" />
								<span class="text-danger"><?php echo form_error('lname'); ?></span>
							</div>

							<div class="form-group mb-3">
								<label>E-mail Address</label>
								<input class="form-control" name="email" placeholder="Email-ID" type="text" value="<?php echo set_value('email'); ?>" />
								<span class="text-danger"><?php echo form_error('email'); ?></span>
							</div>

							<div class="form-group mb-0">
								<div class="row">
									<div class="col-sm-6 mb-3">
										<label>Password</label>
										<input class="form-control" name="password" placeholder="Password" type="password" />
										<span class="text-danger"><?php echo form_error('password'); ?></span>
									</div>
									<div class="col-sm-6 mb-3">
										<label>Password Confirmation</label>
										<input class="form-control" name="cpassword" placeholder="Confirm Password" type="password" />
										<span class="text-danger"><?php echo form_error('cpassword'); ?></span>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-8">
									<div class="checkbox-custom checkbox-default">
										<input id="AgreeTerms" name="agreeterms" type="checkbox"/>
										<label for="AgreeTerms">I agree with <a href="#">terms of use</a></label>
									</div>
								</div>
								<div class="col-sm-4 text-right">
								<button name="submit" type="submit" class="btn btn-default">Signup</button>
								<button name="cancel" type="reset" class="btn btn-default">Cancel</button>
								</div>
								<?php echo form_close(); ?>
								<?php echo $this->session->flashdata('msg'); ?>
							</div>

							<span class="mt-3 mb-3 line-thru text-center text-uppercase">
								<span>or</span>
							</span>

							<div class="mb-1 text-center">
								<a class="btn btn-facebook mb-3 ml-1 mr-1" href="#">Connect with <i class="fab fa-facebook-f"></i></a>
								<a class="btn btn-twitter mb-3 ml-1 mr-1" href="#">Connect with <i class="fab fa-twitter"></i></a>
							</div>

							<p class="text-center">Already have an account? <a href="<?php echo base_url() ?>welcome/login">Sign In!</a></p>
					</div>
				</div>

				<p class="text-center text-muted mt-3 mb-3">&copy; Copyright 2017. All Rights Reserved.</p>
			</div>
		</section>
		<!-- end: page -->

		<?php echo $footer; ?>