
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <?php include "header.php"?>
 <br>
 <br>
 <br>
<style>
body{
	background-color:;
}
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
	 width: 60%;
	margin-left:15%;

	 border-radius:6px;
  overflow:hidden;
	color:white;
	background: -webkit-gradient(linear, left top, left bottom, color-stop(100%,rgba(0,0,0,0.30)), color-stop(100%,rgba(0,0,0,0.30))); border-radius:10px;
}
td, th {
	 border-collapse: collapse;
   text-align: center;
    padding: 15px;
	  border-bottom: 1px solid #ddd;
	 }
tr:nth-child(even) {
    background-color: ;

}
th	{
	color: #fff;
    background-color: #6c7ae0;

	}
	td:hover {
    background-color: #6c7ae0;}
</style>
<table >
<thead>
  <tr >
    <th>name</th>
    <th>Email</th>
	<th>phonenumber</th>
	<th>leavestart</th>
	<th>leaveend</th>
	<th>Comments</th>
	<th>permission</th>
	<th colspan=3>Action</th>
  </tr>
  </thead>
  <?php
$con = mysqli_connect("localhost","root","","pizone");
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
$query=mysqli_query($con,"SELECT `id`, `name`, `mail`, `phonenumber`, `leavestart`, `leaveend`,`permission` ,`comment` FROM leaves");
 		while($row = mysqli_fetch_array($query))
	 {
		 ?>
  <tr id="<?php echo $row['id'];?>">
			<td> <?php echo  $row['name'];?></td>
			<td> <?php echo  $row['mail'];?></td>
			<td> <?php echo  $row['phonenumber'];?></td>
			<td> <?php echo  $row['leavestart'];?></td>
			<td> <?php echo  $row['leaveend'];?></td>
			<td> <?php echo  $row['comment'];?></td>
			<td> <?php echo  $row['permission'];?></td>
			 <td > <a href="detail.php?id=<?php echo $row['id'];?>"><span class="glyphicon glyphicon-remove delete"></span></a></td>
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
//
//
// }
                ?>
								<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
						  <script type="text/javascript">
						      $(".delete").click(function(){
						          var id = $(this).parents("tr").attr("id");
						            $("#"+id).remove();
						          if(confirm('Are you sure to remove this record ?'))
						          {
						              $.ajax({
						                 url: 'delete.php',
						                 type: 'GET',
						                 data: {id: id},
						                 success: function(){
						                 }
						              });
						          }
						      });
						  </script>
</body>

<br>
 <br>
<?php include "footer.php"?>
