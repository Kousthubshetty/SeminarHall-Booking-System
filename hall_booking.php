<?php
session_start();
include("dbconnection.php");
if(!isset($_SESSION['staffid']))
{
    echo "<script>window.location='stafflogin.php';</script>";  
}
date_default_timezone_set("Asia/Calcutta");
//######
$sqlprofile = "SELECT * FROM staff WHERE staffid='" . $_SESSION['staffid'] . "'";
$qsqlprofile = mysqli_query($con,$sqlprofile);
$rsprofile = mysqli_fetch_array($qsqlprofile);
//######
if(isset($_POST['btnsubmit']))
{
	$arr_equipment['equipment_id'] = $_POST['equipment_id'];
	$arr_equipment['img'] = $_POST['equipment_img'];
	$arr_equipment['equipment_type'] = $_POST['equipment_type'];
	$arr_equipment['equipmentqty'] = $_POST['equipmentqty'];
	$arr_serialize_equip = serialize($arr_equipment);
	$booking_reason = nl2br($_POST['booking_reason']);
	// $staff_note = nl2br($_POST['staff_note']);
    $sqlinsert ="INSERT INTO hall_booking(hallid, booked_date, department_id, staffid, eventtypeid, booking_start_dt_tim,booking_end_dt_tim, booking_reason, total_strength, requirements, status) VALUES ('$_POST[hallid]','". date("Y-m-d H:i:s") ."','$rsprofile[department_id]','$_SESSION[staffid]','$_POST[eventtypeid]','$_POST[booking_date] $_POST[booking_st_time]','$_POST[booking_date] $_POST[booking_end_time]','$booking_reason','$_POST[total_strength]','$arr_serialize_equip','Pending')";
    $qsqlinsert = mysqli_query($con,$sqlinsert); 
    echo mysqli_error($con);
    if(mysqli_affected_rows($con) == 1)
    {
		$hall_booking_id = mysqli_insert_id($con);
//########## MAIL CODE STARTS HERE ############
$subject="Hall booking Request";
$sql_hall_booking = "SELECT hall_booking.*, hall.hallname,hall.max_capacity, hall.hallimage, eventtype.eventtype, eventtype.eventicon, staff.staffname,staff.emailid,staff.profile_img, staff.phno, department.department_name FROM hall_booking LEFT JOIN hall ON hall.hallid=hall_booking.hallid LEFT JOIN eventtype ON eventtype.eventtypeid=hall_booking.eventtypeid LEFT JOIN staff ON staff.staffid=hall_booking.staffid left join department ON department.department_id=hall_booking.department_id where hall_booking.hall_booking_id='$hall_booking_id'";
$qsql_hall_booking = mysqli_query($con,$sql_hall_booking);
echo mysqli_error($con);
$rshallbooking = mysqli_fetch_array($qsql_hall_booking);
$arrdata['start_dt_tim'] = date("d-m-Y h:i A",strtotime($rshallbooking['booking_start_dt_tim']));
$arrdata['end_dt_tim'] = date("d-m-Y h:i A",strtotime($rshallbooking['booking_end_dt_tim']));
$arrdata['link'] = "http".(!empty($_SERVER['HTTPS']) ? 's' : '') . "://" . $_SERVER['SERVER_NAME'].substr($_SERVER['PHP_SELF'], 0, strrpos($_SERVER['PHP_SELF'], '/')) . "/displayhallbooking.php?viewid=".$hall_booking_id;
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
		<th class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">Booking Status</th>
		<td class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">' . $rshallbooking['status'] .'</td>
	</tr>
</table>';
include("phpmailer.php");
$sqlmailtoadmin ="SELECT * FROM admin where status='Active'";
$qsqlmailtoadmin = mysqli_query($con,$sqlmailtoadmin);
echo mysqli_error($con);
//echo $tblmessage;
while($rsmailtoadmin = mysqli_fetch_array($qsqlmailtoadmin))
{
funsendmail($rsmailtoadmin['emailid'],$rsmailtoadmin['adminname'],$subject,$message,$tblmessage,$arrdata);
}
//########## MAIL CODE ENDS HERE ############
        echo "<script>alert('Hall booking done successfully. Admin needs to Verify your Booking details..');</script>";
       echo "<script>window.location='hall_booking_acknowledgement.php?hall_booking_id=$hall_booking_id';</script>";
    }
}
$sqlhalldet = "SELECT * FROM hall WHERE hallid='$_GET[hallid]'";
$qsqlhalldet = mysqli_query($con,$sqlhalldet);
$rshalldet = mysqli_fetch_array($qsqlhalldet);
//$bookingdate = "2021-08-21";
//$starttime = "10:00:00";
//$endtime = "12:00:00";
?>
<div class="row">
	<div class="col-lg-4 col-md-4">
	   Hall
		<input type="hidden" readonly name="hallid" id="hallid" value="<?php echo $rshalldet['hallid']; ?>" class="form-control">
		<input type="text" readonly value="<?php echo $rshalldet['hallname']; ?>" class="form-control">
 	</div>
			
	<div  class="col-lg-4 col-md-4">
		Event Type  <span class="errmsg"  id="erreventtypeid"></span>
		<select name="eventtypeid" id="eventtypeid"  class="form-control" required>
			<option value="">Select Event Type</option>
			<?php
			$sqleventtype = "SELECT * FROM eventtype where status='Active'";
			$qsqleventtype = mysqli_query($con,$sqleventtype);
			while($rseventtype = mysqli_fetch_array($qsqleventtype))
			{
				echo "<option value='$rseventtype[eventtypeid]'>$rseventtype[eventtype]</option>";
			}
			?>
		</select>
	</div>

	<div  class="col-lg-4 col-md-4">
	  Total Strength<span class="errmsg"  id="errtotal_strength"></span>
		<!-- <input type="number" class="form-control" name="total_strength" id="total_strength" placeholder="Enter Total Strength" min="1" max="" > -->
		<div class="slidecontainer">
  			<input type="range" name="total_strength" min="1" max="<?php echo $rshalldet['max_capacity']; ?>" class="slider slider-green" id="myRange2">
  			<p>Value: <b><span id="demo2" style="color: #5cb85c;"></span></b></p>
		</div>
	</div>
</div>
<div class="row">
	<div  class="col-lg-4 col-md-4"><br>
		Booking Date 
		<input type="date" class="form-control" name="booking_date" id="booking_date" value="<?php echo $bookingdate; ?>" readonly>
	</div>
			
	<div  class="col-lg-4 col-md-4"><br>
		Start Time
		<input type="time" class="form-control" name="booking_st_time" id="booking_st_time"  value="<?php echo $starttime; ?>" readonly>
	</div>

	<div  class="col-lg-4 col-md-4"><br>
		End Time
		<input type="time" class="form-control" name="booking_end_time" id="booking_end_time" value="<?php echo $endtime; ?>"  readonly >
	</div>		
</div>
<div class="row">
	<div  class="col-lg-12 col-md-12"><br>
	  Booking Reason 
		<textarea name="booking_reason" id="booking_reason" class="form-control" placeholder="Enter Booking Reason"></textarea>
	</div>
</div>
<!-- <div class="row">
	<div  class="col-lg-12 col-md-12"><br>
	Any Note
	<textarea name="staff_note" id="staff_note" class="form-control" placeholder="Enter Any Note"></textarea>
	</div>
</div> -->

