<?php
include("header.php");
if(!isset($_SESSION['adminid']))
{
    echo "<script>window.location='adminlogin.php';</script>";  
}
if(isset($_GET['delid']))
{
    $sqldel = "DELETE FROM change_request WHERE reason  LIKE '%i:$_GET[delid]%'";
    $qsqldel = mysqli_query($con,$sqldel);
    echo mysqli_error($con);
	
    $sqldel = "DELETE FROM hall_booking WHERE hall_booking_id='" . $_GET['delid'] . "'";
    $qsqldel = mysqli_query($con,$sqldel);
    echo mysqli_error($con);
    if(mysqli_affected_rows($con) == 1)
    {
        echo "<script>alert('Hall Booking Record deleted successfully..');</script>";
        echo "<script>window.location='viewhallbooking.php';</script>";
    }
}
?>
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
		<div class="container">

        <div class="d-flex justify-content-between align-items-center">
          
          <h2>View Hall Bookings</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>View Hall Bookings</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page pt-4">
      <div class="container">
      <a href="#" class="back" onclick="window.history.back()" style="font-size:15px">&laquo; Back</a> <br><br>
      <?php 
if($_GET['st'] != "Inactive")
{
?>
      <form>
  <div class="row">
    <div class="col">
      From:
      <input type="hidden" id="st" name="st" value=<?php echo $_GET['st']; ?>>
      <input type="date" class="form-control" id="fromdate" name="fromdate" value="<?php echo $_GET['fromdate']; ?>">
    </div>
    <div class="col">
      To:
      <input type="date" class="form-control" id="todate" name="todate" value="<?php echo $_GET['todate']; ?>">
    </div>
    <div class="col">
      <br><button type="submit" class="btn btn-primary" style="border-radius: 0px;padding: 10px 20px;">Search</button>
    </div>
  </div><br><hr>
</form>
<?php
}
?>
      <p>
        <h4 style="text-align:right;">Search Records Here<i class="fa fa-down" aria-hidden="true"></i></i></h4>
<table id="datatableplugin"  class="table table-bordered">
  <thead align=center>
  <tr>
    <th>Hall</th>
    <th>Department</th>
    <th>Staff</th>
    <th>Event Type</th>
    <th>Booking Date and Time</th>
    <th>Total Strength</th>
    <th>Requirements</th>
    <th>Booking Reason</th>

	<?php
	if($_GET['st'] == 'Inactive')
	{
	?>
    <th>No. of Schedules</th>
	<?php
	}
	?>
	<?php
	if($_GET['st'] != 'Inactive')
	{
	?>
    <th>Status</th>
	<?php
	}
	?>
    <th>Action</th>
  </tr>
  </thead>
  <tbody>
<?php
$sql ="SELECT hall_booking.*, hall.hallname, department.department_name, staff.staffname, eventtype.eventtype FROM hall_booking 
LEFT JOIN hall ON hall_booking.hallid=hall.hallid 
LEFT JOIN department ON department.department_id=hall_booking.department_id 
LEFT JOIN staff ON staff.staffid=hall_booking.staffid 
LEFT JOIN eventtype ON eventtype.eventtypeid=hall_booking.eventtypeid";
if($_GET['st'] == 'Pending')
{
	$sql = $sql . " WHERE hall_booking.status='$_GET[st]'";
}
else if($_GET['st'] == 'Approved')
{
	$sql = $sql . " WHERE hall_booking.status='$_GET[st]'";
}
else if($_GET['st'] == 'Rejected')
{
	$sql = $sql . " WHERE hall_booking.status='$_GET[st]'";
}
else if($_GET['st'] == 'Cancelled')
{
  $sql = $sql . " WHERE hall_booking.status='$_GET[st]'";
}
else if($_GET['st'] == 'Inactive')
{
  $sql = $sql . " WHERE hall_booking.status='Inactive'";
}
else
{
	$sql = $sql . " WHERE hall_booking.status!=''";
}
if(isset($_GET['fromdate']) && isset($_GET['todate']))
{
  $sql = $sql . " AND ((hall_booking.booking_start_dt_tim BETWEEN '$_GET[fromdate]' AND '$_GET[todate]') OR (hall_booking.booking_end_dt_tim BETWEEN '$_GET[fromdate]' AND '$_GET[todate]')) ";
}
$qsql = mysqli_query($con,$sql);
echo mysqli_error($con);
while($rs = mysqli_fetch_array($qsql))
{
	$sqlch_req= "SELECT * FROM change_request WHERE reason  LIKE '%i:$rs[hall_booking_id]%'";
	$qsqlch_req = mysqli_query($con,$sqlch_req);
	$req = unserialize($rs['requirements']);
	$reqrec= "";
	for($i=0;$i<count($req['equipmentqty']);$i++)
	{
		$reqrec = $reqrec . $req['equipment_type'][$i] . " - " . $req['equipmentqty'][$i] . ", ";
	}
  echo "
    <tr align=center>
        <td>"  . $rs['hallname'] . "</td>
        <td>"  . $rs['department_name'] . "</td>
        <td>"  . $rs['staffname'] . "</td>
        <td>"  . $rs['eventtype'] . "</td>
        <td>"  . date("d-m-Y h:i A",strtotime($rs['booking_start_dt_tim'])) . " -  " .  date("s h:i A",strtotime($rs['booking_end_dt_tim'])) . "</td>
        <td>"  . $rs['total_strength'] . "</td>
        <td>"  . $reqrec . "</td>
        <td>"  . $rs['booking_reason'] . "</td>";

	if($_GET['st'] == 'Inactive')
	{
		echo "<td>";
		echo mysqli_num_rows($qsqlch_req);
        echo  "</td>";
	}
	if($_GET['st'] != 'Inactive')
	{
        echo "<td>"  . $rs['status'] . "</td>";
	}
        echo "<td style='width:100px;'><a href='displayhallbooking.php?viewid=$rs[hall_booking_id]' class='btn btn-success' style='width: 100%;background-color:#0dcaf0' >View</a><a href='viewhallbooking.php?delid=$rs[hall_booking_id]' class='btn btn-danger' onclick='return confirmdel()' style='width: 100%;' >Delete</a></td>
    </tr>
  ";
}
?>
  </tbody>
</table>
<center>
<?php 
if($_GET['st'] != "Inactive")
{
?>
<button type="button" id="btn-print" class="btn btn-info" style="font-size: 12px;background-color:#71c55d" name="btnbookingprint" onclick="printDiv('printableArea')" ><i class="fa fa-print" aria-hidden="true"></i> Print</button>
<?php

}
?>
</center>
<div id="printableArea" hidden>
 <center> <h2>Hall Booking Reports</h2></center>
<table id="datatableplugin"  class="table table-bordered" >
  <thead>
  <tr>
    <th>Sno</th>
    <th>Booking Date and Time</th>
    <th>Topic</th>
    <th>Department</th>
    <th>Staff</th>
  </tr>
  </thead>
  <tbody>
<?php
$sql ="SELECT hall_booking.*, hall.hallname, department.department_name, staff.staffname, eventtype.eventtype FROM hall_booking LEFT JOIN hall ON hall_booking.hallid=hall.hallid LEFT JOIN department ON department.department_id=hall_booking.department_id LEFT JOIN staff ON staff.staffid=hall_booking.staffid LEFT JOIN eventtype ON eventtype.eventtypeid=hall_booking.eventtypeid";
if($_GET['st'] == 'Pending')
{
	$sql = $sql . " WHERE hall_booking.status='$_GET[st]'";
}
else if($_GET['st'] == 'Approved')
{
	$sql = $sql . " WHERE hall_booking.status='$_GET[st]'";
}
else if($_GET['st'] == 'Rejected')
{
	$sql = $sql . " WHERE hall_booking.status='$_GET[st]'";
}
else if($_GET['st'] == 'Cancelled')
{
  $sql = $sql . " WHERE hall_booking.status='$_GET[st]'";
}
else
{
	$sql = $sql . " WHERE hall_booking.status!=''";
}
if(isset($_GET['fromdate']) && isset($_GET['todate']))
{
  $sql = $sql . " AND ((hall_booking.booking_start_dt_tim BETWEEN '$_GET[fromdate]' AND '$_GET[todate]') OR (hall_booking.booking_end_dt_tim BETWEEN '$_GET[fromdate]' AND '$_GET[todate]')) ";
}
$qsql = mysqli_query($con,$sql);
echo mysqli_error($con);
$count=1;
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
        <td>"  . $count . "</td>
        <td>"  . date("d-m-Y h:i A",strtotime($rs['booking_start_dt_tim'])) . " -  " .  date(" h:i A",strtotime($rs['booking_end_dt_tim'])) . "</td>
        <td>"  . $rs['eventtype'] . "</td>
        <td>"  . $rs['department_name'] . "</td>
        <td>"  . $rs['staffname'] . "</td>
    </tr>
  ";
  $count = $count + 1;
}
?>
  </tbody>
</table>
</div>
        </p>
      </div>
    </section>
</main><!-- End #main -->
<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
	printContents = printContents + " <style> @media print {   #btn-approved {    display: none;  }  #btn-rejected {    display: none;  }  #btn-print {    display: none;  }}</style>";
     var originalContents = document.body.innerHTML;
     document.body.innerHTML = printContents;
     window.print();
     document.body.innerHTML = originalContents;
}
</script>
<?php include("footer.php"); ?>