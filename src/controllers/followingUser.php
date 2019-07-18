<?php
session_start();
require ('../db.php');
if (isset($_SESSION['id'])){
    if (isset ($_POST['following_user_id'])){
        $user_id = $_SESSION['id'];
        $following_user_id = $_POST['following_user_id'];
        $query = "INSERT INTO `user_followers`(`user_id`, `following_user_id`) VALUES ('$user_id', '$following_user_id')";
        $result = mysqli_query($conn,$query);
        if($result){
            echo "success";
        } else{
            echo "unsuccessful";
        }
    } else{
        echo "No User Set in Post Super Global";
    }
} else {
    echo "login required";

}


?>