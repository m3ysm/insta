<?php

require 'init.php';

$query = "select * from posts";
$result = mysqli_query($conn,$query);
$res = array();
$final = new stdClass();

while( $data=$result->fetch_assoc()){
$ans = array();

$ans['id'] = $data['post_id'];
$ans['user_id'] = $data['user_id'];
$ans['des'] = $data['description'];
$ans['image'] = $data['image'];
$ans['date'] = $data['date'];

array_push($res,$ans);	
}
$final->data=$res;
echo json_encode($final);
http_response_code(200);


