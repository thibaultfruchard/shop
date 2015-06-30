<?php
require_once 'inc/config.php';

$isAjax = !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';

if (empty($_SESSION['cart'])) {
	if (!$isAjax) {
		header('Location: index.php');
	}
	exit();
}

if(!$isAjax) {
	require_once 'header.php';
}

$products_ids_array = array_keys($_SESSION['cart']);
$products_ids = implode(', ', $products_ids_array);

$products = $db->query('SELECT * FROM products WHERE id IN ('.$products_ids.')')->fetchAll();
?>
<div id="cart-products" class="cart-summary container">
	<div class="row">
		<div class="col-sm-12 col-md-10 col-md-offset-1">

			<h1>Cart summary</h1>

			<table class="table table-hover">
				<thead>
					<tr>
						<th>Product</th>
						<th>Quantity</th>
						<th class="text-center">Price</th>
						<th class="text-center">Total</th>
						<th> </th>
					</tr>
				</thead>
				<tbody>
					<?php
					$subtotal = 0;
					foreach($products as $product) {

					$quantity = $_SESSION['cart'][$product['id']];
					?>
					<tr id="product-<?= $product['id'] ?>">
						<td class="col-sm-8 col-md-6">
							<div class="media">
								<a class="thumbnail pull-left" href="product.php?id=<?= $product['id'] ?>"> <img class="media-object" src="<?= getProductPicture($product['picture']) ?>" style="width: 72px;"> </a>
								<div class="media-body">
									<h4 class="media-heading"><a href="product.php?id=<?= $product['id'] ?>"><?= $product['name'] ?></a></h4>
									<h5 class="media-heading"> by <a href="#">Brand</a></h5>
									<span>Status: </span><span class="text-success"><strong>In Stock</strong></span>
								</div>
							</div>
						</td>
						<td class="col-sm-1 col-md-1" style="text-align: center">
							<input type="email" class="form-control" id="exampleInputEmail1" value="1">
						</td>
						<td class="col-sm-1 col-md-1 text-center"><strong><?= $product['price'] ?> €</strong></td>
						<td class="col-sm-1 col-md-1 text-center"><strong><?= $product['price'] * $quantity ?> €</strong></td>
						<td class="col-sm-1 col-md-1">
							<button type="button" class="btn-remove-cart-product btn btn-danger" data-id="<?= $product['id'] ?>">
								<span class="glyphicon glyphicon-remove"></span> Remove
							</button>
						</td>
					</tr>
					<?php

						$subtotal += ($product['price'] * $quantity);
						$shipping = floor($subtotal * (5 / 100));
						$total = $subtotal + $shipping;
					}
					?>
					<tr>
						<td>   </td>
						<td>   </td>
						<td>   </td>
						<td><h5>Subtotal</h5></td>
						<td class="text-right"><h5><strong id="cart-subtotal"><?= $subtotal ?> €</strong></h5></td>
					</tr>
					<tr>
						<td>   </td>
						<td>   </td>
						<td>   </td>
						<td><h5>Estimated shipping</h5></td>
						<td class="text-right"><h5><strong id="cart-shipping"><?= $shipping ?> €</strong></h5></td>
					</tr>
					<tr>
						<td>   </td>
						<td>   </td>
						<td>   </td>
						<td><h3>Total</h3></td>
						<td class="text-right"><h3><strong id="cart-total"><?= $total ?> €</strong></h3></td>
					</tr>
					<tr>
						<td>   </td>
						<td>   </td>
						<td>   </td>
						<td>
							<a href="index.php" type="button" class="btn btn-default">
								<span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
							</a>
						</td>
						<td>
							<button type="button" class="btn btn-success">
								Checkout <span class="glyphicon glyphicon-play"></span>
							</button>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php
if(!$isAjax) {
	require_once 'footer.php';
}
?>