<?php


use Phalcon\Mvc\Micro;

error_reporting(E_ALL);

define('APP_PATH', realpath('..'));


try {

    /**
     * Read the configuration
     */
    $config = include APP_PATH . "/app/config/config.php";

    /**
     * Read auto-loader
     */
    include APP_PATH . "/app/config/loader.php";

    /**
     * Include composer autoloader
     */
    require APP_PATH . "/vendor/autoload.php";

    /**
     * Read services
     */
    include APP_PATH . "/app/config/services.php";

    /**
     * Handle the request
     */
    $app = new Micro($di);

    $app->get("/api/posts", array($di->get("postController"),"get"));
    $app->get("/api/posts/{id}", array($di->get("postController"),"findById"));
    $app->post("/api/users", array($di->get("userController"),"register"));
    $app->post("/api/auth", array($di->get("authenticationController"),"login"));

    $app->handle();

} catch (\Exception $e) {
    echo $e->getMessage();
}
