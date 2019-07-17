<?php
session_start();
$ds          = DIRECTORY_SEPARATOR;  //1

$storeFolder = 'upload/';   //2
 
if (!empty($_FILES)) {
     
    $tempFile = $_FILES['file']['tmp_name'];     
    //attaching a timestamp to the filename
    // *TODO We can attach user id as well while storing files.            
    $strtotime = strtotime("now");
    $fileNameToStore = $strtotime.'_'.$_FILES['file']['name'];  
    // *! The above variable fileNameToStore is the file name including the extension that we need to store in our db 
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4
    $targetFile = $targetPath . $fileNameToStore;
    
    // $targetFile =  $targetPath. $_FILES['file']['name'];  //5
 
    move_uploaded_file($tempFile,$targetFile); //6

    // set the Post Super Global with the filename

    $_SESSION['fileNameToStore'] = $fileNameToStore;

     
}
?> 