
<?php
session_start();
//error_reporting(0);
include('include/config.php');

?>
<?php 
  include "include/phpqrcode/qrlib.php";
  if(isset($_POST['submit']))
  {
    $qc = "Date: ".$_POST['appdate']."\n Time: ".$_POST['apptime']."\n Name: ".$_POST['vname'];
    
    $qrUname = $_POST['vname'];
    $qrImgName = "qr".rand();
    $final = $qc;
    $qrs = QRcode::png($qc,"userQr/$qrImgName.png","H","3","3");
    $qrimage = $qrImgName.".png";
    //$workDir = $_SERVER['HTTP_HOST'];
    $qrlink = "/bys/user/userQr/".$qrImgName.".png";
  }
  ?>   
<!DOCTYPE HTML>
<html>
	<head>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>User | Book Token</title>

        
		
		
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
<script>
       function gettime() {
	    var a=document.getElementById("appdate") ;
      var b= a.options[a.selectedIndex].text;
      var value= document.getElementById("apptime").value=b;
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
                              <label for="supermarket">Supermarket Name:</label>
                              <select name="supermarket" class="form-control" onChange="getbranch(this.value);" required="required">
                                  <option value="">Select Supermarket</option>
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
                               <label for="tokentDate">Day</label>
                               <select name="appdate" class="form-control" id="appdate" onChange="gettime();" required="required">
                                        <option value="">Select Day</option>
                                        <?php $date1=date("y-m-d");$date2=date("y-m-d", strtotime("+1 day"));$date3=date("y-m-d", strtotime("+2 day"));?>
                                        <option value='<?php echo ($date1);?>'>Today</option>
                                        <option value='<?php echo ($date2);?>'>Tomorrow</option>
                                        <option value='<?php echo ($date3);?>'>Day after tomorrow</option>
                                        
                                </select>
                         </div>
														
                         <div class="form-group">
                               <label for="tokenTime">Time</label>
                               <select name="apptime" class="form-control"  id="apptime" required="required">
                                  <option value="">Select Time Slot</option>
                                  <?php 
                                   $value= "<script>document.writeln(b);</script>";
                                  
                                       if($value=$date1){?>
            <?php 
        $sql2= mysqli_query($con,"select * from token where tokentime='9 Am' and tokendate='$date1'");
        $count=mysqli_num_rows($sql2);
       
        if( $count<=2){?>
                                      <option value="9 Am">9 Am</option>
        <?php }
        
        else{?>
            <option value="9 Am" disabled>9 Am <span style="color:red;">slot full!</span></option>
       <?php }
            }?>

                                </select>
                         </div>														
														
                            <button type="submit" name="submit" class="btn btn-o btn-primary">Submit</button>
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
            startDate: '0d',
            endDate: '+2d'
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
    $dbname="bys";
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
    $userstatus=1;
    $supermarketstatus=1;
   
    $sql=" INSERT INTO token (supermarket,bname,userId,tokentime,userStatus,supermarketStatus,qrlink,qrImg,qrUsername,qrContent,tokendate)
                    VALUES ('$supermarket','$bname','$userid','$tokentime','$userstatus','$supermarketstatus','$qrlink','$qrimage','$qrUname','$final','$tokendate')";
     
    if (mysqli_query($conn,$sql))
      {
        echo "<script>alert('Your token successfully booked'); window.location='datetime.php';</script>";
      }
      else
            {
              echo "<script>alert('error');</script>";
                echo"Error:" .mysqli_error($conn);
            }
        mysqli_close($conn);  
  }

     
 

?>