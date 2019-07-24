<?php
session_start();

require ('../db.php');
if (isset($_SESSION['id'])){
    if (isset($_POST['catName'])){
        $user_id = $_SESSION['id'];
        $cat_name = $_POST['catName'];
        $quote_id = $_POST['quote_id'];
        $userCat_ID=0;

        $query = "SELECT * FROM `user_cats` where `user_created_id` = '$user_id' AND `name` = '$cat_name'";
        $result = mysqli_query($conn, $query);
        $rows = mysqli_num_rows($result);
        if ($rows>=1){
            $row = mysqli_fetch_assoc($result);
            $userCat_ID = $row['userCat_id'];
        } else {
            $query = "INSERT INTO `user_cats`(`name`, `user_created_id`) VALUES ('$cat_name', '$user_id')";
            $result = mysqli_query($conn, $query);
            $userCat_ID = mysqli_insert_id($conn);
        }
        $query = "INSERT INTO `userCat_quotes`(`user_id`, `userCat_id`, `quote_id`) VALUES ('$user_id', '$userCat_ID','$quote_id')";
        $result = mysqli_query($conn, $query);
        if ($result){
            echo "saved";
        } else {
            echo "saved at last step";
        }
    }
}