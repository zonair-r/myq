<?php
session_start();
require ('../db.php');
if (isset($_SESSION['id'])){
    if (isset ($_POST['following_user_id'])){
        $user_id = $_SESSION['id'];
        $following_user_id = $_POST['following_user_id'];
        //! Make a query to check if this user is already followed or not
        $query = "Select * From `user_followers` where `user_id` = '$user_id' And `following_user_id` = '$following_user_id'";

        $result = mysqli_query($conn, $query);
        $rowCount = mysqli_num_rows($result);
//! if the user has already followed the user and he clicks again on his avatar it will unfollow the user. 

        if ($rowCount>0){
           // print_r ("match Found");
            $query = "UPDATE `user_followers` SET `user_id` = 0, `following_user_id`= 0 WHERE `user_id` = $user_id AND `following_user_id`= $following_user_id";
            $result = mysqli_query ($conn, $query);
            if ($result){
               // print_r("Unfollowed");
                echo "unfollowed";
            } else {
                echo "Record found but failed to set to Null";
            }
        } else {
            //! if the user wasnt followed before, he will be followed now
            $query = "INSERT INTO `user_followers`(`user_id`, `following_user_id`) VALUES ('$user_id', '$following_user_id')";
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