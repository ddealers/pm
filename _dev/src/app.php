<?php
require_once __DIR__.'/../vendor/autoload.php';
require_once(__DIR__ . '/../config/config.php'); 

use Silex\Application;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;

$app = new Application();
$app->register(new TwigServiceProvider());
$app->register(new ServiceControllerServiceProvider());

#Configure assets path for twig
$app['twig'] = $app->extend('twig', function ($twig, $app) {
    $twig->addFunction(new \Twig_SimpleFunction('asset', function ($asset) use ($app) {
        return ASSETS . $asset;
    }));

    return $twig;
});

return $app;