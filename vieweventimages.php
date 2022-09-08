<?php
include("header.php");
if(isset($_POST['btnbookingstatus']))
{
  $i = $_POST['eventimages'];
 // echo "<script>alert('". $i ."');</script>";
    $sql ="SELECT hall_booking.*, hall.hallname, department.department_name, staff.staffname, eventtype.eventtype FROM hall_booking LEFT JOIN hall ON hall_booking.hallid=hall.hallid LEFT JOIN department ON department.department_id=hall_booking.department_id LEFT JOIN staff ON staff.staffid=hall_booking.staffid LEFT JOIN eventtype ON eventtype.eventtypeid=hall_booking.eventtypeid WHERE hall_booking.hall_booking_id = '$_GET[viewid]'";
    $qsql = mysqli_query($con,$sql);
    $rs = mysqli_fetch_array($qsql);
    $images = unserialize($rs['gallery']);
    //array_splice($image, $i, 1);
    unset($images[$i]);
    $images2 = array_values($images);
    $images2 = serialize($images2);
   // echo "<script>alert('". $images2[$i]."');</script>";
    $sqlupdate = "UPDATE hall_booking SET gallery='$images2' where hall_booking.hall_booking_id = '$_GET[viewid]'";
    $qsqlupdate = mysqli_query($con,$sqlupdate);
    if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('Deleted successfully...');</script>";
    }  
}
?>
<style>
  /* h1{
  font-family: Satisfy;
  font-size:50px;
  text-align:center;
  color:black;
  padding:1%;
} */
#gallery{
  -webkit-column-count:4;
  -moz-column-count:4;
  column-count:4;
  
  -webkit-column-gap:20px;
  -moz-column-gap:20px;
  column-gap:20px;
}
@media (max-width:1200px){
  #gallery{
  -webkit-column-count:3;
  -moz-column-count:3;
  column-count:3;
    
  -webkit-column-gap:20px;
  -moz-column-gap:20px;
  column-gap:20px;
}
}
@media (max-width:800px){
  #gallery{
  -webkit-column-count:2;
  -moz-column-count:2;
  column-count:2;
    
  -webkit-column-gap:20px;
  -moz-column-gap:20px;
  column-gap:20px;
}
}
@media (max-width:600px){
  #gallery{
  -webkit-column-count:1;
  -moz-column-count:1;
  column-count:1;
}  
}
#gallery img,#gallery video {
  width:100%;
  height:auto;
  margin: 4% auto;
  box-shadow:-3px 5px 15px #000;
  cursor: pointer;
  -webkit-transition: all 0.2s;
  transition: all 0.2s;
}
.modal-img,.model-vid{
  width:100%;
  height:auto;
}
.modal-body{
  padding:0px;
}
  </style>

<section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Event Images</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Event Images</li>
          </ol>
        </div>

      </div>
    </section>
    <div style="padding-left:70px; padding-top: 20px; padding-right:70px;">

<?php 
// $sqledit = "SELECT * FROM hall_booking WHERE 	hall_booking_id='" . $_GET['viewid'] . "'";
$sqledit ="SELECT hall_booking.*, hall.hallname, department.department_name, staff.staffname, eventtype.eventtype FROM hall_booking LEFT JOIN hall ON hall_booking.hallid=hall.hallid LEFT JOIN department ON department.department_id=hall_booking.department_id LEFT JOIN staff ON staff.staffid=hall_booking.staffid LEFT JOIN eventtype ON eventtype.eventtypeid=hall_booking.eventtypeid WHERE hall_booking.hall_booking_id = '$_GET[viewid]'";
$qsqledit = mysqli_query($con,$sqledit);
$rsedit = mysqli_fetch_array($qsqledit);
$images = unserialize($rsedit['gallery']);
$n = count($images);
?>
<h1><?php echo $rsedit['eventtype'];?></h1>
<b>Staff:</b> <?php echo $rsedit['staffname'];?><br>
<b>Department:</b> <?php echo $rsedit['department_name'];?><br>
<b>Date:</b>  <?php echo date("d-m-Y h:i A",strtotime($rsedit['booking_start_dt_tim'])) . " -  " .  date("h:i A",strtotime($rsedit['booking_end_dt_tim'])); ?>
<hr>
<div id="gallery" class="container-fluid">
  <?php
  if($n >= 1)
  {
  for($i=0;$i<$n;$i++){
   
  ?>  
  <form action="" method="post">
  <input type="hidden" id="eventimages" name="eventimages" value="<?php echo $i?>">
  <table border=1><tr><img src="uploads/<?php echo $images[$i]?>" class="img-responsive" id="images" name="images">	<button type="submit" id="btnbookingstatus" name="btnbookingstatus" class="btn btn-danger" style="border-radius:0px; padding: 10px 20px; margin-left:75px" onclick="return confirmdel()">Delete Image</button></tr></table>
  </form>
 <?php
    
}
  }
  else
  {
    $sqlupdate = "UPDATE hall_booking SET gallery='' where hall_booking.hall_booking_id = '$_GET[viewid]'";
    $qsqlupdate = mysqli_query($con,$sqlupdate);
    echo "<h2>No Images found</h2>";
  }
?>
</div>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
      </div>
    </div>

  </div>
</div>
</div>

<br><br><br>
 <?php include("footer.php"); ?>