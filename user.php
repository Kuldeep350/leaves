 <?php include "header.php" ?>
    <?php include "siderbar.php" ?>
        <!-- ============================================================== -->
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
                        <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">User</li>
                        </ol>
                    </div>

                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-block">
                              <div class="table-responsive">
                                   <table class="table">
<thead>
 <tr>
   <th></th>
 <th>name</th>
 <th>Email</th>
<th colspan=3>Action</th>
 </tr>
 </thead>
 <?php
$con = mysqli_connect("localhost","root","","pizone");
if ($con->connect_error) {
   die("Connection failed: " . $con->connect_error);
}
$query=mysqli_query($con,"SELECT `id`, `name`, `email` FROM singup");
   while($row = mysqli_fetch_array($query))
  {
    ?>
 <tr id="<?php echo  $row['id'];?>"> 
     <td style="width:20px;"><span class="round"><span class="fa fa-user-o"></span> </span></td>
     <td> <?php echo  $row['name'];?></td>
     <td> <?php echo  $row['email'];?></td>
      <td > <a href="user.php?id=<?php echo $row['id'];?>"><span class="fa fa-trash remove"></span></a></td>
 </tr>
      <?php
  }
  ?>

  </table>
  <?php
//     if(isset($_GET['id']))
//       {
//               $id = $_GET['id'];
// $query = mysqli_query($con,"DELETE FROM `singup` WHERE id='$id'");
// }
        ?>
</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
          <script type="text/javascript">
              $(".remove").click(function(){
                  var id = $(this).parents("tr").attr("id");
                    $("#"+id).remove();
                  if(confirm('Are you sure to remove this record ?'))
                  {
                      $.ajax({
                         url: 'delete1.php',
                         type: 'POST',
                         data: {id: id},

                      });
                  }
              });
          </script>

           <?php include "footer.php" ?>
