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
                        <h3 class="text-themecolor m-b-0 m-t-0">Leave Message</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Leave Message</li>
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
                                <h4 class="card-title">Leave Message</h4>

                                <div class="table-responsive">
                                    <table class="table">
<thead>
  <tr >
    <th>name</th>
    <th>Email</th>
	<th>phonenumber</th>
	<th>leavestart</th>
	<th>leaveend</th>
	<th>Comments</th>
	<th>permission</th>
	<th>Action</th>
  </tr>
  </thead>
  <?php
$con = mysqli_connect("localhost","root","","pizone");
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
$query=mysqli_query($con,"SELECT `id`, `name`, `mail`, `phonenumber`,`permission`, `leavestart`, `leaveend`, `comment` FROM leaves");
 		while($row = mysqli_fetch_array($query))
	 {
		 ?>
  <tr id="<?php echo  $row['id'];?>">
			<td> <?php echo  $row['name'];?></td>
			<td> <?php echo  $row['mail'];?></td>
			<td> <?php echo  $row['phonenumber'];?></td>
			<td> <?php echo  $row['leavestart'];?></td>
			<td> <?php echo  $row['leaveend'];?></td>
			<td> <?php echo  $row['comment'];?></td>
			<td>
			<?php if($row['permission']=="Permission Granted")
			{
			?>
			<input type="checkbox"  id="<?php echo $row['id'];?>" name="permission" checked>
			<?php } else { ?>
				<input type="checkbox"  id="<?php echo $row['id'];?>" name="permission">
			<?php } ?>
			</td>
			 <td><a href="table-basic.php?id=<?php echo $row['id'];?>"><span class="fa fa-trash remove"></span></a></td>
			 </tr>
			 <?php
	 }
	 ?>
	 </table>
	 <?php
// if(isset($_GET['id']))
//         {
//                 $id = $_GET['id'];
// $query = mysqli_query($con,"DELETE FROM `leaves` WHERE id='$id'");
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
                 url: 'delete.php',
                 type: 'POST',
                 data: {id: id},
                 success: function(){
                 }
              });
          }
      });
  </script>
<script>
$("input:checkbox").change(function() {
    var someObj = {};
    someObj.permissionGranted = [];
    someObj.permissionDenied = [];

    $("input:checkbox").each(function() {
        if ($(this).is(":checked")) {
            someObj.permissionGranted.push($(this).attr("id"));


        } else {
            someObj.permissionDenied.push($(this).attr("id"));
        }
    });

	var permissionGranted=someObj.permissionGranted;
	var permissionDenied=someObj.permissionDenied;

	 $.ajax({
                    url:'approve.php',
                    type:'post',
                    data:{
						permissionGranted:permissionGranted
					},
                    success:function(result){
						alert('sand message ');

                        $("#response").text(result);

                    },


            });

			$.ajax({
                    url:'unapprove.php',
                    type:'post',
                    data:{
						permissionDenied:permissionDenied
					},
                    success:function(result){


                        $("#response").text(result);

                    }

            });


});
</script>

            <?php include "footer.php" ?>
