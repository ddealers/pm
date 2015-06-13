<?php
#Zona horaria
date_default_timezone_set("America/Mexico_city");
#configure enviroment
define('ENV','dev');

if (ENV == 'dev') {
	#Configurar base de datos
	define('DB_HOST','127.0.0.1'); //Host de la base de datos
	define('DB_NAME','bender'); //Base de datos
	define('DB_USER','root'); //Usuario de la DB
	define('DB_PASS','0TO6yljf'); // Contraseña de la base de datos

	#Statics files (js, css, etc...)
	define('ASSETS', '');


} else if (ENV == 'prod') {
	#Configurar base de datos
	define('DB_HOST',''); //Host de la base de datos
	define('DB_NAME',''); //Base de datos
	define('DB_USER',''); //Usuario de la DB
	define('DB_PASS',''); // Contraseña de la base de datos

	#Statics files (js, css, etc...)
	define('ASSETS', 'http://a9.g.akamai.net/f/9/250733/1m/pmcanal5.download.akamai.com/250733/');

} else {
	#Configurar base de datos
	define('DB_HOST',''); //Host de la base de datos
	define('DB_NAME',''); //Base de datos
	define('DB_USER',''); //Usuario de la DB
	define('DB_PASS',''); // Contraseña de la base de datos

	#Statics files (js, css, etc...)
	define('ASSETS', '');
	
}