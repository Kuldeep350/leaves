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
                        <h3 class="text-themecolor m-b-0 m-t-0">Leave History</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Leave History</li>
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
                    <!-- column -->
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">Leave History</h4>
                               <div class="table-responsive">
                                    <table class="table">
<thead>
  <tr>
  <th>name</th>
  <th>Email</th>
	<th>phonenumber</th>
	<th>leavestart</th>
	<th>leaveend</th>
	<th>Date</th>
  <th>Time</th>
 <th><input type="checkbox" id="select_all" value=""/></th>
	</tr>
  </thead>
  <?php
$con = mysqli_connect("localhost","root","","pizone");
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
$query=mysqli_query($con,"SELECT `id`, `name`, `mail`, `phonenumber`, `leavestart`, `leaveend`, `date`,`time` FROM history");
 		while($row = mysqli_fetch_array($query))
	 {
		 ?>
  <tr>
			<td> <?php echo  $row['name'];?></td>
			<td> <?php echo  $row['mail'];?></td>
			<td> <?php echo  $row['phonenumber'];?></td>
			<td> <?php echo  $row['leavestart'];?></td>
			<td> <?php echo  $row['leaveend'];?></td>
			<td> <?php echo  $row['date'];?></td>
      <td> <?php echo  $row['time'];?></td>
      <form action="" method="post" id="form1">
      <td> <input type="checkbox" class="check" name="records[]" id="y"value="<?php echo $row['id'];?>"> </td>
	</tr>
			 <?php
	 }
	 ?>
	 </table>
       <div id="div" style="display:none" ><input type="submit" id="btn"   name="delete" value="Delete" class="btn btn-info" onclick="return confirm('Are you sure you want to delete this record?')">
                </div>
</form>
                <?php
                    if (isset($_POST['delete']))
                    {
                        $numberofcheckbox = count($_POST['records']);
                        $i = 0;
                        while ($i<$numberofcheckbox) {
                          $keyToDelete = $_POST['records'][$i];
                          $query = mysqli_query($con,"DELETE FROM `history` WHERE id='$keyToDelete'");
                          $i++;
                        }
                        ?>
                        <script>
                          window.location.href="history.php";
                      </script>
                    <?php }
                ?>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
          </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            </div>
          </div>
            <script>
            $(document).ready(function(){
      $('#select_all').on('click',function(){
          if(this.checked){
              $('.check').each(function(){
                  this.checked = true;
                  if( $('.check:checked').length > 0 ) {
                      $("#div").show();
                  }
              });
          }else{
               $('.check').each(function(){
                  this.checked = false;
                  if( $('.check:checked').length > 0 ) {
                      $("#div").hide();
                  }
              });
          }
      });
      $('.check').on('click',function(){
          if($('.check:checked').length == $('.check').length){
              $('#select_all').prop('checked',true);
          }else{
              $('#select_all').prop('checked',false);
          }
      });
  });
  $('.check').on('click',function(){
    if( $('.check:checked').length > 0 ) {
        $("#div").show();
    } else {
        $("#div").hide();
    }
});
 </script>
            <?php include "footer.php" ?>
