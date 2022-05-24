<?php

use LDAP\Result;

require "connect.php";
$sql = "SELECT * FROM posts as p";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

while($row=$result->fetch_assoc()) {
    $posts[]=$row;
    $postId = $row['Id'];
    $joinQuery=("select * from comments as c where c.PostId =" . $postId);
    
    $resultC = $conn->query($joinQuery);
    
    while($commentrow=$resultC->fetch_assoc()) {
        $comments[]=$commentrow;
    }
}
    if(!isset($posts)) {
        $posts = [];
    }
    if(!isset($comments)) {
        $comments = [];
    }
    $post=array("result"=>"success","posts"=>$posts, "comments" => $comments);
    $data='content-type:application/json';
    $data=json_encode($post);
    echo $data;
} else {
  echo "0 results";
}



?>