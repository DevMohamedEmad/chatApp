<?php
include_once "header.php";
include "php/config.php";

session_start();
if(isset($_SESSION['unique_id'])){
    header("Location: users.php");
}


?>

<body>
    <div class="wrapper">
        <section class="form login">
            <header>
                Real Time Chat Application
            </header>
            <form action="#">
                <div class ="error-txt"></div>
                       <div class="field input">
                           <label for="email">Email Adress </label>
                           <input type="text" placeholder="Enter Your Email" id="email" name="email">
                       </div>
                       <div class="field input">
                           <label for="password">Password </label>
                           <input type="password" placeholder="Enter New Password" id="password" name="password">
                           <i class="fas fa-eye"></i>
                        </div>
                        <div class="field btn">
                            <input type="submit"value="Continue To Chat" >
                        </div>
            </form>
            <div class="link"> Not Yet Signed Up ? 
                <a href="index.php">Signup Now </a>
            </div>
        </section>
    </div>
    <script src="javaScript/pass-show-hide.js"></script>
    <script src="javaScript/login.js"></script>
</body>
</html>