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
    $cats = test_input($_POST["cats"]);
    $fileNameToStore = test_input($_SESSION['fileNameToStore']);

    //*Exploding the cats received as a string into array entries and then checking them against the db categories table to find their id. And then using that id stored in an array. And then save your quote, after that using the quote last saved id save your quote cats in junction table.

    $cats_array = explode(",", $cats);

    print_r($cats_array);

    echo "<br><br>";
    $catIdsArrays = [];

    foreach ($cats_array as $value){
        $query = "select * from `cat_table` where `cat_name` like '%$value%'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        print_r($row);
        echo "<br><br>";
        //echo $row . "<br>";
        array_push($catIdsArrays, $row['cat_id']);
    }
    print_r($catIdsArrays);

  
  $query ="INSERT INTO `quote_table`(`user_id`,`image_path`,`q_text`, `msg`) VALUES ('$user_id','$fileNameToStore','$q_text','$msg')";
  if(mysqli_query($conn, $query)){
    echo "Quote Entered";
  } else {
    echo "Quote Not Entered" . $q_text . $msg . $fileNameToStore;
  }
  $last_id = mysqli_insert_id($conn);
  
  foreach($catIdsArrays as $value){
    $query = "INSERT INTO `quote-categories`(`q_id`, `cat_id`) VALUES ('$last_id','$value')";
    print_r($query);
    echo "<br><br>";

    if(mysqli_query($conn, $query)){
      echo "category Entered";
      echo "<br><br>";
    } else {
      echo "category Not Entered";
      echo "<br><br>";
    }
}
  }
}
?>