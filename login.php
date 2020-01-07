<?php

require 'init.php';
$user = $_GET['username'];
$pass = $_GET['password'];
$res = new stdClass();

if (!empty($user) || !empty($pass)) {

    $query = "SELECT * FROM `users` WHERE `username`= '$user'  AND  `password`= '$pass' ";
    $result = mysqli_query($conn, $query);
    if ($result) {
        if ($result->num_rows == 1) {
            $res->massage = "OK";
            echo json_encode($res, JSON_UNESCAPED_UNICODE);
            http_response_code(200);
        } else {
            $query = "SELECT * FROM `users` WHERE `username`= '$user'";
            $result = mysqli_query($conn, $query);
            if ($result) {
                if ($result->num_rows == 1) {
                    $res->massage = "Wrong Password";
                    echo json_encode($res, JSON_UNESCAPED_UNICODE);
                    http_response_code(406);
                } else {
                    $res->massage = "User not exist";
                    echo json_encode($res, JSON_UNESCAPED_UNICODE);
                    http_response_code(400);
                }
            } else {
                $res->massage = "Error";
                echo json_encode($res, JSON_UNESCAPED_UNICODE);
                http_response_code(500);
            }
        }
    } else {
        $res->massage = "Error";
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        http_response_code(500);
    }
} else {
    $res->massage = "Wrong Input";
    echo json_encode($res, JSON_UNESCAPED_UNICODE);
    http_response_code(400);
}
