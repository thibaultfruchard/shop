<?php
include_once 'header.php';

if (empty($session_products)) {
    header('Location: '.$back_link);
    exit();
}
?>
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Total</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $sub_total = 0;

                    foreach($session_products as $product) {
                    ?>
                    <tr>
                        <td class="col-sm-8 col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="product.php?id=<?= $product['id'] ?>"> <img class="media-object" src="<?= getProductPicture($product['picture']) ?>" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="product.php?id=<?= $product['id'] ?>"><?= $product['name'] ?></a></h4>
                                <!--<h5 class="media-heading"> by <a href="#">Brand name</a></h5>-->
                                <span>Status: </span><span class="text-success"><strong>In Stock</strong></span>
                            </div>
                        </div></td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                        <input type="text" class="form-control" value="1">
                        </td>
                        <td class="col-sm-1 col-md-1 text-center"><strong><?= $product['price'] ?> €</strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>X €</strong></td>
                        <td class="col-sm-1 col-md-1">
                        <a href="cart-update.php?id=<?= $product['id'] ?>&action=remove" class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove"></span> Remove
                        </button></td>
                    </tr>
                    <?php
                        $sub_total += $product['price'];
                    }

                    $shipping_cost = $sub_total * (5 / 100);
                    $total = $sub_total + $shipping_cost;
                    ?>

                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Subtotal</h5></td>
                        <td class="text-right"><h5><strong><?= $sub_total ?> €</strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Estimated shipping</h5></td>
                        <td class="text-right"><h5><strong><?= $shipping_cost ?> €</strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Total</h3></td>
                        <td class="text-right"><h3><strong><?= $total ?> €</strong></h3></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                        <button type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                        </button></td>
                        <td>
                        <button type="button" class="btn btn-success">
                            Checkout <span class="glyphicon glyphicon-play"></span>
                        </button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include_once 'footer.php' ?>