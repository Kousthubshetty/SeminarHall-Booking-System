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
          <h2>View Hall Bookings  <?php
          if(isset($_GET['st']))
          {
           echo " - ";
           echo $_GET['st'];
          }
           ?></h2>
          
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>View Hall Bookings</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page pt-4">
      <div class="container">
      <a href="#" class="back" onclick="window.history.back()" >&laquo; Back</a> 
	  <p>
<div class="jumbotron">
<div class="row w-100">
  
        <div class="col-md-3" style="cursor: pointer;" onclick="window.location='viewbookings.php?st=Pending'">
            <div class="card border-info mx-sm-1 p-3 divpendingblock">
                <div class="card border-info shadow text-info p-3 my-card" ><span class="fa fa-eye fa-lg" aria-hidden="true"></span></div>
                <div class="text-info text-center mt-3"><h4>Pending</h4></div>
                <div class="text-info text-center mt-2"><h2><?php
$sql ="SELECT hall_booking.*, hall.hallname, department.department_name, staff.staffname, eventtype.eventtype FROM hall_booking LEFT JOIN hall ON hall_booking.hallid=hall.hallid LEFT JOIN department ON department.department_id=hall_booking.department_id LEFT JOIN staff ON staff.staffid=hall_booking.staffid LEFT JOIN eventtype ON eventtype.eventtypeid=hall_booking.eventtypeid";
$sql = $sql . " WHERE (hall_booking.status='Pending' OR hall_booking.status='Inactive') AND hall_booking.staffid='$_SESSION[staffid]'";
$qsql = mysqli_query($con,$sql);
echo mysqli_num_rows($qsql);
				?></h2></div>
            </div>
        </div>
        <div class="col-md-3" onclick="window.location='viewbookings.php?st=Approved'">
            <div class="card border-success mx-sm-1 p-3 divapprovedblock">
                <div class="card border-success shadow text-success p-3 my-card "><span class="fa fa-thumbs-up fa-lg" aria-hidden="true"></span></div>
                <div class="text-success text-center mt-3"><h4>Approved</h4></div>
                <div class="text-success text-center mt-2"><h2><?php
$sql ="SELECT hall_booking.*, hall.hallname, department.department_name, staff.staffname, eventtype.eventtype FROM hall_booking LEFT JOIN hall ON hall_booking.hallid=hall.hallid LEFT JOIN department ON department.department_id=hall_booking.department_id LEFT JOIN staff ON staff.staffid=hall_booking.staffid LEFT JOIN eventtype ON eventtype.eventtypeid=hall_booking.eventtypeid";
$sql = $sql . " WHERE hall_booking.status='Approved' AND hall_booking.staffid='$_SESSION[staffid]'";
$qsql = mysqli_query($con,$sql);
echo mysqli_num_rows($qsql);
				?></h2></div>
            </div>
        </div>
        <div class="col-md-3" onclick="window.location='viewbookings.php?st=Rejected'">
            <div class="card border-danger mx-sm-1 p-3 divrejectedblock">
                <div class="card border-danger shadow text-danger p-3 my-card " ><span class="fa fa-thumbs-down fa-lg " aria-hidden="true"></span></div>
                <div class="text-danger text-center mt-3"><h4>Rejected</h4></div>
                <div class="text-danger text-center mt-2"><h2><?php
$sql ="SELECT hall_booking.*, hall.hallname, department.department_name, staff.staffname, eventtype.eventtype FROM hall_booking LEFT JOIN hall ON hall_booking.hallid=hall.hallid LEFT JOIN department ON department.department_id=hall_booking.department_id LEFT JOIN staff ON staff.staffid=hall_booking.staffid LEFT JOIN eventtype ON eventtype.eventtypeid=hall_booking.eventtypeid";
$sql = $sql . " WHERE hall_booking.status='Rejected' AND hall_booking.staffid='$_SESSION[staffid]'";
$qsql = mysqli_query($con,$sql);
echo mysqli_num_rows($qsql);
				?></h2></div>
            </div>
        </div>
        <div class="col-md-3" onclick="window.location='viewbookings.php?st=Cancelled'">
            <div class="card border-dark mx-sm-1 p-3 divrcancelledblock">
                <div class="card border-dark shadow text-dark p-3 my-card" ><span class="fa fa-close fa-lg " aria-hidden="true"></span></div>
                <div class="text-dark text-center mt-3"><h4>Cancelled</h4></div>
                <div class="text-dark text-center mt-2"><h2><?php
$sql ="SELECT hall_booking.*, hall.hallname, department.department_name, staff.staffname, eventtype.eventtype FROM hall_booking LEFT JOIN hall ON hall_booking.hallid=hall.hallid LEFT JOIN department ON department.department_id=hall_booking.department_id LEFT JOIN staff ON staff.staffid=hall_booking.staffid LEFT JOIN eventtype ON eventtype.eventtypeid=hall_booking.eventtypeid";
$sql = $sql . " WHERE hall_booking.status='Cancelled' AND hall_booking.staffid='$_SESSION[staffid]'";
$qsql = mysqli_query($con,$sql);
echo mysqli_num_rows($qsql);
				?></h2></div>
            </div>
        </div>
     </div>
</div>
	  
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
    <th>Requirements</th>
    <th>Status</th>
    <th>Action</th>
  </tr>
  </thead>
  <tbody>
<?php
$sql ="SELECT hall_booking.*, hall.hallname, department.department_name, staff.staffname, eventtype.eventtype,hall_booking.status as hall_bookingstatus FROM hall_booking LEFT JOIN hall ON hall_booking.hallid=hall.hallid LEFT JOIN department ON department.department_id=hall_booking.department_id LEFT JOIN staff ON staff.staffid=hall_booking.staffid LEFT JOIN eventtype ON eventtype.eventtypeid=hall_booking.eventtypeid WHERE hall_booking.staffid='$_SESSION[staffid]'";
if($_GET['st'] == 'Pending')
{
	$sql = $sql . " AND hall_booking.status='$_GET[st]'";
}
else if($_GET['st'] == 'Approved')
{
	$sql = $sql . " AND hall_booking.status='$_GET[st]'";
}
else if($_GET['st'] == 'Rejected')
{
	$sql = $sql . " AND hall_booking.status='$_GET[st]'";
}
else if($_GET['st'] == 'Cancelled')
{
  $sql = $sql . " AND hall_booking.status='$_GET[st]'";
}
else
{
	$sql = $sql . " AND hall_booking.status!=''";
}
$qsql = mysqli_query($con,$sql);
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
        <td>"  . $reqrec . "</td>
        <td>"  . $rs['hall_bookingstatus'] . "</td>
        <td><a href='hall_booking_acknowledgement.php?hall_booking_id=$rs[hall_booking_id]' class='btn btn-info' style='width: 100%;' >View</a></td>
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