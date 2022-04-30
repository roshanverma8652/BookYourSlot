<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Admin | Dashboard</title>

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
                            <a href="manage-btanch.php">Manage Branches</a>
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

            <div class="container">
                <div class="row" style=" padding: 50px 0; " >
                   <div class="col-12 col-md-6">
                       <div class="card mb-3" style="max-width: 340px;background-color: rgba(44, 43, 43, 0.700);">
                            <div class="row no-gutters">
                                  <div class="col-md-4">
                                    <img src="https://img.icons8.com/ultraviolet/100/000000/user.png"/>
                                  </div>
                                 <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title" style="color: white;">Users </h5>
                                        <h7><?php $result = mysqli_query($con,"SELECT * FROM users ");
                                         $num_rows = mysqli_num_rows($result);  {
                                                  ?>
                                               Total Users :<?php echo htmlentities($num_rows);  } ?> </h7>
                                        <p class="card-text"></p>
                                       <a href="manage-users.php" class="btn btn-primary">Manage</a>
                                            
                                    </div>
                               </div>
                           </div>
                       </div>
                  </div>
              
                  <div class="col-12 col-md-6">
                      <div class="card mb-3" style="max-width: 340px;background-color:rgba(44, 43, 43, 0.700);">
                           <div class="row no-gutters">
                                   <div class="col-md-4">
                                    <img src="https://img.icons8.com/officel/100/000000/worldwide-location.png"/>
                                   </div>
                               <div class="col-md-8">
                                   <div class="card-body">
                                       <h5 class="card-title" style="color: white;">Branches</h5>
                                       <h7><?php $result1 = mysqli_query($con,"SELECT * FROM branch ");
                                           $num_rows1 = mysqli_num_rows($result1);
                                              {?>
											Total Branches :<?php echo htmlentities($num_rows1);  } ?> </h7>
                                       <p class="card-text"></p>
                                      <a href="manage-branch.php" class="btn btn-primary">Manage</a>
                                  </div>
                              </div>
                          </div>
                      </div>
                 </div>
    
                 <div class="col-12 col-md-6">
                     <div class="card mb-3" style="max-width: 340px;background-color:rgba(44, 43, 43, 0.700);">
                        <div class="row no-gutters">
                              <div class="col-md-4">
                                <img src="https://img.icons8.com/color/100/000000/planner.png"/>
                              </div>
                             <div class="col-md-8">
                                 <div class="card-body">
                                     <h5 class="card-title" style="color: white;"> Tokens</h5>
                                     <h7><?php $result2 = mysqli_query($con,"SELECT * FROM token ");
                                           $num_rows2 = mysqli_num_rows($result2);
                                              {?>
											Total Tokens :<?php echo htmlentities($num_rows2);  } ?> </h7>
                                     <p class="card-text"></p>
                                      <a href="token-history.php" class="btn btn-primary">View</a>
                                   </div>
                               </div>
                           </div>
                       </div>
                  </div>
            
                  <div class="col-12 col-md-6">
                     <div class="card mb-3" style="max-width: 340px;background-color:rgba(44, 43, 43, 0.700);">
                         <div class="row no-gutters">
                              <div class="col-md-4">
                                <img src="https://img.icons8.com/plasticine/100/000000/envelope-number.png"/>
                               </div>
                             <div class="col-md-8">
                                 <div class="card-body">
                                      <h5 class="card-title" style="color: white;">New Queries</h5>
                                      <a href="unread-queries.php">
												<?php 
                                               $sql= mysqli_query($con,"SELECT * FROM tblcontactus where  IsRead is null");
                                                $num_rows3 = mysqli_num_rows($sql);
                                                ?>
											     Total New Queries :<?php echo htmlentities($num_rows3);   ?>	
												</a>
                                      <p class="card-text"></p>
                                      <a href="unread-queries.php" class="btn btn-primary">View</a>
                                  </div>
                              </div>
                          </div>
                      </div>
                   </div>
               </div>
          </div>

            
        
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