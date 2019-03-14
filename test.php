<?php

include_once ("classes/Database.class.php");
include_once ("classes/Posts.class.php");
$db = new Database();
$conn = $db->getConnection();
$post = new Posts($conn);

$array = array("post_category_id"=>4, "post_title"=>"Some New Post Title ", "post_body"=>"<b>My contents</b>");
//$post->updatePost($array, "post_category_id = 40");

echo $_SERVER['SERVER_ADDR'];// server's IP (jis server pe connected h uska IP)
echo $_SERVER['HTTP_USER_AGENT'];//all details about the client's machine like konsa window h konsa browser chlta h n all.
echo $_SERVER['REMOTE_ADDR'];//client's IP (hamara ip addr)

?>