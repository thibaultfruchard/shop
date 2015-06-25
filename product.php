<?php
include_once 'header.php';

if (empty($_GET['id'])) {
    header('Location: index.php');
    exit();
}

$id = intval($_GET['id']);

$query = $db->prepare('SELECT * FROM products WHERE id = :id');
$query->bindValue('id', $id, PDO::PARAM_INT);
$query->execute();
$full_product = $query->fetch();

?>

        <div class="row">

            <?php include 'sidebar-product.php' ?>

            <div class="col-md-9">

                <div class="product-full">
                    <div class="thumbnail">
                        <img class="img-responsive" src="<?= getProductPicture($full_product['picture']) ?>" alt="">
                        <div class="caption-full">
                            <h4 class="pull-right"><?= $full_product['price'] ?> €</h4>
                            <h4><?= $full_product['name'] ?></h4>
                            <?= nl2br($full_product['description']) ?>
                        </div>
                        <div class="ratings">
                            <?= getProductRating($full_product['rating']) ?>
                        </div>
                        <div class="btns text-center clearfix">
                            <a class="btn btn-success" href=""><span class="glyphicon glyphicon-shopping-cart"></span> Add to cart</a>
                        </div>
                    </div><!-- /.thumbnail -->
                </div><!-- /.product-full -->

                <div class="well">

                    <div class="text-right">
                        <a class="btn btn-primary">Leave a Review</a>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            Anonymous
                            <span class="pull-right">10 days ago</span>
                            <p>This product was great in terms of quality. I would definitely buy another!</p>
                        </div>
                    </div><!-- /.row -->

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            Anonymous
                            <span class="pull-right">12 days ago</span>
                            <p>I've alredy ordered another one!</p>
                        </div>
                    </div><!-- /.row -->

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            Anonymous
                            <span class="pull-right">15 days ago</span>
                            <p>I've seen some better than this, but not at this price. I definitely recommend this item.</p>
                        </div>
                    </div><!-- /.row -->

                </div><!-- /.well -->

            </div><!-- /.col-md-9 -->

        </div><!-- /.row -->

<?php include_once 'footer.php' ?>