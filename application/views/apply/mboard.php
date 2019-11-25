<?php echo $header; ?>

<section role="main" class="content-body card-margin">
    <header class="page-header">
        <h2>ONLINE PC BUILDER | Admin Panel | Mother Board</h2>
    </header>


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
                    <form class="form-horizontal form-bordered" action="<?php echo $baseurl; ?>welcome/mboard_insert" method="post" enctype='multipart/form-data'>
                        <!-- <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Default</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="inputDefault">
                            </div>
                        </div>
    
                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputHelpText">Help text</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="inputHelpText">
                                <span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>
                            </div>
                        </div>
    
                        <!-- <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputFocus">Input focus</label>
                            <div class="col-lg-6">
                                <input class="form-control" id="inputFocus" type="text" value="This is focused...">
                            </div>
                        </div> 
    
                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputPlaceholder">Placeholder</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" placeholder="placeholder" id="inputPlaceholder">
                            </div>
                        </div> -->

                        <!-- <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputPassword">Password</label>
                            <div class="col-lg-6">
                                <input type="password" class="form-control" placeholder="" id="inputPassword">
                            </div>
                        </div> -->

                        <!-- <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-1">Static control</label>
                            <div class="col-lg-6">
                                <p class="form-control-static">email@example.com</p>
                            </div>
                        </div> -->

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

                        <!-- <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Performance</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-microchip"></i>
                                        </span>
                                    </span>
                                    <input type="text" name="performance" class="form-control"
                                        placeholder="Performance">
                                </div>
                            </div>
                        </div> -->

                        <!-- <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Right Icon</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Right icon">
                                    <span class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fas fa-user"></i>
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div> -->

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Image Upload</label>
                            <div class="col-lg-6">
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="input-append">
                                        <div class="uneditable-input">
                                            <i class="fas fa-file fileupload-exists"></i>
                                            <span class="fileupload-preview"></span>
                                        </div>
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
                        <!-- <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Vertical Group</label>
                            <div class="col-lg-6">
                                <section class="form-group-vertical">
                                    <input class="form-control" type="text" placeholder="Username">
                                    <input class="form-control" type="text" placeholder="Email">
                                    <input class="form-control last" type="password" placeholder="Password">
                                </section>
                            </div>
                        </div>
    
                        <div class="form-group row has-success">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputSuccess">Input with success</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="inputSuccess">
                            </div>
                        </div>
                        <div class="form-group row has-warning">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputWarning">Input with warning</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="inputWarning">
                            </div>
                        </div>
                        <div class="form-group row has-danger">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputError">Input with error</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="inputError">
                            </div>
                        </div>
    
                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputTooltip">Input with Tooltip</label>
                            <div class="col-lg-6">
                                <input type="text" placeholder="Hover me" title="" data-toggle="tooltip" data-trigger="hover" class="form-control" data-original-title="Place your tooltip info here" id="inputTooltip">
                            </div>
                        </div>
    
                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputPopover">Input with Popover</label>
                            <div class="col-lg-6">
                                <input type="text" placeholder="Click Here" class="form-control" data-toggle="popover" data-placement="top" data-original-title="The Title" data-content="Content goes here..." data-trigger="click" id="inputPopover">
                            </div>
                        </div> -->

                        <!-- <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Column sizing</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" placeholder=".col-sm-2">
                                    </div>
                                    <div class="d-md-none mb-3"></div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" placeholder=".col-sm-3">
                                    </div>
                                    <div class="d-md-none mb-3"></div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" placeholder=".col-sm-4">
                                    </div>
                                </div>
    
                            </div>
                        </div> -->
                    </form>
                </div>
            </section>
        </div>
    </div>


</section>


<?php echo $footer; ?>