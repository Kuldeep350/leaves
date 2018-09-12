<?php
$con = mysqli_connect("localhost","root","","pizone");
if(isset($_POST['id']))
{
  $id=$_POST['id'];
  $query = mysqli_query($con,"DELETE FROM `image` WHERE id='$id'");
  $result = mysqli_query($con, $query);
     echo "Deleted successfully.";
     ?>
     <script>
       window.location.href="detail.php";
   </script>
   <?php
}
?>
