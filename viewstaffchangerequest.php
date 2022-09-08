<?php
include("header.php");
if(!isset($_SESSION['staffid']))
{
    echo "<script>window.location='stafflogin.php';</script>";  
}
?>
<style>
.my-card
{
    position:absolute;
    left:40%;
    top:-20px;
    border-radius:50%;
}
.divpendingblock:hover {
    box-shadow: 0 0 25px 0 rgba(20, 27, 201, .05);
    cursor: pointer;
    background-image: linear-gradient(-45deg, #0dcaf0 0%, #98d6e2 100%)
}
.divapprovedblock:hover {
    box-shadow: 0 0 25px 0 rgba(20, 27, 201, .05);
    cursor: pointer;
    background-image: linear-gradient(-45deg, #71c55d 0%, #7de399 100%)
}
.divrejectedblock:hover {
    box-shadow: 0 0 25px 0 rgba(20, 27, 201, .05);
    cursor: pointer;
    background-image: linear-gradient(-45deg, #fc2d38 0%, #fa414a 100%)
}
.divrcancelledblock:hover {
    box-shadow: 0 0 25px 0 rgba(20, 27, 201, .05);
    cursor: pointer;
    background-image: linear-gradient(-45deg, #35373b 0%, #494d52 100%)
}

</style>
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>View Change Request  <?php
          if(isset($_GET['st']))
          {
           echo " - ";
           echo $_GET['st'];
          }
           ?></h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>View Change Request</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page pt-4">
      <div class="container">
	  <p>
<div class="jumbotron">
<div class="row w-100">
  
        <div class="col-md-4" style="cursor: pointer;" onclick="window.location='viewstaffchangerequest.php?st=Pending'">
            <div class="card border-info mx-sm-1 p-3 divpendingblock">
                <div class="card border-info shadow text-info p-3 my-card" ><span class="fa fa-eye fa-lg" aria-hidden="true"></span></div>
                <div class="text-info text-center mt-3"><h4>Pending</h4></div>
                <div class="text-info text-center mt-2"><h2><?php
$sql ="SELECT * FROM `change_request` left join hall_booking ON change_request.hall_booking_id=hall_booking.hall_booking_id WHERE change_request.status='Pending' AND hall_booking.staffid='$_SESSION[staffid]'";
$qsql = mysqli_query($con,$sql);
echo mysqli_num_rows($qsql);
				?></h2></div>
            </div>
        </div>

        <div class="col-md-4" onclick="window.location='viewstaffchangerequest.php?st=Approved'">
            <div class="card border-success mx-sm-1 p-3 divapprovedblock">
                <div class="card border-success shadow text-success p-3 my-card "><span class="fa fa-thumbs-up fa-lg" aria-hidden="true"></span></div>
                <div class="text-success text-center mt-3"><h4>Approved</h4></div>
                <div class="text-success text-center mt-2"><h2><?php
$sql ="SELECT * FROM `change_request` left join hall_booking ON change_request.hall_booking_id=hall_booking.hall_booking_id WHERE change_request.status='Approved' AND hall_booking.staffid='$_SESSION[staffid]'";
$qsql = mysqli_query($con,$sql);
echo mysqli_num_rows($qsql);
				?></h2></div>
            </div>
        </div>

        <div class="col-md-4" onclick="window.location='viewstaffchangerequest.php?st=Rejected'">
            <div class="card border-danger mx-sm-1 p-3 divrejectedblock">
                <div class="card border-danger shadow text-danger p-3 my-card " ><span class="fa fa-thumbs-down fa-lg " aria-hidden="true"></span></div>
                <div class="text-danger text-center mt-3"><h4>Rejected</h4></div>
                <div class="text-danger text-center mt-2"><h2><?php
$sql ="SELECT * FROM `change_request` left join hall_booking ON change_request.hall_booking_id=hall_booking.hall_booking_id WHERE change_request.status='Rejected' AND hall_booking.staffid='$_SESSION[staffid]'";
$qsql = mysqli_query($con,$sql);
echo mysqli_num_rows($qsql);
				?></h2></div>
            </div>
        </div>

	 </div>
</div>
	  <hr>
	  </p>
    
        <p>
        <h4 style="text-align:right;">Search Records Here<i class="fa fa-down" aria-hidden="true"></i></i></h4>  
<table id="datatableplugin"  class="table table-bordered">
  
  <thead>
  <tr>
    <th>Hall</th>
    <th>Event Type</th>
    <th>Booking Date</th>
    <th>Total Strength</th>
    <th>Status</th>
    <th>Action</th>
  </tr>
  </thead>
  <tbody>
<?php
if(isset($_GET['st']))
{
$sql ="SELECT *,change_request.status as changereqstatus FROM `change_request` left join hall_booking ON change_request.hall_booking_id=hall_booking.hall_booking_id
LEFT JOIN hall ON hall_booking.hallid=hall.hallid 
LEFT JOIN department ON department.department_id=hall_booking.department_id 
LEFT JOIN staff ON staff.staffid=hall_booking.staffid 
LEFT JOIN eventtype ON eventtype.eventtypeid=hall_booking.eventtypeid WHERE change_request.status='$_GET[st]' AND hall_booking.staffid='$_SESSION[staffid]'";
$qsql = mysqli_query($con,$sql);
}
else
{
  $sql ="SELECT *,change_request.status as changereqstatus FROM `change_request` left join hall_booking ON change_request.hall_booking_id=hall_booking.hall_booking_id
LEFT JOIN hall ON hall_booking.hallid=hall.hallid 
LEFT JOIN department ON department.department_id=hall_booking.department_id 
LEFT JOIN staff ON staff.staffid=hall_booking.staffid 
LEFT JOIN eventtype ON eventtype.eventtypeid=hall_booking.eventtypeid WHERE hall_booking.staffid='$_SESSION[staffid]'";
$qsql = mysqli_query($con,$sql);

}
echo mysqli_error($con);
while($rs = mysqli_fetch_array($qsql))
{
	
	$req = unserialize($rs['requirements']);
	$reqrec= "";
	for($i=0;$i<count($req['equipmentqty']);$i++)
	{
		$reqrec = $reqrec . $req['equipment_type'][$i] . " - " . $req['equipmentqty'][$i] . ", ";
	}
	echo "
    <tr>
        <td>"  . $rs['hallname'] . "</td>
        <td>"  . $rs['eventtype'] . "</td>
        <td>"  .  date("d-m-Y",strtotime($rs['booking_start_dt_tim'])) .",". date("h:i A",strtotime($rs['booking_start_dt_tim'])) . " -<br> " . date("d-m-Y",strtotime($rs['booking_end_dt_tim'])) .",". date("h:i A",strtotime($rs['booking_end_dt_tim'])) . "</td>
        <td>"  . $rs['total_strength'] . "</td>
        <td>"  . $rs['changereqstatus'] . "</td>
        <td><a href='hall_change_request_ack.php?hall_booking_id=$rs[hall_booking_id]' class='btn btn-info' style='width: 100%;' >View</a></td>
    </tr>
  ";
}
?>
  </tbody>
</table>
        </p>
      </div>
    </section>
</main><!-- End #main -->
<?php include("footer.php"); ?>