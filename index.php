<?php
include_once 'header.php';

$last_products = $db->query('SELECT * FROM products ORDER BY date DESC LIMIT 6')->fetchAll();

?>

        <div class="row">

            <?php include_once 'sidebar.php' ?>

            <div class="col-md-9">

                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="4"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div><!-- /.carousel -->
                    </div><!-- /.col-md-12 -->

                </div><!-- /.row.carousel-holder -->

                <div class="row">

                    <?php foreach($last_products as $product) { ?>
                    <div class="product col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="<?= getProductPicture($product['picture']) ?>" alt="">
                            <div class="caption">
                                <h4 class="pull-right"><?= $product['price'] ?> €</h4>
                                <h4><a href="#"><?= $product['name'] ?></a>
                                </h4>
                                <p><?= cutString($product['description'], 0, 50) ?></p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">15 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                </p>
                            </div>
                            <div class="btns clearfix">
                                <a class="btn btn-info pull-left" href="product.html"><span class="glyphicon glyphicon-eye-open"></span> View</a>
                                <a class="btn btn-primary pull-right" href="product.html"><span class="glyphicon glyphicon-shopping-cart"></span> Add to cart</a>
                            </div>
                        </div><!-- /.thumbnail -->
                    </div><!-- /.product -->
                    <?php } ?>

                </div><!-- /.row -->

            </div><!-- col-md-9 -->

        </div><!-- /.row -->

<?php include_once 'footer.php' ?>