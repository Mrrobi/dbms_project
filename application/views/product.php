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




<!-- section -->
<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">


            
<!-- STORE -->
<div id="store">
    <!-- row -->
    <div class="row">
        <?php foreach($products as $p){ ?>
            <?php 
                $this->db->select('*');
                $this->db->where('id',$p->ID);
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
                    <h2 class="product-name"><a href="<?php echo $baseurl ?>product-page/<?php echo $pagename?>/<?php echo $p->ID ?>"><?php echo $p->name ?></a></h2>
                    <div class="product-btns">
                        <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                        <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
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
        <?php } ?>
    </div>
</div>
</div>
</div>
</div>
<?php echo $footer; ?>