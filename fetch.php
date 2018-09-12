<?php
if(isset($_GET['search']))
{
      $connect = mysqli_connect("localhost","root","","pizone");
      $output = '';
      $sql = "SELECT  * FROM history WHERE name LIKE '%".$_GET["search"]."%'";
      $result = mysqli_query($connect, $sql);
      if (mysqli_num_rows($result) > 0)
      {

      $output .=  '
                  <div class="table-responsive">
                        <table class="table">
                                          <tr >
                                        <th>name</th>
                                        <th>Email</th>
                                      	<th>phonenumber</th>
                                      	<th>leavestart</th>
                                      	<th>leaveend</th>
                                          </tr>
                                        ';
      while ($row = mysqli_fetch_array($result))
      {
      $output .= '<tr>
    			<td>  ' .$row["name"].'</td>
    			<td>  ' .$row["mail"].'</td>
    			<td>  ' .$row["phonenumber"].'</td>
    			<td>   '.$row["leavestart"].'</td>
    			<td>   '.$row["leaveend"].'</td>
    			    			<td>';
      }
      echo $output;
      }
      else
      {
        echo 'Record Not Found' ;
      }
    }
 ?>
