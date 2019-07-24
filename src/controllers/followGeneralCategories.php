<?php
session_start();
require ('../db.php');
if (isset($_SESSION['id'])){
    if (isset ($_POST['cat_id'])){
        $user_id = $_SESSION['id'];
        $cat_id = $_POST['cat_id'];
        //! Make a query to check if this user is already followed or not
        $query = "Select * From `user_followed_general_cats` where `user_id` = '$user_id' And `cat_id` = '$cat_id'";

        $result = mysqli_query($conn, $query);
        $rowCount = mysqli_num_rows($result);
//! if the user has already followed the user and he clicks again on his avatar it will unfollow the user. 

        if ($rowCount>0){
           // print_r ("match Found");
            $query = "UPDATE `user_followed_general_cats` SET `user_id` = 0, `cat_id`= 0 WHERE `user_id` = $user_id AND `cat_id`= $cat_id";
            $result = mysqli_query ($conn, $query);
            if ($result){
               print_r("Unfollowed");
                echo "unfollowed";
            } else {
                echo "Record found but failed to set to Null";
            }
        } else {
            //! if the user wasnt followed before, he will be followed now
            $query = "INSERT INTO `user_followed_general_cats`(`user_id`, `cat_id`) VALUES ('$user_id', '$cat_id')";
            $result = mysqli_query($conn,$query);
            if($result){
                echo "followed";
            } else{
                echo "unsuccessful";
            }
        }
    } else{
        echo "No User Set in Post Super Global";
    }
} else {
    echo "login required";
}
?>