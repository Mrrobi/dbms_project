<?php echo $header; ?>

<section role="main" class="content-body card-margin">
    <header class="page-header">
        <h2>ONLINE PC BUILDER | Admin Panel | <?php echo $pagename ?></h2>
    </header>


    <div class="row">
        <div class="col">
            <section class="card">
                <header class="card-header">
                    <div class="card-actions">
                        <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                        <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                    </div>
    
                    <h2 class="card-title">Rows with Details</h2>
                </header>
                <div class="card-body">
                    <table class="table table-bordered table-striped mb-0" id="datatable-details">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Brand</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($products as $p) { ?>
                                <tr>
                                    <td><?php echo $p->name ?></td>
                                    <td><img class="img-thumbnail" width="42" src="<?php echo $baseurl ?>/uploads/<?php echo $pagename?>/<?php echo $p->path ?>" alt="">  </td>
                                    <td><?php echo $p->brand ?></td>
                                    <td class="center"><?php echo $p->price ?></td>
                                    <td class="center"><?php echo $p->quantity ?></td>
                                    <td class="center"><a href="<?php echo $baseurl ?>/product_edit/<?php echo $pagename?>/<?php echo $p->ID ?>" class="btn btn-info"> Edit</a></td>
                                    <td class="center"><a href="<?php echo $baseurl ?>/product_delete/<?php echo $pagename?>/<?php echo $p->ID ?>" class="btn btn-danger"> Delete</a></td>
                                </tr>
                                <?php } ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>


<?php echo $footer; ?>