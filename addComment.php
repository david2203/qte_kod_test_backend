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




// $result = $conn->query($sql);

// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//   // output data of each row
// //   foreach($result as $r){
// //     print_r($r);
// //   }
// // print_r($result);

// //   while($row = $result->fetch_assoc()) {
// //       print_r(json_encode([$row]));
// //   }
// while($row=$result->fetch_assoc()) {
//     $posts[]=$row;
//     $postId = $row['Id'];
//     // $joinQuery=("select * from comments as c where c.PostId = 1");
//     // $resultC = $conn->query($joinQuery);
//     // while($commentrow=$resultC->fetch_assoc()) {
//     //     $comments[]=$commentrow;
//     // }$joinQuery=("select * from comments as c where c.PostId =" . $postId);
//     $joinQuery=("select * from comments as c where c.PostId =" . $postId);
//     $resultC = $conn->query($joinQuery);
//     while($commentrow=$resultC->fetch_assoc()) {
//         $comments[]=$commentrow;
//     }
// }

// // $sql2 = "SELECT * FROM comments as c";
// // $resultC = $conn->query($sql2);
// // while($row2=$result->fetch_assoc()) {
// //     $comments[]=$row2;
// //     // $joinQuery=("select * from comments as c where c.PostId posts.Id");
// //     // $resultC = $conn->query($joinQuery);
// //     // while($commentrow=$resultC->fetch_assoc()) {
// //     //     $comments[]=$row;
// //     // }
// // }
//     $post=array("result"=>"success","posts"=>$posts, "comments" => $comments);
//     $data='content-type:application/json';
//     $data=json_encode($post);
//     echo $data;
// } else {
//   echo "0 results";
// }



?>