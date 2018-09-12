<?php
$con =  mysqli_connect("localhost","root","","pizone");
if (isset($_POST['submit'])) {
    $email = $_POST["email"];

    $result= mysqli_query($con,"SELECT * FROM singup  where email='$email'")or die("database error:". mysqli_error($con));
    $count= mysqli_num_rows($result);
    $row= mysqli_fetch_array( $result);
    {
           if ($count>0) {
            //echo $row['password'];


            require("PHPMailer-master/PHPMailer.php");
            require("PHPMailer-master/SMTP.php");
   $mail = new PHPMailer\PHPMailer\PHPMailer();
   //$mail->IsSMTP(); // enable SMTP
   $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
   $mail->SMTPAuth = true; // authentication enabled
   $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
   $mail->Host = "smtp.gmail.com";
   $mail->Port = 465; // or 587
   $mail->IsHTML(true);
   $mail->Username = "855deepsingh@gmail.com";
   $mail->Password = "855,deep";
   $mail->SetFrom("855deepsingh@gmail.com");
   $mail->Subject = "forgat password";
   $mail->Body = "Hi $email your Password is {$row['password']}";
   $mail->AddAddress($email);
if(!$mail->Send()) {
       echo "Mailer Error: " . $mail->ErrorInfo;
    } else {

       echo "check your mail";

    }

           }
      }
}
 ?>
<!DOCTYPE html>
<html lang="en" >
  <head>
    <meta charset="utf-8">
    <title>Forgat Password</title>
    <style media="screen">

      #form{
      width: 72%;
      }
      .login-form {
              width: 340px;
          margin: 50px auto;
      }
  .login-form  {
          margin-bottom: 15px;
      background: #f7f7f7;
      box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
      padding: 30px;
  }
  .login-form h2 {
      margin: 0 0 15px;
  }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
  <body>
    <div class="login-form">
      <h2 class="text-center">Forgat Password</h2>
    <form method="post" >
      <div class="form-group">
    <input type="email" name="email" class="form-control" id="form" placeholder="email...">
  </div>
    <div class="form-group">
    <input type="submit" class="btn btn-info"  name="submit"  onclick="return confirm('Sand your mail?');">
  </div>
  </form>
</div>
  </body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script>
  function ValidateEmail(email) {
          var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
          return expr.test(email);
      };
  </script>
  <script>
  $('form').on('submit', function (e) {
         var focusSet = false;
         var re = /^\w+([-+.'][^\s]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
         var emailFormat = re.test($("#form").val());// this return result in boolean type
         if (!ValidateEmail($("#form").val())) {
             if ($("#form").parent().next(".validation").length == 0) // only add if not added
             {
                 $("#form").parent().after("<div class='validation' style='color:red;margin-bottom: 20px;'>Please enter email address</div>");
             }
             e.preventDefault(); // prevent form from POST to server
             $('#form').focus();
             focusSet = true;
         } else {
             $("#form").parent().next(".validation").remove(); // remove it
         }
       });
  </script>

</html>
