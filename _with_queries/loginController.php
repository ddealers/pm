<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

session_start();
require_once('functionsControllers.php');
require_once('helpers.php');

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
$response = array('success' => false, 'data' => array(), 'message' => '');

if ($func == null) {
    if (isset($_GET['func']) && $_GET['func'] == 'search') {
        $func = 'search';
    }
}

if($func != null && $func != '' && isHost($_SERVER['HTTP_REFERER'])){
    if(function_exists($func)){

        if ($func == 'user_login'){

            $user = isset($_POST['user'])?trim($_POST['user']):'';
            $pass = isset($_POST['pass'])?trim($_POST['pass']):'';

            if($user != ''){
                if($pass != ''){
                    $data = $func($user, $pass);

                    if($data != false){
                        $response['success'] = true;
                        $response['data'] = explode(',',$data);
                        $userName = $response['data'][1];
                        $user = $response['data'][0];
                        $response['data'] = $response['data'][0];

                        session_set_cookie_params ( 0, "/", $_SERVER['HTTP_HOST'], true, true );
                        $_SESSION['user'] = $data;
                        setcookie("pm", $userName, 0, "/", $_SERVER['HTTP_HOST']);

                        if (isset($_SESSION['encuesta_id']) && !empty($_SESSION['encuesta_id']) ){
                            updateUserEncuesta($_SESSION['encuesta_id'],$user);
                            unset($_SESSION['encuesta_id']);
                        }

                        $gamification = new Gamification();
                        $response['gamification'] = $gamification->setAction('register',0);
                    }else{
                        $response['message'] = 'Error de usuario y/o contraseña';
                    }
                }else{
                    $response['message'] = 'Ingresa tu contraseña';
                }
            }else{
                $response['message'] = 'Ingresa tu usuario';
            }

        } else if ($func == 'user_logout'){
            $_SESSION['user'] = null;
            unset($_SESSION['user']);
            setcookie("PHPSESSID", "", time()-3600);
            setcookie("pm", "", time()-2592000, "/", $_SERVER['HTTP_HOST']);
            session_destroy();
            $response['success'] = true;
        } else if ($func == 'is_login'){
            $response['success'] = true;
            
            if ( $func() ){
                $user = isset($_SESSION['user'])?explode(',',$_SESSION['user']):null;
                $avatar = $user != null?$user[3]:null;
                $user = $user != null?$user[1]:null;

                $dataGamification = $gamification->getInfoDashboard();
                
                $response['data'] = array(
                    'login' => true,
                    'name' => $user,
                    'avatar' => $avatar,
                    'token' => $gamification->getToken(),
                    'points' => $dataGamification['points'],
                    'title' => $dataGamification['title'],
                    'groups' => $dataGamification['groups'],
                    'friends' => $dataGamification['friends'],
                    'notifications' => $dataGamification['notifications'],
                    'pmoticons' => $dataGamification['pmoticons'],
                    'tokens' => $dataGamification['tokens']
                );
                $response['gamification'] = $gamification->setAction('visit',0);
            } else {
                $response['data'] = array(
                    'login' => false,
                    'name' => '',
                    'avatar' => ''
                );
            }

        } else if ($func == 'user_like'){
            $user = isset($_SESSION['user'])?explode(',',$_SESSION['user']):null;
            $user = $user != null?$user[0]:null;
            $vote = isset($_POST['data'])?trim($_POST['data']):null;
            $post = isset($_POST['post'])?trim($_POST['post']):null;

            if($user != null){
                if($vote != null && ($vote >= 0 && $vote <= 20)){
                    if($post != null && is_numeric($post) ){
                        $data = $func($user,$vote,$post);
                        $response['success'] = true;
                        $response['gamification'] = $gamification->setAction('valorar',$post);
                    }else{
                        $response['message'] = 'Post invalido';
                    }
                }else{
                    $response['message'] = 'Ingresa una votacion valida';
                }
            }else{
                $response['message'] = 'Inicia sesion para poder votar';
            }

        } else if ($func == 'add_favorite'){
            $user = isset($_SESSION['user'])?explode(',',$_SESSION['user']):null;
            $user = $user != null?$user[0]:null;
            $post = isset($_POST['post'])?trim($_POST['post']):null;

            if($user != null){
                if($post != null && is_numeric($post) ){
                    $data = $func($user,$post);
                    if ($data != false) {
                        $response['success'] = true;
                        $response['message'] = $data;
                    } else {
                        $response['message'] = 'Error al guardar';    
                    }
                }else{
                    $response['message'] = 'Post invalido';
                }
            }else{
                $response['message'] = 'Inicia sesion para poder votar';
            }

        } else if ($func == 'get_user_data'){

            $user = isset($_SESSION['user'])?explode(',',$_SESSION['user']):null;
            $user = $user != null?$user[0]:null;

            if($user != null && $user != ''){
                $data = get_user_data($user);

                if(count($data) > 0){
                    $response['success'] = true;
                    $response['data'] = $data[0];
                    //$response['data'][1] = get_favorite_posts($user);
                }else{
                    $response['message'] = 'Usuario indefinido';
                }

            }else{
                $response['message'] = 'Debes iniciar sesion';
            }

        } else if ($func == 'get_user_avatar'){

            $user = isset($_SESSION['user'])?explode(',',$_SESSION['user']):null;
            $user = $user != null?$user[3]:null;

            if($user != null && $user != ''){
                $response['success'] = true;
                $response['data'] = $user;

            }else{
                $response['message'] = 'Debes iniciar sesion';
            }

        } else if($func == 'set_new_user'){

            $user = isset($_POST['user'])?trim($_POST['user']):null;
            $pass = isset($_POST['pass'])?trim($_POST['pass']):null;
            $rpass = isset($_POST['rpass'])?trim($_POST['rpass']):null;
            $mail = isset($_POST['mail'])?trim($_POST['mail']):null;

            $userPattern = '/^[a-z\d_]{4,10}$/i';
            $passPattern = '/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/';
            $mailPattern = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';

            if( !empty($user) ){
                if( !empty($pass) ){
                    if( !empty($rpass) ){
                        if( !empty($mail) ){
                            if( preg_match($userPattern, $user) ){
                                if( preg_match($passPattern, $pass) ){
                                    if( preg_match($mailPattern, $mail) ){
                                        if( valid_user($user,$mail) ){
                                            if($pass == $rpass){
                                                $response['success'] = true;
                                                $response['data'] = $func($user, $pass, $user, $mail);
                                            }else{
                                                $response['message'] = 'Las contraseñas no coinciden';
                                            }
                                        }else{
                                            $response['message'] = 'El usuario y/o correo ingresado ya existe';
                                        }
                                    }else{
                                        $response['message'] = 'Escribe un correo valido';
                                    }
                                }else{
                                    $response['message'] = 'Escribe una contraseña segura: Minimo 8 caracteres, mayusculas y minusculas con numeros o caracteres especiales.';
                                }
                            }else{
                                $response['message'] = 'Escribe un usuario valido: letras, numeros y guiones bajos';
                            }
                        }else{
                            $response['message'] = 'El correo es obligatorio';
                        }
                    }else{
                        $response['message'] = 'Debes confirmar tu contraseña';
                    }
                }else{
                    $response['message'] = 'La contraseña es obligatorio';
                }
            }else{
                $response['message'] = 'El usuario es obligatorio';
            }

        } else if ($func == 'login_social'){
            $data = isset($_POST['data'])?str_replace('\\','',trim($_POST['data'])):null;
            $mail = isset($_POST['mail'])?trim($_POST['mail']):null;

            if($data != null){
                if($mail != null){
                    $data = json_decode($data);
                    $r = $func($data,$mail);

                    if($r == true){
                        $l = user_login($data->username, $data->id);
                        
                        if($l != false){
                            session_set_cookie_params ( 0, "/", $_SERVER['HTTP_HOST'], true, true );
                            $response['success'] = true;
                            $_SESSION['user'] = $l;

                            $userName = explode(',',$l);
                            $userName = isset($userName[1])?$userName[1]:'';
                            setcookie("pm", $userName, 0, "/", $_SERVER['HTTP_HOST']);
                        }else{
                            $response['message'] = 'Error al iniciar sesion';
                        }
                    }else{
                        $response['message'] = 'Error al iniciar sesion';
                    }

                }else{
                    $response['message'] = 'Falta correo electronico';
                }

            }else{
                $response['message'] = 'Datos insuficientes';
            }

        } else if ($func == 'update_user_data'){

            $user = isset($_SESSION['user'])?explode(',',$_SESSION['user']):null;
            $user = $user != null?$user[0]:null;
            $name = isset($_POST['name'])?trim($_POST['name']):'';
            $age = isset($_POST['age'])?trim($_POST['age']):0;
            $gender = isset($_POST['gender'])?trim($_POST['gender']):'';
            $col = isset($_POST['col'])?trim($_POST['col']):'';
            $del = isset($_POST['del'])?trim($_POST['del']):'';
            $state = isset($_POST['state'])?trim($_POST['state']):'';
            $cp = isset($_POST['cp'])?trim($_POST['cp']):'';
            $avatar = isset($_FILES['new_avatar'])?$_FILES['new_avatar']:null;

            if($user != null && $user != ''){
                $data = $func($user, $name, $age, $gender, $col, $state, $del, $cp,$avatar);
                
                if(count($data) == 0){
                    $response['success'] = true;
                    header('Location: ' . $_SERVER['HTTP_REFERER'] . '');
                }else{
                    header('Location: ' . $_SERVER['HTTP_REFERER'] . '');
                }

                if (
                    $name != '' && ($age != 0 && $age != '') && 
                    $gender != '' && $col != '' && 
                    $del != '' && $state != '' && 
                    $cp != '' && $avatar != null
                ) {
                    $gamification = new Gamification();
                    $response['gamification'] = $gamification->setAction('perfil_complete',0);
                }
            }else{
                $response['message'] = 'Debes iniciar sesion';
            }

        } else if ($func == 'update_password'){

            $user = isset($_SESSION['user'])?explode(',',$_SESSION['user']):null;
            $user = $user != null?$user[0]:null;
            $actPass = isset($_POST['actPass'])?trim($_POST['actPass']):'';
            $npass = isset($_POST['npass'])?trim($_POST['npass']):'';
            $npassr = isset($_POST['npassr'])?trim($_POST['npassr']):'';

            if($user != null && $user != ''){
                if($actPass != ''){
                    if($npass != ''){
                        if($npassr != ''){
                            if($npass == $npassr){
                                $data = $func($user, $actPass, $npass);
                                
                                if($data){
                                    $response['success'] = true;
                                }else{
                                    $response['message'] = 'Error al actualizar contraseña';
                                }
                            }
                        }else{
                            $response['message'] = 'Repite tu nueva contraseña';
                        }
                    }else{
                        $response['message'] = 'Ingresa tu nueva contraseña';
                    }
                }else{
                    $response['message'] = 'Ingresa tu contraseña actual';
                }
            }else{
                $response['message'] = 'Debes iniciar sesion';
            }

        } else if ($func == 'close_account'){

            $user = isset($_SESSION['user'])?explode(',',$_SESSION['user']):null;
            $user = $user != null?$user[0]:null;
            $comment = isset($_POST['comment'])?trim($_POST['comment']):'';
            $mailchimp = isset($_POST['mailchimp'])?trim($_POST['mailchimp']):'';

            if($user != null && $user != ''){
                $data = $func($user,$comment, $mailchimp);
                
                if($data){
                    $response['success'] = true;
                    $_SESSION['user'] = null;
                    unset($_SESSION['user']);
                    setcookie("PHPSESSID", "", time()-3600);
                    setcookie("pm", "", time()-2592000, "/", $_SERVER['HTTP_HOST']);
                    session_destroy();
                }else{
                    $response['message'] = 'Error al actualizar cuenta';
                }
            }else{
                $response['message'] = 'Debes iniciar sesion';
            }

        } else if ($func == 'send_email_password'){
            $mail = isset($_POST['mail'])?trim($_POST['mail']):null;

            if($mail != null){
                if( $func($mail) ){
                    $response['success'] = true;
                }else{
                    $response['message'] = 'El correo ingresado no existe';
                }
            }else{
                $response['message'] = 'Ingresa tu correo';
            }

        } else if ($func == 'search'){
            $term = isset($_GET['term'])?trim($_GET['term']):null;
            
            if($term != null){
                $response['success'] = true;
                $response['data'] = $func($term);
            }else{
                $response['message'] = 'Ingresa lo que buscas';
            }

        } else if ($func == 'suscribe_mail_chimp'){
            $mail = isset($_POST['mail'])?trim($_POST['mail']):null;

            if($mail != null){
                $response['success'] = true;
                if ( $func($mail, 'Usuario PM', '') ) {
                    $response['data'] = true;
                } else {
                    $response['data'] = false;
                    $response['message'] = "Error al suscribir";
                }
            }else{
                $response['message'] = 'Ingresa un correo válido';
            }

        } else if ($func == 'forget_password'){
            $pass = isset($_POST['pass'])?trim($_POST['pass']):null;
            $rpass = isset($_POST['rpass'])?trim($_POST['rpass']):null;
            $r = isset($_POST['key'])?trim($_POST['key']):null;

            if($r != null && $r != ''){
                if($pass != null && $pass != ''){
                    if($rpass != null && $rpass != ''){
                        if( $pass == $rpass ){
                            if($func($r,$pass)){
                                $response['success'] = true;
                            }else{
                                $response['message'] = 'Referencia invalida';
                            }

                        }else{
                            $response['message'] = 'Las contraseñas deben ser iguales';
                        }
                    }else{
                        $response['message'] = 'Repite la nueva contraseña';
                    }
                }else{
                    $response['message'] = 'Ingresa una contraseña';
                }
            }else{
                $response['message'] = 'Referencia indefinida';
            }

        } else if ($func == 'get_favorites'){

            $user = isset($_SESSION['user'])?explode(',',$_SESSION['user']):null;
            $user = $user != null?$user[0]:null;

            if($user != null && $user != ''){
                $response['success'] = true;
                $response['data'] = $func($user);

            }else{
                $response['data'] = array();
                $response['message'] = 'Inicia sesion para obtener tus post favoritos';
            }

        } else if ($func == 'get_favorite_posts'){

            $user = isset($_SESSION['user'])?explode(',',$_SESSION['user']):null;
            $user = $user != null?$user[0]:null;

            if($user != null && $user != ''){
                $response['success'] = true;
                $response['data'] = $func($user);

            }else{
                $response['data'] = array();
                $response['message'] = 'Inicia sesion para obtener tus post favoritos';
            }

        } else if ($func == 'setEncuesta'){
            $user = isset($_SESSION['user'])?explode(',',$_SESSION['user']):0;
            $user = $user != 0?$user[0]:0;
            $program = isset($_POST['program'])?utf8_encode($_POST['program']):''; 
            $type = isset($_POST['type'])?$_POST['type']:'';
            $conductor = isset($_POST['conductor'])?$_POST['conductor']:'';
            $invitados = isset($_POST['invitados'])?$_POST['invitados']:'';
            $dinamicas = isset($_POST['dinamicas'])?$_POST['dinamicas']:'';
            $look = isset($_POST['look'])?$_POST['look']:'';
            $contenido = isset($_POST['contenido'])?$_POST['contenido']:'';
            $opinion = isset($_POST['opinion'])?utf8_encode($_POST['opinion']):'';
            $historia = isset($_POST['historia'])?$_POST['historia']:'';
            $elenco = isset($_POST['elenco'])?$_POST['elenco']:'';

            if ($program != '') {
                $data = $func($user,$program,$conductor,$invitados,
                    $dinamicas,$look,$contenido,$historia,$elenco,$opinion);

                if ($data != false) {
                    $response['success'] = true;
                    $response['data'] = $data;

                    if ($user == 0) {
                        $_SESSION['encuesta_id'] = $data;
                        $response['message'] = 'session';
                    }
                } else {
                    $response['message'] = 'Error al guardar calificación';
                }

            } else {
                $response['message'] = 'Programa no valido';
            }

        } else {
            $response['message'] = 'Funcion indefinida';
        }

    } else{
        $response['message'] = 'Funcion indefinida';
    }

    echo json_encode($response);
}

if (isset($_GET['func']) && $_GET['func'] == 'user_logout'){
    $_SESSION['user'] = null;
    unset($_SESSION['user']);
    setcookie("PHPSESSID", "", time()-3600);
    setcookie("pm", "", time()-2592000, "/", $_SERVER['HTTP_HOST']);
    session_destroy();
    $response['success'] = true;
}

?>