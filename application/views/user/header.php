<!doctype html>
<html class="fixed">
	
<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>PC BUILDER | User</title>
		
		
		<meta name="description" content="Your PC our responsibility"/>
    <meta name="keywords" content="Beta PC"/>
    <meta name="author" content="Beta PC"/>


    <!-- facebook open graph starts from here, if you don't need then delete open graph related  -->
    <meta property="og:title" content="Beta PC"/>
    <meta property="og:url" content="www.mrrobi.tech/"/>
    <meta property="og:locale" content="en_US"/>
    <meta property="og:site_name" content="Beta PC"/>
    <!--meta property="fb:admins" content="" /-->  <!-- use this if you have  -->
    <meta property="og:type" content="website"/> <!-- 'article' for single page  -->
    <meta property="og:image"
        content="<?php echo $baseurl;?>assets/img/favicon.ico"/> <!-- when you post this page url in facebook , this image will be shown -->
    <!-- facebook open graph ends here -->

    <!-- desktop bookmark -->
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo $baseurl;?>assets/img/favicon.ico">
    <meta name="theme-color" content="#ffffff">

    <!-- icons & favicons -->
    <link rel="shortcut icon" type="image/x-icon"  href="<?php echo $baseurl;?>assets/img/favicon.ico"/>  <!-- this icon shows in browser toolbar -->
    <link rel="icon" type="image/x-icon" href="<?php echo $baseurl;?>assets/img/favicon.ico"/> <!-- this icon shows in browser toolbar -->



<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		
		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css" />	
		
		<!-- Specific Page Vendor CSS -->		
		<link rel="stylesheet" href="<?php echo $baseurl; ?>dash/vendor/select2/css/select2.css" />		
		<link rel="stylesheet" href="<?php echo $baseurl; ?>dash/vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />		
		<link rel="stylesheet" href="<?php echo $baseurl; ?>dash/vendor/datatables/media/css/dataTables.bootstrap4.css" />
		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?php echo $baseurl; ?>dash/css/theme.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?php echo $baseurl; ?>dash/css/custom.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/style.css" />

		<!-- Head Libs -->
		<script src="<?php echo $baseurl; ?>dash/vendor/modernizr/modernizr.js"></script>		
		<script src="<?php echo $baseurl; ?>dash/master/style-switcher/style.switcher.localstorage.js"></script>
		<script src="https://kit.fontawesome.com/d6062a4230.js" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<style>
		a.isDisabled {
			color: currentColor;
			cursor: not-allowed;
			opacity: 0.5;
			text-decoration: none;
		}
		button.isDisabled {
			color: currentColor;
			cursor: not-allowed;
			opacity: 0.5;
			text-decoration: none;
		}
		</style>
	</head>
	<body>
		<!-- HEADER -->
	<header>
		<!-- top Header -->

<!--

		<div id="top-header">
			<div class="container">
				<div class="pull-left">
					<span><?php echo $this->session->userdata('response') ?> </span>
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
		</div>
-->
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
								<div class="header-btns-icon">
									<i class="fa fa-user-o"></i>
								</div>
								<strong class="text-uppercase">My Account <i class="fa fa-caret-down"></i></strong>
							</div>
							<?php if($this->session->userdata("logged_in")==true) { ?>
							<?php echo $this->session->userdata("name");?>
							
							<?php } ?>
							<?php if($this->session->userdata("logged_in")!=true) { ?>
							<a href="<?php echo $baseurl ?>logSign" class="text-uppercase">Signin/Signup</a>
							<?php } ?>
							<ul class="custom-menu">
								<?php if($this->session->userdata('role') == '1'){ ?>
									<li><a href="<?php echo $baseurl ?>ad"><i class="fa fa-user-o"></i> Admin Dashboard</a></li>
									<li><a href="<?php echo $baseurl ?>welcome\ses_clear" class="text-uppercase"><i class='fas fa-sign-out-alt'></i> Logout</a></li>
								<?php }else{ ?>

									<li><a href="<?php echo base_url(). "history" ?>"><i class="fas fa-history"></i> My History</a></li>
									<li><a href="<?php echo $baseurl ?>welcome\ses_clear" class="text-uppercase"><i class='fas fa-sign-out-alt'></i> Logout</a></li>

								<!-- <li><a href="#"><i class="fa fa-heart-o"></i> My Wishlist</a></li> -->
								<!-- <li><a href="#"><i class="fa fa-exchange"></i> Compare</a></li> -->
								<!-- <li><a href="#"><i class="fa fa-check"></i> Checkout</a></li> -->
								<!-- <li><a href="#"><i class="fa fa-unlock-alt"></i> Login</a></li> -->
								<!-- <li><a href="#"><i class="fa fa-user-plus"></i> Join</a></li> -->
								<?php } ?>
							</ul>
						</li>
						<!-- /Account -->

						<!-- Cart -->
						<li class="header-cart dropdown default-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
								<div class="header-btns-icon">
									<i class="fa fa-shopping-cart"></i>
								</div>
								<?php $count=0; foreach($cart as $item){ $count++; } ?>
								<strong class="text-uppercase">My Cart:</strong> <span class="qty"><?php echo $count ?></span>
								<br>
								<?php $count=0; foreach($cart as $item){ $count+= (int)$item->item_price; } ?>
								<span><?php echo $count; ?>TK</span>
							</a>
							<div class="custom-menu">
								<div id="shopping-cart">
									<div class="shopping-cart-list">
										
										<?php foreach($cart as $item){ ?>
										<div class="product product-widget">
											<!-- <div class="product-thumb">
												<img src="<?php echo $baseurl ?>assets/img/thumb-product01.jpg" alt="">
											</div> -->
											<div class="product-body">
												<h3 class="product-price"><?php echo $item->item_price ?> <span class="qty"></span></h3>
												<h2 class="product-name"><a href="#"><?php echo $item->item_name?></a></h2>
											</div>
											<button class="cancel-btn" onclick="location.href='<?php echo $baseurl?>cart/delete/<?php echo $item->ID ?>'"><i class="fa fa-trash"></i></button>
										</div>
										<?php } ?>
									</div>
									<div class="shopping-cart-btns">
										<!-- <button class="main-btn">View Cart</button> -->
										<button class="primary-btn <?php if($count ==0) echo 'isDisabled'; ?>" onclick="location.href='<?php echo $baseurl?>checkout'">Checkout <i class="fa fa-arrow-circle-right"></i></button>
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
	<!-- NAVIGATION -->
<div id="navigation">
		<!-- container -->
		<div class="container">
			<div id="responsive-nav">
				<!-- category nav -->
				

				<!-- menu nav -->
				<div class="menu-nav">
					<span class="menu-header">Menu <i class="fa fa-bars"></i></span>
					<ul class="menu-list">
						<li><a href="<?php echo $baseurl ?>">Home</a></li>
						
						<li class="dropdown default-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Products <i class="fa fa-caret-down"></i></a>
							<ul class="custom-menu">
								<li><a href="<?php echo $baseurl ?>product/cpu">Processor</a></li>
								<li><a href="<?php echo $baseurl ?>product/gpu">Graphics Card</a></li>
								<li><a href="<?php echo $baseurl ?>product/ram">RAM</a></li>
								<li><a href="<?php echo $baseurl ?>product/psu">Power Supply Unit</a></li>
								<li><a href="<?php echo $baseurl ?>product/motherboard">Motherboard</a></li>
								<li><a href="<?php echo $baseurl ?>product/hdd">Hard Disk Drive</a></li>
								<li><a href="<?php echo $baseurl ?>product/ssd">Solid State Drive</a></li>
								<li><a href="<?php echo $baseurl ?>product/casing">Casing</a></li>
								<!-- <li><a href="<?php echo $baseurl ?>cart">Checkout</a></li> -->
							</ul>
						</li>
						<?php $this->session->set_userdata('prev',$_SERVER['REQUEST_URI']); ?>
						<!-- <?php echo $this->session->userdata('prev') ?> -->
						<li><a href="<?php echo $baseurl ?>pc_build">Built Your PC</a></li>
					</ul>
				</div>
				<!-- menu nav -->
			</div>
		</div>
		<!-- /container -->
	</div>
	<!-- /NAVIGATION -->