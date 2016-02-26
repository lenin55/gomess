<?php

require_once '../inc/connection.php';
require_once '../inc/classes/connection.php';

$module = filter_input(INPUT_GET, 'module');
$action = filter_input(INPUT_GET, 'action');

switch ($module) {
    case 'user':
        switch ($action) {
            case 'login':
                $res = [];
                $res["error"] = true;
                $res["message"]="Sorry! some error occurs while login";
                $params = [];
                $params["email"] = filter_input(INPUT_GET, 'action');
                $params["password"] = filter_input(INPUT_GET, 'action');
                $login = new users();
                $ressult = $login->login($params);
                response_json($res);
                break;
            case 'register':
                
                response_json($res);
                break;
        }
        break;

//-----------------All Module End---------------------------------------------------
}

function response_json($res) {

    header('Content-Type: application/json');

    echo json_encode($res);
}


