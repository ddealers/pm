<?php

defined('APP_PATH') || define('APP_PATH', realpath('.'));

return new \Phalcon\Config(array(
    'database' => array(
        'adapter'     => 'Mysql',
        'host'        => '64.49.246.147',
        'username'    => 'victoria',
        'password'    => 'Vicky0ne',
        'dbname'      => 'bender_dev',
        'charset'     => 'utf8',
    ),
    'application' => array(
        'controllersDir' => APP_PATH . '/app/controllers/',
        'serviceDir' => APP_PATH .  '/app/services/',
        'daoDir' => APP_PATH .  '/app/dao/',
        'voDir' => APP_PATH . '/app/vo/',
        'vendorDir' => APP_PATH . '/vendor/',
        'modelsDir'      => APP_PATH . '/app/models/',
        'migrationsDir'  => APP_PATH . '/app/migrations/',
        'viewsDir'       => APP_PATH . '/app/views/',
        'pluginsDir'     => APP_PATH . '/app/plugins/',
        'libraryDir'     => APP_PATH . '/app/library/',
        'cacheDir'       => APP_PATH . '/app/cache/',
        'baseUri'        => '/pm/',
    )
));
