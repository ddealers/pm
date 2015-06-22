<?php
    require_once('pm.php');

    $pvars = count($_POST);
    $pkeys = array_keys($_POST);
    $pvals = array_values($_POST);

    for($i = 0; $i < $pvars; $i++){
        $_POST["$pkeys[$i]"] = trim(strip_tags($pvals[$i]));
    }

    $gvars = count($_GET);
    $gkeys = array_keys($_GET);
    $gvals = array_values($_GET);

    for($i = 0; $i < $gvars; $i++){
        $_GET["$gkeys[$i]"] = trim(strip_tags($gvals[$i]));
    }

    $pm = new PM();

    $function = isset($_POST['request'])?$_POST['request']:null;
    $response = array(
        'success' => false,
        'data' => null,
        'message' => ''
    );

    if ( !empty($function) ) {

        if ( is_callable( array($pm,$function) ) ) {

            if($function == 'saveComment'){
                $id = isset($_POST['data'])?$_POST['data']:0;
                $comment = isset($_POST['comment'])?$_POST['comment']:'';

                if ( is_numeric($id) && !empty($comment) ) {
                    $response = $pm->$function($id,$comment);
                } else {
                    $response['message'] = 'Comentario no valido';
                }

            } else if($function == 'deleteComment'){
                $id = isset($_POST['data'])?$_POST['data']:0;

                if ( is_numeric($id) ) {
                    $response = $pm->$function($id);
                } else {
                    $response['message'] = 'Comentario no valido';
                }
            } else{
                $response['message'] = 'Funcion indefinida';
            }

        }else{
            $response['message'] = 'Funcion indefinida';
        }

        echo json_encode($response);

    }
?>