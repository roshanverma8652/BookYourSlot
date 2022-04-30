<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

?>
<!DOCTYPE html>
<html lang="en">
	<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>User | Appointment History</title>
		
	
		<!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
       <link href='sty.css' rel='stylesheet' type='text/css'>
       <link href='https://fonts.googleapis.com/css?family=Cinzel Decorative' rel='stylesheet'>

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
  <style>
.center {
  margin: auto;
  width: 100%;
  //border: 3px solid #73AD21;
  padding: 10px;
  text-align:center;
  //background-color:lightblue;
}
</style>
  <div class="center">
  <img src="userQr/<?php echo $_GET['success']; ?>" alt="QR">
  <h1>Thankyou!</h1>
  <h2>Your Parking has been successfully booked.</h2>
  <!-- <p>Please visit the market on your selected slot</p> -->
  <?php echo '<a class="btn btn-primary" href="userQr/'.$_GET['success'].'" download>Download QR</a>';?>
  
</div>

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
