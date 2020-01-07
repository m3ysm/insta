<?php


require 'init.php';

$res = array();
$query = "select posts.post_id , users.username , posts.description , posts.image , posts.date from posts inner join users on posts.user_id = users.user_id order by posts.date DESC";
$result = mysqli_query($conn , $query);
$final = new stdClass();

while ($data = $result -> fetch_assoc()){
	$ans = array();
	
	$ans['id'] = $data['post_id'];
	$post_id = $data['post_id'];
	$ans['user_id'] = $data['username'];
	$ans['des'] = $data['description'];
	$ans['image'] = $data['image'];
	$ans['date'] = $data['date'];
	
$query1 = "select count(*) as count from comments where post_id = $post_id";	
$result1 = mysqli_query($conn , $query1);
$data1 = $result1 -> fetch_assoc();
$ans['commentCount'] = $data1['count'];
	
array_push($res , $ans);	
}
$final->data=$res;
echo json_encode($final);

http_response_code(200);	
