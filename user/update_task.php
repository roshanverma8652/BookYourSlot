<?php

//update_task.php

include('include/database_connection.php');
$_SESSION["user_id"] =$_SESSION['id'];

if($_POST["task_list_id"])
{
 $data = array(
  ':task_status'  => 'yes',
  ':task_list_id'  => $_POST["task_list_id"]
 );

 $query = "
 UPDATE task_list 
 SET task_status = :task_status 
 WHERE task_list_id = :task_list_id
 ";

 $statement = $connect->prepare($query);

 if($statement->execute($data))
 {
  echo 'done';
 }
}

?>

