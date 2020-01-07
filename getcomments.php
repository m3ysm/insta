<?php


require 'init.php';

$postid = $_GET['postid'];

$res = array();
$query = "select users.username , comments.* from comments inner join users on comments.user_id = users.user_id where comments.post_id=$postid order by comments.date DESC";
$result = mysqli_query($conn , $query);
$final = new stdClass();

while ($data = $result -> fetch_assoc()){
	$ans = array();
	
	$ans['user_id'] = $data['username'];
	$ans['comment'] = $data['comment'];
	$ans['date'] = $data['date'];
	
	
array_push($res , $ans);	
}
$final->data=$res;
echo json_encode($final);

http_response_code(200);	
