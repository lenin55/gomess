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
                $res["message"] = "Sorry! some error occurs while login";
                $params = [];
                $params["email"] = filter_input(INPUT_GET, 'action');
                $params["password"] = filter_input(INPUT_GET, 'action');
                $user = new users();
                $login = $user->login($params);
                if ($login["error"] == false) {
                    $res["error"] = false;
                    $res["message"] = $login["message"];
                    $res["data"] = $login["data"];
                } else {
                    $res["message"] = $login["message"];
                }
                response_json($res);
                break;
            case 'register':
                $res = [];
                $res["error"] = true;
                $res["message"] = "Sorry! some error occurs while register";
                $params = [];
                $params["name"] = filter_input(INPUT_GET, 'name');
                $params["email"] = filter_input(INPUT_GET, 'action');
                $params["password"] = filter_input(INPUT_GET, 'action');
                $user = new users();
                $register = $user->register($params);
                if ($register["error"] == false) {
                    $res["error"] = false;
                    $res["message"] = $register["message"];
                    $res["data"] = $register["data"];
                } else {
                    $res["message"] = $register["message"];
                }
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
