<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Login form </title>


  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.1/animate.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css'>
<link rel="stylesheet" href="login/css/style.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>

<body>


<div class="wrapper animated bounce">
  <h1>Login</h1>
  <hr>
  <form method="post" action="cookie.php">
    <label id="icon" for="username"><i class="fa fa-user"></i></label>
    <input type="text" name="email" id="email"value="<?php  if (isset($_COOKIE['email'])){ echo $_COOKIE['email']; } else{echo '';} ?>"id="email" placeholder="Useremail" required="required">
    <label id="icon" for="password"><i class="fa fa-key"></i></label>
    <input type="password" name="password" id="password"value="<?php  if (isset($_COOKIE['password'])){ echo $_COOKIE['password']; } else{echo '';} ?>" id="password" placeholder="Password" required="required">
    <input type="submit" name="submit"value="Sign In">
<hr>
        <label class="pull-left checkbox-inline"><input type="checkbox" name="remember" <?php if(isset($_COOKIE["email"])) { ?> checked <?php } ?>> Remember me</label>
  </form>
</div>
    <script  src="js/index.js"></script>

</body>
</html>
