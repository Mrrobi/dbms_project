<?php echo $header ?>


<section role="main">


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
                                <th>Check Out Id</th>
                                <th>Total</th>
                                <th>Time</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($histories as $p) { ?>
                                <tr>
                                    <td><?php echo $p->Checkout_id ?></td>
                                    <td><?php echo $p->total_balance ?></td>
                                    <td><?php echo $p->time ?></td>
                                    <td class="center"><a href="#" class="btn btn-success"> Click Me</a></td>
                                </tr>
                                <?php } ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>

    </div>
</section>


<?php echo $footer ?>