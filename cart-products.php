<?php
require_once 'inc/config.php';

if (empty($session_products)) {
	return;
}

foreach($session_products as $product) {
?>
<li id="product-<?= $product['id'] ?>" title="<?= $product['name'] ?>">
	<span class="item">
		<span class="item-left">
			<img src="<?= getProductPicture($product['picture']) ?>" width="50" alt="" />
			<span class="item-info">
				<span><strong><?= cutString($product['name'], 15) ?></strong></span>
				<span><?= $product['price'] ?> €</span>
			</span>
		</span>
		<span class="item-right">
			<a href="cart-update.php?id=<?= $product['id'] ?>&action=remove" class="btn-remove-cart-product" data-id="<?= $product['id'] ?>" class="btn btn-xs btn-danger pull-right">
				<span class="glyphicon glyphicon-trash"></span>
			</a>
		</span>
	</span>
</li>
<?php } ?>

<li class="divider"></li>
<li><a class="text-center" href="cart-summary.php">View Cart</a></li>