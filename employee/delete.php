<?php
$con= mysqli_connect("localhost","root","","pizone");

if(isset($_GET['id']))
{
  $id=$_GET['id'];
  $query = mysqli_query($con,"DELETE FROM `leaves` WHERE id='$id'");
      $result = mysqli_query($con, $query);
     echo "Deleted successfully.";
     ?>
     <script>
       window.location.href="detail.php";
   </script>
   <?php
}

?>
