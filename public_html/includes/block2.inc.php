<?php

 
 
  session_start();
  $id = $_SESSION['id'];
  
  
  $user = $_SESSION['friend_req_id'];
require 'db_connect.php';
if (isset($_POST['block-submit'])) {


$friendid = $_POST['friendid'];
  
 

    $sql = "INSERT INTO blocked (uid, blocked_uid) VALUES (?, ?);";
        // Here we initialize a new statement using the connection from the dbh.inc.php file.
        $stmt = mysqli_stmt_init($conn);
        // Then we prepare our SQL statement AND check if there are any errors with it.
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          // If there is an error we send the user back to the signup page.
          header("Location: ../friends-am.php?error=sqlerror");
          exit();
     
        }
        else {

   
          mysqli_stmt_bind_param($stmt, "ii", $id, $friendid);
          // Then we execute the prepared statement and send it to the database!
          // This means the user is now registered! :)
          mysqli_stmt_execute($stmt);
          // Lastly we send the user back to the signup page with a success message!
         
         
        
        

          
          header("Location: ../friends-am.php");
              
          exit();
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
        }
      
    

    
    
}