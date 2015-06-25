<?php
include_once 'header.php';

$last_products = $db->query('SELECT * FROM products ORDER BY date DESC LIMIT 6')->fetchAll();

?>

        <div class="row">

            <?php include_once 'sidebar.php' ?>

            <div class="col-md-9">

                <?= getSliderPictures() ?>

                <div class="row">

                    <?php
                    foreach($last_products as $product) {
                        echo displayProduct($product, 'product col-sm-4 col-lg-4 col-md-4');
                    }
                    ?>

                </div><!-- /.row -->

            </div><!-- col-md-9 -->

        </div><!-- /.row -->

<?php include_once 'footer.php' ?>