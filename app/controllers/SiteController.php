<?php
namespace Pm\Controller;

use Phalcon\Http\Response;
use Phalcon\Mvc\Controller;

class SiteController extends Controller
{

    public function home()
    {
    	$this->view->render('index','index');
    }
}