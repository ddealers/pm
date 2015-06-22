<?php 
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	session_start();
	require_once('trivias/triviaTourModel.php');
	require_once("helpers.php");

	$trivia = new TriviaTourModel();

	$pvars = count($_POST);
	$pkeys = array_keys($_POST);
	$pvals = array_values($_POST);

	for($i = 0; $i < $pvars; $i++){
	    $_POST["$pkeys[$i]"] = addslashes( strip_tags( decrypt($pvals[$i]) ) );
	}

	$func = isset($_POST['func'])?trim($_POST['func']):null;
	$response = array('success' => false, 'data' => null, 'message' => '');

	$user = isset($_SESSION['user'])?explode(',',$_SESSION['user']):null;
    $user = $user != null?$user[0]:0;
    $user = !empty($user)?$user:0;
	
	if (isHost($_SERVER['HTTP_REFERER'])) {
	    if ( !empty($func) && is_callable( array($trivia,$func) ) ) {
	    	if ($func == 'set_question') {
    			$question = isset($_POST['question'])?trim($_POST['question']):'';
    			$answer = isset($_POST['answer'])?trim($_POST['answer']):'';
    			$time = isset($_POST['time'])?trim($_POST['time']):'';
    			$prize = isset($_POST['prize'])?trim($_POST['prize']):'';

	    		if ($user != 0) {
	    			if (!empty($question)) {
		    			if (!empty($answer)) {
			    			if (!empty($time)) {
				    			if (!empty($prize)) {
				    				$response['success'] = true;
					    			$response['data'] = $trivia->$func($user,$question,$answer,$time,$prize);
					    		} else {
					    			$response['message'] = 'El premio no puede estar vacío';
					    		}
				    		} else {
				    			$response['message'] = 'El tiempo dado es incorrecto';
				    		}
			    		} else {
			    			$response['message'] = 'La respuesta dada no es válida';
			    		}
		    		} else {
		    			$response['message'] = 'La pregunta contestada no es válida';
		    		}
	    		} else {
	    			$response['message'] = 'Inicia sesión para poder participar';
	    		}

	    	} else if ($func == 'get_question') {
	    		$prize = isset($_POST['prize'])?trim($_POST['prize']):'';

	    		if ( !empty($prize) && is_numeric($prize) ) {
	    			$response['success'] = true;
	    			$response['data'] = $trivia->$func($user,$prize,'next');
	    		} else {
	    			$response['message'] = 'El premio seleccionado no es válido';
	    		}
	    		
	    	} else if ($func == 'get_score') {
	    		$prizes = isset($_POST['prizes'])?trim($_POST['prizes']):'';

	    		if ($user != 0) {
	    			if ( !empty($prizes) ) {
	    				$response['success'] = true;
	    				$response['data'] = $trivia->get_score_status($user,$prizes);
	    			} else {
	    				$response['message'] = 'Error al obtener tu score, los premios no son válidos';
	    			}

	    		} else {
	    			$response['message'] = 'Inicia sesion para ver tu puntuación';
	    		}
	    	}
	    } else{
	        $response['message'] = 'Funcion indefinida';
	    }

	    echo json_encode($response);
	}
?>