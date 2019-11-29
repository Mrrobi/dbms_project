<?php echo $header ?>
<!-- section -->
<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="tab-content">
				<div id="tab1" class="tab-pane fade in active">
				<table class="shopping-cart-table table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Image</th>
                                <th class="text-center">Name</th>
                                <!-- <th class="text-center">Quantity</th> -->
                                <th class="text-center">Price</th>
                            </tr>
                        </thead>
                        <tbody>
							<tr>
							<td><?php echo strtoupper($pagename); ?></td>
                                <td class="thumb"><img src="<?php echo base_url() ?>uploads/<?php echo $pagename ?>/<?php echo $product[0]->path ?>"
                                        width='20%' alt=""></td>
                                <td class="name text-center"><?php echo $product[0]->name ?></td>
                                <!-- <td class="price text-center"><strong></strong><br><del class="font-weak"><small></small></del></td> -->
                                <!-- <td class="qty text-center"><input class="input" type="number" value="1"></td> -->
                                <td class="total text-center"><strong
                                        class="primary-color"></strong><?php echo $product[0]->price; ?></td>

							</tr>
						</tbody>
				</table>
				</div>

				<?php 
						$this->db->select('*');
						$this->db->where('id',$product[0]->ID);
						$this->db->where('type',$pagename);
						$this->db->from('review');
						$q = $this->db->get();
						$reviews =  $q->result();
				?>
				<div id="tab2" class="tab-pane fade in active">
					<div class="row">
						<div class="col-md-6">
							<div class="product-reviews">

								<?php foreach($reviews as $review){ ?>
								<div class="single-review">
									<div class="review-heading">
										<div><a href="#"><i class="fa fa-user-o"></i> <?php echo $review->user_name; ?></a></div>
										<div><a href="#"><i class="fa fa-clock-o"></i> <?php echo $review->timedate; ?></a></div>
										<div class="review-rating pull-right">
										<?php
											for($i=1;$i<=5;$i++){
												if($i<=$review->rating){
													echo '<i class="fa fa-star"></i>';
												}else{
													echo '<i class="fa fa-star-o empty"></i>';
												}
											} 
										?>
										</div>
										<!-- <div class="review-rating pull-right">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-o empty"></i>
										</div> -->
									</div>
									<div class="review-body">
										<p><?php echo $review->body; ?></p>
									</div>
								</div>
										<?php }?>
								

								<ul class="reviews-pages">
									<li class="active">1</li>
									<li><a href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#"><i class="fa fa-caret-right"></i></a></li>
								</ul>
							</div>
						</div>
						<div class="col-md-6">
							<h4 class="text-uppercase">Write Your Review</h4>
							<p>Your email address will not be published.</p>
							<form class="review-form" action="<?php echo base_url()?>addReview/<?php echo $product[0]->ID.'/'.$pagename; ?>" method='post'>
								<div class="form-group">
									<textarea class="input" name = 'review' placeholder="Your review"></textarea>
								</div>
								<div class="form-group">
									<div class="input-rating">
										<strong class="text-uppercase">Your Rating: </strong>
										<div class="stars">
											<input type="radio" id="star5" name="rating" value="5" /><label for="star5"></label>
											<input type="radio" id="star4" name="rating" value="4" /><label for="star4"></label>
											<input type="radio" id="star3" name="rating" value="3" /><label for="star3"></label>
											<input type="radio" id="star2" name="rating" value="2" /><label for="star2"></label>
											<input type="radio" id="star1" name="rating" value="1" /><label for="star1"></label>
										</div>
									</div>
								</div>
								<button class="primary-btn">Submit</button>
							</form>
						</div>
					</div>
				</div>
		</div>
	</div>
</div>
<?php echo $footer ?>