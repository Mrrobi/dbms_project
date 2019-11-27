<?php echo $header; ?>



<!-- BREADCRUMB -->
<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="<?php echo $baseurl ?>">Home</a></li>
                <li>Products</li>
				<li class="active"><?php echo $pagename ?></li>
			</ul>
		</div>
	</div>
<!-- /BREADCRUMB -->





<!-- STORE -->
<div id="store">
    <!-- row -->
    <div class="row">
        <?php foreach($products as $p){ ?>
        <div class="col-md-3 col-sm-4 col-xs-4">
            <div class="product product-single">
                <div class="product-thumb">
                    <div class="product-label">
                        <span>New</span>
                    </div>
                    <!-- <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button> -->
                    <img src="<?php echo $baseurl ?>/uploads/<?php echo $pagename?>/<?php echo $p->path ?>"  alt="">
                </div>
                <div class="product-body">
                    <h3 class="product-price"><?php echo $p->price."TK" ?></h3>
                    <div class="product-rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o empty"></i>
                    </div>
                    <h2 class="product-name"><a href="<?php echo $baseurl ?>product-page/<?php echo $pagename?>/<?php echo $p->ID ?>"><?php echo $p->name ?></a></h2>
                    <div class="product-btns">
                        <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                        <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                        <?php if($this->session->userdata('role')=='0') { ?>
                            <button class="primary-btn add-to-cart" onclick="location.href='<?php echo base_url()?>cart/<?php echo $pagename?>/<?php echo $p->ID ?>'"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

<?php echo $footer; ?>