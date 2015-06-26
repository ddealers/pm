<?php


use Phalcon\Mvc\Micro;

error_reporting(E_ALL);

define('APP_PATH', realpath('..'));

$app = new Micro();

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

    $app->setDI($di);

    $app->get("/api/posts", array($di->get("postController"), "get"));
    $app->get("/api/posts/{id}", array($di->get("postController"), "findById"));
    $app->post("/api/users", array($di->get("userController"), "register"));
    $app->post("/api/auth", array($di->get("authenticationController"), "login"));

    $app->notFound(function () {
        $response = new \Phalcon\Http\Response();
        $response->setStatusCode(404, 'Not Found')->sendHeaders();
        $response->setJsonContent(["message"=>'Service doesn\'t exist.']);
        $response->send();
    });

    $app->handle();

} catch (\Exception $e) {
    $app->response->setStatusCode(500, "Server Error");
    $app->response->setJsonContent(["message" => $e->getMessage()]);
    $app->response->send();
}
