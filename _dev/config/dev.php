<?php
#configure your app for the dev environment
#
#include the prod configuration
require __DIR__.'/prod.php';

#enable the debug mode
$app['debug'] = true;