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