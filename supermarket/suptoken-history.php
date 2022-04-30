<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
if(isset($_GET['cancel']))
		  {
mysqli_query($con,"update token set supermarketStatus='0' where id ='".$_GET['id']."'");
                  $_SESSION['msg']="Token canceled !!";
		  }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>S-mart | Appointment History</title>
		
	
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
                <a class="nav-link js-scroll-trigger" href="dashboard.php">Dashboard</a>
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
  
<!-- start: BASIC EXAMPLE -->
<div class="container-fluid container-fullw bg-white">
						

            <div class="row">
          <div class="col-md-12">
            
            <p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
          <?php echo htmlentities($_SESSION['msg']="");?></p>	
            <table class="table table-hover" id="sample-table-1">
              <thead>
                <tr>
                  <th class="center">#</th>
                  <th class="hidden-xs">User Name</th>
                  <th>Supermarket</th>
                  <th>Token Date / Time </th>
                  <th>Token Creation Date  </th>
                  <th>Current Status</th>
                  <th>Action</th>
                  
                </tr>
              </thead>
              <tbody>
<?php
$sql=mysqli_query($con,"select users.fullName as fullName,token.*  from token join users on users.id=token.userId where token.bname='".$_SESSION['id']."'");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>

                <tr>
                  <td class="center"><?php echo $cnt;?>.</td>
                  <td class="hidden-xs"><?php echo $row['fullName'];?></td>
                  <td><?php echo $row['supermarket'];?></td>
                  <td><?php echo $row['tokenDate'];?> / <?php echo
                   $row['tokenTime'];?>
                  </td>
                  <td><?php echo $row['postingDate'];?></td>
                  <td>
<?php if(($row['userStatus']==1) && ($row['supermarketStatus']==1))  
{
echo "Active";
}
if(($row['userStatus']==0) && ($row['supermarketStatus']==1))  
{
echo "Cancel by Patient";
}

if(($row['userStatus']==1) && ($row['supermarketStatus']==0))  
{
echo "Cancel by you";
}



                  ?></td>
                  <td >
                  <div class="visible-md visible-lg hidden-sm hidden-xs">
        <?php if(($row['userStatus']==1) && ($row['supermarketStatus']==1))  
{ ?>

                    
<a href="appointment-history.php?id=<?php echo $row['id']?>&cancel=update" onClick="return confirm('Are you sure you want to cancel this Token ?')"class="btn btn-transparent btn-xs tooltips" title="Cancel Token" tooltip-placement="top" tooltip="Remove">Cancel</a>
<?php } else {

echo "Canceled";
} ?>
                  </div>
                  </td>
                </tr>
                
                <?php 
$cnt=$cnt+1;
                 }?>
                
                
              </tbody>
            </table>
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
