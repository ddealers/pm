<?php
require_once('conection.php');

class PM {

    private $mysqli;

    function __construct(){
        $this->mysqli = new Conection();
        $this->mysqli = $this->mysqli->connect();
    }

    public function getDashBoard() {
        $dashboard = array(
            'comments' => 0,
            'posts' => 0,
            'users' => 0,
            'content' => 0
        );
        $today = strtotime(date('Y-m-d 00:00:00'));
        $today2 = date('Y-m-d 00:00:00');
        $now = time();
        //var_dump($today,$now,$today2);

        $queryComments = "SELECT COUNT(ID) AS total
                            FROM lc_comments
                            WHERE comment_date >= $today
                            AND comment_date <= $now;";

        $queryPosts = "SELECT COUNT(name) AS total
                    FROM viewpost
                    WHERE date BETWEEN '$today2' AND NOW();";

        $queryUsers = "SELECT COUNT(ID) AS total
        FROM lc_users
        WHERE users_date >= $today
        AND users_date <= $now;";

        $queryContent = "SELECT COUNT(id) AS total
        FROM user_content
        WHERE date >= $today
        AND date <= $now;";

        $c = $this->mysqli->query($queryComments);
        $p = $this->mysqli->query($queryPosts);
        $u = $this->mysqli->query($queryUsers);
        $co = $this->mysqli->query($queryContent);

        if ($c) {
            $c = $c->fetch_assoc();
            $dashboard['comments'] = $c['total'];
        }

        if ($p) {
            $p = $p->fetch_assoc();
            $dashboard['posts'] = $p['total'];
        }

        if ($u) {
            $u = $u->fetch_assoc();
            $dashboard['users'] = $u['total'];
        }

        if ($co) {
            $co = $co->fetch_assoc();
            $dashboard['content'] = $co['total'];
        }

        return $dashboard;
    }

    public function getVisto() {
        $posts = array();
        $query = 'SELECT name AS id, title, date, visits, program, id AS slug
                    FROM viewpost
                    ORDER BY visits DESC, date DESC
                    LIMIT 10;';

        $p = $this->mysqli->query($query);

        if ($p) {
            while ( $post = $p->fetch_assoc() ) {
                $post['link'] = $_SERVER['HTTP_HOST'] . '/' . strtolower(str_replace(' ','',$post['program'])) . '/' . $post['slug'];
                unset($post['slug']);
                unset($post['program']);
                $posts[] = $post;
            }
        }
        $this->mysqli->close();

        return $posts;
    }

    public function getVotado() {
        $posts = array();
        $query = 'SELECT name AS id, title, date, avg, program, id AS slug
                    FROM viewpost
                    ORDER BY avg DESC, date DESC
                    LIMIT 10;';

        $p = $this->mysqli->query($query);

        if ($p) {
            while ( $post = $p->fetch_assoc() ) {
                $post['link'] = 'http://' . $_SERVER['HTTP_HOST'] . '/' . strtolower(str_replace(' ','',$post['program'])) . '/' . $post['slug'];
                unset($post['slug']);
                unset($post['program']);
                $posts[] = $post;
            }
        }
        $this->mysqli->close();

        return $posts;
    }

    public function getComments() {
        $comments = array();
        $query = 'SELECT lc_comments.ID AS id, lc_comments.comment_content AS content, lc_comments.comment_date AS date, viewpost.program, viewpost.id AS slug,viewpost.title
                    FROM lc_comments,viewpost
                    WHERE lc_comments.post_id = viewpost.name
                    ORDER BY lc_comments.comment_date DESC;';
        $c = $this->mysqli->query($query);

        if ($c) {
            while ( $comment = $c->fetch_assoc() ) {
                $comment['link'] = 'http://' . $_SERVER['HTTP_HOST'] . '/' . strtolower(str_replace(' ','',$comment['program'])) . '/' . $comment['slug'];
                $comment['date'] = date('d/m/Y H:m',$comment['date']);
                unset($comment['slug']);
                $comments[] = $comment;
            }
        }
        $this->mysqli->close();

        return $comments;
    }

    public function getUsers() {
        $users = array();
        $query = 'SELECT ID AS id, users_name AS name, users_age AS age, users_gender AS gender,users_mail AS mail,
                  users_date AS date, users_type AS type,
                  (SELECT count(ID) FROM lc_users) AS total
                    FROM lc_users
                    ORDER BY date DESC;';

        $u = $this->mysqli->query($query);

        if ($u) {
            while ($user = $u->fetch_assoc()) {
                $user['date'] = date('d/m/Y',$user['date']);
                if ($user['type'] == 1) {
                    $user['type'] = 'Mail';
                } else if ($user['type'] == 2) {
                    $user['type'] = 'Facebook';
                } else if ($user['type'] == 3) {
                    $user['type'] = 'Twitter';
                }
                $users[] = $user;
            }
        }
        $this->mysqli->close();

        return $users;
    }

    public function getPostsToday() {
        $posts = array();
        $today = date('Y-m-d 00:00:00');
        $query = "SELECT name AS id, title, date, program, id AS slug
                    FROM viewpost
                    WHERE date BETWEEN '$today' AND NOW()
                    ORDER BY date DESC;";

        $p = $this->mysqli->query($query);

        if ($p) {
            while ( $post = $p->fetch_assoc() ) {
                $post['link'] = 'http://' . $_SERVER['HTTP_HOST'] . '/' . strtolower(str_replace(' ','',$post['program'])) . '/' . $post['slug'];
                unset($post['slug']);
                unset($post['program']);
                $posts[] = $post;
            }
        }
        $this->mysqli->close();

        return $posts;
    }

    public function getUserContent(){
        $content = array();
        $query = 'SELECT user_content.*, lc_users.users_name AS name, lc_users.users_mail AS mail
        FROM user_content, lc_users
        WHERE user_content.id_user = lc_users.ID
        ORDER BY user_content.date DESC;';

        $c = $this->mysqli->query($query);

        if ($c) {
            while ($co = $c->fetch_assoc()) {
                $co['date'] = date('d/m/Y',$co['date']);
                $co['content'] = $co['type'] == 'img'?'http://a9.g.akamai.net/f/9/250733/1h/pmcanal5.download.akamai.com/250733/user-content/' . $co['content']:$co['content'];
                $content[] = $co;
            }
        }
        $this->mysqli->close();

        return $content;
    }

    public function deleteComment($id) {
        $response = array(
            'success' => false,
            'data' => false,
            'message' => ''
        );
        $query = "DELETE FROM lc_comments WHERE ID = $id LIMIT 1;";

        $c = $this->mysqli->query($query);

        if ($c) {
            $response['success'] = true;
            $response['data'] = true;
        }

        return $response;
    }

    public function saveComment($id,$comment) {
        $response = array(
            'success' => false,
            'data' => false,
            'message' => ''
        );
        $query = "UPDATE lc_comments SET comment_content = '$comment' WHERE ID = $id LIMIT 1;";

        $c = $this->mysqli->query($query);

        if ($c) {
            $response['success'] = true;
            $response['data'] = true;
        }

        return $response;
    }

    /**
     * Retorna toda la informacion necesaria de las encuestas para poder graficarla
     * @return array Array por programa de las encuestas
     */
    public function getDataEncuestaPM() {
        $response = array(
            'programs' => array()
        );

        $queryTotal = 'SELECT program, COUNT(program) as total 
                        FROM encuesta_pm 
                        GROUP BY program;';

        $queryPrograms = 'SELECT program, 
            (CONCAT(
            (SELECT COUNT(conductor) FROM encuesta_pm WHERE conductor = "divertido" AND program = parent.program),
            ",",
            (SELECT COUNT(conductor) FROM encuesta_pm WHERE conductor = "no esta mal" AND program = parent.program),
            ",",
            (SELECT COUNT(conductor) FROM encuesta_pm WHERE conductor = "aburrido" AND program = parent.program),
            ",",
            (SELECT COUNT(conductor) FROM encuesta_pm WHERE conductor = "fatal" AND program = parent.program)
            )) AS conductor,
            (CONCAT(
            (SELECT COUNT(invitados) FROM encuesta_pm WHERE invitados = "divertido" AND program = parent.program),
            ",",
            (SELECT COUNT(invitados) FROM encuesta_pm WHERE invitados = "no esta mal" AND program = parent.program),
            ",",
            (SELECT COUNT(invitados) FROM encuesta_pm WHERE invitados = "aburrido" AND program = parent.program),
            ",",
            (SELECT COUNT(invitados) FROM encuesta_pm WHERE invitados = "fatal" AND program = parent.program)
            )) AS invitados
            ,
            (CONCAT(
            (SELECT COUNT(dinamicas) FROM encuesta_pm WHERE dinamicas = "divertido" AND program = parent.program),
            ",",
            (SELECT COUNT(dinamicas) FROM encuesta_pm WHERE dinamicas = "no esta mal" AND program = parent.program),
            ",",
            (SELECT COUNT(dinamicas) FROM encuesta_pm WHERE dinamicas = "aburrido" AND program = parent.program),
            ",",
            (SELECT COUNT(dinamicas) FROM encuesta_pm WHERE dinamicas = "fatal" AND program = parent.program)
            )) AS dinamicas,
            (CONCAT(
            (SELECT COUNT(look) FROM encuesta_pm WHERE look = "divertido" AND program = parent.program),
            ",",
            (SELECT COUNT(look) FROM encuesta_pm WHERE look = "no esta mal" AND program = parent.program),
            ",",
            (SELECT COUNT(look) FROM encuesta_pm WHERE look = "aburrido" AND program = parent.program),
            ",",
            (SELECT COUNT(look) FROM encuesta_pm WHERE look = "fatal" AND program = parent.program)
            )) AS look,
            (CONCAT(
            (SELECT COUNT(contenido) FROM encuesta_pm WHERE contenido = "divertido" AND program = parent.program),
            ",",
            (SELECT COUNT(contenido) FROM encuesta_pm WHERE contenido = "no esta mal" AND program = parent.program),
            ",",
            (SELECT COUNT(contenido) FROM encuesta_pm WHERE contenido = "aburrido" AND program = parent.program),
            ",",
            (SELECT COUNT(contenido) FROM encuesta_pm WHERE contenido = "fatal" AND program = parent.program)
            )) AS contenido
            FROM encuesta_pm parent
            WHERE program NOT IN ("Cuenta pendiente","Héroes del norte","Hoy soy nadie") 
            GROUP BY program;';

        $querySeries = 'SELECT program, 
            (CONCAT(
            (SELECT COUNT(look) FROM encuesta_pm WHERE look = "divertido" AND program = parent.program),
            ",",
            (SELECT COUNT(look) FROM encuesta_pm WHERE look = "no esta mal" AND program = parent.program),
            ",",
            (SELECT COUNT(look) FROM encuesta_pm WHERE look = "aburrido" AND program = parent.program),
            ",",
            (SELECT COUNT(look) FROM encuesta_pm WHERE look = "fatal" AND program = parent.program)
            )) AS look,
            (CONCAT(
            (SELECT COUNT(elenco) FROM encuesta_pm WHERE elenco = "divertido" AND program = parent.program),
            ",",
            (SELECT COUNT(elenco) FROM encuesta_pm WHERE elenco = "no esta mal" AND program = parent.program),
            ",",
            (SELECT COUNT(elenco) FROM encuesta_pm WHERE elenco = "aburrido" AND program = parent.program),
            ",",
            (SELECT COUNT(elenco) FROM encuesta_pm WHERE elenco = "fatal" AND program = parent.program)
            )) AS elenco,
            (CONCAT(
            (SELECT COUNT(historia) FROM encuesta_pm WHERE historia = "divertido" AND program = parent.program),
            ",",
            (SELECT COUNT(historia) FROM encuesta_pm WHERE historia = "no esta mal" AND program = parent.program),
            ",",
            (SELECT COUNT(historia) FROM encuesta_pm WHERE historia = "aburrido" AND program = parent.program),
            ",",
            (SELECT COUNT(historia) FROM encuesta_pm WHERE historia = "fatal" AND program = parent.program)
            )) AS historia
            FROM encuesta_pm parent
            WHERE program IN ("Cuenta pendiente","Héroes del norte","Hoy soy nadie") 
            GROUP BY program;';

        $total = $this->mysqli->query($queryTotal);
        $programs = $this->mysqli->query($queryPrograms);
        $series = $this->mysqli->query($querySeries);

        if ($total->num_rows > 0) {
            while ($program = $total->fetch_assoc()) {
                $response['total'][] = $program;
            }
        }

        if ($programs->num_rows > 0) {
            while ($program = $programs->fetch_assoc()) {
                $conductor = explode(',', $program['conductor']);
                $conductor = array(
                    array('Súper divertido',(int)$conductor[0]),
                    array('No esta mal',(int)$conductor[1]),
                    array('Aburrido',(int)$conductor[2]),
                    array('Fatal',(int)$conductor[3])
                );
                $invitados = explode(',', $program['invitados']);
                $invitados = array(
                    array('Súper divertido',(int)$invitados[0]),
                    array('No esta mal',(int)$invitados[1]),
                    array('Aburrido',(int)$invitados[2]),
                    array('Fatal',(int)$invitados[3])
                );
                $dinamicas = explode(',', $program['dinamicas']);
                $dinamicas = array(
                    array('Súper divertido',(int)$dinamicas[0]),
                    array('No esta mal',(int)$dinamicas[1]),
                    array('Aburrido',(int)$dinamicas[2]),
                    array('Fatal',(int)$dinamicas[3])
                );
                $look = explode(',', $program['look']);
                $look = array(
                    array('Súper divertido',(int)$look[0]),
                    array('No esta mal',(int)$look[1]),
                    array('Aburrido',(int)$look[2]),
                    array('Fatal',(int)$look[3])
                );
                $contenido = explode(',', $program['contenido']);
                $contenido = array(
                    array('Súper divertido',(int)$contenido[0]),
                    array('No esta mal',(int)$contenido[1]),
                    array('Aburrido',(int)$contenido[2]),
                    array('Fatal',(int)$contenido[3])
                );

                $response['programs'][$program['program']] = array(
                    'conductor' => $conductor,
                    'invitados' => $invitados,
                    'dinamicas' => $dinamicas,
                    'contenido' => $contenido,
                    'look' => $look
                );
            }
        }

        if ($series->num_rows > 0) {
            while ($serie = $series->fetch_assoc()) {
                $look = explode(',', $serie['look']);
                $look = array(
                    array('Súper divertido',(int)(int)$look[0]),
                    array('No esta mal',(int)(int)$look[1]),
                    array('Aburrido',(int)(int)$look[2]),
                    array('Fatal',(int)(int)$look[3])
                );
                $elenco = explode(',', $serie['elenco']);
                $elenco = array(
                    array('Súper divertido',(int)$elenco[0]),
                    array('No esta mal',(int)$elenco[1]),
                    array('Aburrido',(int)$elenco[2]),
                    array('Fatal',(int)$elenco[3])
                );
                $historia = explode(',', $serie['historia']);
                $historia = array(
                    array('Súper divertido',(int)$historia[0]),
                    array('No esta mal',(int)$historia[1]),
                    array('Aburrido',(int)$historia[2]),
                    array('Fatal',(int)$historia[3])
                );

                $response['series'][$serie['program']] = array(
                    'historia' => $historia,
                    'elenco' => $elenco,
                    'look' => $look
                );
            }
        }

        return $response;
    }

    public function getDataEncuestaPMFull($program) {
        $response = array();
        $program = $program == ''?'Cuenta pendiente':$program;

        $query = 'SELECT program, IF(STRCMP(conductor,""),conductor,"No aplica") AS conductor, 
        IF(STRCMP(invitados,""),invitados,"No aplica") AS invitados, IF(STRCMP(dinamicas,""),dinamicas,"No aplica") AS dinamicas, 
        IF(STRCMP(contenido,""),contenido,"No aplica") AS contenido, look, 
        IF(STRCMP(elenco,""),elenco,"No aplica") AS elenco, IF(STRCMP(historia,""),historia,"No aplica") AS historia, opinion 
        FROM encuesta_pm 
        WHERE program = "' . $program . '";';

        $data = $this->mysqli->query($query);

        if ($data->num_rows > 0) {
            while( $row = $data->fetch_assoc() ){
                $response[] = $row;
            }
        }

        return $response;
    }

}
?>