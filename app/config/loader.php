<?php

$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerDirs(
    array(
        $config->application->controllersDir,
        $config->application->modelsDir,
        $config->application->serviceDir,
        $config->application->daoDir,
        $config->application->voDir
    )
)->register();

include(APP_PATH."/vendor/jms/serializer/src/JMS/Serializer/Annotation/XmlRoot.php");
include(APP_PATH."/vendor/jms/serializer/src/JMS/Serializer/Annotation/XmlAttribute.php");
include(APP_PATH."/vendor/jms/serializer/src/JMS/Serializer/Annotation/ExclusionPolicy.php");
include(APP_PATH."/vendor/willDurand/hateoas/src/Hateoas/Configuration/Annotation/Relation.php");
include(APP_PATH."/vendor/willDurand/hateoas/src/Hateoas/Configuration/Annotation/RelationProvider.php");
