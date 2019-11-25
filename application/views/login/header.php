<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>PC Builder: Your PC our responsibility</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="<?php echo $baseurl ?>assets/css/bootstrap.min.css" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="<?php echo $baseurl ?>assets/css/slick.css" />
	<link type="text/css" rel="stylesheet" href="<?php echo $baseurl ?>assets/css/slick-theme.css" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="<?php echo $baseurl ?>assets/css/nouislider.min.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="<?php echo $baseurl ?>assets/css/style.css" />


	<link rel="stylesheet" type="text/css" href="<?php echo $baseurl ?>assets/lcss/demo.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $baseurl ?>assets/lcss/style3.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $baseurl ?>assets/lcss/animate-custom.css" />

    <link href="<?php echo $baseurl ?>assets/catalog/view/theme/koyla/stylesheet/stylesheet.min.41.css" rel="stylesheet">
    <link href="<?php echo $baseurl ?>assets/catalog/view/theme/koyla/stylesheet/pc-builder30f4.css?v=3" type="text/css" rel="stylesheet" media="screen" /> 
       
    <script type="text/javascript">var app={popupDuration: 6, onReady:function(d,a,e,f,t){a=Array.isArray(a)?a:[a];t=t||2E3;for(var g=!0,b=d,c=0;c<a.length;c++){var h=a[c];if("undefined"==typeof b[h]){g=!1;break}b=b[h]}g?e():f&&setTimeout(function(){app.onReady(d,a,e,--f)},t)}};</script>
    <script async src="<?php echo $baseurl ?>assets/catalog/view/theme/koyla/javascript/site.min.41.js" type="text/javascript"></script>
    <script async src="<?php echo $baseurl ?>assets/js/html2canvas.min.js" type="text/javascript"></script>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
        <script src="<?php echo $baseurl ?>assets/js/listing.min.3.js"></script>
</head>

<body>
	<!-- HEADER -->
	<header>
		<!-- top Header -->
		<!-- <div id="top-header">
			<div class="container">
				<div class="pull-left">
					<span>Welcome to E-shop!</span>
				</div>
				<div class="pull-right">
					<ul class="header-top-links">
						<li><a href="#">Store</a></li>
						<li><a href="#">Newsletter</a></li>
						<li><a href="#">FAQ</a></li>
						<li class="dropdown default-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">ENG <i class="fa fa-caret-down"></i></a>
							<ul class="custom-menu">
								<li><a href="#">English (ENG)</a></li>
								<li><a href="#">Russian (Ru)</a></li>
								<li><a href="#">French (FR)</a></li>
								<li><a href="#">Spanish (Es)</a></li>
							</ul>
						</li>
						<li class="dropdown default-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">USD <i class="fa fa-caret-down"></i></a>
							<ul class="custom-menu">
								<li><a href="#">USD ($)</a></li>
								<li><a href="#">EUR (€)</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div> -->
		<!-- /top Header -->

		<!-- header -->
		<div id="header">
			<div class="container">
				<div class="pull-left">
					<!-- Logo -->
					<div class="header-logo">
						<a class="logo" href="<?php echo $baseurl ?>">
							<img src="<?php echo $baseurl ?>assets/img/logo.png" alt="">
						</a>
					</div>
					<!-- /Logo -->

					<!-- Search -->
					<!-- <div class="header-search">
						<form>
							<input class="input search-input" type="text" placeholder="Enter your keyword">
							<select class="input search-categories">
								<option value="0">All Categories</option>
								<option value="1">Category 01</option>
								<option value="1">Category 02</option>
							</select>
							<button class="search-btn"><i class="fa fa-search"></i></button>
						</form>
					</div> -->
					<!-- /Search -->
				</div>


				<?php if($this->uri->segment(1)!="logSign") { ?>
				<div class="pull-right">
					<ul class="header-btns">
						<!-- Account -->
						<li class="header-account dropdown default-dropdown">
							<div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
								<!-- <div class="header-btns-icon">
									<i class="fa fa-user-o"></i>
								</div> -->
								<strong class="text-uppercase">My Account <i class="fa fa-caret-down"></i></strong>
							</div>
							<?php if($this->session->userdata("logged_in")==true) { ?>
							<?php echo $this->session->userdata("name");?>
							<a href="<?php echo $baseurl ?>welcome\ses_clear" class="text-uppercase">Logout</a>
							<?php } ?>
							<?php if($this->session->userdata("logged_in")!=true) { ?>
							<a href="<?php echo $baseurl ?>logSign" class="text-uppercase">Sign in / Sign up</a>
							<?php } ?>
							<ul class="custom-menu">
								<li><a href="#"><i class="fa fa-user-o"></i> My Account</a></li>
								<li><a href="#"><i class="fa fa-heart-o"></i> My Wishlist</a></li>
								<li><a href="#"><i class="fa fa-exchange"></i> Compare</a></li>
								<li><a href="#"><i class="fa fa-check"></i> Checkout</a></li>
								<li><a href="#"><i class="fa fa-unlock-alt"></i> Login</a></li>
								<li><a href="#"><i class="fa fa-user-plus"></i> Join</a></li>
							</ul>
						</li>
						<!-- /Account -->

						<!-- Cart -->
						<li class="header-cart dropdown default-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
								<!-- <div class="header-btns-icon">
									<i class="fa fa-shopping-cart"></i>
									
								</div> -->
								<strong class="text-uppercase">My Cart:</strong> <span class="qty">0</span>
								<br>
								<span>00.00$</span>
							</a>
							<div class="custom-menu">
								<div id="shopping-cart">
									<div class="shopping-cart-list">
										<div class="product product-widget">
											<div class="product-thumb">
												<img src="<?php echo $baseurl ?>assets/img/thumb-product01.jpg" alt="">
											</div>
											<div class="product-body">
												<h3 class="product-price">$32.50 <span class="qty">x3</span></h3>
												<h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
											</div>
											<button class="cancel-btn"><i class="fa fa-trash"></i></button>
										</div>
										<div class="product product-widget">
											<div class="product-thumb">
												<img src="<?php echo $baseurl ?>assets/img/thumb-product01.jpg" alt="">
											</div>
											<div class="product-body">
												<h3 class="product-price">$32.50 <span class="qty">x3</span></h3>
												<h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
											</div>
											<button class="cancel-btn"><i class="fa fa-trash"></i></button>
										</div>
									</div>
									<div class="shopping-cart-btns">
										<button class="main-btn">View Cart</button>
										<button class="primary-btn">Checkout <i class="fa fa-arrow-circle-right"></i></button>
									</div>
								</div>
							</div>
						</li>
						<!-- /Cart -->
	<?php }?>

						<!-- Mobile nav toggle-->
						<li class="nav-toggle">
							<button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
						</li>
						<!-- / Mobile nav toggle -->
					</ul>
				</div>
			</div>
			<!-- header -->
		</div>
		<!-- container -->
	</header>
	<!-- /HEADER -->