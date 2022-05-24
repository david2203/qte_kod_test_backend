<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
require "connect.php";

$content = file_get_contents("php://input");
if(isset($content) && !empty($content)) {
   $request = json_decode($content);
    $author = $request->author;
    $content = $request->content;
    $title = $request->title;
    
    $sql = "INSERT INTO Posts (PostAuthor, PostTitle, PostContent) VALUES ('{$author}','{$title}','{$content}')";
    if(mysqli_query($conn, $sql)) {
       echo http_response_code(201);
    }else {
       echo http_response_code(422);
    }
}

?>