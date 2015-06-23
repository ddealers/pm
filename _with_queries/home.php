<?php
/*error_reporting(E_ALL);
ini_set('display_errors', 1);*/

require_once('pm.php');

class home extends PM{

    function __construct() {
        parent::__construct();
    }

    public function get_post_index_page_complete() {
        $posts = '';

        $queryPlaylist = $this->querySelectBase .
                        ',"" AS "is" '.
                        $this->queryFromBase .
                        $this->queryWhereBase .
                        " AND m13.meta_value IS NULL 
                        AND m12.meta_value = 'on' 
                        AND p.post_type != 'page' 
                        AND p.post_status = 'publish' 
                        ORDER BY date DESC 
                        LIMIT 5;";
        $resultPlaylist = $this->mysqli->get_results($queryPlaylist);
        foreach($resultPlaylist as $r){
            $posts .= $r->name . ',';
        }
        $posts = trim($posts,',');

        $queryStage = $this->querySelectBase .
                    ',"" AS "is",bloguero.meta_value AS bloguero_autor '.
                    $this->queryFromBase .
                    'LEFT JOIN wp_postmeta bloguero ON (bloguero.meta_key = "blog_autor") AND (bloguero.post_id = p.ID) ' .
                    $this->queryWhereBase .
                    " AND m13.meta_value IS NULL 
                    AND (m10.meta_value = 'promoabierto' OR m10.meta_value = 'promo') 
                    AND p.post_type != 'page' 
                    AND p.ID NOT IN ($posts) 
                    AND p.post_status = 'publish' 
                    ORDER BY date DESC 
                    LIMIT 8;";
        $resultStage = $this->mysqli->get_results($queryStage);
        $posts .= ',';
        
        foreach($resultStage as $r){
            $posts .= $r->name . ',';
        }
        $posts = trim($posts,',');

        $queryBreak = $this->querySelectBase .
                    ',"" AS "is" '.
                    $this->queryFromBase .
                    $this->queryWhereBase .
                    " AND m13.meta_value IS NULL 
                    AND m2.meta_value = 'Break' 
                    AND p.post_type != 'page' 
                    AND p.post_status = 'publish' 
                    AND m10.meta_value != 'promoabierto' 
                    ORDER BY p.post_date DESC 
                    LIMIT 3;";
        $resultBreak = $this->mysqli->get_results($queryBreak);
        $posts .= ',';
        foreach($resultBreak as $r){
            $posts .= $r->name . ',';
        }
        $posts = trim($posts,',');

        $queryVisitsVoteNewDest = '('.
                                    $this->querySelectBase .
                                    ',"" AS "is",bloguero.meta_value AS bloguero_autor  '.
                                    $this->queryFromBase .
                                    'LEFT JOIN wp_postmeta bloguero ON (bloguero.meta_key = "blog_autor") AND (bloguero.post_id = p.ID) ' .
                                    $this->queryWhereBase .
                                    "AND m13.meta_value IS NULL 
                                     AND (m12.meta_value IS NULL 
                                     AND m5.meta_value = 'on') 
                                     AND p.post_type != 'page' 
                                     AND m10.meta_value != 'promoabierto' 
                                     OR (m2.meta_value NOT IN ( 'Break', 'Playlist', 'Break Stage') 
                                     AND (CAST(p.post_date AS date) = CAST(NOW() AS date)) AND m10.meta_value != 'promoabierto' )
                                     AND p.ID NOT IN ($posts) 
                                     AND p.post_status = 'publish' 
                                     AND m13.meta_value IS NULL 
                                     AND m10.meta_value != 'promoabierto' 
                                     ORDER BY p.post_date DESC
                                    ) 
                                    UNION
                                     (".
                                        $this->querySelectBase .
                                        ',"" AS "is",bloguero.meta_value AS bloguero_autor '.
                                        $this->queryFromBase .
                                        'LEFT JOIN wp_postmeta bloguero ON (bloguero.meta_key = "blog_autor") AND (bloguero.post_id = p.ID) ' .
                                        $this->queryWhereBase .
                                        " AND m13.meta_value IS NULL 
                                        AND p.visits IS NOT NULL 
                                        AND m12.meta_value IS NULL 
                                        AND p.post_type != 'page' 
                                        AND m2.meta_value NOT IN ( 'Break', 'Playlist', 'Break Stage') 
                                        AND p.ID NOT IN ($posts) 
                                        AND p.post_status = 'publish' 
                                        AND m10.meta_value != 'promoabierto' 
                                        LIMIT 2
                                     )
                                    UNION
                                     (".
                                        $this->querySelectBase .
                                        ',"" AS "is",bloguero.meta_value AS bloguero_autor '.
                                        $this->queryFromBase .
                                        'LEFT JOIN wp_postmeta bloguero ON (bloguero.meta_key = "blog_autor") AND (bloguero.post_id = p.ID) ' .
                                        $this->queryWhereBase .
                                        " AND m13.meta_value IS NULL 
                                        AND m12.meta_value IS NULL 
                                        AND m2.meta_value NOT IN ( 'Break', 'Playlist', 'Break Stage') 
                                        AND m5.meta_value IS NULL 
                                        AND p.post_type != 'page' 
                                        AND p.ID NOT IN ($posts) 
                                        AND p.post_status = 'publish' 
                                        AND m10.meta_value != 'promoabierto' 
                                        ORDER BY p.avg, p.post_date DESC 
                                        LIMIT 4
                                     )
                                     ORDER BY date DESC;";

        $resultVisitsVoteNewDest = $this->mysqli->get_results($queryVisitsVoteNewDest);
        $posts .= ',';
        foreach($resultVisitsVoteNewDest as $r){
            $posts .= $r->name . ',';
        }
        $posts = trim($posts,',');

        $queryDate = $this->querySelectBase .
                    ',"" AS "is",bloguero.meta_value AS bloguero_autor '.
                    $this->queryFromBase .
                    'LEFT JOIN wp_postmeta bloguero ON (bloguero.meta_key = "blog_autor") AND (bloguero.post_id = p.ID) ' .
                    $this->queryWhereBase .
                    " AND m13.meta_value IS NULL 
                    and m12.meta_value is NULL 
                    and m2.meta_value not in ( 'Break', 'Playlist', 'Break Stage') 
                    and m5.meta_value IS NULL 
                    AND p.post_type != 'page' 
                    AND p.ID NOT IN ($posts) 
                    AND p.post_status = 'publish' 
                    AND m10.meta_value != 'promoabierto' 
                    ORDER BY p.post_date DESC 
                    LIMIT 21;";
        $resultDate = $this->mysqli->get_results($queryDate);


        $response['playlist'] = $this->set_label( $resultPlaylist );
        $response['stage'] = $this->set_label( $resultStage );
        $response['break'] = $this->set_label( $resultBreak );
        $response['destacados'] = $this->set_label( $resultVisitsVoteNewDest );
        $response['last'] = $this->set_label( $resultDate );

        return $response;
    }

    public function get_post_index_page_complete_json() {
        $response = (array) json_decode(file_get_contents('http://a9.g.akamai.net/f/9/250733/1m/pmcanal5.download.akamai.com/250733/data/home.json'));
        //$response = (array) json_decode(file_get_contents('http://localhost/www/json/data/home.json'));

        return $response;
    }

    public function getLastEmbedByProgram($program) {
        $post = null;

        $query = $this->querySelectBase.
                $this->queryFromBase .
                $this->queryWhereBase .
                "AND m4.meta_value IS NOT NULL 
                  AND m2.meta_value = '$program' 
                  ORDER BY p.post_date DESC LIMIT 1;";

        $post = $this->mysqli->get_results($query);

        return $post;
    }

    public function getLastGaleryByProgram($program) {
        $post = null;

        #Magicamente de un dia a otro el query trono (Solo en produccion, en local funciona bien xD) ._.
        /*$query = $this->querySelectBase.
                $this->queryFromBase .
                $this->queryWhereBase .
                "AND m10.meta_value = 'galeria' 
                  AND m2.meta_value = '$program' 
                  ORDER BY p.post_date DESC 
                  LIMIT 1;";*/

        $query = 'SELECT DISTINCT
           p.ID AS name,
           p.post_name AS id,
           p.post_title AS title,
           p.post_content AS content,
           u.user_nicename AS author,
           p.post_type AS post_type
            FROM wp_posts p JOIN wp_users u ON p.post_author = u.ID 
            LEFT JOIN wp_postmeta m2 ON (m2.meta_key = "dbt_programselect") AND (m2.post_id = p.ID)
            LEFT JOIN wp_postmeta m10 ON (m10.meta_key = "type_post") AND (m10.post_id = p.ID)              
            WHERE p.post_status = "publish" 
            AND p.post_type IN ("post","page","tourpm","los5pm")AND m10.meta_value = "galeria" 
          AND m2.meta_value = "' . $program . '" 
          ORDER BY p.post_date DESC 
          LIMIT 1;';
        $post = $this->mysqli->get_results($query);

        return $post;
    }

    public function getBannerPromotion() {
        $banner = array();
        $query = 'SELECT ID, post_content AS content, post_title AS title, 
                color.meta_value AS bgcolor, color1.meta_value AS bgcolor_hover,
                link.meta_value AS banner_link 
                FROM wp_posts 
                LEFT JOIN `wp_postmeta` `color` ON (`color`.`meta_key` = "bgcolor") AND (`color`.`post_id` = `wp_posts`.`ID`) 
                LEFT JOIN `wp_postmeta` `color1` ON (`color1`.`meta_key` = "bgcolor_hover") AND (`color1`.`post_id` = `wp_posts`.`ID`) 
                LEFT JOIN `wp_postmeta` `link` ON (`link`.`meta_key` = "banner_link") AND (`link`.`post_id` = `wp_posts`.`ID`) 
                WHERE post_type = "banner_top" 
                AND post_status = "publish" 
                ORDER BY RAND() 
                LIMIT 1';

        $result = $this->mysqli->get_results($query);
        
        if (count($result) > 0) {
            $banner = $result[0];
        }

        return $banner;
    }

    public function get_search_results($term,$type = ''){
        $search = array();
        $queryType = '';
        
        if ( !empty($type) ) {
            if ($type == 'video') {
                $queryType = "AND m4.meta_value IS NOT NULL ";
            } else if ($type == 'otros') {
                $queryType = "AND m10.meta_value IS NULL ";
            } else {
                $queryType = "AND m10.meta_value = '$type' ";
            }
        } else {
            $queryType = '';
        }

        $query = $this->querySelectBase . 
                $this->queryFromBase .
                $this->queryWhereBase .
                "AND (p.post_title LIKE '%$term%' 
                OR p.post_content LIKE '%$term%' 
                OR m2.meta_value LIKE '%$term%' 
                OR p.post_name LIKE '%$term%' 
                OR m17.meta_value LIKE '%$term%' 
                OR (SELECT GROUP_CONCAT(wp_terms.name SEPARATOR ', ')
                     FROM wp_terms 
                     LEFT JOIN wp_term_taxonomy ON wp_term_taxonomy.term_id = wp_terms.term_id 
                     LEFT JOIN wp_term_relationships ON wp_term_relationships.term_taxonomy_id = wp_term_taxonomy.term_taxonomy_id 
                     WHERE wp_term_relationships.object_id = p.ID
                     AND wp_terms.name != 'Uncategorized') LIKE '%$term%' ) "
                . $queryType . ';';

        $posts = $this->mysqli->get_results($query);

        if ($this->mysqli->getQueryError() == '' && count($posts) > 0) {
            foreach ($posts as $result) {
                $tw_widget_id = 'tw-widget-id';
                $search[] = array(
                    'id' => $result->id,
                    'name' => $result->name,
                    'title' => $result->title,
                    'content' => $result->content,
                    'stripcontent' => strip_tags($result->content),
                    'excerpt' => '',
                    'author' => $result->author,
                    'thumbnail' =>  $result->thumbnail,
                    'type' => $result->post_type,
                    'url' => $result->url,
                    'program' => $result->program,
                    'program_name' => $result->program,
                    'position' => 'normal',
                    'hour' => $result->hour,
                    'dest' => $result->dest,
                    'stage' => $result->stage,
                    'embed' => array($result->embed),
                    'embed_yt' => $result->embed_yt,
                    'layout' => '',
                    'twitter' => array($result->twitter),
                    'tw-widget-id' => array($result->$tw_widget_id),
                    'tags' => $result->tags,
                    'spotify' => array($result->spotify_url),
                    'date' => $result->date,
                    'type_post' => $result->type_post,
                    'visits' => $result->visits,
                    'stageList' => $result->stageList,
                    'avg' => $result->avg,
                    'comments' => $result->comments,
                    'is' => ''
                );
            }
        }

        return $search;
    }

    public function getTourById($id_tour='') {
        $tour = array();
        $whereBase = $id_tour == ''?'ORDER BY date DESC ':"AND post_name = '$id_tour' ";
        $query = "SELECT ID AS id, post_name AS name, 
                post_content AS content, post_date_gmt AS date, 
                post_title AS title, embed.meta_value AS embed, visits, 
                program.meta_value AS program, vines.meta_value AS vines, 
                insta.meta_value AS instafeed, back.meta_value AS background,
                m.meta_value AS thumbnailid, trivia.meta_value AS trivia,
                (SELECT w.guid FROM wp_posts w WHERE (w.ID = thumbnailid) LIMIT 1) AS thumbnail,
                back2.meta_value AS background2, 
                prize.meta_value AS prizes  
                FROM wp_posts 
                LEFT JOIN wp_postmeta m ON (m.meta_key = '_thumbnail_id') AND (m.post_id = wp_posts.ID) 
                LEFT JOIN wp_postmeta embed ON (embed.meta_key = 'dbt_embedCode') AND (embed.post_id = wp_posts.ID) 
                LEFT JOIN wp_postmeta program ON (program.meta_key = 'dbt_programselect') AND (program.post_id = wp_posts.ID) 
                LEFT JOIN wp_postmeta vines ON (vines.meta_key = 'tour_vines') AND (vines.post_id = wp_posts.ID) 
                LEFT JOIN wp_postmeta insta ON (insta.meta_key = 'tour_insta') AND (insta.post_id = wp_posts.ID) 
                LEFT JOIN wp_postmeta back ON (back.meta_key = 'tour_back') AND (back.post_id = wp_posts.ID) 
                LEFT JOIN wp_postmeta back2 ON (back2.meta_key = 'tour_back2') AND (back2.post_id = wp_posts.ID) 
                LEFT JOIN wp_postmeta trivia ON (trivia.meta_key = 'tour_trivia') AND (trivia.post_id = wp_posts.ID) 
                LEFT JOIN wp_postmeta prize ON (prize.meta_key = 'trivia') AND (prize.post_id = wp_posts.ID) 
                WHERE post_type = 'tourpm' 
                AND post_status = 'publish' ".
                $whereBase .
                "LIMIT 1;";

        $result = $this->mysqli->get_results($query);
        
        if (count($result) > 0) {
            $result[0]->prizes = json_decode($result[0]->prizes);
            $tour = $result[0];
        }

        return $tour;
    }

    /**
     * Metodos para las nocturnenas
     */
    public function getNenaById($id){
        $nena = array();
        $query = "SELECT *, 
                    (SELECT COUNT(ID) FROM lc_comments WHERE post_id = '$id"."404' ) AS comments,
                    (SELECT COUNT(ID) FROM lc_votes WHERE post_id = '$id"."404' ) AS avg 
                    FROM nocturnenas 
                    WHERE id_nocturnena = '$id' 
                    LIMIT 1;";

        $result = $this->mysqli->get_results($query);
        
        if (count($result) > 0) {
            $result = $result[0];
            if ( strstr($result->video, 'youtu.be') ) {
                $result->video = explode('youtu.be/',$result->video);
                $result->video = isset($result->video[1])?explode('&',$result->video[1]):'';
                $result->video = isset($result->video[0])?$result->video[0]:'';
            } else {
                $result->video = explode('watch?v=',$result->video);
                $result->video = isset($result->video[1])?explode('&',$result->video[1]):'';
                $result->video = isset($result->video[0])?$result->video[0]:'';
            }
            
            $nena = array(
                array(
                    'id' => '?nena='.$id,
                    'name' => $id,
                    'title' => $result->name,
                    'content' => $result->about,
                    'thumbnail' => $result->photo,
                    'url' => '/nocturnenas?nena='+$id,
                    'program' => 'nocturnenas',
                    'program_name' => 'Nocturnenas',
                    'embed' => array(''),
                    'embed_yt' => $result->video,
                    'avg' => $result->avg,
                    'is_widget' => false,
                    'comments' => $result->comments,
                    'data' => array(
                        'age' => $result->age,
                        'nacionality' => $result->nacionality,
                        'height' => $result->height,
                        'talla' =>  $result->breast . '-' . $result->waist . '-' . $result->hip
                    )
                )
            );

        }

        return $nena;
    }

    public function getMoreNocturnenas($current) {
        $current = 0;
        $relateds = array();
        $query = "SELECT *, 
                    (SELECT COUNT(ID) FROM lc_votes WHERE post_id = CONCAT(id_nocturnena,'404') ) AS avg 
                    FROM nocturnenas 
                    WHERE id_nocturnena != '$current' 
                    ORDER BY RAND() 
                    LIMIT 3;";

        $results1 = $this->mysqli->get_results($query);

        foreach ($results1 as $result) {
            $stripcontent = strip_tags($result->about);
            $result->video = explode('watch?v=',$result->video);
            $result->video = isset($result->video[1])?explode('&',$result->video[1]):'';
            $result->video = isset($result->video[0])?$result->video[0]:'';
            
            $relateds[] = array(
                'id' => '?nena='.$result->id_nocturnena,
                'name' => $result->id_nocturnena,
                'title' => $result->name,
                'content' => $result->about,
                'stripcontent' => $stripcontent,
                'excerpt' => '',
                'author' => '',
                'thumbnail' => $result->photo,
                'type' => 'nocturnena',
                'program' => 'nocturnenas',
                'url' => '/nocturnenas?nena='.$result->id_nocturnena,
                'hour' => '',
                'dest' => '',
                'stage' => '',
                'position' => '',
                'embed' => '',
                'embed_yt' => $result->video,
                'layout' => '',
                'twitter' => '',
                'tw-widget-id' => '',
                'type_post' => 'nocturnena',
                'tags' => '',
                'avg' => $result->avg,
                'date' => $result->date,
                'is' => '',
                'age' => $result->age,
                'nacionality' => $result->nacionality,
                'talla' => $result->breast . '-' . $result->waist . '-' . $result->hip,
                'height' => $result->height
            );
        }

        return $this->set_label($relateds);

    }

    public function getNocturnenas() {
        $nocturnenas = array();
        $query = "SELECT *,
        (SELECT COUNT(ID) FROM lc_votes WHERE post_id = CONCAT(id_nocturnena,'404') ) AS avg 
         FROM nocturnenas;";
                
        $resultt = $this->mysqli->get_results($query);
        
        if ($this->mysqli->getQueryError() == '' && count($resultt) > 0) {

            foreach ($resultt as $result) {
                $nocturnenas[] = array(
                    'id' => '?nena='.$result->id_nocturnena,
                    'name' => $result->id_nocturnena,
                    'title' => $result->name,
                    'content' => $result->about,
                    'stripcontent' => strip_tags($result->about),
                    'excerpt' => '',
                    'author' => '',
                    'thumbnail' =>  $result->photo,
                    'type' => 'nocturnena',
                    'url' => '/nocturnenas?nena='.$result->id_nocturnena,
                    'program' => 'Nocturnenas',
                    'program_name' => 'Nocturnenas',
                    'position' => 'normal',
                    'hour' => '',
                    'dest' => '',
                    'stage' => '',
                    'embed' => '',
                    'layout' => '',
                    'twitter' => array(''),
                    'tw-widget-id' => array(''),
                    'meta_fb' => '',
                    'meta_vars' => '',
                    'meta_css' => '',
                    'tags' => '',
                    'spotify' => array(''),
                    'date' => $result->date,
                    'type_post' => 'nocturnena',
                    'visits' => 0,
                    'stageList' => '',
                    'avg' => $result->avg,
                    'comments' => 0,
                    'section' => '',
                    'banner' => '',
                    'own' => '',
                    'hwidget' => '',
                    'widget' => '',
                    'widgeti' => '',
                    'wimg' => '',
                    'wtitle' => '',
                    'wcomments' => '',
                    'wprogram' => '',
                    'is_widget' => false,
                    'path_include' => '',
                    'fb_desc' => '',
                    'keywords' => '',
                    'display_name' => 'Las nocturnenas',
                    'age' => $result->age,
                    'nacionality' => $result->nacionality,
                    'talla' => $result->breast . '-' . $result->waist . '-' . $result->hip,
                    'height' => $result->height
                );
            }
        }

        return $nocturnenas;
    }

    public function getProgramsAnswered() {
        $response = array();
        $user = isset($_SESSION['user'])?explode(',',$_SESSION['user']):0;
        $user = $user != 0?$user[0]:0;

        if ($user != 0) {
            $query = "SELECT program FROM encuesta_pm WHERE id_user = '$user';";
            $result = $this->mysqli->get_results($query);
            
            if ($this->mysqli->getQueryError() == '' && count($result) > 0) {
                
                foreach ($result as $program) {
                    $response[] = $program->program;
                }
            }
        }
        
        return $response;
    }

    public function getHorarios() {
        $programs = array();

        $query = 'SELECT p.ID AS name,
                    p.post_name AS id,
                    display_name.meta_value AS title,
                    m.meta_value AS thumbnailid,
                    (SELECT w.guid FROM wp_posts w WHERE (w.ID = thumbnailid) LIMIT 1) AS thumbnail,
                    m2.meta_value AS program,
                    program_days.meta_value AS days,
                    program_hour.meta_value AS hour,
                    program_img.meta_value AS img 
                    FROM wp_posts p  
                    LEFT JOIN wp_postmeta m ON (m.meta_key = "_thumbnail_id") AND (m.post_id = p.ID) 
                    LEFT JOIN wp_postmeta m2 ON (m2.meta_key = "dbt_programselect") AND (m2.post_id = p.ID) 
                    LEFT JOIN wp_postmeta program_days ON (program_days.meta_key = "program_days") AND (program_days.post_id = p.ID) 
                    LEFT JOIN wp_postmeta program_hour ON (program_hour.meta_key = "program_hour") AND (program_hour.post_id = p.ID) 
                    LEFT JOIN wp_postmeta program_img ON (program_img.meta_key = "program_img") AND (program_img.post_id = p.ID) 
                    LEFT JOIN wp_postmeta display_name ON (display_name.meta_key = "display_name") AND (display_name.post_id = p.ID) 
                    WHERE p.post_status = "publish" 
                    AND p.post_type = "page" 
                    AND program_days.meta_value != "" 
                    ORDER BY hour ASC;';

        $result = $this->mysqli->get_results($query);

        //Si un programa se transmite mas de un dia los separa =)
        for ($i=0,$t=count($result); $i < $t; $i++) { 
            if ( strstr($result[$i]->days, ',') ) {
                $days = explode(',',$result[$i]->days);

                foreach ($days as $day) {
                    $temp = (array) $result[$i];
                    $temp['days'] = $day;
                    array_push($result,(object) $temp);
                    unset($temp);
                }
                unset($result[$i]);
            }
        }

        foreach ($result as $program) {
            $program->title = str_replace('_', ' ', $program->title);
            if (strstr($program->img, '.jpg')) {
                $program->img = str_replace('.jpg','_full.png',$program->img);
            } else {
                $program->img = str_replace('.png','_full.png',$program->img);    
            }

            $programs[$program->days][] = $program;
        }

        return $programs;
    }    

    function __destruct() {
       parent::__destruct();
    }

}
?>