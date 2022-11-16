<?php
while($row=mysqli_fetch_assoc($sql)){
    $sql2 = "SELECT * FROM `messages` WHERE (incoming_msg_id = {$row['unique_id']} 
                                        OR  outgoing_msg_id = {$row['unique_id']}) AND  (incoming_msg_id = {$outgoing_id } 
                                        OR  outgoing_msg_id = {$outgoing_id }) ORDER BY msg_id DESC LIMIT 1 ";
    
    $query2 = mysqli_query($conn ,$sql2);

   $msgData = mysqli_fetch_assoc($query2);
   
    (mysqli_num_rows($query2) != null ) ? $msg =$msgData['msg'] :  $msg =" No Messages Available";

    (strlen($msg) > 28) ? $msg = substr($msg , 0 , 28).'..'  :$msg = $msg ;

    (mysqli_num_rows($query2) != null) ? ($outgoing_id == $msgData['outgoing_msg_id']) ? $you = "You : " : $you = " " : $you = " ";

    // Check  User Online Or Offline
    
    ($row['status'] == "offline now")? $offline = "offline": $offline = "" ; 

    $output .= '<a href="chat.php?user_id='.$row['unique_id'].'">
                    <div class="content">
                    <img src="php/images/'.$row["img"].'"  alt="">
                    <div class="details">
                           <span> '. $row["fname"]." ".$row["lname"] .' </span>
                           <p>'." $you ".$msg.'</p>
                    </div>
                   </div>
                   <div class="status-dot '.$offline.'">
                       <i class="fas fa-circle "></i>  </div>
               </a>';
}  

?>