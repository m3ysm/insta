<?php

require 'init.php';

$gender = $_POST['gender'];
$username = $_POST['username'];
$password = $_POST['password'];
$res = new stdClass();

if (!empty($username) && !empty($password)) {

    $query = "select * from users where username ='$username'";
    $result = mysqli_query($conn , $query);
    if ($result->num_rows >0) {
        $res->massage="user exists";
        echo json_encode($res,256);
        http_response_code(409);
        die();

    }else {
        $query = "INSERT INTO `users`(`gender`, `username`, `password`) values ('$gender' , '$username' , '$password')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $res->massage="inserted";
            echo json_encode($res,256);
            http_response_code(201);
        }else {
            $res->massage="error";
            echo json_encode($res,256);
            http_response_code(500);
        }

        $conn->close();
    }
}else {
    $res->massage="wrong input";
    echo json_encode($res,256);
    http_response_code(400);
}
