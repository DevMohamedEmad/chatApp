<?php
include_once "config.php";
session_start();
include_once "config.php";
if(isset($_SESSION['unique_id'])){
    $outgoing_id = $_SESSION['unique_id'];
}else {
    header("Location:login.php");
}

$name = mysqli_real_escape_string($conn,$_POST['searchTerm']);
$sql = mysqli_query($conn , "SELECT * FROM `users` WHERE NOT unique_id = '$outgoing_id' AND (fname LIKE '%{$name}%' OR lname LIKE '%{$name}%')");

$output="";
if(mysqli_num_rows($sql) > 0){
    include "data.php";
}else{
    $output .= " No Users Found Related To Your Search";
}

echo $output;
?>