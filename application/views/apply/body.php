<?php echo $header; ?>

<section role="main" class="content-body card-margin">
    <header class="page-header">
        <h2>ONLINE PC BUILDER | Admin Panel</h2>
    </header>

    <!--  -->
<div class="row">
    <div class="col-xl-6">
        <section class="card card-featured-left card-featured-primary mb-3">
            <div class="card-body">
                <div class="widget-summary">
                    <div class="widget-summary-col widget-summary-col-icon">
                        <div class="summary-icon bg-primary">
                            <i class="fas fa-life-ring"></i>
                        </div>
                    </div>
                    <div class="widget-summary-col">
                        <div class="summary">
                            <h4 class="title">CPU</h4>

                            <?php $count=0?>
                            <?php foreach($cpu as $c){ $count++; }?>


                            <div class="info">
                                <strong class="amount"><?php echo $count; ?></strong>
                                <!-- <span class="text-primary">(14 unread)</span> -->
                            </div>
                        </div>
                        <div class="summary-footer">
                            <a class="text-muted text-uppercase" href="<?php echo $baseurl; ?>ad/show/cpu">(view all)</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="col-xl-6">
        <section class="card card-featured-left card-featured-primary mb-3">
            <div class="card-body">
                <div class="widget-summary">
                    <div class="widget-summary-col widget-summary-col-icon">
                        <div class="summary-icon bg-primary">
                            <i class="fas fa-life-ring"></i>
                        </div>
                    </div>
                    <div class="widget-summary-col">
                        <div class="summary">
                            <h4 class="title">GPU</h4>

                            <?php $count=0?>
                            <?php foreach($gpu as $c){ $count++; }?>


                            <div class="info">
                                <strong class="amount"><?php echo $count; ?></strong>
                                <!-- <span class="text-primary">(14 unread)</span> -->
                            </div>
                        </div>
                        <div class="summary-footer">
                            <a class="text-muted text-uppercase" href="<?php echo $baseurl; ?>ad/show/gpu">(view all)</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="col-xl-6">
        <section class="card card-featured-left card-featured-primary mb-3">
            <div class="card-body">
                <div class="widget-summary">
                    <div class="widget-summary-col widget-summary-col-icon">
                        <div class="summary-icon bg-primary">
                            <i class="fas fa-life-ring"></i>
                        </div>
                    </div>
                    <div class="widget-summary-col">
                        <div class="summary">
                            <h4 class="title">PSU</h4>

                            <?php $count=0?>
                            <?php foreach($psu as $c){ $count++; }?>


                            <div class="info">
                                <strong class="amount"><?php echo $count; ?></strong>
                                <!-- <span class="text-primary">(14 unread)</span> -->
                            </div>
                        </div>
                        <div class="summary-footer">
                            <a class="text-muted text-uppercase" href="<?php echo $baseurl; ?>ad/show/psu">(view all)</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="col-xl-6">
        <section class="card card-featured-left card-featured-primary mb-3">
            <div class="card-body">
                <div class="widget-summary">
                    <div class="widget-summary-col widget-summary-col-icon">
                        <div class="summary-icon bg-primary">
                            <i class="fas fa-life-ring"></i>
                        </div>
                    </div>
                    <div class="widget-summary-col">
                        <div class="summary">
                            <h4 class="title">Motherboard</h4>

                            <?php $count=0?>
                            <?php foreach($mboard as $c){ $count++; }?>


                            <div class="info">
                                <strong class="amount"><?php echo $count; ?></strong>
                                <!-- <span class="text-primary">(14 unread)</span> -->
                            </div>
                        </div>
                        <div class="summary-footer">
                            <a class="text-muted text-uppercase" href="<?php echo $baseurl; ?>ad/show/motherboard">(view all)</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="col-xl-6">
        <section class="card card-featured-left card-featured-primary mb-3">
            <div class="card-body">
                <div class="widget-summary">
                    <div class="widget-summary-col widget-summary-col-icon">
                        <div class="summary-icon bg-primary">
                            <i class="fas fa-life-ring"></i>
                        </div>
                    </div>
                    <div class="widget-summary-col">
                        <div class="summary">
                            <h4 class="title">RAM</h4>

                            <?php $count=0?>
                            <?php foreach($ram as $c){ $count++; }?>


                            <div class="info">
                                <strong class="amount"><?php echo $count; ?></strong>
                                <!-- <span class="text-primary">(14 unread)</span> -->
                            </div>
                        </div>
                        <div class="summary-footer">
                            <a class="text-muted text-uppercase" href="<?php echo $baseurl; ?>ad/show/ram">(view all)</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="col-xl-6">
        <section class="card card-featured-left card-featured-primary mb-3">
            <div class="card-body">
                <div class="widget-summary">
                    <div class="widget-summary-col widget-summary-col-icon">
                        <div class="summary-icon bg-primary">
                            <i class="fas fa-life-ring"></i>
                        </div>
                    </div>
                    <div class="widget-summary-col">
                        <div class="summary">
                            <h4 class="title">SSD</h4>

                            <?php $count=0?>
                            <?php foreach($ssd as $c){ $count++; }?>


                            <div class="info">
                                <strong class="amount"><?php echo $count; ?></strong>
                                <!-- <span class="text-primary">(14 unread)</span> -->
                            </div>
                        </div>
                        <div class="summary-footer">
                            <a class="text-muted text-uppercase" href="<?php echo $baseurl; ?>ad/show/ssd">(view all)</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="col-xl-6">
        <section class="card card-featured-left card-featured-primary mb-3">
            <div class="card-body">
                <div class="widget-summary">
                    <div class="widget-summary-col widget-summary-col-icon">
                        <div class="summary-icon bg-primary">
                            <i class="fas fa-life-ring"></i>
                        </div>
                    </div>
                    <div class="widget-summary-col">
                        <div class="summary">
                            <h4 class="title">HDD</h4>

                            <?php $count=0?>
                            <?php foreach($hdd as $c){ $count++; }?>


                            <div class="info">
                                <strong class="amount"><?php echo $count; ?></strong>
                                <!-- <span class="text-primary">(14 unread)</span> -->
                            </div>
                        </div>
                        <div class="summary-footer">
                            <a class="text-muted text-uppercase" href="<?php echo $baseurl; ?>ad/show/hdd">(view all)</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="col-xl-6">
        <section class="card card-featured-left card-featured-primary mb-3">
            <div class="card-body">
                <div class="widget-summary">
                    <div class="widget-summary-col widget-summary-col-icon">
                        <div class="summary-icon bg-primary">
                            <i class="fas fa-life-ring"></i>
                        </div>
                    </div>
                    <div class="widget-summary-col">
                        <div class="summary">
                            <h4 class="title">Casing</h4>

                            <?php $count=0?>
                            <?php foreach($casing as $c){ $count++; }?>


                            <div class="info">
                                <strong class="amount"><?php echo $count; ?></strong>
                                <!-- <span class="text-primary">(14 unread)</span> -->
                            </div>
                        </div>
                        <div class="summary-footer">
                            <a class="text-muted text-uppercase" href="<?php echo $baseurl; ?>ad/show/casing">(view all)</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
    

    <!-- end: page -->

</section>


<?php echo $footer; ?>