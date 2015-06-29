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
        'baseUri'       => '/pm/',
        'cacheDir'      => APP_PATH . '/app/cache/',
        'controllersDir'=> APP_PATH . '/app/controllers/',
        'daoDir'        => APP_PATH .  '/app/dao/',
        'libraryDir'    => APP_PATH . '/app/library/',
        'migrationsDir' => APP_PATH . '/app/migrations/',
        'modelsDir'     => APP_PATH . '/app/models/',
        'pluginsDir'    => APP_PATH . '/app/plugins/',
        'serviceDir'    => APP_PATH .  '/app/services/',
        'validatorDir'  => APP_PATH . '/app/validators/',
        'viewsDir'      => APP_PATH . '/app/views/',
        'voDir'         => APP_PATH . '/app/vo/',
        'vendorDir'     => APP_PATH . '/vendor/',
        
        
        
        
    )
));
