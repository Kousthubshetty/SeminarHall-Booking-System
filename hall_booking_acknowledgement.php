<?php
include("header.php");
//Cancellation Request Code Starts here
if(!isset($_SESSION['staffid']))
{
    echo "<script>window.location='stafflogin.php';</script>";  
}
if(isset($_POST['btncancelsubmit']))
{
	$sqlfood = "UPDATE bill SET bill_status='Cancelled' where hall_booking_id = '$_GET[hall_booking_id]'";
	$qsqlfood = mysqli_query($con,$sqlfood);

	$sqlupd = "UPDATE hall_booking SET status='Cancelled',booking_reason= concat(booking_reason, '<br><b>Reason for Cancellation:</b></br>$_POST[textcancellation]') WHERE hall_booking_id='$_POST[hall_booking_id]'";
	$qsqlupd= mysqli_query($con,$sqlupd);
	if(mysqli_affected_rows($con) == 1)
	{
//########## MAIL CODE STARTS HERE ############
$subject="Hall booking request Cancelled";
$sql_hall_booking = "SELECT hall_booking.*, hall.hallname,hall.max_capacity, hall.hallimage, eventtype.eventtype, eventtype.eventicon, staff.staffname,staff.emailid,staff.profile_img, staff.phno, department.department_name FROM hall_booking LEFT JOIN hall ON hall.hallid=hall_booking.hallid LEFT JOIN eventtype ON eventtype.eventtypeid=hall_booking.eventtypeid LEFT JOIN staff ON staff.staffid=hall_booking.staffid left join department ON department.department_id=hall_booking.department_id where hall_booking.hall_booking_id='$_POST[hall_booking_id]'";
$qsql_hall_booking = mysqli_query($con,$sql_hall_booking);
echo mysqli_error($con);
$rshallbooking = mysqli_fetch_array($qsql_hall_booking);
$arrdata['start_dt_tim'] = date("d-m-Y h:i A",strtotime($rshallbooking['booking_start_dt_tim']));
$arrdata['end_dt_tim'] = date("d-m-Y h:i A",strtotime($rshallbooking['booking_end_dt_tim']));
$arrdata['link'] = "http".(!empty($_SERVER['HTTPS']) ? 's' : '') . "://" . $_SERVER['SERVER_NAME'].substr($_SERVER['PHP_SELF'], 0, strrpos($_SERVER['PHP_SELF'], '/')) . "/displayhallbooking.php?viewid=".$_POST['hall_booking_id'];
$message="";
$tblmessage = '<table class="mb mt" style="font-weight: normal;border-collapse: collapse;border: 0;margin: 0;padding: 0;font-family: Arial, sans-serif;margin-bottom: 15px;margin-top: 0;">
	<tr>
		<th class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">Booking No.</th>
		<td class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">' . $rshallbooking[0] .'</td>
	</tr>	
	<tr>
		<th class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">Hall Name</th>
		<td class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">' . $rshallbooking['hallname'] .'</td>
	</tr>	
	<tr>
		<th class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">Staff Name</th>
		<td class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">' . $rshallbooking['staffname'] .'</td>
	</tr>
	<tr>
		<th class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">Booked Date</th>
		<td class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">' . $rshallbooking['booked_date'] .'</td>
	</tr>
	<tr>
		<th class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">Department</th>
		<td class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">' . $rshallbooking['department_name'] .'</td>
	</tr>
	<tr>
		<th class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">Event Type</th>
		<td class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">' . $rshallbooking['eventtype'] .'</td>
	</tr>
	<tr>
		<th class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">Booking Date/Time</th>
		<td class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">' .  date("d-m-Y h:i A",strtotime($rshallbooking['booking_start_dt_tim'])) . " - " . date("h:i A",strtotime($rshallbooking['booking_end_dt_tim'])) . '</td>
	</tr>
	<tr>
		<th class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">Booking Reason</th>
		<td class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">' . $rshallbooking['booking_reason'] .'</td>
	</tr>
	<tr>
		<th class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">Total Attendees</th>
		<td class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">' . $rshallbooking['total_strength'] .'</td>
	</tr>
	<tr>
		<th class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">Requirements</th>
		<td class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">';
	$req = unserialize($rshallbooking['requirements']);
	$reqrec= "";
	for($i=0;$i<count($req['equipmentqty']);$i++)
	{
		$reqrec = $reqrec . $req['equipment_type'][$i] . " - " . $req['equipmentqty'][$i] . ", ";
	}
	$reqrec=  rtrim($reqrec, ", ");
	$tblmessage = $tblmessage .  $reqrec . '
	</td>
	</tr>
	<tr>
		<th class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">Staff Note</th>
		<td class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">' . $rshallbooking['staff_note'] .'</td>
	</tr>
	<tr>
		<th class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">Admin Note</th>
		<td class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">' . $rshallbooking['admin_note'] .'</td>
	</tr>
	<tr>
		<th class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">Booking Status</th>
		<td class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">' . $rshallbooking['status'] .'</td>
	</tr>
</table>';
include("phpmailer.php");
$sqlmailtoadmin ="SELECT * FROM admin";
$qsqlmailtoadmin = mysqli_query($con,$sqlmailtoadmin);
echo mysqli_error($con);
//echo $tblmessage;
while($rsmailtoadmin = mysqli_fetch_array($qsqlmailtoadmin))
{
funsendmail($rsmailtoadmin['emailid'],$rsmailtoadmin['adminname'],$subject,$message,$tblmessage,$arrdata);
}
//########## MAIL CODE ENDS HERE ############
		echo "<script>alert('Cancellation Done successfully..');</script>";
	}
}
//Cancellation Request Code Ends here
$sql_hall_booking = "SELECT hall_booking.*, hall.hallname,hall.max_capacity, hall.hallimage, eventtype.eventtype, eventtype.eventicon, staff.staffname,staff.emailid,staff.profile_img, staff.phno, department.department_name FROM hall_booking LEFT JOIN hall ON hall.hallid=hall_booking.hallid LEFT JOIN eventtype ON eventtype.eventtypeid=hall_booking.eventtypeid LEFT JOIN staff ON staff.staffid=hall_booking.staffid left join department ON department.department_id=hall_booking.department_id where hall_booking.hall_booking_id='$_GET[hall_booking_id]'";
$qsql_hall_booking = mysqli_query($con,$sql_hall_booking);
echo mysqli_error($con);
$rshallbooking = mysqli_fetch_array($qsql_hall_booking);
?>
<style>
/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 50%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
/*
.modal-header {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}
.modal-body {padding: 2px 16px;}

*/
.modal-footer {
  padding: 2px 16px;
 /* background-color: #5cb85c;*/
  color: white;
}
</style>
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Hall Booking Details</h2>
          <ol>
            <li><a href="#">Home</a></li>
            <li>Hall Booking Details</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->
	<div style="padding-left:70px; padding-top: 20px;">
	<a href="#" class="back" onclick="window.history.back()" >&laquo; Back</a>
	</div> 
    <section class="inner-page pt-4"  id="printableArea">
      <div class="container">
        <p >
<table class="table table-bordered">
	<tr>
		<th>Booking No.</th>
		<td><?php echo $rshallbooking[0]; ?>
			</td>
	</tr>	
	<tr>
		<th>Hall Name</th>
		<td><?php echo $rshallbooking['hallname']; ?>
			</td>
	</tr>	
	<tr>
		<th>Staff Name</th>
		<td><?php echo $rshallbooking['staffname']; ?></td>
	</tr>
	<tr>
		<th>Booked Date</th>
		<td><?php echo $rshallbooking['booked_date']; ?></td>
	</tr>
	<tr>
		<th>Department</th>
		<td><?php echo $rshallbooking['department_name']; ?></td>
	</tr>
	<tr>
		<th>Event Type</th>
		<td><?php echo $rshallbooking['eventtype']; ?></td>
	</tr>
	<tr>
		<th>Booking Date/Time</th>
		<td><?php echo date("d-m-Y h:i A",strtotime($rshallbooking['booking_start_dt_tim'])) . " -  " .  date("h:i A",strtotime($rshallbookingrs['booking_end_dt_tim'])); ?></td>
	</tr>
	<tr>
		<th>Booking Reason</th>
		<td><?php echo $rshallbooking['booking_reason']; ?></td>
	</tr>
	<tr>
		<th>Total Attendees</th>
		<td><?php echo $rshallbooking['total_strength']; ?></td>
	</tr>
	<tr>
		<th>Requirements</th>
		<td><?php 
	$req = unserialize($rshallbooking['requirements']);
	$reqrec= "";
	for($i=0;$i<count(array($req['equipmentqty']));$i++)
	{
		$reqrec = $reqrec . $req['equipment_type'][$i] . " - " . $req['equipmentqty'][$i] . ", ";
	}
			echo rtrim($reqrec, ", "); ?></td>
	</tr>

	<tr>
		<th>Admin Note</th>
		<td><?php echo $rshallbooking['admin_note']; ?></td>
	</tr>
	<tr>
		<th>Booking Status</th>
		<td><?php echo $rshallbooking['status']; ?></td>
	</tr>
	<?php
	$sql = "SELECT * FROM hall_booking where gallery<> '' and hall_booking_id = '$_GET[hall_booking_id]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	// $rs = mysqli_fetch_array($qsql);
	if(mysqli_affected_rows($con) == 1)
	{
	?>
	<tr>
		<th>Event Images</th>
		<td><a href="vieweventimages.php?viewid=<?php echo $_GET['hall_booking_id']; ?>" id="btnviewimage" name="btnviewimage" class="btn btn-success" style="border-radius:30px; padding: 10px 50px; background-color:#71c55d;">View Images</a>
</td>
	</tr>
	<?php
	}
	?>
</table> 
		</p>
      </div>
<hr>
<center>
<?php
$currentdate = strtotime(date("Y-m-d"));
$bookeddate = strtotime(date("Y-m-d",strtotime($rshallbooking['booking_start_dt_tim'])));
if($bookeddate > $currentdate )
{
if($rshallbooking['status'] == "Approved" || $rshallbooking['status'] == "Pending" || $rshallbooking['status'] == "Inactive")
{	
?>
	<button class="btn btn-danger" id="myBtn" style="font-size: 12px;" > <i class="fa fa-times-circle fa-lg" aria-hidden="true"></i> &nbsp; Cancel Booking</button>
<?php
}
$sql_bill = "SELECT * from bill where hall_booking_id = '$rshallbooking[hall_booking_id]'";
$qsql_bill = mysqli_query($con,$sql_bill);
echo mysqli_error($con);
if(mysqli_affected_rows($con) == 0)
{
	if($rshallbooking['status'] == "Approved" || $rshallbooking['status'] == "Pending" || $rshallbooking['status'] == "Inactive")
	
{
?>
	<a href="foodorderhotel.php?hall_booking_id=<?php echo $_GET['hall_booking_id']; ?>" class="btn btn-success" id="myfoodorder" style="font-size: 12px;" > <i class="fa fa-cutlery fa-lg" aria-hidden="true"></i> &nbsp; Food Order</a>
<?php
}
}
}
?>
	<button class="btn btn-info" id="btnprint" style="font-size: 12px;" onclick="printDiv('printableArea')" ><i class="fa fa-print fa-lg" aria-hidden="true"></i> Print</button></centeR>
       <br>
    </section>

  </main><!-- End #main -->
<!--Modal Window starts Here -->
<!-- The Modal -->
<div id="myModal" class="modal" style="overflow-y: scroll;">
  <!-- Modal content -->
  <div class="modal-content">
	<form action="" method="post" role="form" name="frm">
	<input type="hidden" name="hall_booking_id" id="hall_booking_id" value="<?php echo $_GET['hall_booking_id']; ?>" >
	
		<div class="modal-header" style="padding: 0rem 1rem;">
		  <h4>Reason for Cancellation</h4>
		  <span class="close" style="color: #1b1b1b;">&times;</span>
		</div>
		<div class="modal-body"  >
			<div class="row">
			<!--Equipment booking starts here -->
			<div class="row">
				<div class="col-md-12">
			<textarea class="form-control" name="textcancellation" id="textcancellation"></textarea>
				</div>
			</div>
			<!--Equipment booking ends here -->
			</div>
		</div>
		<div class="modal-footer">
		  <h3><button class="btn btn-info btn-lg" type="submit" name="btncancelsubmit" id="btncancelsubmit" >Click Here to Cancel </button></h3>
		</div>
	</form>
  </div>
</div>
<script>
// Get the modal
var modal = document.getElementById("myModal");
// Get the button that opens the modal
var btn = document.getElementById("myBtn");
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
<!--Modal Window ends Here -->
  <?php include("footer.php"); ?>
 <script>
	 function printDiv(divName) {
     var printContents = "<center><h3>Hall Booking Acknowledgement</h3></center><bR>" +  document.getElementById(divName).innerHTML; 
	 	printContents = printContents + " <style> @media print {   #myBtn {    display: none;  }  #btnprint {    display: none;  }  }</style>";
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>