<?php

session_start();
if(isset($_GET['user_id']) && isset($_SESSION['unique_id'])){

$user_id = $_GET['user_id'];
include_once "config.php";
$logout_id = mysqli_real_escape_string($conn , $user_id);
$status = "offline now";
$query = mysqli_query($conn, "UPDATE`users` SET `status` = '$status'  Where unique_id ='$user_id'") ;
if($query){
    session_unset();
    session_destroy();
    header("Location: ../login.php");

}else {

    header("Location: ../login.php");
}
}
else {
    header("Location: ../login.php");
}

?>