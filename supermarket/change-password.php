<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );
if(isset($_POST['submit']))
{
$sql=mysqli_query($con,"SELECT password FROM  branch where password='".md5($_POST['cpass'])."' && id='".$_SESSION['id']."'");
$num=mysqli_fetch_array($sql);
if($num>0)
{
 $con=mysqli_query($con,"update branch set password='".md5($_POST['npass'])."', updationDate='$currentTime' where id='".$_SESSION['id']."'");
$_SESSION['msg1']="Password Changed Successfully !!";
}
else
{
$_SESSION['msg1']="Old Password not match !!";
}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Branch | change Password</title>
		
	
		<!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
       <link href='sty.css' rel='stylesheet' type='text/css'>
       <link href='https://fonts.googleapis.com/css?family=Cinzel Decorative' rel='stylesheet'>

       <script type="text/javascript">
function valid()
{
if(document.chngpwd.cpass.value=="")
{
alert("Current Password Filed is Empty !!");
document.chngpwd.cpass.focus();
return false;
}
else if(document.chngpwd.npass.value=="")
{
alert("New Password Filed is Empty !!");
document.chngpwd.npass.focus();
return false;
}
else if(document.chngpwd.cfpass.value=="")
{
alert("Confirm Password Filed is Empty !!");
document.chngpwd.cfpass.focus();
return false;
}
else if(document.chngpwd.npass.value!= document.chngpwd.cfpass.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.chngpwd.cfpass.focus();
return false;
}
return true;
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
                <a class="nav-link js-scroll-trigger" href="dashboard.php">Dashboard</a>
              </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href=""></a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="suptoken-history.php">View Token</a>
          </li>
         </ul>
          <div class="dropdown">
             <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                 <img src="https://img.icons8.com/ios-filled/20/000000/gender-neutral-user.png"/>
                     
				 <?php $query=mysqli_query($con,"select branchname from branch where id='".$_SESSION['id']."'");
                           while($row=mysqli_fetch_array($query))
                           {
	                            echo $row['branchname'];
                           }
	          					  	?>
             </button>
  
             <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" >
                    <a class="dropdown-item" href="edit-profile.php">My profile</a>
                    <a class="dropdown-item" href="change-password.php">Change Password</a>
                    <a class="dropdown-item" href="logout.php">Logout</a>
             </div>
         </div>
      </div>
   </div>
      
  </nav>
  
<!-- start: BASIC EXAMPLE -->
<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									
									<div class="row margin-top-30">
										<div class="col-lg-8 col-md-12">
											<div class="panel panel-white">
												<div class="panel-heading">
													<h5 class="panel-title">Change Password</h5>
												</div>
												<div class="panel-body">
								<p style="color:red;"><?php echo htmlentities($_SESSION['msg1']);?>
								<?php echo htmlentities($_SESSION['msg1']="");?></p>	
													<form role="form" name="chngpwd" method="post" onSubmit="return valid();">
														<div class="form-group">
															<label for="exampleInputEmail1">
																Current Password
															</label>
							<input type="password" name="cpass" class="form-control"  placeholder="Enter Current Password">
														</div>
														<div class="form-group">
															<label for="exampleInputPassword1">
																New Password
															</label>
					<input type="password" name="npass" class="form-control"  placeholder="New Password">
														</div>
														
<div class="form-group">
															<label for="exampleInputPassword1">
																Confirm Password
															</label>
									<input type="password" name="cfpass" class="form-control"  placeholder="Confirm Password">
														</div>
														
														
														
														<button type="submit" name="submit" class="btn btn-o btn-primary">
															Submit
														</button>
													</form>
												</div>
											</div>
										</div>
											
											</div>
										</div>
									
								</div>
							</div>
						
						<!-- end: BASIC EXAMPLE -->
			
						
      	<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
