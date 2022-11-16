<?php
session_start();
include_once "config.php";

$fname = mysqli_real_escape_string($conn,$_POST['fname']);
$lname = mysqli_real_escape_string($conn,$_POST['lname']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$password = mysqli_real_escape_string($conn,$_POST['password']);  


if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
    // let's check user email is valid or not
    if (filter_var($email , FILTER_VALIDATE_EMAIL)){
        // let's check that the email exist already in the DataBase
        $sql = mysqli_query($conn,"SELECT email FROM `users` WHERE email = '$email'");
        if(mysqli_num_rows($sql) > 0){ // if email already Exist
            echo "Email Already Exist!!";
        }else{
            // let's check user upload file or not
            if(isset($_FILES['image'])){
                $img_name = $_FILES['image']['name']; // getting file name
                $img_type = $_FILES['image']['type']; // getting img type
                $tmp_name= $_FILES['image']['tmp_name']; // this temporary name is used to save/move file in our folder

                // let's explode image and get the last extension like jpg png
                $img_explode = explode("." , $img_name);
                $img_ext = end($img_explode);//here we get the extension of an user uploaded img file

                $extensions = ['png', 'jpeg' , 'jpg']; // this are some valid img ext and we have store them in array
                if(in_array($img_ext,  $extensions)){//if user uploaded vaild extension
                     $time=time(); // this will return us current time
                                   // we need this time because when you uploading user img to inour folder we rename user file with cuurent time
                                   // so all the img file will have a unique name
                    
                    $new_img_name = $time.$img_name;          
                    //let's move the user uploaded img to our particular folder
                   if( move_uploaded_file($tmp_name, "images/".$new_img_name)){ // move_uploaded_file($tmp_name, "folder_name")
                       $status ="Active Now"; // once user signed up then his status will be Active
                       $random_id = rand(time(),10000000); // creating random id fir the user 
                    
                       //let's insert all user data inside table 
                    $sql2 = mysqli_query($conn, "INSERT INTO `users` (unique_id,fname,lname,email,password,img,status)
                                                           Values (' $random_id','$fname','$lname','$email','$password','$new_img_name','$status') ");
                    if($sql2){
                        $sql3=mysqli_query($conn,"SELECT * FROM `users` WHERE email = '$email'");
                        if(mysqli_num_rows($sql3)>0){
                            $row=mysqli_fetch_assoc($sql3);
                            $_SESSION["unique_id"] = $row["unique_id"];
                            echo "success";
                        }
                    }else {
                        echo " Some Thing Went Wrong !!";
                    }
                   
                   } 

                }else{
                    echo " The Extensions Must Be jpeg , png , jpg !!";
                }
                 

            }else {
                echo "Please Select An Image File !!";
            }
        }

    }else {
        echo "$email - This Is Not A  valid ";
    }

}else {
    echo "All Input Files Are Required";
}


?>