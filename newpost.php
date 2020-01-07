<?php


require 'init.php';


$image = $_POST['image'];
$username = $_POST['id'];
$des = $_POST['des'];
$picname = $_POST['picname'];
$res = new stdClass();


$path="images/$picname.jpg";
$ress = file_put_contents($path,base64_decode($image));

if($ress){
	
	$query="select user_id from users where username='$username'";
	$result = mysqli_query($conn,$query);
	$data= $result->fetch_assoc();	
	$id= $data['user_id'];

	$query="INSERT INTO `posts`(`user_id`, `description`, `image`) VALUES ($id,'$des','$picname');";
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
    

}else{
    $res->message = "error";
    echo json_encode($res, JSON_UNESCAPED_UNICODE);
    http_response_code(406);
}
