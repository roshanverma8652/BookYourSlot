
<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/fbconfig.php');
include('include/checklogin.php');
check_login();
?>
<?php 
  include "include/phpqrcode/qrlib.php";
  if(isset($_POST['submit']))
  {
    $qc = " Name: ".$_POST['vname'] ."\n Time: ".$_POST['apptime']." \n Date: ".$_POST['appdate']."\n P_Pass: 123456";
    
    $qrUname = $_POST['vname'];
    $qrImgName = "qr".rand();
    $final = $qc;
    $qrs = QRcode::png($qc,"userQr/$qrImgName.png","H","3","3");
    $qrimage = $qrImgName.".png";
    //$workDir = $_SERVER['HTTP_HOST'];
    $qrlink = "/bys/user/userQr/".$qrImgName.".png";
  }
  ?>   
  <?php
  if(isset($_POST['submit']))
  {
   
   $postdata = $database->getReference("parking/booking")->set('Booked');
}
  ?>
<!DOCTYPE HTML>
<html>
	<head>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>User | Book Parking</title>

        
		
		
		<!-- CSS only -->
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
       <link href='sty.css' rel='stylesheet' type='text/css'>

       <link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		
        <link href='https://fonts.googleapis.com/css?family=Cinzel Decorative' rel='stylesheet'>

	
<script>
       function getbranch(val) {
	    $.ajax({
	    type: "POST",
	    url: "get_branch.php",
	    data:'id='+val,
	    success: function(data){
		$("#branch").html(data);
	  }
	  });
      }
</script>	
	</head>
	<body style="background-color:white; padding-top:100px;">
        
    
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
         <a class="navbar-brand js-scroll-trigger" href="#page-top">Book Your Slot</a>
             <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                  <i class="fas fa-bars"><img src="https://img.icons8.com/android/24/000000/menu.png"/></i>
             </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
              <ul class="navbar-nav text-uppercase ml-auto">
                    <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="userdashboard.php">Dashboard</a>
              </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="book-token.php">Book Token</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="token-history.php"> Token History</a>
          </li>
          </li>
		  <li class="nav-item">
		  <a class="nav-link js-scroll-trigger" href="review.html"> User Review</a>
		</li>
		<li class="nav-item">
		  <a class="nav-link js-scroll-trigger" href="todolist.php"> Shopping List</a>
		</li>
         </ul>
          <div class="dropdown">
             <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                 <img src="https://img.icons8.com/ios-filled/20/000000/gender-neutral-user.png"/>
                     <?php $query=mysqli_query($con,"select fullName from users where id='".$_SESSION['id']."'");
                         while($row=mysqli_fetch_array($query))
                             {
	                                echo $row['fullName'];
							 }?>
             </button>
  
             <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" >
                    <a class="dropdown-item" href="edit-userprofile.php">My profile</a>
                    <a class="dropdown-item" href="change-u-password.php">Change Password</a>
                    <a class="dropdown-item" href="logout.php">Logout</a>
             </div>
         </div>
      </div>
   </div>
      
  </nav>
  
 

<div class="container-fluid container-fullw bg-white">
  <div class="row">
    <div class="col-md-12">
                         
	  <div class="row margin-top-30">
	     <div class="col-lg-8 col-md-12">
		     <div class="panel panel-white">
		         <div class="panel-body">
                    	
                     
																						
                      <form <?php $_SERVER['PHP_SELF'];?> method="post" >
                          <div class="form-group">
                                <label for="branch">Visitor Name:</label>
                               <input type="text" name="vname" class="form-control" id="vname"  required="required">
                         </div>
                          <div class="form-group">
                              <label for="supermarket">Parking Name:</label>
                              <select name="supermarket" class="form-control" onChange="getbranch(this.value);" required="required">
                                  <option value="">Select parking</option>
                                    <?php $ret=mysqli_query($con,"select * from supermarket");
                                       while($row=mysqli_fetch_array($ret))
                                        {
                                   ?>
                                     <option value="<?php echo htmlentities($row['supermarket']);?>">
                                          <?php echo htmlentities($row['supermarket']);?></option>
                                 <?php } ?>
                             </select>
                          </div>

                          <div class="form-group">
                                <label for="branch">Branch:</label>
                               <select name="branch" class="form-control" id="branch"  required="required">
                                        <option value="">Select Branch</option>
                                </select>
                         </div>
														
                          <div class="form-group">
                               <label for="tokentDate">Date</label>
                                <input  class="form-control datepicker" name="appdate"  required="required" data-date-format="yyyy-mm-dd" readonly>
                         </div>
														
                         <div class="form-group">
                               <label for="tokenTime">Time</label>
                                <input  class="form-control" name="apptime" id="timepicker1" required="required" readonly>eg : 10:00 PM
                         </div>	
                         <div id="reload">													
                                                <?php 
                                                $ref = "parking/status";
                                                $ref2=$database->getReference("parking/booking")->getValue();;
                                                $status =  $database->getReference($ref)->getValue();
                                                if ($status == "0" || $ref2=="Booked"){
                                                ?>		
                            <button type="submit" name="submit" class="btn btn-o btn-primary" disabled>Book</button>
                            <b><label for="tokenTime">Sorry Parking is Full</label></b>
                            <?php }
                            else{
                              
                            ?>
                            <button type="submit" name="submit" class="btn btn-o btn-primary">Book</button>
                            <?php } ?>
                            </div>
                            <script>
                            setInterval(function(){ $("#reload").load(" #reload") }, 1000);
                            </script>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </div>
</div>


</body>
    
    
	<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> 

		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});

			$('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            startDate: '-3d'
            });
	    </script>
		  <script type="text/javascript">
            $('#timepicker1').timepicker();
         </script>
		              
</html>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
 {

    $servername="localhost";
    $username="root";
    $password="";
    $dbname="bys2";
    $conn=mysqli_connect($servername,$username,$password,$dbname);
    //CHECK CONNECTION
    if(!$conn){
        die("connection failed:" . mysqli_connect_error());
    }  
    $supermarket=$_POST['supermarket'];
    $bname=$_POST['branch'];
    $userid=$_SESSION['id'];
    $tokendate=$_POST['appdate'];
    $tokentime=$_POST['apptime'];
    $tokendatetime=  $_POST['appdate'] ." ". $_POST['apptime'];
    $userstatus=1;
    $supermarketstatus=1;
    $sql=" INSERT INTO token (supermarket,bname,userId,tokenDateTime,userStatus,supermarketStatus,qrlink,qrImg,qrUsername,qrContent)
                    VALUES ('$supermarket','$bname','$userid','$tokendatetime','$userstatus','$supermarketstatus','$qrlink','$qrimage','$qrUname','$final')";
    if (mysqli_query($conn,$sql))
      {
        echo "<script>alert('Your Parking successfully booked'); window.location='token-confirmation.php?success=$qrimage';</script>";
      }
      else
            {
              echo "<script>alert('error');</script>";
                echo"Error:" .mysqli_error($conn);
            }
        mysqli_close($conn);  
  }
?>