<?php echo $header; ?>

<section role="main" class="content-body card-margin">
    <header class="page-header">
        <h2>ONLINE PC BUILDER | Admin Panel | Processor</h2>
    </header>

    <?php 
        $cpu = '';
        if($this->session->userdata('p_id')){
            $this->db->select('*');
            $this->db->where('id',$this->session->userdata('p_id'));
            $this->db->from('cpu');
            $query = $this->db->get();
            $cpu = $query->result();
            
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

                    <?php echo $this->session->flashdata('response'); 
                        
                    ?>
                    <h2 class="card-title">Form Elements</h2>
                </header>
                <div class="card-body">
                    <?php if($this->session->userdata('p_id')){ ?>
                    <form class="form-horizontal form-bordered" action="<?php echo $baseurl; ?>welcome/cpu_insert" method="post" enctype='multipart/form-data'>
                        

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Product Name</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-microchip"></i> </span>
                                    </span>
                                    <input type="text" name="name" class="form-control" placeholder="Product Name" value='<?php echo $cpu[0]->name; ?>'>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Genaration</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-microchip"></i> </span>
                                    </span>
                                    <input type="text" name="gen" class="form-control" placeholder="Genaration" value='<?php echo $cpu[0]->gen; ?>'>
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
                                    <input type="text" name="socket" class="form-control" placeholder="Socket" value='<?php echo $cpu[0]->socket; ?>'>
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
                                    <input type="text" name="brand" class="form-control" placeholder="Brand" value='<?php echo $cpu[0]->brand; ?>'>
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
                                    <input type="text" name="price" class="form-control" placeholder="Price" value='<?php echo $cpu[0]->price; ?>'>
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
                                    <input type="text" name="quantity" class="form-control" placeholder="Quantity" value='<?php echo $cpu[0]->quantity; ?>'>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Performance</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-microchip"></i>
                                        </span>
                                    </span>
                                    <input type="text" name="performance" class="form-control"
                                        placeholder="Performance" value='<?php echo $cpu[0]->performance; ?>'>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Image Upload</label>
                            <div class="col-lg-6">
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="input-group-prepend">
                                        
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
                                            <?php echo $cpu[0]->details; ?>
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
                        <form class="form-horizontal form-bordered" action="<?php echo $baseurl; ?>welcome/cpu_insert" method="post" enctype='multipart/form-data'>
                        

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Product Name</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-microchip"></i> </span>
                                    </span>
                                    <input type="text" name="name" class="form-control" placeholder="Product Name" >
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Genaration</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-microchip"></i> </span>
                                    </span>
                                    <input type="text" name="gen" class="form-control" placeholder="Genaration">
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
                                    <input type="text" name="socket" class="form-control" placeholder="Socket" >
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
                                    <input type="text" name="brand" class="form-control" placeholder="Brand" >
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
                                    <input type="text" name="price" class="form-control" placeholder="Price" >
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
                                    <input type="text" name="quantity" class="form-control" placeholder="Quantity" >
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Performance</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-microchip"></i>
                                        </span>
                                    </span>
                                    <input type="text" name="performance" class="form-control"
                                        placeholder="Performance" >
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Image Upload</label>
                            <div class="col-lg-6">
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="input-group-prepend">
                                        
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