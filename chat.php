<?php
session_start();
if(!isset($_SESSION["unique_id"])){
     header("location: login.php");
}
if(!$_GET['user_id']){
    header("location: users.php");
}
include "header.php";
include "php/config.php";
?>
    <div class="wrapper">
        <section class="chat-area">
            <header>
            <?php 
              $user_id = mysqli_real_escape_string($conn ,$_GET['user_id'] );
                $sql = mysqli_query($conn , "SELECT * FROM `users` WHERE unique_id = $user_id");
                if(mysqli_num_rows($sql) > 0){
                    $row = mysqli_fetch_assoc($sql);
                }
                ?>
                <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>           
                <img src=" <?php echo "php/images/". $row['img'];?>" alt="">
                <div class="details">
                    <span><?php echo $row['fname'] ." ". $row['lname'];?></span>
                    <p><?php echo $row['status'] ;?></p>
                </div>
            </header>
            <div class="chat-box">
               
            </div>
            <form action="#" class="typing-area">
                <input type="text" value="<?php echo $_SESSION["unique_id"]; ?>" name="outgoing_id" hidden>
                <input type="text" value="<?php echo $user_id; ?>" name="incoming_id" hidden>
                <input type="text" placeholder="Type A Message Here.." name= "msg" class="input">
                <button> <i class="fab fa-telegram-plane"></i></button>
            </form>
        </section>
    </div>
    <script src="javaScript/chat.js"></script>
</body>
</html>