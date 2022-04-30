<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();


if(isset($_GET['del']))
		  {
		          mysqli_query($con,"delete from doctors where id = '".$_GET['id']."'");
                  $_SESSION['msg']="data deleted !!";
		  }
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Admin | Manage Unread Queries</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style3.css">
    
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

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
                        <h5 class="over-title margin-bottom-15">Manage <span class="text-bold">Unread Queries</span></h5>
                        <table class="table table-hover" id="sample-table-1">
                            <thead>
                                <tr>
                                    <th class="center">#</th>
                                    <th>Name</th>
                                    <th class="hidden-xs">Email</th>
                                    <th>Contact No. </th>
                                    <th>Message </th>
                                    <th>Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
<?php
$sql=mysqli_query($con,"select * from tblcontactus where IsRead is null");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>

                                <tr>
                                    <td class="center"><?php echo $cnt;?>.</td>
                                    <td class="hidden-xs"><?php echo $row['fullname'];?></td>
                                    <td><?php echo $row['email'];?></td>
                                    <td><?php echo $row['contactno'];?></td>
                                    <td><?php echo $row['message'];?></td>
                                    
                                    <td >
                                    <div class="visible-md visible-lg hidden-sm hidden-xs">
                                  <a href="query-details.php?id=<?php echo $row['id'];?>" class="btn btn-transparent btn-lg" title="View Details"><i class="fa fa-file"></i></a>
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