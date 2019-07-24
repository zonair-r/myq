<?php
require('../db.php');
session_start();

if (isset($_POST['email'])){
    $email = $_POST['email'];
    $password =$_POST['password'];
    $query = "SELECT * FROM `user_table` WHERE `email` = '$email' and `password` = '$password'";

    $result = mysqli_query($conn, $query);
    $test = mysqli_fetch_array($result);
    
    $rows = mysqli_num_rows($result);

    if ($rows >= 1){
        $_SESSION['id'] = $test['user_id']; 
        $_SESSION['fname'] = $test['fname']; 
        $_SESSION['lname'] = $test['lname']; 
        $_SESSION['username']= $username;
        $_SESSION['email'] = $test['email']; 
        $_SESSION['password'] = $test['password']; 
        
        echo "User Found Successfully, " . $_SESSION['fname'];
    } else {
            echo "Login Invalid";
    }
}
?>