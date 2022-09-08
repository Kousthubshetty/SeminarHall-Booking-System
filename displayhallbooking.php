<?php
include("header.php");

if(!isset($_SESSION['adminid']))
{
    echo "<script>window.location='adminlogin.php';</script>";  
}

if(isset($_POST['btnbookingstatus']))
{
	$sqlfoodorder = "UPDATE hall_booking SET presence_status='$_POST[presence_status]' where hall_booking_id='" . $_GET['viewid'] . "'";
	echo $sqlfoodorder;
	$$sqlfoodorder = mysqli_query($con,$sqlfoodorder);
	  echo mysqli_error($con);
	  if(mysqli_affected_rows($con) == 1)
	  {
		  echo "<script>alert('Presence Status Updated successfully...');</script>";
	  }	  
}
if(isset($_POST['btnbookingapprove']))
{ 
	$sql ="SELECT hall_booking.*, hall.hallname, department.department_name, staff.staffname, eventtype.eventtype FROM hall_booking LEFT JOIN hall ON hall_booking.hallid=hall.hallid LEFT JOIN department ON department.department_id=hall_booking.department_id LEFT JOIN staff ON staff.staffid=hall_booking.staffid LEFT JOIN eventtype ON eventtype.eventtypeid=hall_booking.eventtypeid WHERE hall_booking.hall_booking_id = '$_GET[viewid]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	$rs = mysqli_fetch_array($qsql);
	$sqlprofile = "SELECT * FROM staff WHERE staffname='" . $rs['staffname'] . "'";
	$qsqlprofile = mysqli_query($con,$sqlprofile);
	$rsprofile = mysqli_fetch_array($qsqlprofile);
	$staffname = $rsprofile['staffname'];
	$staffid = $rsprofile['emailid'];
	$sqlprofile = "SELECT * FROM admin WHERE adminid='" . $_SESSION['adminid'] . "'";
	$qsqlprofile = mysqli_query($con,$sqlprofile);
	$rsprofile = mysqli_fetch_array($qsqlprofile);
	$adminid = $rsprofile['emailid'];
	$adminname = $rsprofile['adminname'];
	$adminnote=$_POST['adminnote'];
	if($_POST['adminnote'] == $rs['admin_note'])
	{
		$sqlupd = "UPDATE hall_booking SET status='Approved',admin_note='' WHERE hall_booking_id='$_POST[bookingid]'";
	$qsqlupd= mysqli_query($con,$sqlupd);
	
	}
	else
	{
	$sqlupd = "UPDATE hall_booking SET status='Approved',admin_note='$_POST[adminnote]' WHERE hall_booking_id='$_POST[bookingid]'";
	$qsqlupd= mysqli_query($con,$sqlupd);
	}
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Hall booking request Approved..');</script>";
	}

//########## MAIL CODE STARTS HERE ############
$subject="Your Request For Seminar Hall Booking is Approved...";
$sql_hall_booking = "SELECT hall_booking.*, hall.hallname,hall.max_capacity, hall.hallimage, eventtype.eventtype, eventtype.eventicon, staff.staffname,staff.emailid,staff.profile_img, staff.phno, department.department_name FROM hall_booking LEFT JOIN hall ON hall.hallid=hall_booking.hallid LEFT JOIN eventtype ON eventtype.eventtypeid=hall_booking.eventtypeid LEFT JOIN staff ON staff.staffid=hall_booking.staffid left join department ON department.department_id=hall_booking.department_id where hall_booking.hall_booking_id='$_GET[viewid]'";
$qsql_hall_booking = mysqli_query($con,$sql_hall_booking);
echo mysqli_error($con);
$rshallbooking = mysqli_fetch_array($qsql_hall_booking);
$arrdata['start_dt_tim'] = date("d-m-Y h:i A",strtotime($rshallbooking['booking_start_dt_tim']));
$arrdata['end_dt_tim'] = date("d-m-Y h:i A",strtotime($rshallbooking['booking_end_dt_tim']));
$arrdata['link'] = "http".(!empty($_SERVER['HTTPS']) ? 's' : '') . "://" . $_SERVER['SERVER_NAME'].substr($_SERVER['PHP_SELF'], 0, strrpos($_SERVER['PHP_SELF'], '/')) . "/hall_booking_acknowledgement.php?hall_booking_id=".$_GET['viewid'];
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
$message="";
include("phpmailer.php");
hallbookingverification($adminid,$adminname,$subject,$tblmessage,$staffname,$staffid,$arrdata);
//########## MAIL CODE ENDS HERE ############
//###Change Request Starts Here
$sqlch_req= "SELECT * FROM change_request 
LEFT JOIN hall_booking ON change_request.hall_booking_id=hall_booking.hall_booking_id 
LEFT JOIN hall ON hall_booking.hallid=hall.hallid 
LEFT JOIN department ON department.department_id=hall_booking.department_id 
LEFT JOIN staff ON staff.staffid=hall_booking.staffid 
LEFT JOIN eventtype ON eventtype.eventtypeid=hall_booking.eventtypeid
WHERE change_request.reason LIKE '%i:$rs[hall_booking_id]%'";
$qsqlch_req = mysqli_query($con,$sqlch_req);
if(mysqli_num_rows($qsqlch_req) >= 1)
{
	while($rsch_req = mysqli_fetch_array($qsqlch_req))
	{
		$sqlchange_request  = "UPDATE change_request  SET status='Approved' WHERE hall_booking_id='$rsch_req[hall_booking_id]'";
		$qsqlchange_request = mysqli_query($con,$sqlchange_request);
		$sqlupd = "UPDATE hall_booking SET status='Cancelled',admin_note='$_POST[adminnote]' WHERE hall_booking_id='$rsch_req[hall_booking_id]'";
		$qsqlupd= mysqli_query($con,$sqlupd);
		//########## MAIL CODE STARTS HERE ############
		$subject="Hall booking - Change Request Accepted by Admin";
		$sql_hall_booking = "SELECT hall_booking.*, hall.hallname,hall.max_capacity, hall.hallimage, eventtype.eventtype, eventtype.eventicon, staff.staffname,staff.emailid,staff.profile_img, staff.phno, department.department_name FROM hall_booking LEFT JOIN hall ON hall.hallid=hall_booking.hallid LEFT JOIN eventtype ON eventtype.eventtypeid=hall_booking.eventtypeid LEFT JOIN staff ON staff.staffid=hall_booking.staffid left join department ON department.department_id=hall_booking.department_id where hall_booking.hall_booking_id='$rsch_req[hall_booking_id]'";
		$qsql_hall_booking = mysqli_query($con,$sql_hall_booking);
		echo mysqli_error($con);
		$rshallbooking = mysqli_fetch_array($qsql_hall_booking);
		$arrdata['start_dt_tim'] = date("d-m-Y h:i A",strtotime($rshallbooking['booking_start_dt_tim']));
		$arrdata['end_dt_tim'] = date("d-m-Y h:i A",strtotime($rshallbooking['booking_end_dt_tim']));
		$arrdata['link'] = "http".(!empty($_SERVER['HTTPS']) ? 's' : '') . "://" . $_SERVER['SERVER_NAME'].substr($_SERVER['PHP_SELF'], 0, strrpos($_SERVER['PHP_SELF'], '/')) . "/displayhallbooking.php?viewid=".$rsch_req['hall_booking_id'];
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
			if(isset($req['equipmentqty']))
			{
				for($i=0;$i<count(array($req['equipmentqty']));$i++)
				{
					$reqrec = $reqrec . $req['equipment_type'][$i] . " - " . $req['equipmentqty'][$i] . ", ";
				}
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
				<th class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">Booking Status</th>
				<td class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">' . $rshallbooking['status'] .'</td>
			</tr>
		</table>';
		funsendmail($rshallbooking['emailid'],$rshallbooking['staffname'],$subject,$message,$tblmessage,$arrdata);
		//########## MAIL CODE ENDS HERE ############		
	}
}
//###Change Request Ends Here
	

}
if(isset($_POST['btnbookingreject']))
{
	if($_POST['adminnote'] == $rs['admin_note'])
	{
		$sqlupd = "UPDATE hall_booking SET status='Rejected',admin_note='' WHERE hall_booking_id='$_POST[bookingid]'";
		$qsqlupd= mysqli_query($con,$sqlupd);	
	}
	else
	{
	$sqlupd = "UPDATE hall_booking SET status='Rejected',admin_note='$_POST[adminnote]' WHERE hall_booking_id='$_POST[bookingid]'";
	$qsqlupd= mysqli_query($con,$sqlupd);
	}
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Hall booking request Rejected..');</script>";
	}

	$sqlfood = "UPDATE bill SET bill_status='Rejected' where hall_booking_id = '$_GET[viewid]'";
	$qsqlfood = mysqli_query($con,$sqlfood);
	$sql ="SELECT hall_booking.*, hall.hallname, department.department_name, staff.staffname, eventtype.eventtype FROM hall_booking LEFT JOIN hall ON hall_booking.hallid=hall.hallid LEFT JOIN department ON department.department_id=hall_booking.department_id LEFT JOIN staff ON staff.staffid=hall_booking.staffid LEFT JOIN eventtype ON eventtype.eventtypeid=hall_booking.eventtypeid WHERE hall_booking.hall_booking_id = '$_GET[viewid]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	$rs = mysqli_fetch_array($qsql);

	$sqlprofile = "SELECT * FROM staff WHERE staffname='" . $rs['staffname'] . "'";
	$qsqlprofile = mysqli_query($con,$sqlprofile);
	$rsprofile = mysqli_fetch_array($qsqlprofile);
	$staffname = $rsprofile['staffname'];
	$staffid = $rsprofile['emailid'];
	
	$sqlprofile = "SELECT * FROM admin WHERE adminid='" . $_SESSION['adminid'] . "'";
	$qsqlprofile = mysqli_query($con,$sqlprofile);
	$rsprofile = mysqli_fetch_array($qsqlprofile);
	$adminid = $rsprofile['emailid'];
	$adminname = $rsprofile['adminname'];

	$adminnote=$_POST['adminnote'];
	$subject="Your Request For Seminar Hall Booking is Rejected";
		//########## MAIL CODE STARTS HERE ############
$subject="Your Request For Seminar Hall Booking is Rejected...";
$sql_hall_booking = "SELECT hall_booking.*, hall.hallname,hall.max_capacity, hall.hallimage, eventtype.eventtype, eventtype.eventicon, staff.staffname,staff.emailid,staff.profile_img, staff.phno, department.department_name FROM hall_booking LEFT JOIN hall ON hall.hallid=hall_booking.hallid LEFT JOIN eventtype ON eventtype.eventtypeid=hall_booking.eventtypeid LEFT JOIN staff ON staff.staffid=hall_booking.staffid left join department ON department.department_id=hall_booking.department_id where hall_booking.hall_booking_id='$_GET[viewid]'";
$qsql_hall_booking = mysqli_query($con,$sql_hall_booking);
echo mysqli_error($con);
$rshallbooking = mysqli_fetch_array($qsql_hall_booking);
$arrdata['start_dt_tim'] = date("d-m-Y h:i A",strtotime($rshallbooking['booking_start_dt_tim']));
$arrdata['end_dt_tim'] = date("d-m-Y h:i A",strtotime($rshallbooking['booking_end_dt_tim']));
$arrdata['link'] = "viewbooking.php";
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
hallbookingverification($adminid,$adminname,$subject,$tblmessage,$staffname,$staffid,$arrdata);
//########## MAIL CODE ENDS HERE ############
//###Change Request Starts Here
$sqlch_req= "SELECT * FROM change_request 
LEFT JOIN hall_booking ON change_request.hall_booking_id=hall_booking.hall_booking_id 
LEFT JOIN hall ON hall_booking.hallid=hall.hallid 
LEFT JOIN department ON department.department_id=hall_booking.department_id 
LEFT JOIN staff ON staff.staffid=hall_booking.staffid 
LEFT JOIN eventtype ON eventtype.eventtypeid=hall_booking.eventtypeid
WHERE change_request.reason LIKE '%i:$rs[hall_booking_id]%'";
$qsqlch_req = mysqli_query($con,$sqlch_req);
if(mysqli_num_rows($qsqlch_req) >= 1)
{
	while($rsch_req = mysqli_fetch_array($qsqlch_req))
	{
		$sqlchange_request  = "UPDATE change_request  SET status='Rejected' WHERE hall_booking_id='$rsch_req[hall_booking_id]'";
		$qsqlchange_request = mysqli_query($con,$sqlchange_request);
		$sqlupd = "UPDATE hall_booking SET status='Approved',admin_note='$_POST[adminnote]' WHERE hall_booking_id='$rsch_req[hall_booking_id]'";
		$qsqlupd= mysqli_query($con,$sqlupd);
		//##########################################
		//##########################################
		//########## MAIL CODE STARTS HERE ############
		$subject="Hall booking - Change Request Rejected by Admin";
		$sql_hall_booking = "SELECT hall_booking.*, hall.hallname,hall.max_capacity, hall.hallimage, eventtype.eventtype, eventtype.eventicon, staff.staffname,staff.emailid,staff.profile_img, staff.phno, department.department_name FROM hall_booking LEFT JOIN hall ON hall.hallid=hall_booking.hallid LEFT JOIN eventtype ON eventtype.eventtypeid=hall_booking.eventtypeid LEFT JOIN staff ON staff.staffid=hall_booking.staffid left join department ON department.department_id=hall_booking.department_id where hall_booking.hall_booking_id='$rsch_req[hall_booking_id]'";
		$qsql_hall_booking = mysqli_query($con,$sql_hall_booking);
		echo mysqli_error($con);
		$rshallbooking = mysqli_fetch_array($qsql_hall_booking);
		$arrdata['start_dt_tim'] = date("d-m-Y h:i A",strtotime($rshallbooking['booking_start_dt_tim']));
		$arrdata['end_dt_tim'] = date("d-m-Y h:i A",strtotime($rshallbooking['booking_end_dt_tim']));
		$arrdata['link'] = "http".(!empty($_SERVER['HTTPS']) ? 's' : '') . "://" . $_SERVER['SERVER_NAME'].substr($_SERVER['PHP_SELF'], 0, strrpos($_SERVER['PHP_SELF'], '/')) . "/displayhallbooking.php?viewid=".$rsch_req['hall_booking_id'];
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
			if(isset($req['equipmentqty']))
			{
				for($i=0;$i<count(array($req['equipmentqty']));$i++)
				{
					$reqrec = $reqrec . $req['equipment_type'][$i] . " - " . $req['equipmentqty'][$i] . ", ";
				}
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
				<th class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">Booking Status</th>
				<td class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">' . $rshallbooking['status'] .'</td>
			</tr>
		</table>';
		funsendmail($rshallbooking['emailid'],$rshallbooking['staffname'],$subject,$message,$tblmessage,$arrdata);
		//########## MAIL CODE ENDS HERE ###########		
		//##########################################
		//##########################################
	}
}
//###Change Request Ends Here
	
}

$sql ="SELECT hall_booking.*, hall.hallname, department.department_name, staff.staffname, eventtype.eventtype FROM hall_booking LEFT JOIN hall ON hall_booking.hallid=hall.hallid LEFT JOIN department ON department.department_id=hall_booking.department_id LEFT JOIN staff ON staff.staffid=hall_booking.staffid LEFT JOIN eventtype ON eventtype.eventtypeid=hall_booking.eventtypeid WHERE hall_booking.hall_booking_id = '$_GET[viewid]'";
$qsql = mysqli_query($con,$sql);
echo mysqli_error($con);
$rs = mysqli_fetch_array($qsql);
?>
  <main id="main">
  
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>View Hall Booking Details</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>View Hall Booking Detail</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->
	<div style="padding-left:70px; padding-top: 20px;">
	<a href="#" class="back" onclick="window.history.back()" >&laquo; Back</a>
	</div> 
<form method="post" action=""   id="printableArea">
	<input type="hidden" name="bookingid" id="bookingid" value="<?php echo $_GET['viewid']; ?>">
    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="padd-section" style="padding-top: 20px;">
      <div class="container" data-aos="fade-up">
        <div class="row">

          <div class="col-md-12">

            <div class="testimonials-content">
              <div id="carousel-example-generic" class="carousel slide" data-bs-ride="carousel">

                <div class="carousel-inner" role="listbox">

                  <div class="carousel-item  active">
                    <div class="top-top">
<h4>View Bookings</h4>					
<table class="table table-bordered">
	<tr>
		<th>Hall</th>
		<td><?php echo $rs['hallname']; ?></td>
	</tr>
		<tr>
		<th>Booked on</th>
		<td><?php echo date("d-m-Y",strtotime($rs['booked_date'])); ?></td>
	</tr>
	<tr>
		<th>Department</th>
		<td><?php echo $rs['department_name']; ?></td>
	</tr>
	<tr>
		<th>Staff</th>
		<td><?php echo $rs['staffname']; ?></td>
	</tr>
	<tr>
		<th>Event Type</th>
		<td><?php echo $rs['eventtype']; ?></td>
	</tr>
	<tr>
		<th>Hall Booking Reason</th>
		<td><?php echo $rs['booking_reason']; ?></td>
	</tr>
	<tr>
		<th>Booking schedule</th>
		<td><?php echo date("d-m-Y h:i A",strtotime($rs['booking_start_dt_tim'])) . " -  " .  date("h:i A",strtotime($rs['booking_end_dt_tim'])); ?></td>
	</tr>
	<tr>
		<th>Total Strength</th>
		<td><?php echo $rs['total_strength']; ?></td>
	</tr>
	<tr>
		<th>Requirements</th>
		<td>
<?php
$req = unserialize($rs['requirements']);
$reqrec= "";
if($req['equipmentqty'][0] != "")
{
?>
<table class="table table-bordered"	>
	<thead>
		<tr>
			<th>Image</th>
			<th>Equipment</th>
			<th>Quantity</th>
			
	
		</tr>
	</thead>
	<tbody>
		
	<?php

	for($i=0;$i<count($req['equipmentqty']);$i++)
	{
		$a = $req['equipment_id'][$i];
		$estatus = $rs['equipment_status'];
		$estatus = unserialize($estatus);
		echo "<tr><td><img src='equipment_images/" .  $req['img'][$i] . "' style='width: 60px;height:60px'></td><td>" .  $req['equipment_type'][$i] . "</td><td>" . $req['equipmentqty'][$i] . "</td></tr>";
	}
	?>
	</tbody>
</table>
<?php
}

else
{
	echo "Not specified";
}
?>
			</td>
	</tr>

	<tr>
		<th>Staff Note</th>
		<td><?php echo $rs['staff_note']; ?></td>
	</tr>
	<tr>
		<th>Admin Note</th>
		<td><textarea class="form-control" name="adminnote" id="adminnote"><?php echo $rs['admin_note']; ?></textarea></td>
	</tr>
	<tr>
		<th>Status</th>
		<td><?php 
		if($rs['status'] == "Inactive")
		{
			echo "Pending";
		}
		else
		{
			echo $rs['status']; 
		}
			?></td>
	</tr>
	<?php 
	$currentdate = strtotime(date("Y-m-d h:i A"));
	$bookeddate = strtotime(date("Y-m-d h:i A",strtotime($rs['booking_end_dt_tim'])));
	if($bookeddate <= $currentdate && $rs['status']=="Approved")
	{
	?>
	<tr>
		<th>Engagement Status</th>
		<td>  
	<div class="row">
    <div class="col">
			<select name="presence_status" id="presence_status"  class="form-control"   onchange="return validateform()" style="">
              <option value="">Select Engagement Status</option>
              <?php
              $arr = array("Engaged","Not Engaged");
              foreach($arr as $val)
              {
				  if($rs['presence_status'] == $val)
				  {
                echo "<option value='$val' selected>$val</option>";
				  }
				  else
				  {
                echo "<option value='$val'>$val</option>";
				  }
              }
              ?>
            </select>
			</div>
    <div class="col">
	<button type="submit" id="btnbookingstatus" name="btnbookingstatus" class="btn btn-info" style="border-radius:0px; padding: 10px 20px;" onclick="return validateform()">Update Status</button>
		<span class="errmsg"  id="errpresence_status" style="margin-left:0px; font-size:15px;"></span>
		</div>
  </div>
		</td>
			
	</tr>
	<?php
	if($rs['presence_status'] == "Engaged")
	{
	?>
	<tr>
		<th>Event Images</th>
		<td>
			<a id="btnaddimage" name="btnaddimage" class="btn btn-primary" style="border-radius:30px; padding: 10px 50px;" onclick="location.href = 'addeventimages.php?viewid=<?php echo $_GET['viewid']; ?>';">Add Images</a>
			<a href="vieweventimages.php?viewid=<?php echo $_GET['viewid']; ?>" id="btnviewimage" name="btnviewimage" class="btn btn-success" style="border-radius:30px; padding: 10px 50px; background-color:#71c55d;">View Images</a>
			
	</td>
	</tr>
	<?php
}
	}
?>
</table>
<?php
$sqlch_req= "SELECT * FROM change_request 
LEFT JOIN hall_booking ON change_request.hall_booking_id=hall_booking.hall_booking_id 
LEFT JOIN hall ON hall_booking.hallid=hall.hallid 
LEFT JOIN department ON department.department_id=hall_booking.department_id 
LEFT JOIN staff ON staff.staffid=hall_booking.staffid 
LEFT JOIN eventtype ON eventtype.eventtypeid=hall_booking.eventtypeid
WHERE change_request.reason LIKE '%i:$rs[hall_booking_id]%'";
$qsqlch_req = mysqli_query($con,$sqlch_req);
if(mysqli_num_rows($qsqlch_req) >= 1)
{
?><hr>
<b>Change Request For:</b>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>Department Name</th>
			<th>Staff Name</th>
			<th>Event Type</th>
			<th>Booking detail</th>
		</tr>
	</thead>
	<tbody>
	<?php
	while($rsch_req = mysqli_fetch_array($qsqlch_req))
	{
	  echo "<tr>
			<td>"  . $rsch_req['department_name'] . "</td>
			<td>"  . $rsch_req['staffname'] . "</td>
			<td>"  . $rsch_req['eventtype'] . "</td>
			<td>"  . date("d-m-Y h:i A",strtotime($rsch_req['booking_start_dt_tim'])) . " -  " .  date("h:i A",strtotime($rsch_req['booking_end_dt_tim'])) . "</td></td></tr>";
	}
	?>
	</tbody>
</table><hr>
<?php
}
?>

<center>
<?php
$currentdate = strtotime(date("Y-m-d"));
$bookeddate = strtotime(date("Y-m-d",strtotime($rs['booking_start_dt_tim'])));
if($bookeddate > $currentdate )
{

	$sqlchkdate = "SELECT * FROM `hall_booking` WHERE ((`booking_start_dt_tim` BETWEEN '".$rs['booking_start_dt_tim']."' AND '".$rs['booking_end_dt_tim']."') OR (`booking_end_dt_tim` BETWEEN  '".$rs['booking_start_dt_tim']."' AND '".$rs['booking_end_dt_tim']."')) AND ('".$rs['booking_end_dt_tim']."' <> booking_start_dt_tim AND '".$rs['booking_start_dt_tim']."' <> booking_end_dt_tim) AND hallid=".$rs['hallid']." AND status='Approved'";
		$qsqchkdate = mysqli_query($con,$sqlchkdate);
		// echo $sqlnf;
		$qsqlnf = mysqli_query($con,$sqlnf);
		// echo "".mysqli_num_rows($qsqlnf)."";
		//if(mysqli_num_rows($qsqlnf) == 0)
		if(mysqli_affected_rows($con) == 0)
		{
		?>
		<button type="submit" id='btn-approved' class='btn btn-success' style="font-size: 12px;" name="btnbookingapprove"> <i class="fa fa-thumbs-up" aria-hidden="true"></i> Approve</button>
<?php
}
else if($rs['status'] == 'Pending' || $rs['status'] == 'Rejected' && mysqli_num_rows($qsqlch_req) == 0)
{
	?>
	<div class='container'><div class='row'><div class='col-md-12'><div class='alert alert-warning' role='alert'>This requested time is already alloted</div></div></div></div>

	<?php
}
if(mysqli_num_rows($qsqlch_req) >= 1 && mysqli_affected_rows($con) != 0)
{
	?>
	<button type="submit" id='btn-approved' class='btn btn-success' style="font-size: 12px;" name="btnbookingapprove"> <i class="fa fa-thumbs-up" aria-hidden="true"></i> Approve</button>
<?php
}
?>
<button type="submit" id='btn-rejected' class='btn btn-danger' style="font-size: 12px;"  name="btnbookingreject"> <i class="fa fa-thumbs-down" aria-hidden="true"></i> Reject</button>
<?php
}
?>

<?php
$bill = "SELECT * from bill where hall_booking_id = '$_GET[viewid]'";
$qsqlbill = mysqli_query($con,$bill);
$rsbill = mysqli_fetch_array($qsqlbill);
if(mysqli_affected_rows($con) >= 1)
	{
?>

<a href="foodorderbillingreceipt.php?bill_id=<?php echo $rsbill['bill_id']; ?>" id="btnviewfood" class="btn btn-primary" style="font-size: 12px;" name="btnviewfood"></i> View Food order</a>

<?php
	}
?>
	<button type="button" id="btn-print" class="btn btn-info" style="font-size: 12px;" name="btnbookingprint" onclick="printDiv('printableArea')" ><i class="fa fa-print" aria-hidden="true"></i> Print</button>
</center>
                    </div>
                  </div>

                </div>

              </div>
            </div>
          </div>

        </div>
      </div>
    </section><!-- End Testimonials Section -->	
  </main><!-- End #main -->
  
  <!-- <script>
	    document.getElementByID("upload_file").addEventListener("click",cleartable);
	function cleartable()
	{
		
		document.getElementById("image_preview").innerHTML = "";
	}
  </script>	 -->
  <script>
function preview_image() 
{
 var total_file=document.getElementById("upload_file").files.length;
 for(var i=0;i<total_file;i++)
 {
  $('#image_preview').append("<table border='1'><tr><td><img src='"+URL.createObjectURL(event.target.files[i])+"' width='200px' height='200px'><br><hr><a type='button' class='btn btn-info' style='border-radius:0px; margin-left:30px; margin-bottom:10px;' onclick ='delete_user($(this))'>delete</a></td><br></tr></table>");
 }
}
</script>
  <script>
	 status="<?php echo $rs['status']; ?>";
	  if(status=="Approved")
	  {
		document.getElementById("btn-approved").style.display="none";
	  }
	  else if(status=='Rejected')
	  {
		document.getElementById('btn-rejected').style.display="none";
	  }
	  else if(status=='Cancelled')
	  {
		document.getElementById('btn-rejected').style.display="none";
		document.getElementById('btn-approved').style.display="none";
	  }
  </script>

<script>
// function delete_user(row)
// {
// 	// if(confirm("Are you sure want to delete this record?") == true)
// 	// {
// 		// $("#equipment_id option[value='" + equipment_id + "']").removeAttr("disabled","disabled");
// 		row.closest('tr').remove();
// 	// }
// }
// </script>


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

<!-- <script>
function addimage(file[])
{
	console.log(equipment_id + " - " + equipmentqty,equipment_type + " - " + equipment_img);
	if(parseInt(equipmentqty) > parseInt($("#equipmentqty").attr("max")))
	{
		alert('Equipment quantity exceeded. It should not be greater than ' + $("#equipmentqty").attr("max"));
	}
	else
	{
		tablerow = "<tr><td><img src='equipment_images/"  + equipment_img + "' style='width: 75px; height: 75px;'></td><td><input type='hidden' name='equipment_img[]' id='equipment_img[]' value='" + equipment_img + "' ><input type='hidden' name='equipment_ids[]' id='equipment_ids' value='" + equipment_id + "' ><input type='hidden' name='equipment_type[]' id='equipment_type[]' value='" + equipment_type + "' ><input type='hidden' name='equipmentqty[]' id='equipmentqty[]' value='" + equipmentqty + "' >" + equipment_type + "</td><td>" + equipmentqty + "</td><td><a type='button' class='btn btn-danger' onclick ='delete_user(" + equipment_id + ",$(this))' >Delete</a></td></tr>";
		$('#tblequipmenttable > tbody').append(tablerow);
		$("#equipment_id option[value='" + equipment_id + "']").attr("disabled","disabled");
		$("#equipment_id").val('');
		$("#equipmentqty").val('');
		$("#equipment_type").val('');
	}
}
</script> -->
<script>
function validateform()
{
	var numericExpression = /^[0-9]+$/;
	var alphaExp = /^[a-zA-Z]+$/;
	var alphaNumericExp = /^[0-9a-zA-Z]+$/;
	var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,5}$/;
	var alphaspaceExp = /^[a-zA-Z\s]+$/;
	var err = "false";
	$('.errmsg').empty();
	if($('#presence_status').val() == "")
	{
		$('#errpresence_status').html('Select Presence Status');
		err = "true";
	}
	if($('#status').val() == "")
	{
		$('#errstatus').html('Select Engagement Status');
		err = "true";
	}
	if(err == "true")
	{
		return false;
	}
	else
	{
		return true;
	}
}
</script>

  <?php include("footer.php"); ?>