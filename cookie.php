<?php
session_start();
 if(isset($_POST["submit"])) {
   $con = mysqli_connect("localhost", "root", "", "pizone");
   $sql = "Select * from admin where email = '" . $_POST["email"] . "' and password = '" . ($_POST["password"]) . "'";
   $result = mysqli_query($con,$sql);
   $user = mysqli_fetch_array($result);
   if($user) {
       $_SESSION["id"] = $user["id"];
       if(isset($_POST["remember"])) {
         setcookie("email",$_POST["email"],time()+(10 * 365 * 24 * 60 * 60));
         setcookie("password",$_POST["password"],time()+(10 * 365 * 24 * 60 * 60));
                       header("Location: index.php");
          // echo'<script>window.location="index1.php"</script>';
       } else {
         echo "clear cookie.<br> click here to <a style= 'text-decoration: none; color: hotpink;' href ='login.php'>try agin</a>";
         if(isset($_COOKIE["email"])) {
           setcookie ("email",$_POST["email"],time()-(10 * 365 * 24 * 60 * 60));
         }
         if(isset($_COOKIE["password"])) {
          setcookie ("password",$_POST["password"],time()-(10 * 365 * 24 * 60 * 60));
         }
       }
   }
   else {
  echo "Password is Wrong try agin";
 }
 }



?>
