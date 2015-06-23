<?php
	require_once('conection.php');
	abstract class PM {

		private $postsVotados = array();
		private $postsVisitados = array();
		protected $mysqli = null;
		protected $querySelectBase = '';
		protected $queryFromBase = '';
		protected $queryWhereBase = '';

		function __construct() {
			$this->mysqli = new Conection('local');
			$this->postsVotados = $this->loadPostsVotados();
			$this->postsVisitados = $this->loadPostsVisitados();
			$this->querySelectBase = 'SELECT DISTINCT
									   p.ID AS name,
									   p.post_name AS id,
									   p.post_title AS title,
									   p.post_content AS content,
									   u.user_nicename AS author,
									   p.post_type AS post_type,
									   p.post_date AS `date`,
									   p.avg AS avg,
									   p.visits AS visits,
									   (SELECT GROUP_CONCAT(wp_terms.name SEPARATOR ", ")
									     FROM wp_terms 
									     LEFT JOIN wp_term_taxonomy ON wp_term_taxonomy.term_id = wp_terms.term_id 
									     LEFT JOIN wp_term_relationships ON wp_term_relationships.term_taxonomy_id = wp_term_taxonomy.term_taxonomy_id 
									     WHERE wp_term_relationships.object_id = p.ID
									     AND wp_terms.name != "Uncategorized") AS tags,
									   (SELECT COUNT(lc_comments.ID) FROM lc_comments WHERE (lc_comments.post_id = p.ID)) AS comments,
									   m.meta_value AS thumbnailid,
									   (SELECT w.guid FROM wp_posts w WHERE (w.ID = thumbnailid) LIMIT 1) AS thumbnail,
									   m1.meta_value AS url,
									   m2.meta_value AS program,
									   m3.meta_value AS stage,
									   m4.meta_value AS embed,
									   m18.meta_value AS embed_yt,
									   m5.meta_value AS dest,
									   m6.meta_value AS hour,
									   m7.meta_value AS promo,
									   m8.meta_value AS `tw-widget-id`,
									   m9.meta_value AS twitter,
									   m10.meta_value AS type_post,
									   m11.meta_value AS spotify_url,
									   m12.meta_value AS stageList,
									   m13.meta_value AS notinhome,
									   m14.meta_value AS meta_fb,
									   m15.meta_value AS meta_vars, 
									   m16.meta_value AS meta_css,
									   m17.meta_value AS keywords ';

			$this->queryFromBase = 'FROM wp_posts p JOIN wp_users u ON p.post_author = u.ID 
									LEFT JOIN wp_postmeta m ON (m.meta_key = "_thumbnail_id") AND (m.post_id = p.ID)  
									LEFT JOIN wp_postmeta m1 ON (m1.meta_key = "dbt_urlpointer") AND (m1.post_id = p.ID) 
									LEFT JOIN wp_postmeta m2 ON (m2.meta_key = "dbt_programselect") AND (m2.post_id = p.ID) 
									LEFT JOIN wp_postmeta m3 ON (m3.meta_key = "dbt_checkstage") AND (m3.post_id = p.ID) 
									LEFT JOIN wp_postmeta m4 ON (m4.meta_key = "dbt_embedCode") AND (m4.post_id = p.ID) 
									LEFT JOIN wp_postmeta m5 ON (m5.meta_key = "dbt_checkdestacado") AND (m5.post_id = p.ID) 
									LEFT JOIN wp_postmeta m6 ON (m6.meta_key = "dbt_horario") AND (m6.post_id = p.ID) 
									LEFT JOIN wp_postmeta m7 ON (m7.meta_key = "dbt_promo") AND (m7.post_id = p.ID) 
									LEFT JOIN wp_postmeta m8 ON (m8.meta_key = "dbt_tw-widget-id") AND (m8.post_id = p.ID) 
									LEFT JOIN wp_postmeta m9 ON (m9.meta_key = "dbt_twitter") AND (m9.post_id = p.ID) 
									LEFT JOIN wp_postmeta m10 ON (m10.meta_key = "type_post") AND (m10.post_id = p.ID) 
									LEFT JOIN wp_postmeta m11 ON (m11.meta_key = "spotify_url") AND (m11.post_id = p.ID) 
									LEFT JOIN wp_postmeta m12 ON (m12.meta_key = "stageList") AND (m12.post_id = p.ID) 
									LEFT JOIN wp_postmeta m13 ON (m13.meta_key = "dbt_notinhome") AND (m13.post_id = p.ID) 
									LEFT JOIN wp_postmeta m14 ON (m14.meta_key = "facebook_meta") AND (m14.post_id = p.ID) 
									LEFT JOIN wp_postmeta m15 ON (m15.meta_key = "meta_vars") AND (m15.post_id = p.ID) 
									LEFT JOIN wp_postmeta m16 ON (m16.meta_key = "css_meta") AND (m16.post_id = p.ID) 
									LEFT JOIN wp_postmeta m17 ON (m17.meta_key = "keywords") AND (m17.post_id = p.ID) 
									LEFT JOIN wp_postmeta m18 ON (m18.meta_key = "dbt_embedCodeYouTube") AND (m18.post_id = p.ID) ';

			$this->queryWhereBase = 'WHERE p.post_status = "publish" 
										AND p.post_type IN ("post","page","tourpm","los5pm")';
		}

		private function loadPostsVotados() {
			$posts = array();

		    $queryVote = $this->querySelectBase .
		    			$this->queryFromBase .
		    			$this->queryWhereBase .
		    			'AND m13.meta_value IS NULL 
						AND m12.meta_value IS NULL 
						AND m2.meta_value NOT IN ( "Break", "Playlist", "Break Stage") 
						AND m5.meta_value IS NULL 
						ORDER BY p.avg DESC, p.post_date DESC 
						LIMIT 10;';

		    $r = $this->mysqli->get_results($queryVote);

		    foreach ($r as $post) {
		    	$posts[] = $post;
		    }

			return $posts;
		}

		private function loadPostsVisitados() {
			$posts = array();
			
		    $queryVisits = $this->querySelectBase .
		    			$this->queryFromBase .
		    			$this->queryWhereBase .
		    			'AND m13.meta_value IS NULL 
						AND m12.meta_value IS NULL 
						AND m2.meta_value NOT IN ( "Break", "Playlist", "Break Stage") 
						AND p.visits IS NOT NULL 
						ORDER BY p.visits DESC, p.post_date DESC 
						LIMIT 10;';

		    $r = $this->mysqli->get_results($queryVisits);

		    foreach ($r as $post) {
		    	$posts[] = $post;
		    }

			return $posts;
		}

		protected function set_label($arr){
		    $result = array();
		    $queryVisits = $this->postsVisitados;
		    $queryVotes = $this->postsVotados;

		    if (is_array($arr)) {
		        foreach($arr as $set){

		            $label = "normal";
		            $now = strtotime(date("Y-m-d H:i:s"));
		            $timestamp = strtotime("-1 day", $now);

		            if ( is_array($set) ) {
		                $postdate = strtotime($set['date']);

		                if ((int)$postdate > (int)$timestamp && (int)$postdate < (int)$now){
		                    $label = "lomasnuevo";
		                }

		                foreach($queryVisits as $visits){
		                    if($set['id'] == $visits->id){
		                        $label = "lomasvisto";
		                    }
		                }

		                foreach($queryVotes as $votes){
		                    if($set['id'] == $votes->id){
		                        $label = "lomasvotado";
		                    }
		                }

		                if($set['dest'] != 'EMPTY' && $set['dest'] != false){
		                    $label = "recomendado";
		                }

		                $set['position'] = $label;
		                $result[] = $set;

		            } else {
		                $postdate = strtotime($set->date);

		                if ((int)$postdate > (int)$timestamp && (int)$postdate < (int)$now){
		                    $label = "lomasnuevo";
		                }

		                if ( is_array($queryVisits) ) {
		                    foreach($queryVisits as $visits){
		                        if($set->id == $visits->id){
		                            $label = "lomasvisto";
		                        }
		                    }
		                }

		                if ( is_array($queryVotes) ) {
		                    foreach($queryVotes as $votes){
		                        if($set->id == $votes->id){
		                            $label = "lomasvotado";
		                        }
		                    }
		                }

		                if($set->dest != 'EMPTY' && $set->dest != '' && $set->dest != false ){
		                    $label = "recomendado";
		                }
		                $set->position = $label;
		                $result[] = $set;
		            }

		        }
		    } else {
		        $result = $arr;
		    }

		    return $result;
		}

		public function singlePostCount($id){
			$query = "UPDATE wp_posts SET 
			visits = (ifnull(visits,0) + 1 ) WHERE 
			ID = '$id' 
			LIMIT 1;";

		    $result = $this->mysqli->get_results($query,'update');

		    return $result;
		}

		public function get_page_by_id_json($id) {
			$id = $id . '_page.json';
		    $page = (array) json_decode(file_get_contents('http://a9.g.akamai.net/f/9/250733/1m/pmcanal5.download.akamai.com/250733/data/' . $id));
		    //$page = (array) json_decode(file_get_contents('http://localhost/www/json/data/' . $id));
			return $page;
		}

		public function get_page_by_id($id) {
			$page = array();
			$query = $this->querySelectBase .
					',section.meta_value AS section, 
					banner.meta_value AS banner, own.meta_value AS own, 
					hwidget.meta_value AS hwidget, widget.meta_value AS widget, 
					widgeti.meta_value AS widgeti, wimg.meta_value AS wimg, 
					wtitle.meta_value AS wtitle, fbdesc.meta_value AS fb_desc, 
					wcomments.meta_value AS wcomments, wprogram.meta_value AS wprogram, 
					iswidget.meta_value AS is_widget, path.meta_value AS path_include, 
					dname.meta_value AS display_name,mdata.meta_value AS meta_data, 
					back.meta_value AS background,spoty_embed.meta_value AS spoty_embed,spoty_img.meta_value AS spoty_img,
					ytb_playlist.meta_value AS playlist_yt '.
	    			$this->queryFromBase .
	    			' LEFT JOIN wp_postmeta section ON (section.meta_key = "meta_section") AND (section.post_id = p.ID)  
					LEFT JOIN wp_postmeta banner ON (banner.meta_key = "meta_bannerTag") AND (banner.post_id = p.ID)  
					LEFT JOIN wp_postmeta own ON (own.meta_key = "meta_hasOwn") AND (own.post_id = p.ID)  
					LEFT JOIN wp_postmeta hwidget ON (hwidget.meta_key = "meta_hasWidget") AND (hwidget.post_id = p.ID)  
					LEFT JOIN wp_postmeta widget ON (widget.meta_key = "meta_widget") AND (widget.post_id = p.ID)  
					LEFT JOIN wp_postmeta widgeti ON (widgeti.meta_key = "meta_widgetInclude") AND (widgeti.post_id = p.ID)  
					LEFT JOIN wp_postmeta wimg ON (wimg.meta_key = "meta_widgetImg") AND (wimg.post_id = p.ID)  
					LEFT JOIN wp_postmeta wtitle ON (wtitle.meta_key = "meta_widgetTitle") AND (wtitle.post_id = p.ID)  
					LEFT JOIN wp_postmeta wcomments ON (wcomments.meta_key = "meta_widgetComments") AND (wcomments.post_id = p.ID)  
					LEFT JOIN wp_postmeta wprogram ON (wprogram.meta_key = "meta_widgetProgram") AND (wprogram.post_id = p.ID) 
					LEFT JOIN wp_postmeta iswidget ON (iswidget.meta_key = "iswidget") AND (iswidget.post_id = p.ID) 
					LEFT JOIN wp_postmeta path ON (path.meta_key = "path_include") AND (path.post_id = p.ID) 
					LEFT JOIN wp_postmeta fbdesc ON (fbdesc.meta_key = "multipleDescription") AND (fbdesc.post_id = p.ID) 
					LEFT JOIN wp_postmeta mdata ON (mdata.meta_key = "meta_data") AND (mdata.post_id = p.ID) 
					LEFT JOIN wp_postmeta dname ON (dname.meta_key = "display_name") AND (dname.post_id = p.ID) 
					LEFT JOIN wp_postmeta back ON (back.meta_key = "background") AND (back.post_id = p.ID) 
					LEFT JOIN wp_postmeta spoty_embed ON (spoty_embed.meta_key = "spotify_embed") AND (spoty_embed.post_id = p.ID) 
					LEFT JOIN wp_postmeta spoty_img ON (spoty_img.meta_key = "spotify_img") AND (spoty_img.post_id = p.ID) 
					LEFT JOIN wp_postmeta ytb_playlist ON (ytb_playlist.meta_key = "ytp") AND (ytb_playlist.post_id = p.ID) '.
	    			$this->queryWhereBase .
	    			" AND p.post_name = '$id' 
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
		            'author' => $result[0]->author,
		            'thumbnail' =>  $result[0]->thumbnail,
		            'type' => $result[0]->post_type,
		            'URL' => $result[0]->url,
		            'program' => $result[0]->program,
		            'program_name' => $result[0]->program,
		            'position' => '',
		            'hour' => $result[0]->hour,
		            'dest' => $result[0]->dest,
		            'stage' => $result[0]->stage,
		            'embed' => $result[0]->embed,
		            'layout' => '',
		            'twitter' => array($result[0]->twitter),
		            'tw-widget-id' => array($result[0]->$tw_widget_id),
		            'meta_fb' => $result[0]->meta_fb,
		            'meta_vars' => $result[0]->meta_vars,
		            'meta_css' => $result[0]->meta_css,
		            'tags' => $result[0]->tags,
		            'spotify' => array($result[0]->spotify_url),
		            'date' => $result[0]->date,
		            'type_post' => $result[0]->type_post,
		            'visits' => $result[0]->visits,
		            'stageList' => $result[0]->stageList,
		            'avg' => $result[0]->avg,
		            'comments' => $result[0]->comments,
		            'section' => $result[0]->section,
		            'banner' => $result[0]->banner,
		            'own' => $result[0]->own,
		            'hwidget' => $result[0]->hwidget,
		            'widget' => $result[0]->widget,
		            'widgeti' => $result[0]->widgeti,
		            'wimg' => $result[0]->wimg,
		            'wtitle' => $result[0]->wtitle,
		            'wcomments' => $result[0]->wcomments,
		            'wprogram' => $result[0]->wprogram,
		            'is_widget' => ($result[0]->is_widget == 'true')?true:false,
	            	'path_include' => $result[0]->path_include,
	            	'fb_desc' => $result[0]->fb_desc,
	            	'keywords' => $result[0]->keywords,
	            	'display_name' => $result[0]->display_name,
	            	'meta_data' => $result[0]->meta_data,
	            	'background' => $result[0]->background,
	            	'spoty_embed' => $result[0]->spoty_embed,
	            	'spoty_img' => $result[0]->spoty_img,
	            	'playlist_yt' => $result[0]->playlist_yt
		        );
			}
			
			return $page;
		}

		public function menu_tags($name){
			$tags = array();

			$query = "SELECT meta_value 
						FROM wp_postmeta 
						WHERE meta_key = 'menu_tags' 
						AND post_id = '$name' 
						LIMIT 1;";

			$result = $this->mysqli->get_results($query);

			if ($this->mysqli->getQueryError() == '' && count($result) > 0) {
				if ($result[0]->meta_value != '') {
					$tags = explode(',', $result[0]->meta_value);
				}
			}

		    return $tags;
		}

		public function get_page_related_by_id($program,$author = '') {
		    $page = array();
		    $id = $program;
		    $queryAuthor = ($author != '')?" AND post_autor.meta_value LIKE '%$author%' ":'';
		    $queryFromAuthor = ($author != '')?' LEFT JOIN wp_postmeta post_autor ON (post_autor.meta_key = "blog_autor") AND (post_autor.post_id = p.ID) ':'';
		    $months = array(
				'January' => 'Enero',
				'February' => 'Febrero',
				'March' => 'Marzo',
				'April' => 'Abril',
				'May' => 'Mayo',
				'June' => 'Junio',
				'July' => 'Julio',
				'August' => 'Agosto',
				'September' => 'Septiembre',
				'October' => 'Octubre',
				'November' => 'Noviembre',
				'December' => 'Diciembre'
			);

			if (is_array($id)) {
				$temp = '';
				foreach ($id as $p) {
					$temp .= "'$p',";
				}
				$id = trim($temp,',');
				unset($temp);
			} else {
				$id = "'$id'";
			}

			$query = $this->querySelectBase .
					',bloguero.meta_value AS bloguero_author '.
	    			$this->queryFromBase .
	    			'LEFT JOIN wp_postmeta bloguero ON (bloguero.meta_key = "blog_autor") AND (bloguero.post_id = p.ID) ' .
	    			$queryFromAuthor.
	    			$this->queryWhereBase .
	    			" AND m2.meta_value IN ($id) 
				      AND p.post_type != 'page' " .
				      $queryAuthor .
				      ' ORDER BY p.post_date DESC 
				      LIMIT 28;';

			$posts = $this->mysqli->get_results($query);

			if ($this->mysqli->getQueryError() == '' && count($posts) > 0) {
				foreach ($posts as $result) {
					$tw_widget_id = 'tw-widget-id';
					$bloguero_autor = ( !empty(trim($result->bloguero_author)) )?file_get_contents('http://en.gravatar.com/' . $result->bloguero_author . '.xml'):'';
					if ($bloguero_autor) {
						$bloguero_autor = new SimpleXMLElement($bloguero_autor);
						$bloguero_autor = $bloguero_autor->entry;
					}

					$page[] = array(
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
			            'date' => str_replace(array_keys($months),array_values($months),date('F d, o',strtotime($result->date))),
			            'type_post' => $result->type_post,
			            'visits' => $result->visits,
			            'stageList' => $result->stageList,
			            'avg' => $result->avg,
			            'comments' => $result->comments,
			            'is' => '',
			            'bloguero_autor' => $bloguero_autor
			        );
				}
			}

			return $page;
		}

		public function get_page_related_by_id_json($program) {
			$program = str_replace(' ', '_', $program) . '.json';
		    $page = (array) json_decode(file_get_contents('http://a9.g.akamai.net/f/9/250733/1m/pmcanal5.download.akamai.com/250733/data/' . $program));
		    //$page = (array) json_decode(file_get_contents('http://localhost/www/json/data/' . $program));
			return $page;
		}

		private function get_ids_gal_from_comtent($content){
			$ids = '';
			preg_match_all( '/\\[(\\[?)(gallery)(?![\\w-])([^\\]\\/]*(?:\\/(?!\\])[^\\]\\/]*)*?)(?:(\\/)\\]|\\](?:([^\\[]*+(?:\\[(?!\\/\\2\\])[^\\[]*+)*+)\\[\\/\\2\\])?)(\\]?)/s', $content, $matches, PREG_SET_ORDER );

			foreach ( $matches as $shortcode ) {	
			    if ( 'gallery' === $shortcode[2] ) {
			    	foreach ( $shortcode as $string ) {
			    		if (strstr($string, 'gallery')) {
			    			preg_match_all( '#ids=([\'"])(.+?)\1#is', $string, $src, PREG_SET_ORDER );
			    			
			    			if (count($src) > 0) {
			    				foreach ( $src[0] as $gallery ) {
			    					$gallery = trim($gallery,'"');
							        if (!strstr($gallery, 'ids')) {
							        	if ($gallery != '') {
							        		$ids .= $gallery;
							        	}
							        }
						    	}
			    			}
			    		}
				    }
				}
			}

			return $ids;
		}

		public function get_post_gal($content) {
			$gal = array();
			$ids = $this->get_ids_gal_from_comtent($content);

			$query = "SELECT guid FROM wp_posts 
					WHERE ID IN ($ids) 
					AND post_type = 'attachment';";

			$result = $this->mysqli->get_results($query);

			if (count($result) > 0) {
				foreach ($result as $img) {
					$gal[] = $img->guid;
				}
			}

			return $gal;
		}

		public function get_page_related($type,$var,$tags = '',$current = 0) {
			$relateds = array();
			$months = array(
				'January' => 'Enero',
				'February' => 'Febrero',
				'March' => 'Marzo',
				'April' => 'Abril',
				'May' => 'Mayo',
				'June' => 'Junio',
				'July' => 'Julio',
				'August' => 'Agosto',
				'September' => 'Septiembre',
				'October' => 'Octubre',
				'November' => 'Noviembre',
				'December' => 'Diciembre'
			);
		    if($var == 'program'){
		        if ( $tags == '' ) {
		            $query = $this->querySelectBase.
		            		',bloguero.meta_value AS bloguero_author '.
		            		$this->queryFromBase.
		            		'LEFT JOIN wp_postmeta bloguero ON (bloguero.meta_key = "blog_autor") AND (bloguero.post_id = p.ID) ' .
		            		$this->queryWhereBase.
		            		"AND m2.meta_value = '$type' 
		            		AND p.ID != '$current' 
		            		AND p.post_type != 'page' 
							ORDER BY RAND() 
							LIMIT 6;";
		        } else {
		            $tag = '';

		            if (strstr($tags, '#')) {
		            	$tag = explode('#',$tags);
		            	$tags = '';
		            	for($i = 0; $i < count($tag); $i++){
			                $tags .= trim($tag[$i]) != ''?"'" . trim($tag[$i]) . "',":'';
			            }
		            } else {
		            	$tags = "'$tags'";
		            }

		            $tags = trim($tags,',');
		            
		            $query = $this->querySelectBase.
		            		',bloguero.meta_value AS bloguero_author '.
		            		$this->queryFromBase.
		            		'LEFT JOIN wp_postmeta bloguero ON (bloguero.meta_key = "blog_autor") AND (bloguero.post_id = p.ID) ' .
		            		',wp_terms, wp_term_taxonomy, wp_term_relationships '.
		            		$this->queryWhereBase.
		            		" AND ((m2.meta_value = '$type' && wp_terms.name IN ($tags) ) OR  m2.meta_value = '$type') 
						  	AND p.ID != '$current' 
						  	AND p.post_type != 'page'   
						  	AND wp_terms.term_id = wp_term_taxonomy.term_id
						   	AND wp_term_taxonomy.term_taxonomy_id = wp_term_relationships.term_taxonomy_id
						  	AND p.ID = wp_term_relationships.object_id
						  	ORDER BY p.post_date DESC
						  	LIMIT 6;";
		        }

		    }else{
		        $query = $this->querySelectBase.
		        		',bloguero.meta_value AS bloguero_author '.
	            		$this->queryFromBase.
	            		'LEFT JOIN wp_postmeta bloguero ON (bloguero.meta_key = "blog_autor") AND (bloguero.post_id = p.ID) ' .
	            		$this->queryWhereBase.
	            		"AND m10.meta_value = '$type' 
						AND p.ID != '$current' 
						AND p.post_type != 'page' 
						ORDER BY RAND() 
						LIMIT 6";
		    }

		    $results1 = $this->mysqli->get_results($query);

		    foreach ($results1 as $result) {
				$tw_widget_id = 'tw-widget-id';
		        $stripcontent = strip_tags($result->content);
		        $bloguero_autor = ( !empty(trim($result->bloguero_author)) )?file_get_contents('http://en.gravatar.com/' . $result->bloguero_author . '.xml'):'';
				if ($bloguero_autor) {
					$bloguero_autor = new SimpleXMLElement($bloguero_autor);
					$bloguero_autor = $bloguero_autor->entry;
				}
		        $relateds[] = array(
		            'id' => $result->name,
		            'name' => $result->id,
		            'title' => $result->title,
		            'content' => $result->content,
		            'stripcontent' => $stripcontent,
		            'excerpt' => isset($result->excerpt)?$result->excerpt:'',
		            'author' => $result->author,
		            'thumbnail' => $result->thumbnail,
		            'type' => isset($result->type)?$result->type:'',
		            'program' => $result->program,
		            'url' => $result->url,
		            'hour' => $result->hour,
		            'dest' => $result->dest,
		            'stage' => $result->stage,
		            'position' => '',
		            'embed' => $result->embed,
		            'embed_yt' => $result->embed_yt,
		            'layout' => isset($result->layout)?$result->layout:'',
		            'twitter' => $result->twitter,
		            'tw-widget-id' => $result->$tw_widget_id,
		            'type_post' => $result->type_post,
		            'tags' => $result->tags,
		            'avg' => $result->avg,
		            'date' => str_replace(array_keys($months),array_values($months),date('F d, o',strtotime($result->date))),
		            'is' => '',
			        'bloguero_autor' => $bloguero_autor
		        );
		    }

		    return $this->set_label($relateds);

		}

		public function getGaleriesByProgram($program) {
			$relateds = array();
			
		    $query = $this->querySelectBase.
	            	$this->queryFromBase.
	            	$this->queryWhereBase.
	            	"AND m2.meta_value = '$program' 
					AND m10.meta_value = 'galeria' 
					ORDER BY p.post_date DESC 
					LIMIT 3;";

		    $results1 = $this->mysqli->get_results($query);


		    foreach ($results1 as $result) {
		        $tw_widget_id = 'tw-widget-id';
		        $stripcontent = strip_tags($result->content);

		        $relateds[] = array(
		            'id' => $result->name,
		            'name' => $result->id,
		            'title' => $result->title,
		            'content' => $result->content,
		            'stripcontent' => $stripcontent,
		            'excerpt' => isset($result->excerpt)?$result->excerpt:'',
		            'author' => $result->author,
		            'thumbnail' => $result->thumbnail,
		            'type' => isset($result->type)?$result->type:'',
		            'program' => $result->program,
		            'url' => $result->url,
		            'hour' => $result->hour,
		            'dest' => $result->dest,
		            'stage' => $result->stage,
		            'position' => '',
		            'embed' => $result->embed,
		            'embed_yt' => $result->embed_yt,
		            'layout' => isset($result->layout)?$result->layout:'',
		            'twitter' => $result->twitter,
		            'tw-widget-id' => $result->$tw_widget_id,
		            'type_post' => $result->type_post,
		            'tags' => $result->tags,
		            'avg' => $result->avg,
		            'date' => date_format( new DateTime($result->date), 'g:ia \o\n l jS F Y'),
		            'is' => ''
		        );
		    }

		    return $relateds;

		}

		public function getLastPostByProgram($program,$limit = 1) {
		    $post = null;

		    $query = $this->querySelectBase.
	            	$this->queryFromBase.
	            	$this->queryWhereBase.
	            	"AND m2.meta_value = '$program' 
					ORDER BY p.post_date DESC 
					LIMIT $limit;";

		    $post = $this->mysqli->get_results($query);

		    return $post;
		}

		public function getLastPostByTag ($tag,$limit = 1) {
		    $post = null;

		    $query = $this->querySelectBase.
	            	$this->queryFromBase.
	            	' LEFT JOIN wp_term_relationships ON p.ID = wp_term_relationships.object_id 
					LEFT JOIN wp_term_taxonomy ON wp_term_relationships.term_taxonomy_id = wp_term_taxonomy.term_taxonomy_id 
					LEFT JOIN wp_terms ON wp_term_taxonomy.term_id = wp_terms.term_id '.
	            	$this->queryWhereBase.
	            	"AND wp_terms.name = '$tag' 
					ORDER BY p.post_date DESC 
					LIMIT $limit;";

		    $post = $this->mysqli->get_results($query);

		    return $post;
		}

		public function menu_tags_results($tag, $program){
		    $program = $program;
		    
		    $query = $this->querySelectBase.
		    		', "" AS position, "" AS "is" '.
	            	$this->queryFromBase.
	            	', wp_term_taxonomy t 
					JOIN wp_term_relationships r ON t.term_taxonomy_id = r.term_taxonomy_id 
					JOIN wp_terms wt ON t.term_id = wt.term_id '.
	            	$this->queryWhereBase.
	            	" AND wt.slug IN ('$tag') 
					AND m2.meta_value = '$program' 
					AND r.object_id = p.ID
					ORDER BY p.post_date DESC;";
			
		    $result = $this->mysqli->get_results($query);

		    return $this->set_label($result);
		}

		public function getAuthoresByProgram($program) {
			$authores = array();

			$query = 'SELECT DISTINCT(meta_value) AS post_autor 
						FROM wp_postmeta 
						WHERE meta_key = "blog_autor";';
	        
			$result = $this->mysqli->get_results($query);
			
			if (!empty($result)) {
				foreach ($result as $post) {
					$dataAutor = ( !empty(trim($post->post_autor)) )?file_get_contents('http://en.gravatar.com/' . $post->post_autor . '.xml'):'';
					if ($dataAutor) {
						$dataAutor = new SimpleXMLElement($dataAutor);
						$dataAutor = $dataAutor->entry;
						
						$authores[] = array(
							'name' => $dataAutor->displayName,
							'link' => $dataAutor->requestHash,
							'avatar' => $dataAutor->thumbnailUrl
						);
					}
				}
			}

			return $authores;
		}

		public function getPostBackNextByProgramId($currentPostDate,$program) {
			$data = array(
				'back' => array(
							'name' => '',
							'link' => '#'
						),
				'next' => array(
							'name' => '',
							'link' => '#'
						)
			);

			$query = '('.
					$this->querySelectBase.
	            	$this->queryFromBase.
	            	$this->queryWhereBase.
	            	" AND p.post_date < '$currentPostDate' 
	            	AND m2.meta_value = '$program' 
	            	AND post_type = 'post' 
	            	ORDER BY p.post_date DESC 
	            	LIMIT 1
	            	)
					UNION 
					(".
					$this->querySelectBase.
	            	$this->queryFromBase.
	            	$this->queryWhereBase.
	            	" AND p.post_date > '$currentPostDate' 
	            	AND m2.meta_value = '$program' 
	            	AND post_type = 'post' 
	            	ORDER BY p.post_date ASC 
	            	LIMIT 1 
					) 
					ORDER BY date DESC;";

	        $result = $this->mysqli->get_results($query);
	        
	        if ( isset($result[0]) && !empty($result[0]) ) {

	        	if($result[0]->url == 'EMPTY'){
                    $link = '/'.str_replace(' ', '', strtolower($result[0]->program)).'/'.$result[0]->id;
                }else{
                    if(trim($result[0]->url) == ''){
                        $link = '/'.str_replace(' ', '', strtolower($result[0]->program)).'/'.$result[0]->id;
                    }else{
                        $link = $result[0]->url;
                    }
                }

	        	$data['next'] = array(
					'name' => $result[0]->title,
					'link' => $link
				);
	        }

	        if ( isset($result[1]) && !empty($result[1]) ) {

	        	if($result[1]->url == 'EMPTY'){
                    $link = '/'.str_replace(' ', '', strtolower($result[1]->program)).'/'.$result[1]->id;
                }else{
                    if(trim($result[1]->url) == ''){
                        $link = '/'.str_replace(' ', '', strtolower($result[1]->program)).'/'.$result[1]->id;
                    }else{
                        $link = $result[1]->url;
                    }
                }

	        	$data['back'] = array(
					'name' => $result[1]->title,
					'link' => $link
				);
	        }

			return $data;
		}

		public function getProgramsToday() {
			$programs = array();
			$today = date ( 'N',time() );
			$today = (in_array($today, array(5,6,7) ))?1:$today;

			$query = 'SELECT p.ID AS name,
					    p.post_name AS id,
					    p.post_title AS title,
					    p.post_content AS content,
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
					   	WHERE p.post_status = "publish" 
					   	AND p.post_type = "page" 
					   	AND program_days.meta_value LIKE "%' . $today . '%" 
					   	ORDER BY hour ASC;';

			$result = $this->mysqli->get_results($query);

			foreach ($result as $program) {
				$program->title = str_replace('_', ' ', $program->title);
				$programs[] = $program;
			}

			return $programs;
		}

		private function get_date_post($time){
		    $now = time();

		    $mins = floor(($now - $time) / 60);
		    $hours = floor(($now - $time) / 3600);
		    $day = strftime("%d",$time);
		    $month = strftime("%m",$time);
		    $year = strftime("%Y",$time);
		    $hour = strftime("%H:%M",$time);

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
		        $result = 'El ' . $day . ' de ' . $months["$month"] . ' del ' . $year . ' ' . $hour;
		    }

		    return $result;

		}

		public function get_comments_by_id($id){
			$comments = array(
				'total' => 0,
				'comments' => array()
			);

			$query = "SELECT lc_comments.comment_content AS comment, lc_comments.comment_date AS date,
		            lc_users.users_avatar AS avatar, lc_users.users_name AS name
		            FROM lc_comments, lc_users
		            WHERE lc_comments.post_id = '$id'
		            AND lc_comments.users_id = lc_users.ID
		            ORDER BY lc_comments.ID DESC;";

		    $result = $this->mysqli->get_results($query);

		    if ($this->mysqli->getQueryError() == '' && count($result) > 0) {
		    	foreach ($result as $comment) {
		    		$comment->date = $this->get_date_post($comment->date);
		    		$comments['comments'][] = $comment;
		    	}
		    	$comments['total'] = count($comments['comments']);
		    }

			return $comments;
		}

		public function __destruct() {
			unset($this->postsVotados);
			unset($this->postsVisitados);
			unset($this->mysqli);
	    }
	
	}
?>