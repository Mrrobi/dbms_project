<?php echo $header ?>
<!-- BREADCRUMB -->
<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="<?php echo base_url(); ?>">Home</a></li>
				<li class="active">Checkout</li>
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
                    <?php $count=0; foreach($cart as $item){ $count+= (int)$item->item_price; } ?>
					<div class="col-md-12">
						<div class="order-summary clearfix">
							<div class="section-title">
								<h3 class="title">Order Review</h3>
							</div>
							<table class="shopping-cart-table table">
								<thead>
									<tr>
										<th>Product</th>
										<th></th>
										<!-- <th class="text-center">Price</th> -->
										<!-- <th class="text-center">Quantity</th> -->
										<th class="text-center">Total</th>
										<th class="text-right"></th>
									</tr>
								</thead>
								<tbody>
                                    <?php foreach($cart as $item){ ?>
									<tr>
										<td class="thumb"><img src="./img/thumb-product01.jpg" alt=""></td>
										<td class="details">
											<a href="#"><?php echo $item->item_name?></a>
											<!-- <ul>
												<li><span>Size: XL</span></li>
												<li><span>Color: Camelot</span></li>
											</ul> -->
										</td>
										<!-- <td class="price text-center"><strong><?php echo $item->item_price ?></strong><br><del class="font-weak"><small></small></del></td> -->
										<!-- <td class="qty text-center"><input class="input" type="number" value="1"></td> -->
										<td class="total text-center"><strong class="primary-color"><?php echo $item->item_price ?></strong></td>
										<td class="text-right"><a class="cancel-btn" href='<?php echo $baseurl?>cart/delete/<?php echo $item->ID ?>'><i class="fa fa-close"></i></a></td>
									</tr>
                                    <?php } ?>
								
								</tbody>
								<tfoot>
									<tr>
										<th class="empty" colspan="3"></th>
										<th>SUBTOTAL</th>
										<th colspan="2" class="sub-total"><?php echo $count; ?>TK</th>
									</tr>
									<tr>
										<th class="empty" colspan="3"></th>
										<th>SHIPING</th>
										<td colspan="2">Free Shipping</td>
									</tr>
									<tr>
										<th class="empty" colspan="3"></th>
										<th>TOTAL</th>
										<th colspan="2" class="total"><?php echo $count; ?>TK</th>
									</tr>
								</tfoot>
							</table>
							<div class="pull-right">
								<a class="primary-btn" onclick="location.href='<?php echo $baseurl?>requestssl/<?php echo $count;?>/check'">Place Order</a>
							</div>
						</div>

					</div>
				</form>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
    <?php echo $footer ?>