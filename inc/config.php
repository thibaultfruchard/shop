<?php
require_once 'inc/db.php';
require_once 'inc/func.php';

session_name('shop_session');
session_start();

define('FACEBOOK_SDK_ROOT_PATH', 'facebook');

define('FACEBOOK_SDK_V4_SRC_DIR', 'inc/'.FACEBOOK_SDK_ROOT_PATH.'/src/Facebook/');
require __DIR__ . '/'.FACEBOOK_SDK_ROOT_PATH.'/autoload.php';

define('FB_APP_ID', '911544085571972');
define('FB_APP_SECRET', '7783da3269c3fd0925e796904703d867');

$root_path = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);

$back_link = 'index.php';
// Si la page de provenance est définie
if (!empty($_SERVER['HTTP_REFERER'])) {
	// On écrase la variable $back_link avec la page de provenance définie dans $_SERVER['HTTP_REFERER']
	$back_link = $_SERVER['HTTP_REFERER'];
}

$session_products = array();
if (!empty($_SESSION['cart'])) {
	$product_ids_array = array_keys($_SESSION['cart']);
	$product_ids = implode(', ', $product_ids_array);

	$session_products = $db->query('SELECT * FROM products WHERE id IN ('.$product_ids.')')->fetchAll();
}