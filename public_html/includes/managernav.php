	<script type="text/javascript">

	function myFunction() {
		$.ajax({
			url: "view_notification.php",
			type: "POST",
			processData:false,
			success: function(data){
				$("#notification-count").remove();					
				$("#notification-latest").show();$("#notification-latest").html(data);
			},
			error: function(){}           
		});
	 }
	 
	 $(document).ready(function() {
		$('body').click(function(e){
			if ( e.target.id != 'notification-icon'){
				$("#notification-latest").hide();
			}
		});
	});
		 
		 
		 
		 
		 	function myFunction2() {
		$.ajax({
			url: "view_notification2.php",
			type: "POST",
			processData:false,
			success: function(data){
				$("#notification-count2").remove();					
				$("#notification-latest2").show();$("#notification-latest2").html(data);
			},
			error: function(){}           
		});
	 }
	 
	 $(document).ready(function() {
		$('body').click(function(e){
			if ( e.target.id != 'notification-icon2'){
				$("#notification-latest2").hide();
			}
		});
	});
		 
		 
	</script>

<?php
     include 'topbar.php'; 
     $sqlGetMessages="SELECT * FROM messages WHERE msg_read = 0 AND msg_to='$id'";
$resultGetMessages=mysqli_query($conn, $sqlGetMessages);
$count=mysqli_num_rows($resultGetMessages);
     
     $sql5 = "SELECT * FROM messages WHERE msg_to='$id' OR msg_from='$id' ORDER BY sent_on DESC";
      $sql999 = "SELECT * FROM notifications WHERE deleted='0' ORDER BY created DESC ";

$result5 = $conn->query($sql5);
$result999 = $conn->query($sql999);
    $notid = $row999['id'];
   
      $sqlGetHidden = "SELECT * from hide_notifications WHERE uid='$id' AND not_id='$notid'";
   
   $resultGetHidden=mysqli_query($conn, $sqlGetHidden);
   
  
  
   if ($resultGetHidden->num_rows > 0) {
    // output data of each row
    while($rowGetHidden = $resultGetHidden->fetch_assoc()) {
        $notid2 = $rowGetHidden['not_id'];
  
  
    
      $sql="select * from notifications WHERE id !='$notid2' ORDER BY created DESC";
$resultread=mysqli_query($conn, $sql);


if (mysqli_num_rows($resultread) > 0)
{

$count2=mysqli_num_rows($resultread);
}

}}






  
         $sql188 = "SELECT * FROM users WHERE idUsers='$id'";
        $result188 = $conn->query($sql188);
        $row188 = $result188->fetch_assoc();
        
      
         $sql5T = "SELECT * FROM friend_req WHERE uid='$id'";
        $result5T = $conn->query($sql5T);

     
?>
</a>
                        <div class="page-header__settings text-lg-right">
                            <div class="auth-user">
                               
                                
                                <div class="auth-user__list">
                                    
                                    
                                                          	<div class="auth-user__item demo-content2 float-left col-3">
		<div id="notification-header2">
			   <div style="position:relative">
			   <button id="notification-icon2" name="button" onclick="myFunction2()" class="dropbtn"><span id="notification-count2"><?php if($count2>0) { echo $count2; } ?></span><i style="font-size:1.5rem" class="text-light fas fa-bell"></i></button>
			</div>	 <div id="notification-latest2"></div>
				</div>			
		
			<?php if(isset($message2)) { ?> <div class="error2"><?php echo $message2; ?></div> <?php } ?>


	<?php if(isset($success2)) { ?> <div class="success2"><?php echo $success2;?></div> <?php } ?>
           </div>       
                                    
                                    
                                    
                                    
                                    
                                    
   
                           




                                    	<div class="auth-user__item demo-content float-left col-3">
		<div id="notification-header">
			   <div style="position:relative">
			   <button id="notification-icon" name="button" onclick="myFunction()" class="dropbtn"><span id="notification-count"><?php if($count>0) { echo $count; } ?></span><i style="font-size:1.5rem" class="text-light fas fa-comments"></i></button>
			</div>	 <div id="notification-latest"></div>
				</div>			
		
			<?php if(isset($message)) { ?> <div class="error"><?php echo $message; ?></div> <?php } ?>


	<?php if(isset($success)) { ?> <div class="success"><?php echo $success;?></div> <?php } ?>
           </div>       
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                           




                                    <div class="auth-user__item page-note">
                                        <a href="#" class="page-header__trigger dropdown-toggle" id="dropdownMenu-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="text-light fa fa-user-plus" aria-hidden="true"></i>
                                        </a>

                                        <div class="dropdown-menu auth-user__dropdown" aria-labelledby="dropdownMenu-2">                                    
                                     <li style="background:#31c677" class="head text-light ">
                        <div class="row">
                          <div class="col-lg-12 col-sm-12 col-12">
                            <span>Friend Request</span>
                            
                          </div>
                      </li>
                      
                      
                      
                      
                      <?php
                      
                      
                      if ($result5T->num_rows > 0) {
    // output data of each row
    while($row5T = $result5T->fetch_assoc()) {
        
        $senderid2 = $row5T["req_uid"];
          
        $sql6T = "SELECT * FROM users WHERE idUsers='$senderid2'";
        $result6T = $conn->query($sql6T);
        $row6T = $result6T->fetch_assoc();
        
        
        
      
        
        if ($senderid2 != $id && $deleted !=1){
            
        
        echo "
                      
                      
                      
                      
                      <li class='notification-box'>
                        <div class='row'>
                          <div class='col-lg-4 col-sm-3 col-4 text-center'><a href='profile.php?id=" . $row5T['req_uid']. "'>
                            <img  class='mt-2 p-1 rounded-circle' height='60' width='60' src='users/photos/" . $row6T['user_photo']. "'>
                          </div>    
                          <div class='col-lg-8 col-sm-8 col-8'>
                            <strong class='text-info'>" . $row6T['user_fn']. " " . $row6T['user_ln']. "</strong></a>
                             <form class='form float-left' action='includes/accept.inc.php' method='post'>
                             
                             
                             
                             
                             <input type='hidden' name='accept' value='".$row5T['req_uid']."'>
                             
                             
                             
                           <button style='width:30px; height:35px' type='submit' class='btn' name='accept-submit'> <i style='color:green' class='fas fa-check pt-3'></i></button> &nbsp;
                           </form>
                           
                            <form class='form float-right' action='includes/deny.inc.php' method='post'>
                           
                            <button style='width:30px; height:35px' type='submit' class='btn' name='delete-submit'><i style='color:red' class='fa fa-trash' aria-hidden='true'></i>
</button>
                           </form>
                            
                            
                            
                            
                            
                            
                            <small class='text-info'></small><br>
                            
                          </div>    
                        </div>
                      </li>
                      
                      " ;}}}
                      
                      
                      ?>
                      
                      
                      
                      
                   
                      <li style="background:#31c677" class="footer text-center">
                        <a href="../friend-request.php" class="text-light">View All</a>
                      </li>
                    </ul>
                                        </div>
                                    </div>
                                    

                                    <div class="auth-user__item user-header">
                                        <a href="#" class="page-header__trigger dropdown-toggle caret" id="dropdownMenu-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                           
                                                <img style="background-color:white;border-radius: 50%" height="40" width="40" alt="" src="users/photos/<?php echo $row188['user_photo']; ?>" >
                                           
                                        </a>

                                        <div class="dropdown-menu auth-user__dropdown" aria-labelledby="dropdownMenu-3">
                                            <div class="user-header__info">
                                                <div class="row align-items-center">
                                                    <div class="col-3 col-md-3">
                                                        <img style="border-radius: 50%" height="40" width="40" alt="" src="users/photos/<?php echo $row188['user_photo']; ?>" >
                                                    </div>
                                                    
                                                    <div class="col-9 col-md-9">
                                                        <div class="user-header__name">
                                           <?php echo "Welcome {$_SESSION['fn']}!"; ?>
                                                        </div>
                                                        <span class="user-header__email">
                                                            Have a Great Day!
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="user-header__list">
                                                <ul class="page-header__list">
                                                      <li class="page-header__item">
                                                        <a href="mydetails-am.php" class="page-header__link">
                                                           Account Management
                                                        </a>
                                                    </li>
                                                    
                                                    
                                                    
                                                    
                                                     <li class="page-header__item">
                                                        <a href="profile.php?id=<?php echo "{$_SESSION['id']}"; ?>" class="page-header__link">
                                                           Public Profile
                                                        </a>
                                                    </li>
                                                    <li class="page-header__item">
                                                        <a href="add-listing.php" class="page-header__link">
                                                            Create a Listing
                                                        </a>
                                                    </li>
                                                    
                                                      <li class="page-header__item">
                                                        <a href="add-ad.php" class="page-header__link">
                                                           New Advertisement
                                                        </a>
                                                    </li>
                                                    
                                                       <li class="page-header__item">
                                                        <a href="new-notification.php" class="page-header__link">
                                                           New Notification
                                                        </a>
                                                    </li>
                                                    <li class="page-header__item">
                                                        <a href="add-management.php" class="page-header__link">
                                                           New Management
                                                        </a>
                                                    </li>
                                                   
                                                      
                                                  
                                                    <li class="page-header__item">
                                                        <a href="/includes/logout.inc.php" class="page-header__link">
                                                            Logout
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                  
                  

                  
                  
                                </div>
                            </div>
                        </div>                     
                    </div>
                </div>
            </div>
        </header> 
         <body>