<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

?>
<!DOCTYPE HTML>
<html>
	<head>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Doctor  | Dashboard</title>
        <link href='https://fonts.googleapis.com/css?family=Cinzel Decorative' rel='stylesheet'>

	<!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link href='sty.css' rel='stylesheet' type='text/css'>	
	</head>
	<body style="background-color:#aaafb5;">
        
       
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
                <a class="nav-link js-scroll-trigger" href="dashboard.php">Dashbaord</a>
              </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href=""></a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="suptoken-history.php"> View Token</a>
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
  
 

          
          

          <div class="container">
            <div class="row" style=" padding: 250px 0 ; " >
             <div class="col-12 col-md-6" >
                 <div class="card mb-3" style="max-width: 340px; background-color: rgba(44, 43, 43, 0.700);">
                      <div class="row no-gutters">
                              <div class="col-md-4">
                              <img src="https://img.icons8.com/color/100/000000/admin-settings-male.png"/>
                              </div>
                           <div class="col-md-8">
                              <div class="card-body">
                                    <h5 class="card-title" style="color: white;">My Profile</h5>
                                    <p class="card-text"></p>
                                   <a href="edit-profile.php" class="btn btn-primary">Update profile</a>
                              </div>
                         </div>
                     </div>
                 </div>
            </div>
          
            <div class="col-12 col-md-6">
                <div class="card mb-3" style="max-width: 340px;  background-color:rgba(44, 43, 43, 0.700);">
                     <div class="row no-gutters">
                             <div class="col-md-4">
                             <img src="https://img.icons8.com/color/100/000000/property-time.png"/>
                             </div>
                          <div class="col-md-8">
                             <div class="card-body">
                                   <h5 class="card-title" style="color: white;">Tokens</h5>
                                   <p class="card-text"></p>
                                  <a href="suptoken-history.php" class="btn btn-primary">Token</a>
                             </div>
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
</html>

