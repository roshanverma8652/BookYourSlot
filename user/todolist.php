<?php
include('include/checklogin.php');
include('include/config.php');
include('include/database_connection.php');
$_SESSION["user_id"] =$_SESSION['id'];
$query = "
 SELECT * FROM task_list 
 WHERE user_id = '".$_SESSION["user_id"]."' 
 ORDER BY task_list_id DESC
";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

?>

<!DOCTYPE html>
<html>
 <head>
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>To-Do List</title>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href='https://fonts.googleapis.com/css?family=Cinzel Decorative' rel='stylesheet'>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link href='sty.css' rel='stylesheet' type='text/css'>	
  <style>
   body
   {
    font-family: 'Comic Sans MS';
   }

   .list-group-item
   {
    font-size: 26px;
   }
  </style>
 </head>
 <body>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
     <a class="navbar-brand js-scroll-trigger" href="#page-top">Book Your Slot</a>
     <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
       <i class="fas fa-bars"><img src="https://img.icons8.com/android/24/000000/menu.png"/></i>
     </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto" style="font-size:15px;">
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="userdashboard.php">Dashbaord</a>
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
  <br />
  <br />
  <br />
  <br />
  <div class="container">
   <br />
   <div class="panel panel-default">
    <div class="panel-heading">
     <div class="row">
      <div class="col-md-9">
       <h3 class="panel-title">Shopping List</h3>
      </div>
      <div class="col-md-3">
       
      </div>
     </div>
    </div>
      <div class="panel-body">
       <form method="post" id="to_do_form">
        <span id="message"></span>
        <div class="input-group">
         <input  type="text" name="task_name" id="task_name" class="form-control input-lg" autocomplete="off" placeholder="Add Items..." />
         &nbsp;
          <button type="submit" name="submit" id="submit" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-plus"></span></button>
        </div>
       </form>
       <br />
       <div class="list-group">
       <?php
       foreach($result as $row)
       {
        $style = '';
        if($row["task_status"] == 'yes')
        {
         $style = 'text-decoration: line-through';
        }
        echo '<a href="#" style="'.$style.'" class="list-group-item" id="list-group-item-'.$row["task_list_id"].'" data-id="'.$row["task_list_id"].'">'.$row["task_details"].' <span class="badge" data-id="'.$row["task_list_id"].'">X</span></a>';
       }
       ?>
       </div>
      </div>
     </div>
  </div>
 </body>
</html>

<script>
 
 $(document).ready(function(){
  
  $(document).on('submit', '#to_do_form', function(event){
   event.preventDefault();

   if($('#task_name').val() == '')
   {
    $('#message').html('<div class="alert alert-danger">Enter Details</div>');
    return false;
   }
   else
   {
    $('#submit').attr('disabled', 'disabled');
    $.ajax({
     url:"add_task.php",
     method:"POST",
     data:$(this).serialize(),
     success:function(data)
     {
      $('#submit').attr('disabled', false);
      $('#to_do_form')[0].reset();
      $('.list-group').prepend(data);
     }
    })
   }
  });

  $(document).on('click', '.list-group-item', function(){
   var task_list_id = $(this).data('id');
   $.ajax({
    url:"update_task.php",
    method:"POST",
    data:{task_list_id:task_list_id},
    success:function(data)
    {
     $('#list-group-item-'+task_list_id).css('text-decoration', 'line-through');
    }
   })
  });

  $(document).on('click', '.badge', function(){
   var task_list_id = $(this).data('id');
   $.ajax({
    url:"delete_task.php",
    method:"POST",
    data:{task_list_id:task_list_id},
    success:function(data)
    {
     $('#list-group-item-'+task_list_id).fadeOut('slow');
    }
   })
  });

 });
</script>