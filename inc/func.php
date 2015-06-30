<?php

/*
Utils Functions
*/

function getRandomDate() {

	$rand_year = rand(2014, 2015);
	$rand_month = sprintf('%1$02d', $rand_year == 2015 ? rand(1, 6) : rand(7, 12));
	$rand_day = sprintf('%1$02d', rand(1, 29));
	$rand_hour = sprintf('%1$02d', rand(0, 23));
	$rand_minute = sprintf('%1$02d', rand(0, 59));
	$rand_second = sprintf('%1$02d', rand(0, 59));

	$rand_date = $rand_year.'-'.$rand_month.'-'.$rand_day.' '.$rand_hour.':'.$rand_minute.':'.$rand_second;

	return $rand_date;
}

/*
	Fonction qui coupe une chaine en preservant les mots
	et ajoute une chaine à la fin du texte
*/
function cutString($text, $max_length = 0, $end = '...', $sep = '[@]') {

	// Si la variable $max_length est définie, supérieure à 0
	// Et que la longueur de la chaine $text est supérieure à $ max_length
	if ($max_length > 0 && strlen($text) > $max_length) {

		// On insère une chaine dans le texte tous les X caractères sans couper les mots
		$text = wordwrap($text, $max_length, $sep, true);
		// On découpe notre chaine en plusieurs bouts répartis dans un tableau
		$text = explode($sep, $text);

		// On retour le premier element du tableau concaténé avec la chaine $end
		return $text[0].$end;
	}

	// On retourne la chaine de départ telle quelle
	return $text;
}

/*
Product Functions
*/

function getProductPicture($picture = '') {

	$img = 'http://placehold.it/320x150';

	if (!empty($picture)) {
		$img_path = 'img/product/'.$picture;
		if (file_exists($img_path)) {
			return $img_path;
		}
	}
	return $img;
}

function getProductRating($rating = 0.0, $count_reviews = 0) {

	$html = '';

	if ($count_reviews > 0) {
		$html .= '<p class="pull-right">'.$count_reviews.' reviews</p>';
	}

	$html .= '<p>';

	for($i = 0; $i < 5; $i++) {

		$class = 'glyphicon-star-empty';
		if ($rating > $i) {
			$class = 'glyphicon-star';
		}

		$html .= '<span class="glyphicon '.$class.'"></span>';
	}

	$html .= '<span class="badge">'.$rating.' stars</span>';
	$html .= '</p>';

	return $html;
}

function displayProduct($product, $class = 'product') {

	if (empty($product) || !is_array($product)) {
		return '';
	}

	include 'product-block.php';
}

function getSliderPictures($max_count = 0) {

	$slider_pictures = glob('img/slider/*.jpg');

	if (empty($slider_pictures)) {
		return '';
	}

	include 'slider.php';
}

function redirectJS($url, $delay = 1) {
	return '
	<script>
	setTimeout(function() {
		location.href = "'.$url.'";
	}, '.($delay * 1000).');
	</script>
	';
}


/* Authent */

define('REMEMBER_ME_SECRET_KEY', 'grain de sable 2015');

function getUserToken() {
	$protocol = $_SERVER['REQUEST_SCHEME']; // Contient le protocole en cours http ou https

	// On définit l'empreinte de l'utilisateur, url en cours et user agent
	$footprints = $protocol.'://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'].$_SERVER['HTTP_USER_AGENT'];

	// On crée un jeton qui contient la clé secrète concaténée avec l'empreinte de l'utilisateur
	$token = REMEMBER_ME_SECRET_KEY.$footprints;

	return $token;
}

function setRememberMe($user_id, $expiration) {

	$current_time = time(); // On définit le timestamp actuel

	$token = getUserToken();

	// On définit une chaîne qui contient nos infos en clair
	$user_data = $current_time.'.'.$user_id;

	// On crypte les informations en clair concaténées avec le jeton
	$crypted_token = hash('sha256', $token.$user_data);

	// On stock les infos en clair et les infos cryptées dans des cookies
	setcookie('rememberme_data', $user_data, $current_time + $expiration);
	setcookie('rememberme_token', $crypted_token, $current_time + $expiration);
}

function getRememberMe($expiration) {

	if (empty($_COOKIE['rememberme_data']) || empty($_COOKIE['rememberme_token'])) {
		return false;
	}

	$current_time = time(); // On définit le timestamp actuel

	$token = getUserToken();

	// On crypt les informations du cookie concaténées avec le jeton
	$crypted_token = hash('sha256', $token.$_COOKIE['rememberme_data']);

	// On vérifie que le jeton du cookie est égal au jeton crypté au dessus
	if(strcmp($_COOKIE['rememberme_token'], $crypted_token) !== 0) {
		return false;
	}

	// On récupère les infos du cookie dans 2 variables, correspondant aux 2 entrées du tableau renvoyé par explode
	list($user_time, $user_id) = explode('.', $_COOKIE['rememberme_data']);

	// On vérifie que le timestamp défini dans le cookie expire dans le futur et qu'il a été défini dans le passé
	if($user_time + $expiration > $current_time && $user_time < $current_time) {
		return $user_id;
	}
	return false;
}

