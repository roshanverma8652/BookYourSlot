<?php
include_once('user/include/config.php');
if(isset($_POST['submit']))
{
$name=$_POST['name'];
$email=$_POST['emailid'];
$mobileno=$_POST['mobileno'];
$dscrption=$_POST['description'];
$query=mysqli_query($con,"insert into tblcontactus(fullname,email,contactno,message) value('$name','$email','$mobileno','$dscrption')");
echo "<script>alert('Your information succesfully submitted');</script>";
echo "<script>window.location.href ='contact.php'</script>";

}


?>
<html>
	<head>
    <title>Contact us</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href='sty.css' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
	</head>
	<body> 
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    
      <a class="navbar-brand js-scroll-trigger" href="#page-top"><img alt="" height="" src="" width="" />Book Your Slot</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
       
        <i class="fas fa-bars"><img src="https://img.icons8.com/android/24/000000/menu.png"/></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="index.html">Home</a>
              </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="contact.php">Contact</a>
          </li> 
        </ul>
      </div>
  </nav>
<br>
<br>
<br>
<br>
 <form name="contactus" method="post">
    <div class="form-group col-md-6">
      <label for="name">Name:</label>
      <input type="text" class="form-control" name="name" placeholder="Please Enter your Name" required="true">
    </div>
    <div class="form-group col-md-6">
      <label for="emailid">Email Id:</label>
      <input type="email" class="form-control" name="emailid" placeholder="Please Enter your Email-ID" required="true">
    </div>
  <div class="form-group col-md-6">
    <label for="mobileno">Mobile No:</label>
    <input type="text" class="form-control" name="mobileno" placeholder="Please Enter your Mobile No" required="true">
  </div>
  <div class="form-group col-md-6">
      <label for="description">Description/ Suggestion:</label>
      <textarea class="form-control" rows="5" name="description" placeholder="Please Enter your Suggestion/Feedback" required="true"></textarea>
    </div>
	<div class="form-group col-md-6">
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </div>
  <br>
</form>

</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script> 

</html>