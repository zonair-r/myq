<?php
require ('../db.php');
session_start();

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
// define variables and set to empty values
$q_text = $msg = $cats = "";

if (isset($_POST['quoteText'])) {
  if (!isset($_SESSION['id'])){
      echo "Please Login First to Upload Media";
  } else {
    $user_id = $_SESSION['id'];
    $q_text = test_input($_POST["quoteText"]);
    $msg = test_input($_POST["msg"]);
    $fileNameToStore = test_input($_SESSION['fileNameToStore']);
  
  $query ="INSERT INTO `quote_table`(`user_id`,`image_path`,`q_text`, `msg`) VALUES ('$user_id','$fileNameToStore','$q_text','$msg')";
  if(mysqli_query($conn, $query)){
    echo "Quote Entered";
  } else {
    echo "Quote Not Entered" . $q_text . $msg . $fileNameToStore;
  }
  }
}
?>