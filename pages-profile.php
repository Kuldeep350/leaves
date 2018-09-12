  <?php include "header.php" ?>
    <?php include "siderbar.php" ?>
    <?php
    $con = mysqli_connect("localhost","root","","pizone");
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$query=mysqli_query($con,"SELECT `id`, `name`, `email`, `password`, `tel`, `message`,`countery`  FROM `admin`");
while($row = mysqli_fetch_array($query))
{
  $id=$row['id'];
?>
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Profile</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-block">
                                <center class="m-t-30"> <img src="assets/images/users/5.jpg" class="img-circle" width="150" />
                                    <h4 class="card-title m-t-10"><?php echo  $row['name'];?></h4>
                                    <h6 class="card-subtitle">Accoubts Manager Amix corp</h6>
                                    <div class="row text-center justify-content-md-center">

                                        <div class="chatMessages">
                                        <ul class=""style="list-style:none">
                                              <li class="dropdown">
                                        <a href="#"    class="link" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span><span class="icon-envelope" style="font-size:20px; margin-right: 50px;"></span> </a>
                                        <ul class="dropdown-menu" id="style-1" ></ul>
                                             </li>
                                            </ul>
                                    </div>
                                  </div>
                                </center>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <div class="card-block">
                                <form class="form-horizontal form-material" method="post">
                                    <div class="form-group">
                                        <label class="col-md-12">Full Name</label>
                                        <div class="col-md-12">
                                            <input type="text" name="name" value="<?php echo  $row['name'];?>"placeholder="Johnathan Doe" class="form-control form-control-line" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Email</label>
                                        <div class="col-md-12">
                                            <input type="email" name="email" value="<?php echo  $row['email'];?>"placeholder="johnathan@admin.com" class="form-control form-control-line"  id="example-email"required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Password</label>
                                        <div class="col-md-12">
                                            <input type="password" name="password" id="password-field"value="<?php echo  $row['password'];?>" class="form-control form-control-line"required>
                                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Phone No</label>
                                        <div class="col-md-12">
                                            <input type="tel" name="tel" value="<?php echo  $row['tel'];?>" placeholder="123 456 7890" class="form-control form-control-line"required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Message</label>
                                        <div class="col-md-12">
                                            <textarea rows="5"  name="message" class="form-control form-control-line"><?php echo htmlentities($row['message']);?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-12">Select Country</label>
                                        <div class="col-sm-12">
                                            <select class="form-control form-control-line"name="countery" >
                                            <option <?php if($id == $id){ echo'selected'; }?> value="<?php echo  $row['countery'];?>"><?php echo  $row['countery'];?></option>
                                            <option value="Canada">Canada</option>
                                            <option value="India">India</option>
                                            <option value="London">London</option>
                                            <option value="Parise">Parise</option>
                                            <option value="USA">USA</option>
                                            <option value="UK">UK</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="submit"class="btn btn-success"  value="update" name="update">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
<?php
            if(isset($_POST['update']))
            {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password   = $_POST['password'];
            $tel   = $_POST['tel'];
            $message   = $_POST['message'];
            $countery   = $_POST['countery'];
            $sql = mysqli_query($con,"UPDATE `admin` SET `id`='$id',`name`='$name',`email`='$email',`password`='$password',`tel`='$tel',`message`='$message',`countery`='$countery' WHERE id='$id'") or die(mysqli_error($con));
            $result = mysqli_query($con,$sql);
          }

          while ($row = mysqli_fetch_array($query)) {
          echo "<option value=\"{$row['countery']}\">";
          echo $row['countery'];
          echo "</option>";
          }
?>
<?php } ?>
<script>
$(".toggle-password").click(function() {
  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
</script>
                                    <script>
                                    $(document).ready(function(){

                                    function load_unseen_notification(view = '')
                                    {
                                     $.ajax({
                                      url:"notification-fetch.php",
                                      method:"POST",
                                      data:{view:view},
                                      dataType:"json",
                                      success:function(data)
                                      {
                                       $('.dropdown-menu').html(data.notification);
                                       if(data.unseen_notification > 0)
                                       {
                                        $('.count').html(data.unseen_notification);
                                       }
                                      }
                                     });
                                    }
                                    load_unseen_notification();
                                    $('#form').on('submit', function(event){
                                     event.preventDefault();
                                     if($('#subject').val() != '' && $('#comment').val() != '')
                                     {
                                      var form_data = $(this).serialize();
                                      $.ajax({
                                       url:"leaves.php",
                                       method:"POST",
                                       data:form_data,
                                       success:function(data)
                                       {
                                        $('#form')[0].reset();
                                        load_unseen_notification();
                                       }
                                      });
                                     }
                                     // else
                                     // {
                                     //  alert("Both Fields are Required");
                                     // }
                                    });
                                     $(document).on('click', '.link', function(){
                                     $('.count').html('');
                                     load_unseen_notification('yes');
                                    });
                                     setInterval(function(){
                                     load_unseen_notification();;
                                    }, 5000);

                                    });
                                    </script>

           <?php include "footer.php" ?>
