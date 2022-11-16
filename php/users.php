<?php
session_start();
include_once "config.php";
if(isset($_SESSION['unique_id'])){
    $outgoing_id = $_SESSION['unique_id'];
}else {
    header("Location:login.php");
}
$sql = mysqli_query($conn , "SELECT * FROM `users` WHERE NOT unique_id = '$outgoing_id'");
$output= "";
if(mysqli_num_rows($sql) == 1){
    $output .= "No Users Are Available To Start Chat";
}elseif(mysqli_num_rows($sql) > 0){
   include "data.php";
}
echo $output;

?>