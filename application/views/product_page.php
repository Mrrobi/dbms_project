<?php echo $header; ?>

<!-- BREADCRUMB -->
<div id="breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
        <?php foreach($products as $p){ ?>
            <li><a href="<?php echo $baseurl ?>">Home</a></li>
            <li><a href="#">Products</a></li>
            <li><a href="<?php echo $baseurl ?>product/<?php echo $pagename ?>"><?php echo $pagename ?></a></li>
            <li class="active"><?php echo $p->name ?></li>
        <?php } ?>
        </ul>
    </div>
</div>
<!-- /BREADCRUMB -->

<?php 

$hits = $products[0]->hits;
$hits++;
$this->db->set('hits',$hits);
$this->db->where('id',$products[0]->ID);
$this->db->update($pagename);

?>

<?php 
	$this->db->select('*');
	$this->db->where('id',$products[0]->ID);
	$this->db->where('type',$pagename);
	$this->db->from('review');
	$q = $this->db->get();
	$reviews =  $q->result();
	$rating=0;
	$count=0;
	foreach($reviews as $re) {
		$rating+=$re->rating;
		$count++;
	}
	if($reviews){
		$rating = $rating/$count;
	}

?>

<!-- section -->
<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
            <?php foreach($products as $p){ ?>
				<!--  Product Details -->
				<div class="product product-details clearfix">
					<div class="col-md-6">
						<div id="product-main-view">
							<div class="product-view">
								<img src="<?php echo $baseurl ?>/uploads/<?php echo $pagename?>/<?php echo $p->path ?>" alt="">
							</div>
							<!-- <div class="product-view">
								<img src="./img/main-product02.jpg" alt="">
							</div>
							<div class="product-view">
								<img src="./img/main-product03.jpg" alt="">
							</div>
							<div class="product-view">
								<img src="./img/main-product04.jpg" alt="">
							</div> -->
						</div>
						<!-- <div id="product-view">
							<div class="product-view">
								<img src="./img/thumb-product01.jpg" alt="">
							</div>
							<div class="product-view">
								<img src="./img/thumb-product02.jpg" alt="">
							</div>
							<div class="product-view">
								<img src="./img/thumb-product03.jpg" alt="">
							</div>
							<div class="product-view">
								<img src="./img/thumb-product04.jpg" alt="">
							</div>
						</div> -->
					</div>
					<div class="col-md-6">
						<div class="product-body">
							<div class="product-label">
								<span>New</span>
								<span class="sale">-20%</span>
							</div>
							<h2 class="product-name"><?php echo $p->name ?></h2>
							<h3 class="product-price"><?php echo $p->price.'TK' ?> <del class="product-old-price"></del></h3>
							<div>
								<div class="product-rating">
								<?php
									for($i=1;$i<=5;$i++){
										if($i<=$rating){
											echo '<i class="fa fa-star"></i>';
										}else{
											echo '<i class="fa fa-star-o empty"></i>';
										}
									} 
								?>
								</div>
								<a href="<?php echo base_url()?>review/<?php echo $p->ID.'/'.$pagename ?>"><?php echo $count; ?> Review(s) / Add Review</a>
							</div>
							<p><strong>Availability:</strong> <?php echo $p->quantity.' Left' ?></p>
							<p><strong>Brand:</strong> <?php echo $p->brand ?></p>
							

							<div class="product-btns">
                                
							<?php if($this->session->userdata('role')=='0') { ?>
								<?php if($p->quantity!=0){?>
									<button class="primary-btn add-to-cart" onclick="location.href='<?php echo base_url()?>cart/<?php echo $pagename?>/<?php echo $p->ID ?>'"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
								<?php }else{?>
									<button class="primary-btn add-to-cart isDisabled" onclick="location.href='<?php echo base_url()?>cart/<?php echo $pagename?>/<?php echo $p->ID ?>'"><i class="far fa-frown"></i> Sold Out</button>
								<?php } ?>
                        	<?php } ?>
							</div>
						</div>
					</div>
					
                </div>
				
				<!-- /Product Details -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
	<?php echo $p->details ?>
                <?php } ?>
<?php echo $footer; ?>