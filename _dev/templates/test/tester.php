<?php

try {

    $loader = new Twig_Loader_Filesystem('../templates/boxes');

    $twig1 = new Twig_Environment($loader);
    $twig2 = new Twig_Environment($loader);

    $template1 = $twig1->loadTemplate('box.php');
    $template2 = $twig2->loadTemplate('section-date-container.php');

    echo $template1 ->render(array(

        'dataId'        =>  '1',
        'bgImgUrl'      =>  'images/main/test.jpg',
        'year'          =>  '2015',
        'month'         =>  '09',
        'date'          =>  '16',
        'h1BoxHeader'   =>  'ESTE ES HEADER H1',
        'h2BoxHeader1'  =>  'este es HEADER H2-1',
        'h2BoxHeader2'  =>  'este es HEADER H2-2',
        'h1BoxFooter'   =>  'ESTE ES FOOTER H1',
        'h2BoxFooter1'  =>  '',
        'h2BoxFooter2'  =>  '',



    ));





    echo"<script language='javascript'>
       $('.box').addClass('GMS-Big');
       $('.box .box-icon').addClass('n-icon-22-box-video');
        </script>";






} catch (Exception $e){
    die ('ERROR: ' . $e->getMessage());


}
?>