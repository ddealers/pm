<?php
/**
 * Services are globally registered in this file
 *
 * @var \Phalcon\Config $config
 */

use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;
use Phalcon\Di\FactoryDefault;
use Phalcon\Events\Manager as EventsManager;
use Phalcon\Logger;
use Phalcon\Logger\Adapter\File as FileLogger;
use Phalcon\Mvc\Model\MetaData\Memory;
use Phalcon\Mvc\Url as UrlResolver;
use Phalcon\Mvc\View;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\Session\Adapter\Files as SessionAdapter;
use Pm\Controller\PostController;
use Pm\Controller\UserController;
use Pm\Controllers\AuthenticationController;
use Pm\DAO\PostDAO;
use Pm\DAO\UserDAO;
use Pm\Services\ErrorMessageBuilder;
use Pm\Services\PostResultSetTransformerService;
use Pm\Services\UserTransformerService;
use Pm\Validators\UserRegistrationValidator;

/**
 * The FactoryDefault Dependency Injector automatically register the right services providing a full stack framework
 */
$di = new FactoryDefault();

$di->set("postDAO", function(){
    $postDAO = new PostDAO();
    return $postDAO;
});

$di->set("userDAO", function(){
    $userDAO = new UserDAO();
    return $userDAO;
});

$di->set("postResultSetResultSetTransformerService", function(){
    $postTransformerService = new PostResultSetTransformerService();
    return $postTransformerService;
});
$di->set("userTransformerService", function(){
    $userTransformerService = new UserTransformerService();
    return $userTransformerService;
});

$di->set("userRegistrationValidator", function(){
    $userRegistrationValidator = new UserRegistrationValidator();
    return $userRegistrationValidator;
});

$di->set("errorMessageBuilder", function(){
    $errorMessageBuilder = new ErrorMessageBuilder();
    return $errorMessageBuilder;
});

$di->set("postController", function() use($di){
    $postController = new PostController();
    $postController->setPostDAO($di->get("postDAO"));
    $postController->setPostResultSetTransformerService($di->get("postResultSetResultSetTransformerService"));
    return $postController;
});

$di->set("userController", function() use($di){
    $userController = new UserController();
    $userController->setUserTransformerService($di->get("userTransformerService"));
    $userController->setValidator($di->get("userRegistrationValidator"));
    $userController->setErrorMessageBuilder($di->get("errorMessageBuilder"));
    $userController->setUserDAO($di->get("userDAO"));
    return $userController;
});

$di->set("authenticationController", function() use($di){
    $authenticationController = new AuthenticationController();
    $authenticationController->setErrorMessageBuilder($di->get("errorMessageBuilder"));
    $authenticationController->setUserDAO($di->get("userDAO"));
    return $authenticationController;
});

/**
 * The URL component is used to generate all kind of urls in the application
 */
$di->set('url', function () use ($config) {
    $url = new UrlResolver();
    $url->setBaseUri($config->application->baseUri);

    return $url;
}, true);

/**
 * Setting up the view component
 */
$di->setShared('view', function () use ($config) {

    $view = new View();

    $view->setViewsDir($config->application->viewsDir);

    $view->registerEngines(array(
        '.volt' => function ($view, $di) use ($config) {

            $volt = new VoltEngine($view, $di);

            $volt->setOptions(array(
                'compiledPath' => $config->application->cacheDir,
                'compiledSeparator' => '_'
            ));

            return $volt;
        },
        '.phtml' => 'Phalcon\Mvc\View\Engine\Php'
    ));

    return $view;
});

/**
 * Database connection is created based in the parameters defined in the configuration file
 */
$di->set('db', function () use ($config) {

    $eventsManager = new EventsManager();

    $logger = new FileLogger('persistence.log');

    //Listen all the database events
    $eventsManager->attach('db', function($event, $connection) use ($logger) {
        if ($event->getType() == 'beforeQuery') {
            $logger->log($connection->getSQLStatement(), Logger::INFO);
        }
    });

    $dbAdapter = new DbAdapter($config->database->toArray());
    $dbAdapter->setEventsManager($eventsManager);
    return $dbAdapter;
});

/**
 * If the configuration specify the use of metadata adapter use it or use memory otherwise
 */
$di->set('modelsMetadata', function () {
    return new Memory();
});

/**
 * Start the session the first time some component request the session service
 */
$di->setShared('session', function () {
    $session = new SessionAdapter();
    $session->start();
    return $session;
});
