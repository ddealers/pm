<?php

$loader = new \Phalcon\Loader();

$loader->registerNamespaces(
    array(
        "Pm\\Vo"  => __DIR__ . '/../../app/vo/',
        "Pm\\Model"  => __DIR__ . '/../../app/models/',
        "Pm\\Services"  => __DIR__ . '/../../app/services/',
        "Pm\\DAO"  => __DIR__ . '/../../app/dao/',
        "Pm\\Controller"  => __DIR__ . '/../../app/controllers/',
        "Pm\\Validator"  => __DIR__ . '/../../app/validators/',
        "Pm\\Constants"  => __DIR__ . '/../../app/constants/'
    )
);

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerDirs(
    array(
        $config->application->controllersDir,
        $config->application->modelsDir,
        $config->application->serviceDir,
        $config->application->daoDir
    )
)->register();

include(APP_PATH."/vendor/jms/serializer/src/JMS/Serializer/Annotation/XmlRoot.php");
include(APP_PATH."/vendor/jms/serializer/src/JMS/Serializer/Annotation/XmlAttribute.php");
include(APP_PATH."/vendor/jms/serializer/src/JMS/Serializer/Annotation/ExclusionPolicy.php");
include(APP_PATH."/vendor/willDurand/hateoas/src/Hateoas/Configuration/Annotation/Relation.php");
include(APP_PATH."/vendor/willDurand/hateoas/src/Hateoas/Configuration/Annotation/RelationProvider.php");
include(APP_PATH."/vendor/willDurand/hateoas/src/Hateoas/Configuration/Annotation/Route.php");
