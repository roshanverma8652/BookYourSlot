<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
if(isset($_POST['submit']))
{
	$supermarket=$_POST['supermarket'];
$bname=$_POST['bname'];
$address=$_POST['address'];
$contactno=$_POST['contact'];
$email=$_POST['email'];
$sql=mysqli_query($con,"Update branch set supermarket='$supermarket',branchname='$bname',address='$address',contactno='$contactno' where id='".$_SESSION['id']."'");
if($sql)
{
echo "<script>alert('Doctor Details updated Successfully');</script>";

}
}
?>
<!DOCTYPE HTML>
<html>
	<head>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Supermarket | Edit Supermarket Details</title>
        <link href='https://fonts.googleapis.com/css?family=Cinzel Decorative' rel='stylesheet'>

	<!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link href='sty.css' rel='stylesheet' type='text/css'>	
	</head>
	<body style="background-color:white; padding-top:60px; padding-bottom:60px;">
        
    <h1 class="mainTitle"></h1>
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
            <a class="nav-link js-scroll-trigger" href="suptoken-history.php">View Token </a>
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
													<h5 class="panel-title">Edit Details</h5>
												</div>
												<div class="panel-body">
									<?php $sql=mysqli_query($con,"select * from branch where supEmail='".$_SESSION['slogin']."'");
                                   while($data=mysqli_fetch_array($sql))
                                       {
                                    ?>
                                     <h4><?php echo htmlentities($data['branchname']);?>'s Profile</h4>
                                     <p><b>Profile Reg. Date: </b><?php echo htmlentities($data['creationDate']);?></p>
                                    <?php if($data['updationDate']){?>
                                      <p><b>Profile Last Updation Date: </b><?php echo htmlentities($data['updationDate']);?></p>
                                       <?php } ?>
                                       <hr />
													
									   <form role="form" name="addsup" method="post" onSubmit="return valid();">
														<div class="form-group">
															<label for="Supermarket">Supermarket</label>
							                                   <select name="supermarket" class="form-control" required="required">
					                                                <option value="<?php echo htmlentities($data['supermarket']);?>">
				                                                     	<?php echo htmlentities($data['supermarket']);?></option>
                                                                      <?php $ret=mysqli_query($con,"select * from supermarket");
                                                                      while($row=mysqli_fetch_array($ret))
                                                                        {
                                                                    ?>
															        	<option value="<?php echo htmlentities($row['supermarket']);?>">
																	        <?php echo htmlentities($row['supermarket']);?>
																      </option>
																      <?php } ?>
																
															  </select>
														</div>

                                                         <div class="form-group">
															<label for="branchname">
																 Branch Name
															</label>
	<input type="text" name="bname" class="form-control" value="<?php echo htmlentities($data['branchname']);?>" >
														</div>


<div class="form-group">
															<label for="address">
																  Address
															</label>
					<textarea name="address" class="form-control"><?php echo htmlentities($data['address']);?></textarea>
														</div>
	
<div class="form-group">
									<label for="contact">
																  Contact no
															</label>
					<input type="text" name="contact" class="form-control" required="required"  value="<?php echo htmlentities($data['contactno']);?>">
														</div>

<div class="form-group">
									<label for="email">
																  Email
															</label>
					<input type="email" name="email" class="form-control"  readonly="readonly"  value="<?php echo htmlentities($data['supEmail']);?>">
														</div>



														
														<?php } ?>
														
														
														<button type="submit" name="submit" class="btn btn-o btn-primary">
															Update
														</button>
													</form>
												</div>
											</div>
										</div>
											
											</div>
										</div>
									
								</div>
							
						<!-- end: BASIC EXAMPLE -->
          
        
	</body>
	<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</html>

