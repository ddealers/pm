<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

function get_results($query,$type = 'select',$array = false,$type_con = 'gamification') {
    $response = array(
        'success' => false,
        'data' => array(),
        'message' => ''
    );
    $typeCon = 'local';
    $conection = array(
            'local' => array(
                        'host' => 'localhost',
                        'user' => 'root',
                        'pass' => '0TO6yljf',
                        'db' => 'bender'
                        ),
            'dev' => array(
                        'host' => '64.49.246.147',
                        'user' => 'victoria',
                        'pass' => 'Vicky0ne',
                        'db' => 'bender_dev'
                        ),
            'production' => array(
                        'host' => 'b47f2fed640c1a7b42079b5c559322cd3f0fc454.rackspaceclouddb.com',
                        'user' => 'pmBender',
                        'pass' => 'no4YPOysWt0Nil87',
                        'db' => 'bender_production'
                        ),
            'stage' => array(
                        'host' => '8d4f981432f18102b561a870a4c3ab083e709a21.rackspaceclouddb.com',
                        'user' => 'pmBender',
                        'pass' => 'no4YPOysWt0Nil87',
                        'db' => 'bender_staging'
                        )
    );

    $conection_gam = array(
            'local' => array(
                'host' => 'localhost',
                'user' => 'root',
                'pass' => '0TO6yljf',
                'db' => 'gamification'
            )
    );

    if ($type_con != 'gamification') {
        $mysqli = new mysqli($conection["$typeCon"]['host'], $conection["$typeCon"]['user'], $conection["$typeCon"]['pass'], $conection["$typeCon"]['db']);
    } else {
        $mysqli = new mysqli($conection_gam["$typeCon"]['host'], $conection_gam["$typeCon"]['user'], $conection_gam["$typeCon"]['pass'], $conection_gam["$typeCon"]['db']);
    }

    if ($mysqli->connect_errno) {
        $response['message'] = 'Por favor intenta de nuevo mas tarde: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error;
    }else{
        $mysqli->set_charset('UTF-8');
        $mysqli->query('SET CHARACTER SET utf8;');

        $r = $mysqli->query($query);

        if (!$mysqli->error) {

            $response['success'] = true;
            if ($type == 'insert') {
                $response['data'][] = $mysqli->insert_id;
            } else if ($type == 'update') {
                $response['data'][] = $mysqli->affected_rows;
            } else if ($type == 'select') {
                while ($q = $r->fetch_assoc()) {
                    if ($array) {
                        $response['data'][] = $q;
                    } else {
                        $response['data'][] = (object) $q;
                    }
                }
            }
        } else {
            $response['message'] = $mysqli->error;
        }

        $mysqli->close();
    }

    return $response;
}

function send_mail_user($email,$subject, $template, $data){
    require_once('../services/phpmailer/class.phpmailer.php');
    $mail = new PHPMailer();

    $mail->isSMTP();
    $mail->Host = 'smtp.emailsrvr.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'services@victoria.sh';
    $mail->Password = 'Vicky0ne$';
    $mail->SMTPSecure = 'tls';
    $mail->CharSet = 'UTF-8';
    $mail->From = 'no-reply@pmcanal5.com';
    $mail->FromName = 'PM Canal 5';
    $mail->addAddress($email);
    $mail->isHTML(true);

    $mail->Subject = $subject;
    $mail->Body    = str_replace(array_keys($data), array_values($data), file_get_contents($template) );


    if(!$mail->send()) {
        $response = false;
    } else {
        $response = true;
    }
    
    return $response;
}

/*
 * Suscripcion al boletin
 */
function suscribe_mail_chimp($mail, $name, $lastname){
    require_once('../services/mailchimp/Mailchimp.php');

    $chimp = new Mailchimp('93880077a715acb9786297f11a2d2568-us7');

    $merge_vars = Array(
        'EMAIL' => $mail,
        'FNAME' => $name,
        'LNAME' => $lastname
    );

    $list_id = "6c6ee72e48";
    $double_optin = true;
    $email_type = 'html';
    $update_existing = true;
    $replace_interests = true;
    $send_welcome = false;

    $suscriber = $chimp->lists->subscribe($list_id, array( 'email' => $mail ), $merge_vars,$email_type,
        $double_optin, $update_existing, $replace_interests, $send_welcome );


    if(isset($suscriber['leid'])) {
        return true;
    }else{
        return false;
    }
}

function valid_user($user,$mail){
    $query = "SELECT ID FROM lc_users 
    WHERE BINARY users_user = '$user' 
    OR BINARY users_mail = '$mail' 
    LIMIT 1;";

    $result = get_results( $query );
    
    if(count($result['data']) > 0){
        $result = false;
    }else{
        $result = true;
    }

    return $result;
}

function getNameProgram($val){
    switch ($val){
        case "karaokecantaynoterajes":
            $name = "Karaoke_Canta_y_no_te_rajes";
            break;
        case "mecaigoderisa":
            $name = "Me_Caigo_de_Risa";
            break;
        case "turnocturno":
            $name = "Tur_nocturno";
            break;
        case "break":
            $name = "El_Break_PM";
            break;
        case "breakstage":
            $name = "El_Break_PM";
            break;
        case "puedescon100":
            $name = "Puedes_con_100";
            break;
        case "xlabanda":
            $name = "X_la_Banda";
            break;
        case "zonaruda":
            $name = "Zona_Ruda";
            break;
        case "pm":
            $name = "PM_Canal5";
            break;
        case "vascontodo":
            $name = "Vas_con_Todo";
            break;
        case "quienseroboelshow":
            $name = "¿Quién se robó el show?";
            break;
        case "areachica":
            $name = "Área_Chica";
            break;
        case "experimento":
            $name = "Experimento";
            break;
        case "japanpoi":
            $name = "Japan_Poi";
            break;
        case "losvisitantes":
            $name = "Los_Visitantes";
            break;
        case "pambolerospm":
            $name = "Pamboleros_PM";
            break;
        case "pamboleros":
            $name = "Pamboleros_PM";
            break;
        case "viajandoconfollowers":
            $name = "Viajando_con_Followers";
            break;
        case "playlist":
            $name = "Playlists_";
            break;
        case "theultimatefighter":
            $name = "The_Ultimate_Fighter_Latinoamérica";   
            break;
        case "paranoiatotal" :
            $name = "Paranoia_Total";
            break;
        case "mundotroll" :
            $name = "Mundo_Troll";
            break;
        default:
            $name = $val;
    }
    return $name;
}

function user_login($user, $pass){
    $pass = md5($pass);

    $query = "SELECT ID AS user, BINARY users_name AS name, users_mail AS mail, users_avatar AS avatar
                FROM lc_users
                WHERE BINARY users_user = '$user'
                AND users_pass = '$pass' 
                AND users_status = '1' 
                LIMIT 1;";

    $result = get_results( $query );
    
    if ($result['success']) {
        $result = $result['data'];
    }

    if(count($result) > 0){
        $result = $result[0]->user . ',' . $result[0]->name . ',' . $result[0]->mail . ',' . $result[0]->avatar;
    }else{
        $result = false;
    }

    return $result;
}

function is_login(){
    $response = false;

    if( isset($_SESSION['user']) && !empty($_SESSION['user']) ){
        $response = true;
    }

    return $response;
}

function get_favorite_posts($user){
    $posts = array();
    $query = "SELECT post_id FROM lc_favorites WHERE users_id = $user";

    $result = get_results($query,'select',true);

    if ($result['success'] == true) {
        $p = '';

        foreach ($result['data'] as $po) {
            $p .= !empty($p)?',' . $po['post_id']:$po['post_id'];
        }

        $query = "SELECT DISTINCT
                   p.ID AS name,
                   p.post_name AS id,
                   p.post_title AS title,
                   p.post_content AS content,
                   u.user_nicename AS author,
                   p.post_type AS post_type,
                   p.post_date AS `date`,
                   (SELECT COUNT(lc_comments.ID) FROM lc_comments WHERE (lc_comments.post_id = p.ID)) AS comments,
                   m.meta_value AS thumbnailid,
                   (SELECT w.guid FROM wp_posts w WHERE (w.ID = thumbnailid) LIMIT 1) AS thumbnail,
                   m1.meta_value AS url,
                   m2.meta_value AS program,
                   m10.meta_value AS type_post
                   FROM wp_posts p JOIN wp_users u ON p.post_author = u.ID 
                    LEFT JOIN wp_postmeta m ON (m.meta_key = '_thumbnail_id') AND (m.post_id = p.ID)  
                    LEFT JOIN wp_postmeta m1 ON (m1.meta_key = 'dbt_urlpointer') AND (m1.post_id = p.ID) 
                    LEFT JOIN wp_postmeta m2 ON (m2.meta_key = 'dbt_programselect') AND (m2.post_id = p.ID) 
                    LEFT JOIN wp_postmeta m10 ON (m10.meta_key = 'type_post') AND (m10.post_id = p.ID) 
                    WHERE p.post_status = 'publish' 
                    AND p.ID IN ($p) 
                    AND p.post_type IN ('post','page','tourpm','los5pm')";

        $result = get_results($query,'select',false,'bender');
        
        if ($result['success'] == true) {
            $result = $result['data'];

            for($i = 0,$t=count($result); $i < $t; $i++ ) {
                $id = $result[$i]->id;
                $class = '';
                $result[$i]->id = $result[$i]->name;
                $result[$i]->name = $id;
                $result[$i]->position = '';

                $values = array(
                    'type_post' => $result[$i]->type_post,
                    'position' => '',
                    'thumbnail' => $result[$i]->thumbnail,
                    'id' => $result[$i]->id,
                    'date' => $result[$i]->date,
                    'program' => getNameProgram( str_replace(',','',str_replace(' ','',strtolower($result[$i]->program))) ),
                    'title' => $result[$i]->title,
                    'author' => $result[$i]->author,
                    'content' => $result[$i]->content,
                    'url' => str_replace(' ', '', strtolower( $result[$i]->program) .'/'.$result[$i]->name)
                );

                $posts[] = $values;
            }
        }

    }

    return $posts;
}

function update_user_data($id, $name, $age, $gender, $col, $state, $del, $cp, $avatar){
    $query = "UPDATE lc_users SET
                users_name = '$name', users_age = '$age', users_gender = '$gender',
                users_col = '$col', users_state = '$state', users_del = '$del', users_cp = '$cp'
                WHERE ID = $id;";

    $result = get_results($query,'update');
    $result = $result['data'];
    if($avatar['size'] > 0){
        $urlAvatar = upload_user_avatar($avatar);

        if($urlAvatar != false){
            $ava = "UPDATE lc_users SET
                users_avatar = '$urlAvatar'
                WHERE ID = $id;";

            get_results($ava,'update');
        }
    }

    return $result;
}

function user_logout(){
    return true;
}

function censorComment($comment){
    $badwords = array('pendejo','puto','chingadera','chingaderas','mamadas','verga','vergas','chinga','pendejadas','pendejada','mierda',
    'mierdas','pendeja','pendejos','pendejas','mierderos');

    $comment = str_ireplace($badwords,'*****',$comment);

    return $comment;
}

function set_comment($user, $comment, $post){
    $response = false;
    $date = time();
    $comment = censorComment($comment);

    $query = "INSERT INTO lc_comments VALUES (NULL,'$user','$post','$date','$comment','0');";

    $result = get_results($query,'insert');

    if ($result['success']) {
        $response = true;
    }

    return $response;

}

function get_date_post($time){
    $now = time();

    $mins = floor(($now - $time) / 60);
    $hours = floor(($now - $time) / 3600);
    $day = strftime("%d",'1402002323');
    $month = strftime("%m",'1402002323');
    $year = strftime("%Y",'1402002323');
    $hour = strftime("%H:%M",'1402002323');

    $months = array(
        '01' => 'Enero',
        '02' => 'Febrero',
        '03' => 'Marzo',
        '04' => 'Abril',
        '05' => 'Mayo',
        '06' => 'Junio',
        '07' => 'Julio',
        '08' => 'Agosto',
        '09' => 'Septiembre',
        '10' => 'Octubre',
        '11' => 'Noviembre',
        '12' => 'Diciembre',
    );

    if($mins < 60){
        $result = 'Hace ' . $mins . ' minutos';
    }else if($hours < 12){
        $result = 'Hace ' . $hours . ' horas';
    }else{
        $result = 'El ' . $day . ' de ' . $months["$month"] . ' del ' . $year . ' @' . $hour;
    }

    return $result;

}

function get_comments_post($post){
    $response['comments'] = array();
    $response['total'] = 0;

    $query = "SELECT lc_comments.comment_content AS comment, lc_comments.comment_date AS date,
            lc_users.users_avatar AS avatar, lc_users.users_name AS name
            FROM lc_comments, lc_users
            WHERE lc_comments.post_id = '$post'
            AND lc_comments.users_id = lc_users.ID
            ORDER BY lc_comments.ID DESC;";

    $result = get_results($query,'select',true);

    if ($result['success']) {
        $result = $result['data'];
    }

    for($i = 0, $t = count($result); $i < $t; $i++){
        $result[$i]['date'] = get_date_post($result[$i]['date']);
        $response['total'] = $t;
    }

    $response['comments'] = $result;


    return $response;
}

function get_comments_post_scroll($post,$index){
    $result = array();

    $query = "SELECT lc_comments.comment_content AS comment, lc_comments.comment_date AS date,
                lc_users.users_avatar AS avatar, lc_users.users_name AS name
                FROM lc_comments, lc_users
                WHERE lc_comments.post_id = '$post'
                AND lc_comments.users_id = lc_users.ID
                ORDER BY lc_comments.ID DESC
                LIMIT $index,10;";

    $result = get_results($query,'select',true);

    if ($result['success']) {
        $result = $result['data'];
    }

    for($i = 0, $t = count($result); $i < $t; $i++){
        $result[$i]['date'] = get_date_post($result[$i]['date']);
    }

    return $result;
}

function user_like($user, $vote, $post){
    $response = false;

    $query ="SELECT ID
                FROM lc_votes
                WHERE users_id = '$user'
                 AND post_id = $post
                 LIMIT 1;";

    $id = get_results( $query );

    if ($id['success']) {
        $id = $id['data'];
    } else {
        $id = array();
    }

    if(count($id) > 0){
        $query = "UPDATE lc_votes SET
                    post_type = '$vote'
                    WHERE users_id = $user
                    AND post_id = '$post';";

        $response = get_results( $query,'update' );

        $response = $response['success'];
    }else{
        $time = time();
        $query = "INSERT INTO lc_votes VALUES(NULL,'$user','$post','$vote','$time');";
        $response = get_results($query,'insert');
        $response = $response['success'];
    }

    $avg = "UPDATE wp_posts SET avg = (SELECT ROUND(AVG(post_type)) FROM lc_votes WHERE post_id = '$post') WHERE ID = '$post' LIMIT 1;";
    get_results( $avg,'update' );

    return $response;

}

function add_favorite($user, $post){
    $response = false;

    $query = "SELECT *
                FROM lc_favorites
                WHERE users_id = '$user'
                 AND post_id = '$post'
                 LIMIT 1;";

    $id = get_results( $query );

    if ($id['success']) {
        $id = $id['data'];
    }

    if(count($id) > 0){
        $query = "DELETE FROM lc_favorites
                    WHERE users_id = '$user'
                    AND post_id = '$post';";

        
        get_results( $query, 'update' );
        $response = "Se ha eliminado de tus favoritos";
    }else{
        $response = "Se ha agregado a tus favoritos";
        $time = time();
        $query = "INSERT INTO lc_favorites VALUES (NULL,'$post','$user','$time');";
        get_results($query,'insert');
    }

    return $response;

}

function get_user_data($id){
    $query = "SELECT ID, users_name AS name, users_gender AS gender, users_age AS age, users_col AS col,
              users_state AS state, users_del AS del, users_cp AS cp, users_avatar AS avatar
                FROM lc_users
                WHERE ID = '$id' LIMIT 1;";

    $result = get_results( $query );

    if ($result['success']) {
        $result = $result['data'];
    }

    return $result;
}

function set_new_user($user, $pass, $name, $mail ){
    $pass = md5($pass);
    $avatar = 'http://a9.g.akamai.net/f/9/250733/1h/pmcanal5.download.akamai.com/250733/user-profile/default.png';
    $mail = $mail;
    $date = time();
    $type = '1';
    $status = '1';
    $query = "INSERT INTO lc_users 
    VALUES(NULL,'$user','$pass','$name','$avatar','$mail','10','','','','','0','$date','$status','$type');";
    $result = get_results($query,'insert');
    
    $subject = 'Registro a PM Canal 5';
    $body    = 'http://www.pmcanal5.com/templates/mailing/bienvenida.html';
    $data = array(
        '{{NAME}}' => $name
    );
    send_mail_user($mail,$subject,$body, $data);
    suscribe_mail_chimp($mail,$name,' ');

    return $result['data'];
}

function login_social($data,$mail){
    $query = "SELECT ID
                FROM lc_users
                WHERE users_user = '$data->username'
                AND users_mail = '$mail'
                LIMIT 1;";

    $result = get_results( $query );

    $result = $result['data'];
    $avatar = isset($data->tt)?$data->avatar:'http://graph.facebook.com/' . $data->id . '/picture';
    
    if(count($result) > 0){
        $result = true;
    }else{
        $pass = md5($data->id);
        $date = time();
        $query = "INSERT INTO lc_users VALUES(NULL,'$data->username','$pass','$data->name','$avatar','$mail','','','','','','','$date','1','2');";
        $result = get_results($query,'insert');

        //suscribe_mail_chimp($mail,$data->name,' ');

        $result = true;

    }

    return $result;
}

function upload_user_avatar($avatar){
    $response = false;
    $con = ftp_connect('pmcanal5.upload.akamai.com');
    $log = ftp_login($con, 'victoria_ns','pu3d3scon100turn0ctu');

    if ( $con || $log ) {
        ftp_pasv ($con, true);
        $ext = substr($avatar['name'], -3);
        $name = md5(time().','.$avatar["name"]) . '.' . $ext;
        $file = $avatar["tmp_name"];
        $dir = '250733/user-profile';

        if( ftp_chdir($con, $dir) ){
            if ( ftp_put($con,$name,$file,FTP_BINARY) ){
                $response = 'http://a9.g.akamai.net/f/9/250733/1h/pmcanal5.download.akamai.com/250733/user-profile/' . $name;
            }
        }

        ftp_close($con);
    }

    return $response;
}

function update_password($user, $actPass, $npass){
    $mail = explode(',',$_SESSION['user']);
    $mail = $mail[2];
    $name = explode(',',$_SESSION['user']);
    $name = $name[1];
    
    $query = "SELECT ID FROM lc_users
                WHERE ID = '$user'
                AND users_pass = MD5('$actPass')
                LIMIT 1;";

    $result = get_results($query);
    $result = $result['data'];

    if(count($result) > 0){
        $query = "UPDATE lc_users SET users_pass = MD5('$npass')
                WHERE ID = '$user'
                AND users_pass = MD5('$actPass')
                LIMIT 1;";

        get_results($query,'update');

        $result = true;

        $subject = 'Contraseña PM';
        $body    = 'http://www.pmcanal5.com/templates/mailing/notifypass.html';
        $data = array(
            '{{NAME}}' => $name
        );

        send_mail_user($mail,$subject,$body,$data);
    }else{
        $result = false;
    }

    return $result;
}

function valid_email($mail){

    $query = "SELECT ID FROM lc_users WHERE users_mail = '$mail' LIMIT 1;";

    $result = get_results( $query );
    
    if(isset($result['data'][0])){
        $result = $result['data'][0]->ID;
    }else{
        $result = false;
    }

    return $result;
}

function send_email_password($email){
    $response = false;

    $id = valid_email($email);
    
    if(is_numeric($id)){
        $date = time();
        $key = md5($id . $email . $date );

        $query = "INSERT INTO lc_reset_keys VALUES (NULL,'$id','$key','$date','1');";
        get_results($query,'insert');

        $subject = 'Recuperar contraseña PM';
        $body    = 'http://www.pmcanal5.com/templates/mailing/resetpass.html';
        $data = array(
            '{NAME}' => '',
            '{LINK}' => $_SERVER['HTTP_HOST'] . '/resetpass?r=' . $key
        );

        $response = send_mail_user($email,$subject,$body,$data);
        
    }

    return $response;
}

function forget_password($ref, $pass){
    $query = "SELECT user_id FROM lc_reset_keys
                WHERE ref = '$ref'
                AND status = '1'
                LIMIT 1;";

    $result = get_results($query);
    $result = $result['data'];

    if(count($result) > 0){
        $user = $result[0]->user_id;

        $query = "UPDATE lc_users SET users_pass = MD5('$pass')
                WHERE ID = '$user';";

        $result = get_results($query,'update');

        $query = "UPDATE lc_reset_keys SET status = '0'
                WHERE ref = '$ref';";

        $result = get_results($query,'update');

        $result = true;
    }else{
        $result = false;
    }

    return $result;
}

function close_account($user,$comment, $mailchimp) {
    $data = isset($_SESSION['user'])?explode(',',$_SESSION['user']):null;
    $user_name = $data != null?$data[1]:'';
    $user_mail = $data != null?$data[2]:'';
    $response = false;
    $query = "UPDATE lc_users SET users_status = '0'
                WHERE ID = '$user';";

    $result = get_results($query,'update');

    if ($result['success'] && count($result['data']) > 0) {
        $response = true;
    }

    if (!empty($comment)) {
        $subject = $user_name . ' cerro su cuenta en PM Canal 5';
        $body    = 'http://www.pmcanal5.com/templates/mailing/close_account.html';
        $data = array(
            '{{NAME}}' => $user_name,
            '{{COMMENT}}' => $comment
        );
        send_mail_user('josef@victoria.sh',$subject,$body, $data);
    }

    if ( $mailchimp && !empty($user_mail) ) {
        unsuscribe_mailchimp($user_mail);
    }

    return $response;
}

function unsuscribe_mailchimp($user_mail) {
    require_once('../services/mailchimp/Mailchimp.php');

    $chimp = new Mailchimp('93880077a715acb9786297f11a2d2568-us7');

    $list_id = "6c6ee72e48";

    try {
        $suscriber = $chimp->lists->unsubscribe( $list_id, array( 'email' => $user_mail ) );
    } catch(Exception $e) {
        
    }
}

function search($term){
    $search = array();
    $query = "SELECT * FROM vposts 
                WHERE title LIKE '%$term%' 
                OR content LIKE '%$term%' 
                OR program LIKE '%$term%' 
                OR id LIKE '%$term%' 
                OR keywords LIKE '%$term%' 
                OR tags LIKE '%$term%' 
                ORDER BY date DESC";

    $results = get_results($query,'select',false,'bender');
    
    if ($results['success'] && count($results['data']) > 0) {
        foreach ($results['data'] as $post) {
            $label = $post->type_post;

            if($post->url == 'EMPTY'){
                $post->url = '/' . str_replace(' ', '', strtolower($post->program)) . '/' . $post->id;
            }else{
                if( trim($post->url) == ''){
                    $post->url = '/' . str_replace(' ', '', strtolower($post->program)) . '/' . $post->id;
                }else{
                    $post->url = $post->url;
                }
            }

            if ( empty($label) ) {
                if ($post->type_post == 'page') {
                    $label = 'page';
                } else if ( !empty($post->embed) ) {
                    $label = "video";
                } else {
                    $label = 'otros';
                }
            }

            if ( in_array($label, $search) ) {
                $search["$label"] = array();                    
            }

            $search["$label"][] = $post;
        }
    }

    return $search;
}

function get_user_avatar(){
    return true;
}

function get_favorites($user) {
    $favorites = array();
    $query = "SELECT post_id AS post FROM lc_favorites WHERE users_id = '$user';";

    $result = get_results($query);

    if ($result['success'] && count($result['data']) > 0) {
        foreach ($result['data'] as $post_id) {
            $favorites[] = $post_id;
        }
    }

    return $favorites;
}

function setEncuesta($user,$program,$conductor,$invitados,$dinamicas,$look,$contenido,$historia,$elenco,$opinion){
    $response = false;
    $time = time();
    $query = "INSERT INTO encuesta_pm VALUES (
    null,
    '$user',
    '$program',
    '$conductor',
    '$invitados',
    '$dinamicas',
    '$look',
    '$contenido',
    '$elenco',
    '$historia',
    '$opinion',
    '$time'
    );";
    
    $result = get_results($query,'insert',false,'bender');
    
    if ($result['success'] && count($result['data']) > 0) {
        $response = $result['data'][0];
    }

    return $response;
}

function updateUserEncuesta($id,$user) {
    $query = "UPDATE encuesta_pm SET id_user = '$user' WHERE id = $id LIMIT 1;";
    $result = get_results($query,'update',false,'bender');
}

?>