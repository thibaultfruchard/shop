<?php
require_once 'inc/config.php';

$id = !empty($_GET['id']) ? intval($_GET['id']) : 0;
$action = !empty($_GET['action']) ? $_GET['action'] : '';

if (!empty($id) && !empty($action)) {

	$query = $db->prepare('SELECT * FROM products WHERE id = :id');
	$query->bindValue('id', $id, PDO::PARAM_INT);
	$query->execute();
	$product = $query->fetch();

	if (!empty($product)) {

		if (empty($_SESSION['cart'])) {
			$_SESSION['cart'] = array();
		}

		switch($action) {
			case 'add':
				$_SESSION['cart'][$id] = 1;
			break;
			case 'remove':
				unset($_SESSION['cart'][$id]);
			break;
		}
	}
}

header('Location: '.$back_link);