<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 11-02-2019
 * Time: 21:25
 */

spl_autoload_register(function($className){
    include_once("../../classes/".$className.'.class.php');
});

if(isset($_POST['post_submit'])){
    $db = new Database();
    $conn = $db->getConnection();
    session_start();
    if(isset($_SESSION['user_id'])){
        $post_author_id = $_SESSION['user_id'];
    }else{
        die("How did u came here??");
    }
    $post = new Posts($conn);
    $post_category_id = $_POST['post_category_id'];
    $post_title = $_POST['post_title'];
    $post_body = $_POST['post_body'];
    $post_tags = $_POST['post_tags'];
    $post_status = $_POST['post_status'];
    $date = Date('Y-m-d');
    $data = array("post_category_id"=>$post_category_id, "post_title"=>"$post_title", "post_body"=>"$post_body","post_tags"=>"$post_tags","post_status"=>"$post_status","post_author_id"=>$post_author_id,"post_image"=>$_FILES['post_image']['name'],"post_date"=>$date);
//    $post->createPost($data);
    if($post->createPost($data)){
        //Now Upload Image
        $fileName = $_FILES['post_image']['name'];
        $tmpName = $_FILES['post_image']['tmp_name'];
        if(!move_uploaded_file($tmpName , "../../images/".$fileName))
            die("Error While Uploading Image");
    }else{
        die("Error While Inserting Post!");
    }
}