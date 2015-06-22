<?php
class Conection {
	private $mysqli = null;
	private $error = '';
	private $queryError = '';

	function __construct($type){
		$this->conect($type);
	}
	
	private function conect($type = 'dev') {
		$conection = array(
			'local' => array(
						'host' => '192.168.20.56',
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
		
		$this->mysqli = new mysqli($conection["$type"]['host'], $conection["$type"]['user'], $conection["$type"]['pass'], $conection["$type"]['db']);

		if ($this->mysqli->connect_errno) {
            $this->error = 'Error de conexion: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error;
        }else{
            $this->mysqli->set_charset('UTF-8');
            $this->mysqli->query('SET CHARACTER SET utf8;');
        }
	}

	public function get_results($query,$type = 'select',$array = false) {
		$result = array();
		
        if ($this->error == '') {
        	$r = $this->mysqli->query($query);

        	if ( empty($this->mysqli->error) ) {

        		if ($r && $this->mysqli->error == '') {
        			$this->queryError = '';

        			if ($type == 'insert') {
			        	$result[] = $this->mysqli->insert_id;
			        } else if ($type == 'update') {
						$result[] = $this->mysqli->affected_rows;
			        } else if ($type == 'select') {
						while ( $q = $r->fetch_assoc() ) {
							if ($array) {
								$result[] = $q;
							} else {
								$result[] = (object) $q;
							}
						}
			        }
        		} else {
        			$this->queryError = $this->mysqli->error;
        		}

        	} else {
        		$this->queryError = $this->mysqli->error;
        	}
	        
        }

		return $result;
	}

	public function getQueryError() {
		return $this->queryError;
	}

	function __destruct() {
		$this->mysqli->close();
		unset($this->mysqli);
		unset($this->error);
		unset($this->queryError);
    }

}
?>