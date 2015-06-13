<?php 
$app = require __DIR__.'/../src/app.php';

if (ENV == 'dev') {
	require __DIR__.'/../config/dev.php';
} else if (ENV == 'prod') {
	require __DIR__.'/../config/prod.php';
} else {
	die("Enviroment not found on /config/config.php 'dev/prod'");
}

require __DIR__ . '/../src/index.php';


$app->run();

include_once('../templates/test/tester.php');

