                    <div class="<?= $class ?>">
                        <div class="thumbnail">
                            <img src="<?= getProductPicture($product['picture']) ?>" alt="">
                            <div class="caption">
                                <h4 class="pull-right"><?= $product['price'] ?> €</h4>
                                <h4><a href="product.php?id=<?= $product['id'] ?>"><?= cutString($product['name'], 20) ?></a>
                                </h4>
                                <p><?= cutString($product['description'], 50) ?></p>
                            </div>
                            <div class="ratings">
                                <?= getProductRating($product['rating'], mt_rand(0, 15)) ?>
                            </div>
                            <div class="btns clearfix">
                                <a class="btn btn-info pull-left" href="product.php?id=<?= $product['id'] ?>"><span class="glyphicon glyphicon-eye-open"></span> View</a>
                                <a class="btn btn-primary pull-right" href="product.php?id=<?= $product['id'] ?>"><span class="glyphicon glyphicon-shopping-cart"></span> Add to cart</a>
                            </div>
                        </div><!-- /.thumbnail -->
                    </div><!-- /.product -->