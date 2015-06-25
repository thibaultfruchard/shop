<?php

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