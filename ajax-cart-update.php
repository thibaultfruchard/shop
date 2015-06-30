<?php
require_once 'inc/config.php';

$id = !empty($_POST['id']) ? intval($_POST['id']) : 0;
$action = !empty($_POST['action']) ? $_POST['action'] : 'add';
$quantity = !empty($_POST['quantity']) ? intval($_POST['quantity']) : 1;

if (empty($id)) {
	exit(json_encode(array('error' => 'Undefined Product Id')));
}

$query = $db->prepare('SELECT * FROM products WHERE id = :id');
$query->bindValue('id', $id, PDO::PARAM_INT);
$query->execute();
$product = $query->fetch();

if (empty($product)) {
	exit(json_encode(array('error' => 'Undefined Product')));
}

if (empty($_SESSION['cart'])) {
	$_SESSION['cart'] = array();
}

switch ($action) {
	case 'add':
		if (empty($_SESSION['cart'][$id])) {
			$_SESSION['cart'][$id] = 1;
		} else {
			$_SESSION['cart'][$id] += $quantity;
		}
	break;

	case 'remove':
		if (!empty($_SESSION['cart'][$id])) {
			unset($_SESSION['cart'][$id]);
		}
	break;

	case 'delete':
		unset($_SESSION['cart'][$id]);
	break;

	default:
		exit(json_encode(array('error' => 'Undefined Action')));
	break;
}

$result = array(
	'cart' => $_SESSION['cart'],
	'count' => count($_SESSION['cart'])
);

echo json_encode($result);