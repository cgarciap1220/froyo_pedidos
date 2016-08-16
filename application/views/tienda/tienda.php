<div class="panel panel-default">
    <div class="panel-heading"><?php echo $titulo; ?></div>
    <div class="panel-body">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#tienda" aria-controls="tienda" role="tab" data-toggle="tab">Store</a></li>
            <li role="presentation"><a href="#tendencia" aria-controls="tendencia" role="tab" data-toggle="tab">my last shopping</a></li>
        </ul>


        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="tienda">
                <?php
                $cont = 1;
                for ($i = 0; $i < 8; $i++) {
                    ?>
                    <div class="col-sm-6 col-lg-3 col-md-4 other">
                        <div class="product-list-box thumb">
                            <a href="" class="image-popup" title="Screenshot-1">
                                <img src="<?php echo base_url(); ?>assets/images/products/big/<?php echo $cont ?>.jpg" class="thumb-img" alt="work-thumbnail">
                            </a>

                            <div class="product-action">
                                <!--<a href="#" class="btn btn-success btn-sm"><i class="md md-add-shopping-cart"></i></a>-->
                            </div>

                            <div class="detail">
                                <h4 class="m-t-0 m-b-5"><a href="" class="text-dark" style="text-align: center"><?php echo $productos[$i]['nombre_producto'] ?></a></h4>
                                <div class="rating">
                                </div>
                                <!--<h5 class="m-0"><span class="text-custom">$ 125</span> <span class="text-muted m-l-15"> Stock </span></h5>-->
                            </div>
                        </div>
                    </div>
                    <?php
                    $cont++;
                }
                ?>
            </div>
            <div role="tabpanel" class="tab-pane fade " id="tendencia">
                <?php
                $cont = 1;
                for ($i = 0; $i < 3; $i++) {
                    ?>
                    <div class="col-sm-6 col-lg-3 col-md-4 other">
                        <div class="product-list-box thumb">
                            <a href="#" class="image-popup" title="Screenshot-1">
                                <img src="<?php echo base_url(); ?>assets/images/products/big/<?php echo $cont ?>.jpg" class="thumb-img" alt="work-thumbnail">
                            </a>

                            <div class="product-action">
                                <!--<a href="#" class="btn btn-success btn-sm"><i class="md md-add-shopping-cart"></i></a>-->

                            </div>

                            <div class="detail">
                                <h4 class="m-t-0 m-b-5"><a href="" class="text-dark">Product</a></h4>
                                <div class="rating">

                                </div>
                                <h5 class="m-0"><span class="text-custom">$ 125</span> <span class="text-muted m-l-15"> Stock.</span></h5>

                            </div>
                        </div>
                    </div>
                    <?php
                    $cont++;
                }
                ?>
            </div>
        </div>  
    </div>
</div>
