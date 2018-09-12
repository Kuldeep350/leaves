
<?php
//session_start();
// error_reporting(0);
// $con = mysqli_connect("localhost","root","","pizone");
// if (mysqli_connect_errno())
// {
  // echo "Failed to connect to MySQL: " . mysqli_connect_error();
  // }
  // else
// {
   // echo "Connected.";
// }
// if(isset($_POST['submit'])){
  // $email=($_POST['name']);
  // $password=($_POST['password']);
 //Checking Login Detail
 // $result=mysqli_query($con,"SELECT * FROM singup WHERE name='$email' AND password='$password'");

  // $count=mysqli_num_rows($result);

  // $row=mysqli_fetch_assoc($result);

  // if ($count==1) {
    // echo "Success! $count";
	// header('Location:leaves.php');
// } else {
    // echo "Unsuccessful! $count";
	// header('Location:index.php');
// }
// }
// mysqli_close($con);
//echo $_SESSION['name'];
 //echo $_SESSION['password'];
 //session_unset();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap Simple Login Form</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
          .login-form {
                  width: 340px;
              margin: 50px auto;
          }
      .login-form form {
              margin-bottom: 15px;
          background: #f7f7f7;
          box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
          padding: 30px;
      }
      .login-form h2 {
          margin: 0 0 15px;
      }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {
        font-size: 15px;
        font-weight: bold;
    }
    .error
{
color:red;
font-family:verdana, Helvetica;
}
</style>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js'></script>
</head>
<body>
<div class="login-form">
  <form action="cookies.php" method="post" id="myform">
      <h2 class="text-center">Log in</h2>
      <div class="form-group" for="email">
        <input type="text" name="email" value="<?php  if (isset($_COOKIE['email'])){ echo $_COOKIE['email']; } else{echo '';} ?>"id="email"class="form-control" placeholder="Useremail" >
    </div>
    <div class="form-group" for="password">
        <input type="password" name="password" value="<?php  if (isset($_COOKIE['password'])){ echo $_COOKIE['password']; } else{echo '';} ?>" id="password"class="form-control" placeholder="Password" >
    </div>
    <div class="form-group">
        <input type="submit"name="submit" value="Login"class="btn btn-primary btn-block">
    </div>
    <div class="clearfix">

        <label class="pull-left checkbox-inline"><input type="checkbox" name="remember" <?php if(isset($_COOKIE["email"])) { ?> checked <?php } ?>> Remember me</label>
          <a href="signup.php" class="pull-right">create account?</a><br>
        <a href="forgat.php" class="pull-right">Forgot Password?</a>


    </div>
  </form>
</div>
</body>
</html>
<script type="text/javascript">
$(function()
{
  $("#myform").validate(
    {
      rules:
      {
        email:
        {
          required: true,

        },
        password:
        {
      required: true,
                },
      }
    });
});
</script>
