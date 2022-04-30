


<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
if(isset($_POST['submit']))
{
	$fname=$_POST['fname'];
$address=$_POST['address'];
$city=$_POST['city'];
$gender=$_POST['gender'];

$sql=mysqli_query($con,"Update users set fullName='$fname',address='$address',city='$city',gender='$gender' where id='".$_SESSION['id']."'");
if($sql)
{
$msg="Your Profile updated Successfully";


}

}
?>
<!DOCTYPE HTML>
<html>
	<head>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>User | Edit Profile</title>
        <link href='https://fonts.googleapis.com/css?family=Cinzel Decorative' rel='stylesheet'>

	<!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link href='sty.css' rel='stylesheet' type='text/css'>	
	</head>
	<body style="background-color:white;">
        
    <h1 class="mainTitle">User | Edit Profile</h1>
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
                         <h5 style="color: green; font-size:18px; padding-top:10px ">
                         <?php if($msg) { echo htmlentities($msg);}?> </h5>
	<div class="row margin-top-30">
	   <div class="col-lg-8 col-md-12">
		  <div class="panel panel-white">
		      <div class="panel-body">
			     <?php 
                      $sql=mysqli_query($con,"select * from users where id='".$_SESSION['id']."'");
                        while($data=mysqli_fetch_array($sql))
                           {
                   ?>
                      <h4><?php echo htmlentities($data['fullName']);?>'s Profile</h4>
                       <p><b>Profile Reg. Date: </b><?php echo htmlentities($data['regDate']);?></p>
                        <?php if($data['updationDate']){?>
                          <p><b>Profile Last Updation Date: </b><?php echo htmlentities($data['updationDate']);?></p>
                 <?php } ?>
																						
                    <form role="form" name="edit" method="post">
	                      <div class="form-group">
	                           <label for="fname"> User Name</label>
	                              <input type="text" name="fname" class="form-control" value="<?php echo htmlentities($data['fullName']);?>" >
	                     </div>
                         <div class="form-group">
                             <label for="address">Address</label>
                                 <textarea name="address" class="form-control"><?php echo htmlentities($data['address']);?></textarea>
	                     </div>
                         <div class="form-group">
	                             <label for="city">City</label>
                                 <input type="text" name="city" class="form-control" required="required"  value="<?php echo htmlentities($data['city']);?>" >
	                     </div>
	
                          <div class="form-group">
                               <label for="gender">Gender</label>
                             <select name="gender" class="form-control" required="required" >
                                  <option value="<?php echo htmlentities($data['gender']);?>"><?php echo htmlentities($data['gender']);?></option>
                                   <option value="male">Male</option>	
                                   <option value="female">Female</option>	
                                    <option value="other">Other</option>	
                              </select>
                         </div>

                         <div class="form-group">
                            <label for="fess">User Email</label>
                              <input type="email" name="uemail" class="form-control"  readonly="readonly"  value="<?php echo htmlentities($data['email']);?>">
                                <a href=""></a></div>
                                <button type="submit" name="submit" class="btn btn-o btn-primary">Update</button>
                     </form>
                  <?php } ?>
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

