
<?php echo $header; ?>

<!-- BREADCRUMB -->
<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="<?php echo $baseurl ?>">Home</a></li>
			</ul>
		</div>
	</div>
<!-- /BREADCRUMB -->

	
	<!-- HOME -->
	<div id="home">
		<!-- container -->
		<div class='container'>
			<!-- home wrap -->
			<div class="">
				<!-- home slick -->
				<div id="home-slick">
					<!-- banner -->
					<div class="banner banner-1">
						<img src="<?php echo $baseurl ?>assets/img/banner001.png" alt="">
						<!-- <div class="banner-caption text-center">
							<h1>Bags sale</h1>
							<h3 class="primary-color">Up to 50% Discount</h3>
							<button class="primary-btn">Shop Now</button>
						</div> -->
					</div>
					<!-- /banner -->

					<!-- banner -->
					<div class="banner banner-1">
						<img src="<?php echo $baseurl ?>assets/img/banner001.png" alt="">
						<!-- <div class="banner-caption">
							<h1 class="primary-color">HOT DEAL<br><span class="white-color font-weak">Up to 50% OFF</span></h1>
							<button class="primary-btn">Shop Now</button>
						</div> -->
					</div>
					<!-- /banner -->

					<!-- banner -->
					<div class="banner banner-1">
						<img src="<?php echo $baseurl ?>assets/img/banner001.png" alt="">
						<!-- <div class="banner-caption">
							<h1 class="primary color">New Product <span>Collection</span></h1>
							<button class="primary-btn">Shop Now</button>
						</div> -->
					</div>
					<!-- /banner -->
				</div>
				<!-- /home slick -->
			</div>
			<!-- /home wrap -->
		</div>
		<!-- /container -->
	</div>
	<!-- /HOME -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section-title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Popular</h2>
						<div class="pull-right">
							<div class="product-slick-dots-1 custom-dots"></div>
						</div>
					</div>
				</div>
				<!-- /section-title -->

				<!-- banner -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="banner banner-2">
						<img src="<?php echo $baseurl ?>/uploads/proc.png" alt="">
						<!-- <div class="banner-caption">
							<h2 class="white-color">NEW<br>COLLECTION</h2>
							<button class="primary-btn">Shop Now</button>
						</div> -->
					</div>
				</div>
				<!-- /banner -->

				<!-- Product Slick -->
				<div class="col-md-9 col-sm-6 col-xs-6">
					<div class="row">
						<div id="product-slick-1" class="product-slick">
							<!-- Product Single -->
							<?php foreach($cpu as $p) {?>
							<div class="product product-single">
								<div class="product-thumb">
									<div class="product-label">
										<!-- <span>New</span>
										<span class="sale">-20%</span> -->
									</div>
									<!-- <ul class="product-countdown">
										<li><span>00 H</span></li>
										<li><span>00 M</span></li>
										<li><span>00 S</span></li>
									</ul> -->
									<!-- <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button> -->
									<img src="<?php echo $baseurl ?>/uploads/cpu/<?php echo $p->path ?>" alt="">
								</div>
								<div class="product-body">
									<h3 class="product-price"><?php echo $p->price.'TK' ?> <del class="product-old-price"></del></h3>
									<div class="product-rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-o empty"></i>
									</div>
									<h2 class="product-name"><a href="<?php echo $baseurl ?>product-page/cpu/<?php echo $p->ID ?>"><?php echo $p->name ?></a></h2>
									<div class="product-btns">
										<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
										<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
										<!-- <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button> -->
									</div>
								</div>
							</div>
							<?php } ?>
							<!-- /Product Single -->

							<!-- Product Single -->
							<?php foreach($gpu as $p) {?>
							<div class="product product-single">
								<div class="product-thumb">
									<div class="product-label">
										<!-- <span>New</span>
										<span class="sale">-20%</span> -->
									</div>
									<!-- <ul class="product-countdown">
										<li><span>00 H</span></li>
										<li><span>00 M</span></li>
										<li><span>00 S</span></li>
									</ul> -->
									<!-- <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button> -->
									<img src="<?php echo $baseurl ?>/uploads/gpu/<?php echo $p->path ?>" alt="">
								</div>
								<div class="product-body">
									<h3 class="product-price"><?php echo $p->price.'TK' ?> <del class="product-old-price"></del></h3>
									<div class="product-rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-o empty"></i>
									</div>
									<h2 class="product-name"><a href="<?php echo $baseurl ?>product-page/gpu/<?php echo $p->ID ?>"><?php echo $p->name ?></a></h2>
									<div class="product-btns">
										<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
										<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
										<!-- <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button> -->
									</div>
								</div>
							</div>
							<?php } ?>
							<!-- /Product Single -->

						</div>
					</div>
				</div>
				<!-- /Product Slick -->
			</div>
			<!-- /row -->
		</div>
	</div>
<!-- /section -->


<!-- section -->
<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section-title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">New Collections</h2>
						<div class="pull-right">
							<div class="product-slick-dots-2 custom-dots"></div>
						</div>
					</div>
				</div>
				<!-- /section-title -->

				<!-- banner -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="banner banner-2">
						<img src="<?php echo $baseurl ?>/uploads/proc.png" alt="">
						<!-- <div class="banner-caption">
							<h2 class="white-color">NEW<br>COLLECTION</h2>
							<button class="primary-btn">Shop Now</button>
						</div> -->
					</div>
				</div>
				<!-- /banner -->

				<!-- Product Slick -->
				<div class="col-md-9 col-sm-6 col-xs-6">
					<div class="row">
						<div id="product-slick-2" class="product-slick">
							<!-- Product Single -->
							<?php foreach($hdd as $p) {?>
							<div class="product product-single">
								<div class="product-thumb">
									<div class="product-label">
										<!-- <span>New</span>
										<span class="sale">-20%</span> -->
									</div>
									<!-- <ul class="product-countdown">
										<li><span>00 H</span></li>
										<li><span>00 M</span></li>
										<li><span>00 S</span></li>
									</ul> -->
									<!-- <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button> -->
									<img src="<?php echo $baseurl ?>/uploads/hdd/<?php echo $p->path ?>" alt="">
								</div>
								<div class="product-body">
									<h3 class="product-price"><?php echo $p->price.'TK' ?> <del class="product-old-price"></del></h3>
									<div class="product-rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-o empty"></i>
									</div>
									<h2 class="product-name"><a href="<?php echo $baseurl ?>product-page/hdd/<?php echo $p->ID ?>"><?php echo $p->name ?></a></h2>
									<div class="product-btns">
										<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
										<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
										<!-- <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button> -->
									</div>
								</div>
							</div>
							<?php } ?>
							<!-- /Product Single -->
						</div>
					</div>
				</div>
				<!-- /Product Slick -->
			</div>
			<!-- /row -->
		</div>
	</div>
<!-- /section -->

<?php echo $footer; ?>