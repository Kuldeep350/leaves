<?php
session_start();
error_reporting(0);
$con = mysqli_connect("localhost","root","","pizone");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
if(isset($_POST['submit']))
        {
		echo $name = $_POST['name'];
		 $_SESSION['name']="$name";
	    $email = $_POST['email'];
		$_SESSION['email']="$email";
		$password = $_POST['password'];
		$_SESSION['password']="$password";
	   $con_password = $_POST['cpassword'];
	   $_SESSION['cpassword']="$con_password";
mysqli_query($con,"INSERT INTO `singup`(`name`, `email`, `password`, `cpassword`) VALUES ('$name','$email','$password','$con_password')");
	 }
mysqli_close($con);
$_SESSION['name'];
  $_SESSION['email'];
  $_SESSION['password'];
 $_SESSION['cpassword'];
 session_unset(); 
 session_destroy();
 ?>
<!DOCTYPE html>

<html>

<head>

<title>Sign Up Form Using Bootstrap with jQuery Validation</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="assets1/signup-form.css" type="text/css" />
<style>
   body{
	
	background-color:#337ab7;
}

.wrapper {
	
	border-radius:10px;
	background:#ffffff;
	border:10px solid #085ca2;
	margin:4% auto;
	max-width:500px;
	box-shadow:0 1px 5px rgba(0, 0, 0, 0.1)
}
.header_style .title_style{
	color:#085ca2;
}
.footer_style{
	border-radius:10px;
}
   </style>
</head>

<body>

	<div class="container">

    <div class="wrapper">
    
         <!-- form start -->
         <form method="post" role="form" id="register-form" autocomplete="off" >
         
         <div class="header_style">
         	<h3 class="title_style"><i class="fa fa-user"></i> Sign Up</h3>
                      
         <div class="pull-right">
             <h3 class="title_style" "><span class="glyphicon glyphicon-pencil"></span></h3>
         </div>
                      
         </div>
                  
         <div class="body_style">
         
         	  <div class="alert alert-info" id="message" style="display:none;">
              Successfully Registered!!!
              </div>
                      
         	  <div class="form-group">
                   <div class="input-group">
                   <div class="input-group-addon" style="border:1px solid #085ca2;"><span class="glyphicon glyphicon-user"></span></div>
                   <input name="name" type="text" class="form-control" autofocus="autofocus" placeholder="User Name ....." style="border:1px solid #085ca2;">
                   </div>
                   <span class="help-block" id="error"></span>
              </div>
                        
              <div class="form-group">
                   <div class="input-group">
                   <div class="input-group-addon" style="border:1px solid #085ca2;"><span class="glyphicon glyphicon-envelope"></span></div>
                   <input name="email" type="text" class="form-control" placeholder="Email ....." style="border:1px solid #085ca2;">
                   </div> 
                   <span class="help-block" id="error"></span>                     
              </div>
                        
              <div class="row">
                        
                   <div class="form-group col-lg-6">
                        <div class="input-group">
                        <div class="input-group-addon" style="border:1px solid #085ca2;"><span class="glyphicon glyphicon-lock"></span></div>
                        <input name="password" id="password" type="password" class="form-control" placeholder="Password ....." style="border:1px solid #085ca2;">
                        </div>  
                        <span class="help-block" id="error"></span>                    
                   </div>
                            
                   <div class="form-group col-lg-6">
                        <div class="input-group">
                        <div class="input-group-addon" style="border:1px solid #085ca2;"><span class="glyphicon glyphicon-lock"></span></div>
                        <input name="cpassword" type="password" class="form-control" placeholder="Re-type Password ....." style="border:1px solid #085ca2;">
                        </div>  
                        <span class="help-block" id="error"></span>                    
                   </div>
                            
             </div>
                        
                        
            </div>
            
            <div class="footer_style">
                 <button type="submit" name="submit" class="btn btn-primary" ">
                 <span class="glyphicon glyphicon-ok"></span> Sign Up
                 </button>
				
            </div>


            </form>
            
           </div>

	</div>
    
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="assets1/jquery-1.11.2.min.js"></script>
    <script src="assets1/jquery.validate.min.js"></script>
    <script src="assets1/register.js"></script>

</body>


</html>
