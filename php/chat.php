<?php
session_start();
include_once "config.php";
if(isset($_SESSION['unique_id'])){
   
    $outgoing_id = mysqli_real_escape_string($conn , $_POST['outgoing_id']);
    $incoming_id = mysqli_real_escape_string($conn , $_POST['incoming_id']);
    $msg = mysqli_real_escape_string($conn , $_POST['msg']);
    if(!empty($msg)){
        $sql = mysqli_query($conn , "INSERT INTO `messages` (incoming_msg_id , outgoing_msg_id , msg)
                                                  VALUES ('$incoming_id' , '$outgoing_id' ,'$msg' )")||die;;
    }
}else{
    header("../login.php");
}


?>