<?php

require_once("wws.php");

$function = isset($_POST['func'])?trim($_POST['func']):null;
$response = array('success' => false, 'data' => null, 'message' => '');

if($function != null && !empty($function)):
    if($function == 'get_post_index_page_complete'):
        $result = get_post_index_page_complete();
        if(isset($result) && !empty($result)):
            $response['success'] = true;
            $response['data'] = $result;
            $response['message'] = "Payiiisiimo";
        endif;
    endif;
endif;


echo json_encode($response);