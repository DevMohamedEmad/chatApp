<?php
include_once "header.php";

session_start();
if(isset($_SESSION['unique_id'])){
    header("Location: users.php");
}
?>
    <div class="wrapper">
        <section class="form signup">
            <header>
                Real Time Chat Application
            </header>
            <form action="#" enctype="multipart/form-data">
                <div class = "error-txt"></div>
                     <div class="name-details">
                        <div class="field input">
                           <label for="">First-Name </label>
                           <input type="text" name="fname" placeholder="First Name" required>
                        </div>
                        <div class="field input">
                           <label for="">Last Name </label>
                           <input type="text" name="lname" placeholder="Last Name" required>
                         </div>
                       </div>
                       <div class="field input">
                           <label for="">Email Adress </label>
                           <input type="text" name="email" placeholder="Enter Your Email" required>
                       </div>
                       <div class="field input">
                        <label>Password</label>
                        <input type="password" name="password" placeholder="Enter new password" required>
                        <i class="fas fa-eye"></i>
                      </div>
                       <div class="field image">
                           <label for="">Select Image </label>
                           <input type="file" name="image" required>
                        </div>
                        <div class="field btn">
                            <input type="submit"value="Continue To Chat" >
                        </div>
            </form>
            <div class="link"> Already Signed Up ? 
                <a href="login.php">Login</a>
            </div>
        </section>
    </div>
    <script src="javaScript/pass-show-hide.js"></script>
    <script src="javaScript/signup.js"></script>
</body>
</html>