<?php
include_once "header.php";
include "php/config.php";
?>
<?php
session_start();
if(!isset($_SESSION["unique_id"])){
     header("location: login.php");
}

?>
<div class="wrapper">
        <section class="users">
            <header>
                <?php 
                $sql = mysqli_query($conn , " SELECT * FROM `users` WHERE unique_id = {$_SESSION['unique_id']}");
                if(mysqli_num_rows($sql) > 0){
                    $row = mysqli_fetch_assoc($sql);
                }
                ?>
              <div class="content">
                <img src=" <?php echo "php/images/". $row['img'];?>" alt="An Error Two the Image">
                <div class="details">
                    <span> <?php echo $row['fname']." ".$row['lname'];  ?></span>
                    <p> <?php echo $row['status'];  ?></p>
                </div>
              </div>
              <a href="php/logout.php?user_id=<?php echo  $row ['unique_id']; ?>" class="logout">Logout</a>
            </header>
            <div class="search">
                <span class="text">Select An User To Start Chat</span>
                <input type="text" placeholder="Enter Name To Search...">
                <button> <i class="fas fa-search"></i></button>
            </div>
            <div class="users-list">
                
            </div>
        </section>
    </div>
    <script src="javaScript/users.js"></script>
</body>
</html>