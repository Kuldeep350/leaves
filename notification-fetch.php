<?php
//include('connect.php');
if(isset($_POST['view'])){

$con = mysqli_connect("localhost", "root", "", "pizone");

if($_POST["view"] != '')
{
    $update_query = mysqli_query($con,"UPDATE leaves SET comment_status = 1 WHERE comment_status=0");
    //$update_query = mysqli_query($con,"UPDATE `leaves` SET `comment_status`= 1 WHERE `comment_status`=0") or die(mysqli_error($con));
    mysqli_query($con, $update_query);
}
$query = "SELECT * FROM leaves ORDER BY id ";
$result = mysqli_query($con, $query);
$output = '';
if(mysqli_num_rows($result) > 0)
{
 while($row = mysqli_fetch_array($result))
 {
   $output .= '
   <li>
   <a href="#">
   <strong>'.$row["name"].'</strong><br />
   <small><em>'.$row["mail"].'</em></small>
   </a>
   </li>
   ';
 }
}
else{
     $output .= '
     <li><a href="#" class="text-bold text-italic">No Noti Found</a></li>';
}
$status_query = "SELECT * FROM leaves WHERE comment_status=0";
$result_query = mysqli_query($con, $status_query);
$count = mysqli_num_rows($result_query);
$data = array(
    'notification' => $output,
    'unseen_notification'  => $count
);
echo json_encode($data);
}
?>
