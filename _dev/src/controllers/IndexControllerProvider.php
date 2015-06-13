<?php
namespace Controllers;

use Silex\Application;
use Silex\ControllerProviderInterface;

class IndexControllerProvider implements ControllerProviderInterface
{

    public function connect(Application $app)
    {	
        $controllers = $app['controllers_factory'];

        $app['indexModel'] = $app->share(function() use ($app) {
		   return new \Models\Index($app);
		});
        
        $controllers->get('/', 'indexModel:home');
        $controllers->get('/{page}', 'indexModel:getPage');
        $controllers->get('/{page}/{post}', 'indexModel:getSingle');

        return $controllers;
    }
    
}