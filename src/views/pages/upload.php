<?php
$ds          = DIRECTORY_SEPARATOR;  //1

$storeFolder = 'upload/';   //2
 
if (!empty($_FILES)) {
     
    $tempFile = $_FILES['file']['tmp_name'];     
         //3             
    $strtotime = strtotime("now");
    $tryName = $strtotime.'_'.$_FILES['file']['name'];  

    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4
    $targetFile = $targetPath . $tryName;
    // $targetFile =  $targetPath. $_FILES['file']['name'];  //5
 
    move_uploaded_file($tempFile,$targetFile); //6
     
}
?> 