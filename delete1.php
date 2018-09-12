<?php
$con= mysqli_connect("localhost","root","","pizone");

if(isset($_POST['id']))
{
  $id=$_POST['id'];
  $query = mysqli_query($con,"DELETE FROM `singup` WHERE id='$id'");
      $result = mysqli_query($con, $query);
     echo "Deleted successfully.";
}

?>
