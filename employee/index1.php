<?php include "header.php"?>
<style>
.img-responsive, .thumbnail > img, .thumbnail a > img, .carousel-inner > .item > img, .carousel-inner > .item > a > img {
width:100%;
 height:600px;
}

.carousel-caption {
					    bottom: 292px;

}
hr {
	    width: 40%;

    border-top: 3px solid #F0677C;
}
p{
	font-size: 30px;
	color:#F0677C;
}
</style>
   <?php
$con = mysqli_connect("localhost","root","","pizone");
$sql = "SELECT * FROM  image LIMIT 5";
$resultset = mysqli_query($con, $sql) or die("database error:". mysqli_error($con));
$image_count = 0;
$button_html = '';
$slider_html = '';
$thumb_html = '';
while( $rows = mysqli_fetch_assoc($resultset)){
$active_class = "";
if(!$image_count) {
$active_class = 'active';
$image_count = 1;
}
$image_count++;
$cat_image = "img_name".$rows['img_name'].".jpg";
// slider image html
$slider_html.= "<div class='item ".$active_class."'>";
$slider_html.= "<img src='/leave/uploads/".$rows['img_name']."' alt='employee.jpeg'  class='img-responsive'>";
$slider_html.= "<div class='carousel-caption'><h1 style='color:#F0677C;font-size: 70px; '>Welcome to PiZone</h1>
<hr>
<p> Feel free to look around</p></div></div>";
// Thumbnail html
//$thumb_html.= "<li><img src='admin/images/".$thumb_html."' alt='$cat_image'></li>";
// Button html
$button_html.= "<li data-target='#carousel-example-generic' data-slide-to='".$image_count."' class='".$active_class."'></li>";
}
?>
  <div class="container" style="width: 100%; hight:50%;">
<div id="carousel-example-generic" class="carousel slide" data-interval="1000" data-ride="carousel" >
<ol class="carousel-indicators">
<?php echo $button_html; ?>
</ol>
<div class="carousel-inner">
<?php echo $slider_html; ?>
</div>
<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
<span class="glyphicon glyphicon-chevron-left"></span>
</a>
<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
<span class="glyphicon glyphicon-chevron-right"></span>
</a>
<ul class="thumbnails-carousel clearfix">
<?php echo $thumb_html; ?>
</ul>
</div>
</div>
 <?php include "footer.php" ?>
