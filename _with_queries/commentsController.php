<?php
/*error_reporting(E_ALL);
ini_set('display_errors', '1');*/
session_start();
require_once("functionsControllers.php");
require_once("helpers.php");

#Clase que registra los loops de gamificacion
require_once('gamification/gamification.php');
$user = isset($_SESSION['user'])?explode(',',$_SESSION['user']):null;
$user = $user != null?$user[0]:null;
if ($user != null) {
    $gamification = new Gamification();
}
#Clase que registra los loops de gamificacion

$pvars = count($_POST);
$pkeys = array_keys($_POST);
$pvals = array_values($_POST);

for($i = 0; $i < $pvars; $i++){
    $_POST["$pkeys[$i]"] = addslashes( strip_tags( decrypt($pvals[$i]) ) );
}

$gvars = count($_GET);
$gkeys = array_keys($_GET);
$gvals = array_values($_GET);

for($i = 0; $i < $gvars; $i++){
    $_GET["$gkeys[$i]"] = addslashes( strip_tags( decrypt($gvals[$i]) ) );
}

$func = isset($_POST['func'])?trim($_POST['func']):null;
$response = array('success' => false, 'data' => null, 'message' => '');

if($func != null && $func != '' && isHost($_SERVER['HTTP_REFERER']) ){
    if(function_exists($func)){
        
        if($func == 'set_comment'){
            $user = isset($_SESSION['user'])?explode(',',$_SESSION['user']):null;
            $user = $user != null?$user[0]:null;
            $comment = isset($_POST['comment'])?trim($_POST['comment']):null;
            $post = isset($_POST['post'])?trim($_POST['post']):null;
            $name = isset($_SESSION['user'])?explode(',',$_SESSION['user']):null;
            $name = $name != null?$name[1]:null;

            if($user != null && $user != ''){
                if($comment != null && $comment != ''){
                    if($post != null && $post != '' && is_numeric($post) ){
                        if($func($user, $comment, $post)){
                            $response['success'] = true;
                            $response['data'] = array('avatar' => '',
                                'name' => $name,
                                'date' => 'Ahora',
                                'comment' => $comment
                            );
                            $response['gamification'] = $gamification->setAction('comment',$post);
                        }
                    }else{
                        $response['message'] = 'Post no valido';
                    }
                }else{
                    $response['message'] = 'El comentario no puede estar vacio';
                }
            }else{
                $response['message'] = 'Inicia sesion para poder comentar';
            }

        } else if($func == 'get_comments_post'){
            $post = isset($_POST['post'])?trim($_POST['post']):null;

            if($post != null && $post != '' && is_numeric($post) ){
                $data = $func($post);

                $response['success'] = true;
                $response['data']['comments'] = $data['comments'];
                $response['data']['total'] = $data['total'];

            }else{
                $response['message'] = 'Post no valido';
            }

        } else if($func == 'get_comments_post_scroll'){
            $post = isset($_POST['post'])?trim($_POST['post']):null;
            $index = isset($_POST['index'])?trim($_POST['index']):null;

            if($post != null && $post != '' && is_numeric($post) ){
                if($index != null && $index != '' && is_numeric($index) ){
                    $data = $func($post,$index);

                    $response['success'] = true;
                    $response['data'] = $data;

                }else{
                    $response['message'] = 'Index no valido';
                }

            }else{
                $response['message'] = 'Post no valido';
            }

        } else{
            $response['message'] = 'Funcion indefinida';
        }

    }else{
        //No hay funcion especifica
        $response['message'] = 'Funcion indefinida';
    }

    echo json_encode($response);

}
?>