<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
require "connect.php";

$content = file_get_contents("php://input");
if(isset($content) && !empty($content)) {
   $request = json_decode($content);
    $author = $request->author;
    $content = $request->content;
    $postId = $request->postId;
    
    $sql = "INSERT INTO Comments (CommentAuthor, CommentContent, PostId) VALUES ('{$author}','{$content}','{$postId}')";
    if(mysqli_query($conn, $sql)) {
       echo http_response_code(201);
    }else {
       echo http_response_code(422);
    }
}



?>