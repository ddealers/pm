<?php
require_once('pm.php');

class single extends PM{

    function __construct() {
        parent::__construct();
    }

    public function get_post_by_id($id) {
		$page = array();
		$query = $this->querySelectBase .
				', iswidget.meta_value AS is_widget, path.meta_value AS path_include,
				bloguero.meta_value AS bloguero_autor,metadata.meta_value AS post_data,social_bloguero.meta_value AS social_author ' .
				$this->queryFromBase .
				'LEFT JOIN wp_postmeta iswidget ON (iswidget.meta_key = "iswidget") AND (iswidget.post_id = p.ID) 
				LEFT JOIN wp_postmeta path ON (path.meta_key = "path_include") AND (path.post_id = p.ID) 
				LEFT JOIN wp_postmeta bloguero ON (bloguero.meta_key = "blog_autor") AND (bloguero.post_id = p.ID) 
				LEFT JOIN wp_postmeta metadata ON (metadata.meta_key = "post_data") AND (metadata.post_id = p.ID) 
				LEFT JOIN wp_postmeta social_bloguero ON (social_bloguero.meta_key = "social_author") AND (social_bloguero.post_id = p.ID) ' .
				$this->queryWhereBase .
				"AND p.post_name = '$id' 
				LIMIT 1;";
		$result = $this->mysqli->get_results($query);

		if ($this->mysqli->getQueryError() == '' && count($result) > 0) {
			$tw_widget_id = 'tw-widget-id';
			$page[] = array(
	            'id' => $result[0]->id,
	            'name' => $result[0]->name,
	            'title' => $result[0]->title,
	            'content' => $result[0]->content,
	            'stripcontent' => strip_tags($result[0]->content),
	            'excerpt' => '',
	            'author' => $result[0]->bloguero_autor,
	            'thumbnail' =>  $result[0]->thumbnail,
	            'type' => $result[0]->post_type,
	            'url' => $result[0]->url,
	            'program' => $result[0]->program,
	            'program_name' => $result[0]->program,
	            'position' => '',
	            'hour' => $result[0]->hour,
	            'dest' => $result[0]->dest,
	            'stage' => $result[0]->stage,
	            'embed' => array($result[0]->embed),
	            'embed_yt' => $result[0]->embed_yt,
	            'layout' => '',
	            'twitter' => array($result[0]->twitter),
	            'tw-widget-id' => array($result[0]->$tw_widget_id),
	            'tags' => $result[0]->tags,
	            'spotify' => array($result[0]->spotify_url),
	            'date' => $result[0]->date,
	            'type_post' => $result[0]->type_post,
	            'visits' => $result[0]->visits,
	            'stageList' => $result[0]->stageList,
	            'avg' => $result[0]->avg,
	            'comments' => $result[0]->comments,
	            'is' => '',
	            'is_widget' => ($result[0]->is_widget == 'true')?true:false,
	            'path_include' => $result[0]->path_include,
	            'meta_fb' => $result[0]->meta_fb,
		        'meta_vars' => $result[0]->meta_vars,
		        'meta_css' => $result[0]->meta_css,
		        'keywords' => $result[0]->keywords,
		        'post_data' => $result[0]->post_data,
		        'social_author' => json_decode($result[0]->social_author)
	        );
		}

		if ($page[0]['type'] == 'los5pm') {
			return $this->get5Pm($page);
		} else {
			return $page;	
		}
		
	}

	private function get5pm($post) {
		$id_post = is_numeric($post[0]['id'])?$post[0]['id']:$post[0]['name'];
		$dataTop = array();

		$query = "SELECT CONCAT(t1.meta_value,'&&',i1.meta_value,'&&',d1.meta_value,'&&',IF(v1.meta_value!='',v1.meta_value,'NULL'),'&&',IF(pie1.meta_value!='',pie1.meta_value,'NULL') ) AS top1, 
		CONCAT(t2.meta_value,'&&',i2.meta_value,'&&',d2.meta_value,'&&',IF(v2.meta_value!='',v2.meta_value,'NULL'),'&&',IF(pie2.meta_value!='',pie2.meta_value,'NULL') ) AS top2, 
		CONCAT(t3.meta_value,'&&',i3.meta_value,'&&',d3.meta_value,'&&',IF(v3.meta_value!='',v3.meta_value,'NULL'),'&&',IF(pie3.meta_value!='',pie3.meta_value,'NULL') ) AS top3, 
		CONCAT(t4.meta_value,'&&',i4.meta_value,'&&',d4.meta_value,'&&',IF(v4.meta_value!='',v4.meta_value,'NULL'),'&&',IF(pie4.meta_value!='',pie4.meta_value,'NULL') ) AS top4, 
		CONCAT(t5.meta_value,'&&',i5.meta_value,'&&',d5.meta_value,'&&',IF(v5.meta_value!='',v5.meta_value,'NULL'),'&&',IF(pie5.meta_value!='',pie5.meta_value,'NULL') ) AS top5, 
		final.meta_value AS final 
		FROM wp_posts p 
		LEFT JOIN wp_postmeta t1 ON t1.meta_key = 'meta_toptitle1' AND t1.post_id = p.ID 
		LEFT JOIN wp_postmeta t2 ON t2.meta_key = 'meta_toptitle2' AND t2.post_id = p.ID 
		LEFT JOIN wp_postmeta t3 ON t3.meta_key = 'meta_toptitle3' AND t3.post_id = p.ID 
		LEFT JOIN wp_postmeta t4 ON t4.meta_key = 'meta_toptitle4' AND t4.post_id = p.ID 
		LEFT JOIN wp_postmeta t5 ON t5.meta_key = 'meta_toptitle5' AND t5.post_id = p.ID 
		LEFT JOIN wp_postmeta i1 ON i1.meta_key = 'meta_topimg1' AND i1.post_id = p.ID 
		LEFT JOIN wp_postmeta i2 ON i2.meta_key = 'meta_topimg2' AND i2.post_id = p.ID 
		LEFT JOIN wp_postmeta i3 ON i3.meta_key = 'meta_topimg3' AND i3.post_id = p.ID 
		LEFT JOIN wp_postmeta i4 ON i4.meta_key = 'meta_topimg4' AND i4.post_id = p.ID 
		LEFT JOIN wp_postmeta i5 ON i5.meta_key = 'meta_topimg5' AND i5.post_id = p.ID 
		LEFT JOIN wp_postmeta d1 ON d1.meta_key = 'meta_toptext1' AND d1.post_id = p.ID 
		LEFT JOIN wp_postmeta d2 ON d2.meta_key = 'meta_toptext2' AND d2.post_id = p.ID 
		LEFT JOIN wp_postmeta d3 ON d3.meta_key = 'meta_toptext3' AND d3.post_id = p.ID 
		LEFT JOIN wp_postmeta d4 ON d4.meta_key = 'meta_toptext4' AND d4.post_id = p.ID 
		LEFT JOIN wp_postmeta d5 ON d5.meta_key = 'meta_toptext5' AND d5.post_id = p.ID 
		LEFT JOIN wp_postmeta v1 ON v1.meta_key = 'meta_topvideo1' AND v1.post_id = p.ID 
		LEFT JOIN wp_postmeta v2 ON v2.meta_key = 'meta_topvideo2' AND v2.post_id = p.ID 
		LEFT JOIN wp_postmeta v3 ON v3.meta_key = 'meta_topvideo3' AND v3.post_id = p.ID 
		LEFT JOIN wp_postmeta v4 ON v4.meta_key = 'meta_topvideo4' AND v4.post_id = p.ID 
		LEFT JOIN wp_postmeta v5 ON v5.meta_key = 'meta_topvideo5' AND v5.post_id = p.ID 
		LEFT JOIN wp_postmeta pie1 ON pie1.meta_key = 'meta_topimg_pie1' AND pie1.post_id = p.ID 
		LEFT JOIN wp_postmeta pie2 ON pie2.meta_key = 'meta_topimg_pie2' AND pie2.post_id = p.ID 
		LEFT JOIN wp_postmeta pie3 ON pie3.meta_key = 'meta_topimg_pie3' AND pie3.post_id = p.ID 
		LEFT JOIN wp_postmeta pie4 ON pie4.meta_key = 'meta_topimg_pie4' AND pie4.post_id = p.ID 
		LEFT JOIN wp_postmeta pie5 ON pie5.meta_key = 'meta_topimg_pie5' AND pie5.post_id = p.ID 
		LEFT JOIN wp_postmeta final ON final.meta_key = 'meta_topfinal' AND final.post_id = p.ID 
		WHERE p.ID = $id_post;";

		$result = $this->mysqli->get_results($query);

		if ($this->mysqli->getQueryError() == '' && count($result) > 0) {
			$i = 0;
			foreach ($result[0] as $top) {
				if (strstr($top, '&&')) {
					$temp = explode('&&',$top);
					$dataTop[$i]['title'] = $temp[0];
					$dataTop[$i]['img'] = $temp[1];
					$dataTop[$i]['text'] = $temp[2];
					$dataTop[$i]['video'] = $temp[3];
					$dataTop[$i]['img_pie'] = $temp[4];
					$i++;
					unset($temp);
				} else {
					$dataTop['final'] = $top;
				}
			}
			unset($i);
		}
		$post[0]['top5'] = $dataTop;

		return $post;
	}

    function __destruct() {
       parent::__destruct();
    }

}
?>