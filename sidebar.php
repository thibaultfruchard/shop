<?php

$random_products = $db->query('SELECT * FROM products ORDER BY RAND() LIMIT 2')->fetchAll();

?>
            <div class="col-md-3">

                <p class="lead">Categories</p>
                <div class="list-group">
                    <a href="#" class="list-group-item">Category 1</a>
                    <a href="#" class="list-group-item">Category 2</a>
                    <a href="#" class="list-group-item">Category 3</a>
                    <a href="#" class="list-group-item">Category 4</a>
                    <a href="#" class="list-group-item">Category 5</a>
                </div>

                <p class="lead">Featured products</p>

                <?php
                foreach($random_products as $product) {
                    echo displayProduct($product);
                }
                ?>

            </div><!-- /.col-md-3 -->