<?php


require 'init.php';


$username = $_POST['username'];
$postid = $_POST['postid'];
$comment = $_POST['comment'];
$res = new stdClass();

	
	$query="SELECT `user_id` FROM `users` WHERE `username`='$username'";
	$result = mysqli_query($conn ,$query);
	$data= $result->fetch_assoc();	
	$id= $data['user_id'];

	$query="INSERT INTO comments (user_id , comment , post_id) VALUES ($id , '$comment' , $postid)";
	$result = mysqli_query($conn ,$query);
	if($result){
		$res->message = "ok";
		echo json_encode($res, JSON_UNESCAPED_UNICODE);
		http_response_code(201);
	}else{
		$res->message = "error";
		echo json_encode($res, JSON_UNESCAPED_UNICODE);
		http_response_code(406);	
	}
    
