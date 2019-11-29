<?php echo $header ?>
<!-- BREADCRUMB -->
<div id="breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>">Home</a></li>
            <li class="active">Pc Builder</li>
        </ul>
    </div>
</div>
<!-- /BREADCRUMB -->

<?php

	?>


<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="order-summary clearfix">
                    <div class="section-title">
                        <h3 class="title">Order Review</h3>
                    </div>
                    <?php $count=0; ?>

                    <table class="shopping-cart-table table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Image</th>
                                <th class="text-center">Name</th>
                                <!-- <th class="text-center">Quantity</th> -->
                                <th class="text-center">Price</th>
                                <th class="text-right"></th>
                                <th class="text-right"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>CPU</td>
                                <?php foreach($cpu as $p){ ?>
                                <td class="thumb"><img src="<?php echo base_url() ?>uploads/cpu/<?php echo $p->path ?>"
                                        width='20%' alt=""></td>
                                <td class="name text-center"><?php echo $p->name ?></td>
                                <!-- <td class="price text-center"><strong></strong><br><del class="font-weak"><small></small></del></td> -->
                                <!-- <td class="qty text-center"><input class="input" type="number" value="1"></td> -->
                                <td class="total text-center"><strong
                                        class="primary-color"></strong><?php echo $p->price; $count+=$p->price; ?></td>
                                <td class="text-right"><a class="btn btn-info" href='<?php echo base_url()?>welcome/select/cpu'>Change</a></td>
								<td class="text-right"><a class="btn btn-danger"
                                        href='<?php echo base_url()?>welcome/delete/cpu/'><i
                                            class="fa fa-trash"></i> Delete</a></td>
								<?php }?>
                                <?php if($cpu==null){?>
									<td class="text-right"><a class="cancel-btn"
                                        href='<?php echo base_url()?>welcome/select/cpu'><i
                                            class="fas fa-select"></i>Add</a></td>
                                <?php }else{ $this->session->set_userdata('socket',$cpu[0]->socket);} ?>

                            </tr>

                            <tr>
                                <td>Motherboard</td>
                                <?php foreach($motherboard as $p){ ?>
                                <td class="thumb"><img
                                        src="<?php echo base_url() ?>uploads/motherboard/<?php echo $p->path ?>" width='20%'
                                        alt=""></td>
                                <td class="name text-center"><?php echo $p->name ?></td>
                                <!-- <td class="price text-center"><strong></strong><br><del class="font-weak"><small></small></del></td> -->
                                <!-- <td class="qty text-center"><input class="input" type="number" value="1"></td> -->
                                <td class="total text-center"><strong
                                        class="primary-color"></strong><?php echo $p->price; $count+=$p->price; ?></td>
                                <td class="text-right"><a class="btn btn-info" href='<?php echo base_url()?>welcome/select/motherboard'>Change</a></td>
                                <td class="text-right"><a class="btn btn-danger"
                                        href='<?php echo base_url()?>welcome/delete/motherboard/'><i
                                            class="fa fa-trash"></i> Delete</a></td>
								<?php }?>
								<?php if($motherboard==null){?>
									<td class="text-right"><a class="cancel-btn"
                                        href='<?php echo base_url()?>welcome/select/motherboard'><i
                                            class="fas fa-select"></i>Add</a></td>
                                <?php }else{ $this->session->set_userdata('socket',$motherboard[0]->socket); $this->session->set_userdata('form_factor',$motherboard[0]->form_factor); $this->session->set_userdata('bus',$motherboard[0]->bus); $this->session->set_userdata('min_bus',$motherboard[0]->min_bus); $this->session->set_userdata('pci_slot',$motherboard[0]->pci_slot); } ?>
                            </tr>
                            <tr>
                                <td>Ram</td>
                                <?php foreach($ram as $p){ ?>
                                <td class="thumb"><img src="<?php echo base_url() ?>uploads/ram/<?php echo $p->path ?>"
                                        width='20%' alt=""></td>
                                <td class="name text-center"><?php echo $p->name ?></td>
                                <!-- <td class="price text-center"><strong></strong><br><del class="font-weak"><small></small></del></td> -->
                                <!-- <td class="qty text-center"><input class="input" type="number" value="1"></td> -->
                                <td class="total text-center"><strong
                                        class="primary-color"></strong><?php echo $p->price; $count+=$p->price; ?></td>
                                <td class="text-right"><a class="btn btn-info" href='<?php echo base_url()?>welcome/select/ram'>Change</a></td>
								<td class="text-right"><a class="btn btn-danger"
                                        href='<?php echo base_url()?>welcome/delete/ram/'><i
                                            class="fa fa-trash"></i> Delete</a></td>
								<?php } ?>
                                <?php if($ram==null){?>
									<td class="text-right"><a class="cancel-btn"
                                        href='<?php echo base_url()?>welcome/select/ram'><i
                                            class="fas fa-select"></i>Add</a></td>
                                <?php } else {$this->session->set_userdata('bus',$ram[0]->bus);} ?>
                            </tr>
                            <tr>
                                <td>SSD</td>
                                <?php foreach($ssd as $p){ ?>
                                <td class="thumb"><img src="<?php echo base_url() ?>uploads/ssd/<?php echo $p->path ?>"
                                        width='20%' alt=""></td>
                                <td class="name text-center"><?php echo $p->name ?></td>
                                <!-- <td class="price text-center"><strong></strong><br><del class="font-weak"><small></small></del></td> -->
                                <!-- <td class="qty text-center"><input class="input" type="number" value="1"></td> -->
                                <td class="total text-center"><strong
                                        class="primary-color"></strong><?php echo $p->price; $count+=$p->price; ?></td>
                                <td class="text-right"><a class="btn btn-info" href='<?php echo base_url()?>welcome/select/ssd'>Change</a></td>
                                <td class="text-right"><a class="btn btn-danger"
                                        href='<?php echo base_url()?>welcome/delete/ssd/'><i
                                            class="fa fa-trash"></i> Delete</a></td>
								<?php }?>
                                <?php if($ssd==null){?>
                                <td class="text-right"><a class="cancel-btn"
                                        href='<?php echo base_url()?>welcome/select/ssd'><i
                                            class="fas fa-select"></i>Add</a></td>
                                <?php } ?>
                            </tr>

                            <tr>
                                <td>Graphics Card</td>
                                <?php foreach($gpu as $p){ ?>
                                <td class="thumb"><img src="<?php echo base_url() ?>uploads/gpu/<?php echo $p->path ?>"
                                        width='20%' alt=""></td>
                                <td class="name text-center"><?php echo $p->name ?></td>
                                <!-- <td class="price text-center"><strong></strong><br><del class="font-weak"><small></small></del></td> -->
                                <!-- <td class="qty text-center"><input class="input" type="number" value="1"></td> -->
                                <td class="total text-center"><strong
                                        class="primary-color"></strong><?php echo $p->price; $count+=$p->price; ?></td>
                                <td class="text-right"><a class="btn btn-info" href='<?php echo base_url()?>welcome/select/gpu'>Change</a></td>
                                <td class="text-right"><a class="btn btn-danger"
                                        href='<?php echo base_url()?>welcome/delete/gpu/'><i
                                            class="fa fa-trash"></i> Delete</a></td>
								<?php }?>
                                <?php if($gpu==null){?>
                                <td class="text-right"><a class="cancel-btn"
                                        href='<?php echo base_url()?>welcome/select/gpu'><i
                                            class="fas fa-select"></i>Add</a></td>
                                <?php } ?>
                            </tr>

                            <tr>
                                <td>HDD</td>
                                <?php foreach($hdd as $p){ ?>
                                <td class="thumb"><img src="<?php echo base_url() ?>uploads/hdd/<?php echo $p->path ?>"
                                        width='20%' alt=""></td>
                                <td class="name text-center"><?php echo $p->name ?></td>
                                <!-- <td class="price text-center"><strong></strong><br><del class="font-weak"><small></small></del></td> -->
                                <!-- <td class="qty text-center"><input class="input" type="number" value="1"></td> -->
                                <td class="total text-center"><strong
                                        class="primary-color"></strong><?php echo $p->price; $count+=$p->price; ?></td>
                                <td class="text-right"><a class="btn btn-info" href='<?php echo base_url()?>welcome/select/hdd'>Change</a></td>
                                <td class="text-right"><a class="btn btn-danger"
                                        href='<?php echo base_url()?>welcome/delete/hdd/'><i
                                            class="fa fa-trash"></i> Delete</a></td>
								<?php }?>
                                <?php if($hdd==null){?>
                                <td class="text-right"><a class="cancel-btn"
                                        href='<?php echo base_url()?>welcome/select/hdd'><i
                                            class="fas fa-select"></i>Add</a></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>Casing</td>
                                <?php foreach($casing as $p){ ?>
                                <td class="thumb"><img
                                        src="<?php echo base_url() ?>uploads/casing/<?php echo $p->path ?>" width='20%'
                                        alt=""></td>
                                <td class="name text-center"><?php echo $p->name ?></td>
                                <!-- <td class="price text-center"><strong></strong><br><del class="font-weak"><small></small></del></td> -->
                                <!-- <td class="qty text-center"><input class="input" type="number" value="1"></td> -->
                                <td class="total text-center"><strong
                                        class="primary-color"></strong><?php echo $p->price; $count+=$p->price; ?></td>
                                <td class="text-right"><a class="btn btn-info" href='<?php echo base_url()?>welcome/select/casing'>Change</a></td>
                                <td class="text-right"><a class="btn btn-danger"
                                        href='<?php echo base_url()?>welcome/delete/casing/'><i
                                            class="fa fa-trash"></i> Delete</a></td>
								<?php }?>
                                <?php if($casing==null){?>
                                <td class="text-right"><a class="cancel-btn"
                                        href='<?php echo base_url()?>welcome/select/casing'><i
                                            class="fas fa-select"></i>Add</a></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>Power Supply</td>
                                <?php foreach($psu as $p){ ?>
                                <td class="thumb"><img src="<?php echo base_url() ?>uploads/psu/<?php echo $p->path ?>"
                                        width='20%' alt=""></td>
                                <td class="name text-center"><?php echo $p->name ?></td>
                                <!-- <td class="price text-center"><strong></strong><br><del class="font-weak"><small></small></del></td> -->
                                <!-- <td class="qty text-center"><input class="input" type="number" value="1"></td> -->
                                <td class="total text-center"><strong
                                        class="primary-color"></strong><?php echo $p->price; $count+=$p->price; ?></td>
                                <td class="text-right"><a class="btn btn-info" href='<?php echo base_url()?>welcome/select/psu'>Change</a></td>
                                <td class="text-right"><a class="btn btn-danger"
                                        href='<?php echo base_url()?>welcome/delete/psu/'><i
                                            class="fa fa-trash"></i> Delete</a></td>
								<?php }?>
                                <?php if($psu==null){?>
                                <td class="text-right"><a class="cancel-btn"
                                        href='<?php echo base_url()?>welcome/select/psu'><i
                                            class="fas fa-select"></i>Add</a></td>
                                <?php } ?>
                            </tr>


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
                        <a class="primary-btn <?php if($count ==0) echo 'btn-disable'; ?>"
                            onclick="location.href='<?php echo $baseurl?>requestssl/<?php echo $count;?>/list'"  >Place
                            Order</a>
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