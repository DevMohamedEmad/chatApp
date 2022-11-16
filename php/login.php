<?php

session_start();
include_once "config.php";

$email = mysqli_real_escape_string($conn,$_POST['email']);
$password = mysqli_real_escape_string($conn,$_POST['password']);  


if(!empty($email) && !empty($password) ){

    if(filter_var($email , FILTER_VALIDATE_EMAIL)){
        $sql= mysqli_query($conn , "SELECT * FROM `users` WHERE email = '$email' AND password = '$password'");
        if(mysqli_num_rows($sql)>0){
            $row=mysqli_fetch_assoc($sql);
            $_SESSION["unique_id"] = $row["unique_id"];
            $query = mysqli_query($conn, "UPDATE`users` SET `status` = 'Online Now'  Where email ='$email'") ;
            echo "success";
        }
    }else {
        echo "Please Enter Vaild Email Or Password";
    }
}else{
    echo "Please Enter The All Credentials";
}
?>