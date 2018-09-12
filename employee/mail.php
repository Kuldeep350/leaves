<?php include "header.php"?>
<?php
  require("PHPMailer-master/PHPMailer.php");
  require("PHPMailer-master/SMTP.php");
?>
<?php
//index.php
$error = '';
$name = '';
$email = '';
$subject = '';
$message = '';
function clean_text($string)
{
 $string = trim($string);
 $string = stripslashes($string);
 $string = htmlspecialchars($string);
 return $string;
}
if(isset($_POST["submit"]))
{
 if(empty($_POST["name"]))
 {
  $error .= '<p><label class="text-danger">Please Enter your Name</label></p>';
 }
 else
 {
  $name = clean_text($_POST["name"]);
  if(!preg_match("/^[a-zA-Z ]*$/",$name))
  {
   $error .= '<p><label class="text-danger">Only letters and white space allowed</label></p>';
  }
 }
 if(empty($_POST["email"]))
 {
  $error .= '<p><label class="text-danger">Please Enter your Email</label></p>';
 }
 else
 {
  $email = clean_text($_POST["email"]);
  if(!filter_var($email, FILTER_VALIDATE_EMAIL))
  {
   $error .= '<p><label class="text-danger">Invalid email format</label></p>';
  }
 }
 if(empty($_POST["subject"]))
 {
  $error .= '<p><label class="text-danger">Subject is required</label></p>';
 }
 else
 {
  $subject = clean_text($_POST["subject"]);
 }
 if(empty($_POST["message"]))
 {
  $error .= '<p><label class="text-danger">Message is required</label></p>';
 }
 else
 {
  $message = clean_text($_POST["message"]);
 }
 if($error == '')
 {
  $mail = new PHPMailer\PHPMailer\PHPMailer();
  //$mail->IsSMTP();        //Sets Mailer to send message using SMTP
  $mail->Host = 'smtp.gmail.com';  //Sets the SMTP hosts
  $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
  $mail->Port = 465; // or 587         //Sets the default SMTP server port
  $mail->SMTPAuth = true;       //Sets SMTP authentication. Utilizes the Username and Password variables
  $mail->Username = '855deepsingh@gmail.com';     //Sets SMTP username
  $mail->Password = '855,deep';     //Sets SMTP password
  $mail->SMTPSecure = 'ssl';       //Sets connection prefix. Options are "", "ssl" or "tls"
  $mail->From = $_POST["email"];     //Sets the From email address for the message
  $mail->FromName = $_POST["name"];    //Sets the From name of the message
  $mail->AddAddress('855deepsingh@gmail.com', 'Name');//Adds a "To" address
  $mail->AddCC($_POST["email"], $_POST["name"]); //Adds a "Cc" address
  $mail->IsHTML(true);       //Sets message type to HTML
  $mail->Subject = $_POST["subject"];    //Sets the Subject of the message
  $mail->Body = $_POST["message"];    //An HTML or plain text message body
  if($mail->Send())        //Send an Email. Return true on success or false on error
  {
   $error = '<label class="text-success">Thank you for contacting us</label>';
  }
  else
  {
   $error = '<label class="text-danger">There is an Error</label>';
  }
  $name = '';
  $email = '';
  $subject = '';
  $message = '';
 }
}
?>
 <head>
  <title>mail</title>



  <style>
  @import url(https://fonts.googleapis.com/css?family=Merriweather);
*,
*:before,
*:after {
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}



form {
  max-width: 600px;
  text-align: center;
  margin: 20px auto;
}
form input, form textarea {
  border: 0;
  outline: 0;
  padding: 1em;
  -moz-border-radius: 8px;
  -webkit-border-radius: 8px;
  border-radius: 8px;
  display: block;
  width: 100%;
  margin-top: 1em;
  font-family: 'Merriweather', sans-serif;
  -moz-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.3);
  -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.3);
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.3);
  resize: none;
}
form input:focus, form textarea:focus {
  -moz-box-shadow: 0 0px 4px #e74c3c !important;
  -webkit-box-shadow: 0 0px 4px #e74c3c !important;
  box-shadow: 0 0px 4px #e74c3c !important;
}
form #input-submit {
  color: white;
  background: #e74c3c;
  cursor: pointer;
}
form #input-submit:hover {
  -moz-box-shadow: 0 1px 1px 1px rgba(170, 170, 170, 0.6);
  -webkit-box-shadow: 0 1px 1px 1px rgba(170, 170, 170, 0.6);
  box-shadow: 0 1px 1px 1px rgba(170, 170, 170, 0.6);
}
form textarea {
  height: 126px;
}

.half {
  float: left;
  width: 48%;
  margin-bottom: 1em;
}

.right {
  width: 50%;
}

.left {
  margin-right: 2%;
}

@media (max-width: 480px) {
  .half {
    width: 100%;
    float: none;
    margin-bottom: 0;
  }
}
/* Clearfix */
.cf:before,
.cf:after {
  content: " ";
  /* 1 */
  display: table;
  /* 2 */
}

.cf:after {
  clear: both;
}
label {

    margin-left: 25%;
}
h3{
  color: #e74c3c;
}
.text-danger {
    color:#e74c3c;
}
.text-success{
        color:#149c16;
}
  </style>
 </head>
  <br/>
  <div class="container">
   <div class="row">
    <div class="col-md-15" style="margin:0 auto; float:none;">
     <h3 align="center"> Email </h3>
     <br/>
     <?php echo $error; ?>
     <form class="cf" method="post">
     <div class="half left cf">
       <input type="text" name="name" id="input-name" placeholder="Name" value="<?php echo $name; ?>"/>
       <input type="email" id="input-email" name="email"placeholder="Email address"value="<?php echo $email; ?>" />
       <input type="text" id="input-subject" name="subject"placeholder="Subject" value="<?php echo $subject; ?>" />
     </div>
     <div class="half right cf">
       <textarea name="message" type="text" id="input-message" placeholder="Message"><?php echo $message; ?></textarea>
     </div>
     <input type="submit" name="submit"value="Submit" id="input-submit">
     </form>
    </div>
   </div>
  </div>

<?php include "footer.php"?>
