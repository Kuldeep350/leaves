
<?php
    $con=mysqli_connect("localhost", "root", "","pizone") or die("Error connecting to database: ".mysqli_error( $con));

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Search results</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css"/>
	<style></style>
</head>
<body>
<?php
    $query = $_GET['query'];
             $min_length = 3;
             if(strlen($query) >= $min_length){
                 $query = htmlspecialchars($query);
                   $query = mysqli_real_escape_string($query);
		                  $raw_results = mysqli_query( $con,"SELECT * FROM leaves
            WHERE (`email` LIKE '%".$query."%') OR (`permission` LIKE '%".$query."%')") or die(mysqli_error($con));
                                     if(mysqli_num_rows($raw_results) > 0){ /
                         while($results = mysqli_fetch_array($raw_results)){
                                        echo "<p><h3>".$results['email']."</h3>".$results['permission']."</p>";
                          }
                     }
        else{
            echo "No results";
        }
             }
    else{
        echo "Minimum length is ".$min_length;
    }
?>
</body>
</html>
