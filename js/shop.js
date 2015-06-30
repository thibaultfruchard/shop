var shop = {

	debug: true,

	init: function() {
		$('.btn-add-to-cart').unbind('click').click(function() {
			var product_id = $(this).data('id');
			shop.addToCart(product_id);
		});
		$('.btn-remove-cart-product').unbind('click').click(function(e) {
			var product_id = $(this).data('id');
			shop.removeCartProduct(product_id);

			e.preventDefault();
			e.stopPropagation();
		});
		$('#cart-products-dropdown').unbind('click').click(function() {
			if ($(this).attr('aria-expanded') == 'false') {
				var cart = shop.getCart();
			}
		});
	},

	getCart: function() {
		$.ajax({
			method: 'POST',
			url: 'ajax-cart-products.php'
		})
		.done(function(result) {
			$('#cart-products').html(result).show();
			shop.init();
			return true;
		})
	},

	addToCart: function(product_id) {
		shop.updateCart(product_id, 'add');
	},

	removeCartProduct: function(product_id) {
		shop.updateCart(product_id, 'remove');
	},

	updateCart: function(product_id, action) {
		$.ajax({
			method: 'POST',
			url: 'ajax-cart-update.php',
			data: {id: product_id, action: action},
			dataType: 'json'
		})
		.done(function(result) {
			if (typeof(result.error) !== 'undefined') {
				if (shop.debug) {
					console.log(result.error);
				}
				return false;
			}
			$('#cart-products-count').text(result.count);
			$('#cart-products-dropdown').removeClass('disabled');

			switch(action) {

				case 'add':
					$('#cart-products-dropdown').trigger('click');
				break;
				case 'remove':
					$('#product-'+product_id).fadeOut(function() {
						$(this).remove();
						shop.reloadCartSummary(result);
					});
				break;
				case 'delete':
				break;
			}

			if (result.count == 0) {
				$('#cart-products').hide();
				$('#cart-products-dropdown').addClass('disabled');
			}
		})
	},

	reloadCartSummary: function(result) {
		if ($('.cart-summary').length > 0) {
			if (result.count > 0) {
				$('.cart-summary').parent().load('cart-summary.php', function() {
					shop.init();
				});
			} else {
				$('.cart-summary').html('');
				location.href = 'index.php';
			}
		}
	}
};