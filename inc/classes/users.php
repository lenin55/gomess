<?php


class users {

    public function login($params) {
        $res = [];
        $res["error"] = true;
        $email = trim($params["email"]);
        $password = trim($params["password"]);
        $sql = "SELECT * FROM `users` WHERE `email` = " . $email . " AND `password` = " . $password;
        $result = mysql_query($sql);
        if (mysql_num_rows($result) == 0) {
            $res["message"] = "Invalid credientials";
        } else {
            $res["error"] = false;
            $res["message"] = "Logged in successfully";
            $res["data"] = users::getUserByEmail($email);
        }
        return $res;
    }

    public function register($params) {
        $res = [];
        $res["error"] = true;
        $res["message"] = "Email already exist";
        $name = trim($params["name"]);
        $email = trim($params["email"]);
        $password = trim($params["password"]);
        $exist = users::checkUserExist($email);
        if (!$exist) {
            $sql = "INSERT INTO `users` SET `name` = " . $name . " `email` = " . $email . " `password` = " . $password;
            mysql_query($sql);
            if (mysql_affected_rows()) {
                $res["error"] = false;
                $res["message"] = "Register successfully";
                $res["data"] = users::getUserByEmail($email);
            } else {
                $res["message"] = "Unable to register";
            }
        }
        return $res;
    }

    static function checkUserExist($email) {
        $res = false;
        $sql = "SELECT * FROM `users` WHERE `email` = " . $email;
        $result = mysql_query($sql);
        if (mysql_num_rows($result) > 0) {
            $res = true;
        }
        return $res;
    }

    static function getUserByEmail($email) {
        $sql = "SELECT * FROM `users` WHERE `email` = " . $email;
        $result = mysql_query($sql);
        $user = mysql_fetch_assoc($result);
        return $user;
    }

}
