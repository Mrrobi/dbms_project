<?php echo $header; ?>

<section role="main" class="content-body card-margin">
    <header class="page-header">
        <h2>ONLINE PC BUILDER | Admin Panel | Mother Board</h2>
    </header>

    <?php 
        $mboard = '';
        if($this->session->userdata('p_id')){
            $this->db->select('*');
            $this->db->where('id',$this->session->userdata('p_id'));
            $this->db->from('motherboard');
            $query = $this->db->get();
            $mboard = $query->result();
            
        }
        if(isset($_SESSION['edit'])){
            unset($_SESSION['edit']);
        }
        ?>
    <div class="row">
        <div class="col">
            <section class="card">
                <header class="card-header">
                    <div class="card-actions">
                        <a href="#" class="card-action card-action-toggle" data-card-toggle=""></a>
                        <a href="#" class="card-action card-action-dismiss" data-card-dismiss=""></a>
                    </div>

                    <?php echo $this->session->flashdata('response'); ?>
                    <h2 class="card-title">Form Elements</h2>
                </header>
                <div class="card-body">
                <?php if($this->session->userdata('p_id')){ ?>
                    <form class="form-horizontal form-bordered" action="<?php echo $baseurl; ?>welcome/mboard_insert" method="post" enctype='multipart/form-data'>
                        
                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Product Name</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-microchip"></i> </span>
                                    </span>
                                    <input type="text" name="name" class="form-control" placeholder="Product Name" value='<?php echo $mboard[0]->name; ?>'>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">bus</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                        <i class="fas fa-microchip"></i>                                        </span>
                                    </span>
                                    <input type="text" name="bus" class="form-control" placeholder="bus"  value='<?php echo $mboard[0]->bus; ?>'>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">MIN Bus</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-microchip"></i> </span>
                                    </span>
                                    <input type="text" name="min_bus" class="form-control" placeholder="min bus"  value='<?php echo $mboard[0]->min_bus; ?>'>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">PCI SLOT</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-microchip"></i> </span>
                                    </span>
                                    <input type="text" name="pci_slot" class="form-control" placeholder="PCI SLOT"  value='<?php echo $mboard[0]->pci_slot; ?>'>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Socket</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-microchip"></i> </span>
                                    </span>
                                    <input type="text" name="socket" class="form-control" placeholder="Socket"  value='<?php echo $mboard[0]->socket; ?>'>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Form Factor</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-microchip"></i> </span>
                                    </span>
                                    <input type="text" name="form_factor" class="form-control" placeholder="Form Factor"  value='<?php echo $mboard[0]->form_factor; ?>'>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Brand</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-microchip"></i> </span>
                                    </span>
                                    <input type="text" name="brand" class="form-control" placeholder="Brand" value='<?php echo $mboard[0]->brand; ?>'>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Price</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-microchip"></i> </span>
                                    </span>
                                    <input type="text" name="price" class="form-control" placeholder="Price" value='<?php echo $mboard[0]->price; ?>'>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Quantity</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-microchip"></i> </span>
                                    </span>
                                    <input type="text" name="quantity" class="form-control" placeholder="Quantity" value='<?php echo $mboard[0]->quantity; ?>'>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Image Upload</label>
                            <div class="col-lg-6">
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="input-append">
                                        <!-- <div class="uneditable-input">
                                            <i class="fas fa-file fileupload-exists"></i>
                                            
                                        </div> -->
                                        <span class="input-group-text uneditable-input">
                                                <i class="fas fa-upload fileupload-new"></i>
                                                <i class="fas fa-file fileupload-exists"></i>
                                                <span class="fileupload-preview"></span>
                                        </span>
                                        <span class="btn btn-default btn-file">
                                            <span class="fileupload-exists">Change</span>
                                            <span class="fileupload-new">Select file</span>
                                            <input type="file" name='path'>
                                        </span>
                                        <a href="#" class="btn btn-default fileupload-exists"
                                            data-dismiss="fileupload">Remove</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <section class="card">
                        <header class="card-header">
                            <div class="card-actions">
                            <div class="form-row">
                                        <div class="col-lg-12">
                                            <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                                        </div>
                                    </div>
                            </div>
                            <h2 class="card-title">Details of the product *</h2>
                        </header>
                        <div class="form-group row">

                            <div class="col-lg-12">
                                <div class="col-lg-12">
                                    <div>
                                        <textarea name="details" class="summernote" data-plugin-summernote
                                            data-plugin-options='{ "height": 280, "codemirror": { "theme": "ambiance" } }'>
                                                <?php echo $mboard[0]->details; ?>
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </section>
                        <div class="row">
                            <div class="col-md-12 text-right mt-3">
                                <button class="btn btn-success ">Add</button>
                            </div>
                        </div>
                    </form>
                    <?php } else { ?>
                    <form class="form-horizontal form-bordered" action="<?php echo $baseurl; ?>welcome/mboard_insert" method="post" enctype='multipart/form-data'>
                        
                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Product Name</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-microchip"></i> </span>
                                    </span>
                                    <input type="text" name="name" class="form-control" placeholder="Product Name">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">bus</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                        <i class="fas fa-microchip"></i>                                        </span>
                                    </span>
                                    <input type="text" name="bus" class="form-control" placeholder="bus">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">MIN Bus</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-microchip"></i> </span>
                                    </span>
                                    <input type="text" name="min_bus" class="form-control" placeholder="min bus">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">PCI SLOT</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-microchip"></i> </span>
                                    </span>
                                    <input type="text" name="pci_slot" class="form-control" placeholder="PCI SLOT">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Socket</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-microchip"></i> </span>
                                    </span>
                                    <input type="text" name="socket" class="form-control" placeholder="Socket">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Form Factor</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-microchip"></i> </span>
                                    </span>
                                    <input type="text" name="form_factor" class="form-control" placeholder="Form Factor">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Brand</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-microchip"></i> </span>
                                    </span>
                                    <input type="text" name="brand" class="form-control" placeholder="Brand">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Price</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-microchip"></i> </span>
                                    </span>
                                    <input type="text" name="price" class="form-control" placeholder="Price">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Quantity</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-microchip"></i> </span>
                                    </span>
                                    <input type="text" name="quantity" class="form-control" placeholder="Quantity">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Image Upload</label>
                            <div class="col-lg-6">
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="input-append">
                                        <!-- <div class="uneditable-input">
                                            <i class="fas fa-file fileupload-exists"></i>
                                            
                                        </div> -->
                                        <span class="input-group-text uneditable-input">
                                                <i class="fas fa-upload fileupload-new"></i>
                                                <i class="fas fa-file fileupload-exists"></i>
                                                <span class="fileupload-preview"></span>
                                        </span>
                                        <span class="btn btn-default btn-file">
                                            <span class="fileupload-exists">Change</span>
                                            <span class="fileupload-new">Select file</span>
                                            <input type="file" name='path'>
                                        </span>
                                        <a href="#" class="btn btn-default fileupload-exists"
                                            data-dismiss="fileupload">Remove</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <section class="card">
                        <header class="card-header">
                            <div class="card-actions">
                            <div class="form-row">
                                        <div class="col-lg-12">
                                            <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                                        </div>
                                    </div>
                            </div>
                            <h2 class="card-title">Details of the product *</h2>
                        </header>
                        <div class="form-group row">

                            <div class="col-lg-12">
                                <div class="col-lg-12">
                                    <div>
                                        <textarea name="details" class="summernote" data-plugin-summernote
                                            data-plugin-options='{ "height": 280, "codemirror": { "theme": "ambiance" } }'>
                                                
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </section>
                        <div class="row">
                            <div class="col-md-12 text-right mt-3">
                                <button class="btn btn-success ">Add</button>
                            </div>
                        </div>
                    </form>
                    <?php }?>
                </div>
            </section>
        </div>
    </div>


</section>


<?php echo $footer; ?>