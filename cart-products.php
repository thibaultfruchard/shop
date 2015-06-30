<?php
require_once 'inc/config.php';

if (empty($_SESSION['cart'])) {
	exit();
}

$products_ids_array = array_keys($_SESSION['cart']);
$products_ids = implode(', ', $products_ids_array);

$products = $db->query('SELECT * FROM products WHERE id IN ('.$products_ids.')')->fetchAll();

foreach($products as $product) {
?>
<li id="product-<?= $product['id'] ?>" title="<?= $product['name'] ?>">
	<span class="item">
		<span class="item-left">
			<img src="<?= getProductPicture($product['picture']) ?>" width="50" alt="" />
			<span class="item-info">
				<span><?= cutString($product['name'], 15) ?></span>
				<span><?= $product['price'] ?> €</span>
			</span>
		</span>
		<span class="item-right">
			<button class="btn-remove-cart-product" data-id="<?= $product['id'] ?>" class="btn btn-xs btn-danger pull-right">
				<span class="glyphicon glyphicon-trash"></span>
			</button>
		</span>
	</span>
</li>
<?php } ?>

<li class="divider"></li>
<li><a class="text-center" href="">View Cart</a></li>