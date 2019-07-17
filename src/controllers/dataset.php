<?php
require ('../db.php');

if(isset($_REQUEST['search'])){
    $search = $_REQUEST['search'];
    // $query = "SELECT * FROM `cat_table` WHERE `cat_name` like '%$search%'";
    // $results = mysqli_query($conn, $query);

    // print_r ($results);

    $query = "SELECT * FROM `cat_table` WHERE `cat_name` like '%$search%'";


    $result = mysqli_query ($conn, $query);
    
    
    $data = mysqli_fetch_all($result);
    
   // print_r($data);
    $json_array=[];
    
    foreach ($data as $key =>$row){
        $user = [$row[0]=> $row[1]];
        array_push($json_array, $user);
    }
    
  //  echo "<br><br> Before JSon";
   // print_r($json_array);
    
    $json_array = json_encode($json_array);
    
  //  echo "<br><br> After Encoding to JSon";
    //print_r($json_array);

    echo $json_array;

}

?>