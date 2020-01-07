<?php

$username = $_POST['username'];
$os = $_POST['os'];
require "init.php";
$res = new stdClass();

$query="update users set last_online = CURRENT_TIMESTAMP where username='$username'";

mysqli_query($conn,$query);

$query="select * from version";
$result = mysqli_query($conn,$query);
$data = $result -> fetch_assoc();

if($os == "android"){
	$res ->massage =$data['android_version'];
	echo json_encode($res,JSON_UNESCAPED_UNICODE);
	http_response_code(200);
	
	
}else{
	$res ->massage =$data['ios_version'];
	echo json_encode($res,JSON_UNESCAPED_UNICODE);
	http_response_code(200);
	
	
}






