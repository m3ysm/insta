<?php


require 'init.php';

$postid = $_POST['postid'];

$res = new stdClass();

	
	$query = "DELETE FROM `posts` WHERE `post_id`= $postid";
	$result = mysqli_query($conn,$query);
	if($result){
		$res->message = "ok";
		echo json_encode($res, JSON_UNESCAPED_UNICODE);
		http_response_code(201);
	}else{
		$res->message = "error";
		echo json_encode($res, JSON_UNESCAPED_UNICODE);
		http_response_code(406);	
	}