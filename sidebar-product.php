<?php

$query = $db->prepare('SELECT * FROM products WHERE category = :category ORDER BY RAND() LIMIT 3');
$query->bindValue('category', $full_product['category'], PDO::PARAM_INT);
$query->execute();
$related_products = $query->fetchAll();
?>

            <div class="col-md-3">

                <p class="lead">Categories</p>
                <div class="list-group">
                    <a href="#" class="list-group-item active">Category 1</a>
                    <a href="#" class="list-group-item">Category 2</a>
                    <a href="#" class="list-group-item">Category 3</a>
                </div>

                <p class="lead">Related products</p>

                <?php
                foreach($related_products as $product) {
                    echo displayProduct($product);
                }
                ?>

            </div><!-- /.col-md-3 -->