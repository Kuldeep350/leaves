<?php
$con = mysqli_connect("localhost","root","","pizone");
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 
//print_r($_POST);
$permission="Permission Denied";
foreach($_POST as $value)
{
	foreach($value as $val)
	{
	$val;
	$permission;
	$sql=mysqli_query($con,"update leaves set `permission`='$permission' WHERE id='$val'");
	
}
}
//echo $id=$_POST['permissionGranted'];


?>