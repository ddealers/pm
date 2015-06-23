<?php

function getCorrectLabel($label) {
	$response = '';

	switch($label) {
		case 'lomasvisto' :
			$response = "lo+visto";
			break;
		case 'lomasvotado' :
			$response = "lo_mejor";
			break;
		case 'lomasnuevo' :
			$response = "lo+nuevo";
			break;
		case 'recomendado' :
			$response = "recomendado";
			break;
		case 'normal' :
			$response = "normal";
			break;
	}

	return $response;

}

function getCorrectType($type) {
	switch($type) {
		case 'digital' :
			$cresponse = 'Canal Digital';
			break;
		case 'tv' :
			$cresponse = 'Ver Video';
			break;
		case 'galeria' :
			$cresponse = 'Ver Fotos';
			break;
		case 'gif' :
			$cresponse = 'Ver GIFs';
			break;
		case 'imagen' :
			$cresponse = 'Ver imagen';
			break;
		case 'memes' :
			$cresponse = 'Ver memes';
			break;
		case 'articulo' :
			$cresponse = 'Ver Nota';
			break;
		case 'playlist' :
			$cresponse = 'Escuchar';
			break;
		case 'promoabierto' :
		case 'promo' :
			$cresponse = 'Promocional';
			break;
		case 'top5':
			$cresponse = 'Ver Top5';
			break;
		default :
			$cresponse = 'Ver video';
			break;
	}
	return $cresponse;
}

/**
*Desencripta un string
*/
function decrypt($string) {
	//$str = (substr($string, -2) == '==' || substr($string, -1) == '=')?utf8_decode(base64_decode($string)):$string;
	return utf8_decode(base64_decode($string));
}

function isHost($host) {
	$response = false;
	$hosts = array('http://fender.victoria.local','http://fender2.victoria.local',
		'http://boxy.victoria.local','http://www.pmcanal5.com',
		'http://wjhkc62q.pmcanal5.com','http://wjhkc62q.victoria-kitchen.com',
		'http://pmdev.victoria-kitchen.com','http://3710a250205-pmcanal5.victoria-kitchen.com',
		'http://pmcanal5.victoria-kitchen.com',
        'http://localhost'
    );

	foreach ($hosts as $h) {
		if (strstr($host, $h)) {
			$response = true;
		}
	}

	return $response;
}
?>