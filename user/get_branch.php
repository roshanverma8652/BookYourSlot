<?php
include('include/config.php');
if(!empty($_POST["id"])) 
{

 $sql=mysqli_query($con,"select branchname,id from branch where supermarket='".$_POST['id']."'");?>
 <option selected="selected">Select Branch </option>
 <?php
 while($row=mysqli_fetch_array($sql))
 	{?>
  <option value="<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['branchname']); ?></option>
  <?php
}
}

?>

