<?php

include_once 'includes/header.php';

$id = $_GET['id'];

$sql3 = "SELECT * FROM jobs WHERE id='$id'";

$result3 = $conn->query($sql3);
$row3 = $result3->fetch_assoc();
$luid = $row3['uid'];

$sql4 =  "SELECT * FROM users WHERE idUsers='$luid'";
$result4 = $conn->query($sql4);
$row4 = $result4->fetch_assoc();
?>






<div class="page-wrapper">
<div class='one-product'>
                <div class='container'>
                    <div class='row col-12'>
                        
                       
<?php



       
        echo "  
                           
                            
                            
                         <iframe width='100%' height='450' frameborder='0' style='border:0' src='https://www.google.com/maps/embed/v1/place?q="                                         . $row3["lat"] . ","                                         . $row3["lng"] . "&amp;key=AIzaSyCFt-aPTyRNNhRmcczr344JpDllcSXffLk'></iframe>    
                            
                            
                           </div> 
                      
                            
                            
                            
                            
                          
                        </div>
                    </div>

                    <div class='row'>
                        <div class='col-md-6 col-lg-4 mb-3 mb-lg-0'>
                            <div class='product-prev'>
                                
                                                           <img alt='' class='rounded img-fluid col-12' src='jobs/photos/" . $row3["main_pic"] . "'>
                                          </div> </div>
                        

                        <div class='col-sm-12 col-md-5 col-lg-5 '>
                            <div class='product-body'>
                            
                              <h2 class='page__title  text-center  mb-2 mt-0'>
                            "                                         . $row3["name"] . " </h2><br>
                            <br><strong>". $row3["position_title"]. "</strong>
                                                    
        </div>
        
        
        
        <div class='row' >
          <div class=' col-sm-6 col-xs-12'>
                                       <strong>  ". $row3["listing_home_type"]. "</strong><br>
                                                    ". $row3["payrate"]. "
     
      <br>". $row3["level"]. "
       <br>". $row3["certifications"]. "
        <br>". $row3["qualifications"]. "
        <br>". $row3["education"]. "
       
      </div>
      
       <div class=' col-sm-6 col-xs-12'>
                                   
                                
                            
  
            </div> 
            
            
            <div class=' col-sm-12 col-xs-12 text-center'>
            <br>
            <p>
            
             ". $row3["disc"]. "
            </p>
            
            
             </div>
               </div>

                    
                       
            
            
           
                       
                           </div>                   
        
      
                 
           
                
                   <div class='contact-badge  col-sm-12 col-md-2 col-lg-2 float-left'>
                                                                       
         <div class='agent-body '>
             
             
             
     
                                    <div class='col-12'><a href='profile.php?id=".$row3["uid"]."'>
                                        <img alt='' class='rounded img col-6' src='users/photos/" . $row4["user_photo"] . "'>
                                    </div>
                                    <div class='col-3>
                                        <div class='agent-name'>
                                          " . $row4["user_fn"] . "
                                        </div>
                                        <div class='agent-address'>
                                            " . $row4["user_ln"] . "
                                        </div> </a>
                                   
                         
                                    <div class=' no-gutters col-12 float-left'>
                                        <div class=' contact-badge__phone d-flex flex-column align-items-start justify-content-between'>
                                            <ul>
                                                <li>
                                                " . $row3["contact_phone"] . "
                                                </li>
                                            </ul>

                                           
                                        </div>                                                               

                                        <div class='row mx-auto'>
                                        
                                        
                                            
                                         
 

 
 
  <a class='mx-auto col-12 mt-1 btn btn-send' style='float:right' href='message.php?id=".$row3["uid"]."'><font color='#fff'>Message</font>
                                 </a>
                                  <a  style='float:right' class='col-12 mt-1 mx-auto btn btn-warning text-white' href='mailto:". $row3["contact_email"] . "?Subject=RE:". $row3["name"] . "' >
                                            <i class='far fa-envelope'></i>

                                            Email</a>          
                              
                                    </div>
                                
                           </div>
                       
                    

                
          
            
            
            
               </div>  </div>

                    </div>
                
                      
            
            
       
 ";
                       


$conn->close();



include_once 'includes/footer.php';
?>               
