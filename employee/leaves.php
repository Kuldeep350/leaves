<?php include "header.php"?>
<?php
  require("PHPMailer-master/PHPMailer.php");
  require("PHPMailer-master/SMTP.php");
?>
  <style>
   h1, p{
		margin-left:15%;
   }
   body{
		background-image:url("ks.jpg");
		}
  #a{
	padding:50px;
	align:center;
	margin-left:20%;
	margin-top:35px;
	background: -webkit-gradient(linear, left top, left bottom, color-stop(100%,rgba(0,0,0,0.30)), color-stop(100%,rgba(0,0,0,0.30))); border-radius:10px;
	width:50%;
	color:lightblue;
	}
form{
		margin-left:20%;
	}
.btn{
	border-radius:5px;
	margin-top:5%;
	}
	 textarea
	 { margin-left: -3px;
	 border-radius:6px;
 		}
	 footer {
			 position: relative;
			 margin-top:70em;
			    width: 100%;
	 }
	</style>
  <?php
  if(isset($_POST["post"]))
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
  $mail->Body = $_POST["comment"];    //An HTML or plain text message body
  if($mail->Send()){}
}
?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<div class="col-xs-3" id="a">
<form class="form-horizontal" method="post" onsubmit="return validateForm()" name="myForm" id="form">
<div>
								<h1>Request for Leave</h1>
							<p>Request your leave details down below.</p>
						<div class="form-group">
						<label for="name" class="control-label col-sm-2" > name </label>
					<div class="col-sm-4">
						<input type="text" id="name" class="form-control" name="name"   placeholder="name " >
				</div>
				</div>
				<div class="form-group">
				<label for="mail" class="control-label col-sm-2" > Email </label>
				<div class="col-sm-4">
				<input type="text" id="email" class="form-control" name="mail" id="email"  placeholder="abc@gmail.com "/>
				</div>
			</div>
				<div class="form-group">
						<label for="tel" class="control-label col-sm-2" > Phonenumber </label>
						<div class="col-sm-4">
				<input  type="text" id="tel" class="form-control" name="tel"   placeholder="+919977777777 "/>
			</div>
		</div>
		<h2>Details of Leave</h2>
		<div class="form-group">
				<label for="leavestart" class="control-label col-sm-2" > Leave Start</label>
				<div class="col-sm-4">
			<input type="date" id="leavestart" class="form-control" name="leavestart"   />
		</div>
		</div>
			<div class="form-group">
					<label for="leaveend" class="control-label col-sm-2" > Leave End</label>
			<div class="col-sm-4">
				<input  type="date" id="leaveend" class="form-control" name="leaveend"   />
		</div>
		</div>
    <div class="form-group">
    <label for="email" class="control-label col-sm-2" > Email </label>
    <div class="col-sm-4">
    <input type="text" id="mail" class="form-control" name="email" id="email"  placeholder="abc@gmail.com "/>
    </div>
  </div>
    <div class="form-group">
      	<label for="subject" class="control-label col-sm-2" > Subject</label>
        <div class="col-sm-4">
           <input type="text" id="subject" class="form-control"name="subject"placeholder="Subject"  />
        </div>
    </div>
			<div class="form-group">
					<label for="comment" class="control-label col-sm-2" > Message</label>
          <div class="col-sm-4">
						<textarea id="input_12" class="form-textarea" name="comment" cols="22" rows="0" data-component="textarea"placeholder="Message...." ></textarea>
          </div>
							<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" name="post" id="post"class="btn btn-primary" onClick="confSubmit(this.form);" >submit </button>
				</div>
				</div>
				</div>
				</form>
			</div>
    <?php
      $con = mysqli_connect("localhost","root","","pizone");
      if (mysqli_connect_errno())
        {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

      if(isset($_POST['name']))
              {
      			$name = mysqli_real_escape_string($con,$_POST['name']);
      			$email = mysqli_real_escape_string($con,$_POST['mail']);
      			$phonenumber = $_POST['tel'];
      			$leavestart = $_POST['leavestart'];
      			$leaveend = $_POST['leaveend'];
      	 		$comment = $_POST['comment'];
      			$status="pending";
            date_default_timezone_set("Asia/Kolkata");
            $date=date('Y-m-d');
            $tame=date("h:i:s");
        date_default_timezone_set("Asia/Kolkata");
      	$time =date("h:i");
      	$time =date("h:i:sa");
       echo "<br>";
        "<br />Date and time (24 hour format): " . date("G:i:s");
       $time= date("G:i");
       echo "<br>";
       if($time >"09:02" && $time < "11:02")
      {
      	 //echo "not";
      echo '<script language="javascript">';
      echo 'alert(" Please message sent 10:00am to 11:00am")';
      echo '</script>';
       }
       else
       {
       	mysqli_query($con,"INSERT INTO `leaves`(`name`, `mail`, `phonenumber`, `leavestart`, `leaveend`, `comment`,`permission`) VALUES ('$name','$email','$phonenumber','$leavestart','$leaveend','$comment','$status')");
      	mysqli_query($con,"INSERT INTO `history`(`name`, `mail`, `phonenumber`, `leavestart`, `leaveend`, `comment`,`date`,`time`) VALUES ('$name','$email','$phonenumber','$leavestart','$leaveend','$comment',('$date'),('$tame') )");
       }
      		}
      mysqli_close($con);
      ?>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script>
      function ValidateEmail(email) {
              var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
              return expr.test(email);
          };
      </script>
      <script>
      function tel(tel)
      {
      var filter = /^\(?(\d{3})\)?[-\. ]?(\d{3})[-\. ]?(\d{4})$/;
        return filter.test(tel);
      }
      </script>
      <script>
      $('form').on('submit', function (e) {
             var focusSet = false;
             var re = /^\w+([-+.'][^\s]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
             var emailFormat = re.test($("#email").val());// this return result in boolean type
             if (!ValidateEmail($("#email").val())) {
                 if ($("#email").parent().next(".validation").length == 0) // only add if not added
                 {
                     $("#email").parent().after("<div class='validation' style='color:red;margin-bottom: 20px;'>Please enter email address</div>");
                 }
                 e.preventDefault(); // prevent form from POST to server
                 $('#email').focus();
                 focusSet = true;
             } else {
                 $("#email").parent().next(".validation").remove(); // remove it
             }

             if (!ValidateEmail($("#mail").val())) {
                 if ($("#mail").parent().next(".validation").length == 0) // only add if not added
                 {
                     $("#mail").parent().after("<div class='validation' style='color:red;margin-bottom: 20px;'>Please enter email address</div>");
                 }
                 e.preventDefault(); // prevent form from POST to server
                 $('#mail').focus();
                 focusSet = true;
             } else {
                 $("#mail").parent().next(".validation").remove(); // remove it
             }
             if (!$('#name').val()) {
            if ($("#name").parent().next(".validation").length == 0) // only add if not added
            {
                $("#name").parent().after("<div class='validation' style='color:red;margin-bottom: 20px;'>Please enter name</div>");
            }
            e.preventDefault(); // prevent form from POST to server
            $('#name').focus();
            focusSet = true;
        } else {
            $("#name").parent().next(".validation").remove(); // remove it
        }
             if (!tel($("#tel").val())) {
                 if ($("#tel").parent().next(".validation").length == 0) // only add if not added
                 {
                     $("#tel").parent().after("<div class='validation' style='color:red;margin-bottom: 20px;'>Please enter mobile</div>");
                 }
                 e.preventDefault(); // prevent form from POST to server
            if (!focusSet) {
                $("#tel").focus();
            }
        } else {
            $("#tel").parent().next(".validation").remove(); // remove it
        }
        if (!$('#leavestart').val()) {
       if ($("#leavestart").parent().next(".validation").length == 0) // only add if not added
       {
           $("#leavestart").parent().after("<div class='validation' style='color:red;margin-bottom: 20px;'>Please enter date</div>");
       }
       e.preventDefault(); // prevent form from POST to server
  if (!focusSet) {
      $("#leavestart").focus();
  }
} else {
  $("#leavestart").parent().next(".validation").remove(); // remove it
}
if (!$('#leaveend').val()) {
if ($("#leaveend").parent().next(".validation").length == 0) // only add if not added
{
   $("#leaveend").parent().after("<div class='validation' style='color:red;margin-bottom: 20px;'>Please enter date</div>");
}
e.preventDefault(); // prevent form from POST to server
if (!focusSet) {
$("#leaveend").focus();
}
} else {
$("#leaveend").parent().next(".validation").remove(); // remove it
}
if (!$('#input_12').val()) {
if ($("#input_12").parent().next(".validation").length == 0) // only add if not added
{
   $("#input_12").parent().after("<div class='validation' style='color:red;margin-bottom: 20px;'>Please enter message</div>");
}
e.preventDefault(); // prevent form from POST to server
if (!focusSet) {
$("#input_12").focus();
}
} else {
$("#input_12").parent().next(".validation").remove(); // remove it
}
if (!$('#input_12').val()) {
if ($("#input_12").parent().next(".validation").length == 0) // only add if not added
{
   $("#input_12").parent().after("<div class='validation' style='color:red;margin-bottom: 20px;'>Please enter message</div>");
}
e.preventDefault(); // prevent form from POST to server
if (!focusSet) {
$("#input_12").focus();
}
} else {
$("#input_12").parent().next(".validation").remove(); // remove it
}
if (!$('#subject').val()) {
if ($("#subject").parent().next(".validation").length == 0) // only add if not added
{
   $("#subject").parent().after("<div class='validation' style='color:red;margin-bottom: 20px;'>Please enter Subject</div>");
}
e.preventDefault(); // prevent form from POST to server
if (!focusSet) {
$("#subject").focus();
}
} else {
$("#subject").parent().next(".validation").remove(); // remove it
}
         });
      </script>
          <script type="text/javascript">

    function confSubmit(form) {
    if (confirm("Are you sure you want to submit the message?")) {
    form.post();
    }
    else {
    alert("You decided to not submit the form!");
    }
    }
    </script>

<?php include "footer.php "?>
