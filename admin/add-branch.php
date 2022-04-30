<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

if(isset($_POST['submit']))
{	$supermarket=$_POST['supermarket'];
$branchname=$_POST['branchname'];
$baddress=$_POST['baddress'];
$contactno=$_POST['contactno'];
$email=$_POST['email'];
$password=md5($_POST['password']);
$sql=mysqli_query($con,"insert into branch(supermarket,branchname,address,contactno,supEmail,password) values('$supermarket','$branchname','$baddress','$contactno','$email','$password')");
if($sql)
{
echo "<script>alert('Branch info added Successfully');</script>";
echo "<script>window.location.href ='manage-branch.php'</script>";

}
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Users | Edit Supermarkets</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style3.css">
    
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    
    <script type="text/javascript">
function valid()
{
 if(document.addbranch.password.value!= document.addbranch.cpassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.addbranch.cpassword.focus();
return false;
}
return true;
}
</script>


<script>
function checkemailAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'email='+$("#email").val(),
type: "POST",
success:function(data){
$("#email-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>

</head>

<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar" >
            <div id="dismiss">
                <i class="fas fa-arrow-left"></i>
            </div>

            <div class="sidebar-header" style="padding-top: 40px;">
                <h3>Book Your Slot</h3>
            </div>

            <ul class="list-unstyled components">
                <p></p>
                <li>
                    <a href="dashboard.php">Dashboard</a>
                </li>
                <li>
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Users</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="manage-users.php">Manage Users</a>
                        </li>
                    </ul>
                </li>
                
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">S-mart</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="supermarket.php">Add Supermarkets</a>
                        </li>
                        <li>
                            <a href="add-branch.php">Add Branches</a>
                        </li>
                        <li>
                            <a href="manage-branch.php">Manage Branches</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Contact Queries</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu2">
                        <li>
                            <a href="unread-queries.php">Unread Queries</a>
                        </li>
                        <li>
                            <a href="read-query.php">Read Queries</a>
                        </li>
                    </ul>
                </li>
                
                <li>
                    <a href="token-history.php">Token History</a>
                </li>
            </ul>

        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar  navbar-light " style="background-color: #7386D5; ">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info" style="background-color: #c82333; ">
                        <i class="fas fa-align-left"></i>
                        <span></span>
                    </button>
                    <span class="navbar-brand mb-0 h1 ">BYS</span>
                    <div class="dropdown " style="margin-right:40px">
                        <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  >
                           <img src="https://img.icons8.com/ios-filled/20/000000/gender-neutral-user.png"/> <span style="padding-right:20px"> Admin </span>   
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="padding-right:50px">
                          <a class="dropdown-item" href="change-password.php">Change Password</a>
                         <a class="dropdown-item" href="logout.php">Logout</a>
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
													<h5 class="panel-title">Add Branch</h5>
												</div>
												<div class="panel-body">
									
													<form role="form" name="addbranch" method="post" onSubmit="return valid();">
														<div class="form-group">
															<label for="Supermarket">
																Supermarket
															</label>
							<select name="supermarket" class="form-control" required="true">
																<option value="">Select Supermarket</option>
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
					<input type="text" name="branchname" class="form-control"  placeholder="Enter Branch Name" required="true">
														</div>


<div class="form-group">
															<label for="address">
																 Branch Address
															</label>
					<textarea name="baddress" class="form-control"  placeholder="Enter Branch Address" required="true"></textarea>
														</div>
	
<div class="form-group">
									<label for="contactno">
																Branch Contact no
															</label>
					<input type="text" name="contactno" class="form-control"  placeholder="Enter Branch Contact no" required="true">
														</div>

<div class="form-group">
									<label for="Email">
																 Branch Email
															</label>
<input type="email" id="email" name="email" class="form-control"  placeholder="Enter Branch Email id" required="true" onSubmit="checkemailAvailability()">
<span id="email-availability-status"></span>
</div>



														
														<div class="form-group">
															<label for="exampleInputPassword1">
																 Password
															</label>
					<input type="password" name="password" class="form-control"  placeholder="New Password" required="required">
														</div>
														
<div class="form-group">
															<label for="exampleInputPassword2">
																Confirm Password
															</label>
									<input type="password" name="cpassword" class="form-control"  placeholder="Confirm Password" required="required">
														</div>
														
														
														
														<button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">
															Submit
														</button>
													</form>
												</div>
											</div>
										</div>
											
											</div>
										</div>
									<div class="col-lg-12 col-md-12">
											<div class="panel panel-white">
												
												
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- end: BASIC EXAMPLE -->
            
        
        </div>
    </div>

    <div class="overlay"></div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#dismiss, .overlay').on('click', function () {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').addClass('active');
                $('.overlay').addClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>
</body>

</html>