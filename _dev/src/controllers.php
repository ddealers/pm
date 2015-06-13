<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

//Request::setTrustedProxies(array('127.0.0.1'));
$prueba= 'Primera prueba silex';
 $id_g = (array) json_decode(file_get_contents('http://fender.victoria.local/json/Break.json'));

 $id_b = (array) json_decode(file_get_contents('http://fender.victoria.local/json/Break.json'));

 $id_a = (array) json_decode(file_get_contents('http://fender.victoria.local/json/Area_Chica.json'));



foreach ($id_g as $id_1){

 $id=$id_1->id;
 $date=$id_1->date;
 $program_name=$id_1->program_name;
 $content=$id_1->content;
        $app->get('/', function () use ($app,$id,$content,$date,$program_name) {
                            return $app['twig']->render('index.php', array(
                        'id' => $id, 
                        'date' => $date, 
                        'program_name' => $program_name,
                        'content' => $content


                                ));
                        })
                        ->bind('$id_g')
                        ;
                        }




$app->get('/area_chica', function () use ($app,$id_a) {
    return $app['twig']->render('area_chica.php', array(
'id_a' => $id_a 

        ));
})
->bind('area_chica')
;


                 

$app->get('/break', function () use ($app,$id_b) {
    return $app['twig']->render('break.php', array(
'id_b' => $id_b 

        ));
})
->bind('break')
;




$app->error(function (\Exception $e, Request $request, $code) use ($app) {
    if ($app['debug']) {
        return;
    }

    // 404.html, or 40x.html, or 4xx.html, or error.html
    $templates = array(
        'errors/'.$code.'.html',
        'errors/'.substr($code, 0, 2).'x.html',
        'errors/'.substr($code, 0, 1).'xx.html',
        'errors/default.html',
    );

    return new Response($app['twig']->resolveTemplate($templates)->render(array('code' => $code)), $code);
});
