<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
 {

    $servername="localhost";
    $username="root";
    $password="";
    $dbname="PSA";
    $conn=mysqli_connect($servername,$username,$password,$dbname);
    //CHECK CONNECTION
    if(!$conn){
        die("connection failed:" . mysqli_connect_error());
    }  
    $parking=$_POST['parking'];
    $bname=$_POST['branch'];
    $userid=$_SESSION['id'];
    $tokendate=$_POST['appdate'];
    $tokentime=$_POST['apptime'];
    $tokendatetime=  $_POST['appdate'] ." ". $_POST['apptime'];
    $userstatus=1;
    $parkingstatus=1;
    $sql=" INSERT INTO token (parking,bname,userId,parkingDateTime,userStatus,parkingStatus,qrlink,qrImg,qrUsername,qrContent)
                    VALUES ('$parking','$bname','$userid','$tokendatetime','$userstatus','$parkingstatus','$qrlink','$qrimage','$qrUname','$final')";
    if (mysqli_query($conn,$sql))
      {
        echo "<script>alert('Your token successfully booked'); window.location='token-confirmation.php?success=$qrimage';</script>";
      }
      else
            {
              echo "<script>alert('error');</script>";
                echo"Error:" .mysqli_error($conn);
            }
        mysqli_close($conn);  
  }
?>