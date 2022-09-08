<?php
include("header.php");
$currentdate = date("Y-m-d h:i A");
$sqlchkdate = "UPDATE hall_booking set status='Rejected' where 
 ('$currentdate' > hall_booking.booking_start_dt_tim) AND status='Pending' OR status ='Inactive'";
 $qsqchkdate = mysqli_query($con,$sqlchkdate);

$sqlchkdate = "UPDATE bill set bill_status='Rejected' where  ('$currentdate' > date_time) AND bill_status='Pending'";
 $qsqchkdate = mysqli_query($con,$sqlchkdate);

if(!isset($_SESSION['staffid']))
{
    echo "<script>window.location='stafflogin.php';</script>";  
}
if(isset($_POST['btnsubmitchangereq']))
{
	$arr_equipment['equipment_id'] = $_POST['equipment_id'];
	$arr_equipment['img'] = $_POST['equipment_img'];
	$arr_equipment['equipment_type'] = $_POST['equipment_type'];
	$arr_equipment['equipmentqty'] = $_POST['equipmentqty'];
	$arr_serialize_equip = serialize($arr_equipment);
	$booking_reason = nl2br($_POST['booking_reason']);
	// $staff_note = nl2br($_POST['staff_note']);
    $sqlinsert ="INSERT INTO hall_booking(hallid, booked_date, department_id, staffid, eventtypeid, booking_start_dt_tim,booking_end_dt_tim, booking_reason, total_strength, requirements, status) VALUES ('$_POST[hallid]','". date("Y-m-d H:i:s") ."','$rsprofile[department_id]','$_SESSION[staffid]','$_POST[eventtypeid]','$_POST[booking_date] $_POST[booking_st_time]','$_POST[booking_date] $_POST[booking_end_time]','$booking_reason','$_POST[total_strength]','$arr_serialize_equip','Inactive')";
    $qsqlinsert = mysqli_query($con,$sqlinsert);
    echo mysqli_error($con);
    if(mysqli_affected_rows($con) == 1)
    {
		$hall_booking_id = mysqli_insert_id($con);
		//########## MAIL CODE STARTS HERE ############
		$subject="Change Request";
		$sql_hall_booking = "SELECT hall_booking.*, hall.hallname,hall.max_capacity, hall.hallimage, eventtype.eventtype, eventtype.eventicon, staff.staffname,staff.emailid,staff.profile_img, staff.phno, department.department_name FROM hall_booking LEFT JOIN hall ON hall.hallid=hall_booking.hallid LEFT JOIN eventtype ON eventtype.eventtypeid=hall_booking.eventtypeid LEFT JOIN staff ON staff.staffid=hall_booking.staffid left join department ON department.department_id=hall_booking.department_id where hall_booking.hall_booking_id='$hall_booking_id'";
		$qsql_hall_booking = mysqli_query($con,$sql_hall_booking);
		echo mysqli_error($con);
		$rshallbooking = mysqli_fetch_array($qsql_hall_booking);
		$arrdata['start_dt_tim'] = date("d-m-Y h:i A",strtotime($rshallbooking['booking_start_dt_tim']));
		$arrdata['end_dt_tim'] = date("d-m-Y h:i A",strtotime($rshallbooking['booking_end_dt_tim']));
		echo "<script>alert('Change Request sent successfully.');</script>";
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
			<th class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">Admin Note</th>
			<td class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">' . $rshallbooking['admin_note'] .'</td>
		</tr>
		<tr>
			<th class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">Booking Status</th>
			<td class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">' . $rshallbooking['status'] .'</td>
		</tr>
	</table>';
	include("phpmailer.php");
	//##########################
	$arr_change_reason = array("hall_booking_id"=>$hall_booking_id,"change_reason"=>$_POST['change_reason']);
	$s_arr_change_reason = serialize($arr_change_reason);
	$arrhallbookingid = $_POST['hall_booking_id'];
	//##########################
	if(count($arrhallbookingid) == 1)
	{
		$arrdata['link'] = "http".(!empty($_SERVER['HTTPS']) ? 's' : '') . "://" . $_SERVER['SERVER_NAME'].substr($_SERVER['PHP_SELF'], 0, strrpos($_SERVER['PHP_SELF'], '/')) . "/viewstaffchangerequest.php";
		echo $sqlreqhall_booking = "SELECT staff.emailid,staff.staffname  FROM  hall_booking LEFT JOIN staff ON hall_booking.staffid = staff.staffid where hall_booking.hall_booking_id='$arrhallbookingid[0]'";
		$qsqlreqhall_booking = mysqli_query($con,$sqlreqhall_booking);
		$rsreqhall_booking = mysqli_fetch_array($qsqlreqhall_booking);
		funsendmail($rsreqhall_booking['emailid'],$rsreqhall_booking['staffname'],$subject,$message,$tblmessage,$arrdata);
	}
	if(count($arrhallbookingid) >1)
	{
		$arrdata['link'] = "http".(!empty($_SERVER['HTTPS']) ? 's' : '') . "://" . $_SERVER['SERVER_NAME'].substr($_SERVER['PHP_SELF'], 0, strrpos($_SERVER['PHP_SELF'], '/')) . "/viewhallbooking.php?st=Inactive";
		$sqlmailtoadmin ="SELECT * FROM admin where status='Active'";
		$qsqlmailtoadmin = mysqli_query($con,$sqlmailtoadmin);
		echo mysqli_error($con);
		while($rsmailtoadmin = mysqli_fetch_array($qsqlmailtoadmin))
		{
			funsendmail($rsmailtoadmin['emailid'],$rsmailtoadmin['adminname'],$subject,$message,$tblmessage,$arrdata);
		}
	}
//########## MAIL CODE ENDS HERE ############
    }
	$arr_change_reason = array("hall_booking_id"=>$hall_booking_id,"change_reason"=>$_POST['change_reason']);
	$s_arr_change_reason = serialize($arr_change_reason);
	$arrhallbookingid = $_POST['hall_booking_id'];
	for($i=0;$i<count($arrhallbookingid);$i++)
	{
		$sqlchange_request = "INSERT INTO change_request(chng_req_booking_id,hall_booking_id,staffid,department_id,request_date,reason,status) VALUES('$hall_booking_id','$arrhallbookingid[$i]','$rsprofile[staffid]','$rsprofile[department_id]','$dt','$s_arr_change_reason','Pending')";
		$qsqlchange_request = mysqli_query($con,$sqlchange_request);
	}
	echo "<script>window.location='hall_booking_acknowledgement.php?hall_booking_id=$rshallbooking[0]'</script>";

}
?>
<style>
.fixed-top {
    position: absolute;
    top: 0;
    right: 0;
    left: 0;
    z-index: 1030;
}
</style>
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
  width: 80%;
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

.modal-header {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}
</style>
<style>
/**
 * Tabs
 */
.tabs {
	display: flex;
	flex-wrap: wrap; // make sure it wraps
}
.tabs label {
	order: 1; // Put the labels first
	display: block;
	padding: 1rem 2rem;
	margin-right: 0.2rem;
	cursor: pointer;
  background: #90CAF9;
  font-weight: bold;
  transition: background ease 0.2s;
}
.tabs .tab {
  order: 99; // Put the tabs last
  flex-grow: 1;
	width: 100%;
	display: none;
  padding: 1rem;
  background: #fff;
}
.tabs input[type="radio"] {
	display: none;
}
.tabs input[type="radio"]:checked + label {
	background: #fff;
}
.tabs input[type="radio"]:checked + label + .tab {
	display: block;
}

@media (max-width: 45em) {
  .tabs .tab,
  .tabs label {
    order: initial;
  }
  .tabs label {
    width: 100%;
    margin-right: 0;
    margin-top: 0.2rem;
  }
}
</style>
<style>
.slidecontainer {
  width: 100%;
}

.slider {
  -webkit-appearance: none;
  width: 100%;
  height: 15px;
  border-radius: 5px;
  background: #d3d3d3;
  outline: none;
  opacity: 0.7;
  -webkit-transition: .2s;
  transition: opacity .2s;
}

.slider:hover {
  opacity: 1;
}

.slider::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 25px;
  height: 25px;
  border-radius: 50%;
  /* background: #04AA6D; */
  cursor: pointer;
}

.slider::-moz-range-thumb {
  width: 25px;
  height: 25px;
  border-radius: 50%;
  /* background: #04AA6D; */
  cursor: pointer;
}
.slider-green::-webkit-slider-thumb{
    background: #5cb85c;
}
.slider-orange::-webkit-slider-thumb{
    background: #f95700ff;
}
.slider-red::-webkit-slider-thumb{
    background: #ff0800;
}
.slider-green::-moz-range-thumb{
    background: #5cb85c;
}
.slider-orange::-moz-range-thumb{
    background: #f95700ff;
}
.slider-red::-moz-range-thumb{
    background: #ff0800;
}
</style>
  
  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

<br>

        <div class="d-flex justify-content-between align-items-center">
          <h2>Staff Dashboard</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Staff Dashboard</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page pt-4">
      <div class="container">
<div class="row">
	<div class="col-md-2">
		Select Hall : 
<script>
//var d =  new Date(1629199800000);
// var s = new Date(1629199800000).toLocaleDateString("en-US")
// console.log(s)
// var s = new Date(1629199800000).toLocaleTimeString("en-US")
// console.log(s)
</script>
	</div>
	<div class="col-md-3">
		<select name="hallid" id="hallid" class="form-control" onchange="loadcalendar(this.value)">
			<option id="default_hall" value="" selected disabled>Select Hall</option>
			<?php
			$sqlhall = "SELECT * FROM hall WHERE hall_status='Active'";
			$qsqlhall = mysqli_query($con,$sqlhall);
			while($rshall = mysqli_fetch_array($qsqlhall))
			{
				if($rshall['hallid'] == $_GET['hallid'])
				{
				echo "<option value='$rshall[hallid]' selected>$rshall[hallname]</option>";
				}
				else
				{
				echo "<option value='$rshall[hallid]'>$rshall[hallname]</option>";
				}
			}
			?>
		</select>
<button id="myBtn" style="visibility: hidden;">Open Modal</button>
<button id="myBtn1" style="visibility: hidden;">Open Modal</button>
<button id="hallAgreementBtn" style="visibility: hidden;">Open Agreement</button>

	</div>
</div>
<hr>
<?php
if(isset($_GET['hallid']))
{
include("calendar.php"); 
}
?>	
<br>
      </div>
    </section>

  </main><!-- End #main -->
<!--Modal Window starts Here -->
<!-- The Modal -->
<?php include("schedulemodal.php"); ?>
<?php include("changerequestmodal.php"); ?>
<!--Modal Ends ends here -->
<script>
// Get the modal
var modal = document.getElementById("myModal");
// Get the button that opens the modal
var btn = document.getElementById("myBtn");
// Get the <span> element that closes the modal
var span = document.getElementById("close-model");
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

<!--Modal Window starts Here -->
<!-- The Modal -->
<?php include("hallAgreement.php"); ?>
<!--Modal Ends ends here -->
<script>
// Get the modal
var modal_agreement = document.getElementById("hallAgreement");
// Get the button that opens the -agreement
var btn = document.getElementById("hallAgreementBtn");
// Get the <span> element that closes the modal
var span_agreement = document.getElementById("close-modal-agreement");
// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal_agreement.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span_agreement.onclick = function() {
  modal_agreement.style.display = "none";
  window.location="staffdashboard.php";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal_agreement) {
    modal_agreement.style.display = "none";
    window.location="staffdashboard.php";
  }
}
</script>
<!--Modal Window ends Here -->

<?php include("footer.php"); ?>
<script>
function loadcalendar(hallid)
{
//   document.getElementById("hallAgreementBtn").click();
//   document.getElementById("agreed").addEventListener("click",agreed);
//   function agreed(){
//   document.getElementById("default_hall").disabled=true;

	window.location="staffdashboard.php?hallid="+hallid;
  
//   }
}
</script>
<script>
function funinsertequip(equipment_id,equipmentqty,equipment_type,equipment_img)
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
</script>
<script>
function funinsertequip1(equipment_id,equipmentqty,equipment_type,equipment_img)
{
	console.log(equipment_id + " - " + equipmentqty,equipment_type + " - " + equipment_img);
	if(parseInt(equipmentqty) > parseInt($("#equipmentqty").attr("max")))
	{
		alert('Equipment quantity exceeded. It should not be greater than ' + $("#equipmentqty").attr("max"));
	}
	else
	{
		tablerow = "<tr><td><img src='equipment_images/"  + equipment_img + "' style='width: 75px; height: 75px;'></td><td><input type='hidden' name='equipment_img[]' id='equipment_img[]' value='" + equipment_img + "' ><input type='hidden' name='equipment_ids[]' id='equipment_ids' value='" + equipment_id + "' ><input type='hidden' name='equipment_type[]' id='equipment_type[]' value='" + equipment_type + "' ><input type='hidden' name='equipmentqty[]' id='equipmentqty[]' value='" + equipmentqty + "' >" + equipment_type + "</td><td>" + equipmentqty + "</td><td><a type='button' class='btn btn-danger' onclick ='delete_user1(" + equipment_id + ",$(this))' >Delete</a></td></tr>";
		$('#tblequipmenttable1 > tbody').append(tablerow);
		$("#equipment_id1 option[value='" + equipment_id + "']").attr("disabled","disabled");
		$("#equipment_id1").val('');
		$("#equipmentqty1").val('');
		$("#equipment_type1").val('');
	}
}
</script>
<script>
function delete_user(equipment_id,row)
{
	if(confirm("Are you sure want to delete this record?") == true)
	{
		$("#equipment_id option[value='" + equipment_id + "']").removeAttr("disabled","disabled");
		row.closest('tr').remove();
	}
}
</script>
<script>
function delete_user1(equipment_id,row)
{
	if(confirm("Are you sure want to delete this record?") == true)
	{
		$("#equipment_id option[value='" + equipment_id + "']").removeAttr("disabled","disabled");
		row.closest('tr').remove();
	}
}
</script>
<script>
function funloadmaxqty(equipment_id)
{
	//funloadmaxqty(this.value) equipment_type equipmentqty
	$.ajax({ 
		type: 'GET', 
		url: 'loadmaxdata.php', 
		data: { equipment_id: equipment_id }, 
		dataType: 'json',
		success: function (data) {
		$("#equipmentqty").attr({
		   "max" : data.equipment_quantity,
		   "min" : 1 
		});
		$("#equipmentqty").val('');
		$("#equipment_type").val(data.equipment_type);
		$("#equipment_img").val(data.equipment_img);
		/*
        $.each(data, function(index, element) {
            $('body').append($('<div>', {
                text: element.name
            }));
        });
		*/
		}
	});
}
function funloadmaxqty1(equipment_id)
{
	//funloadmaxqty(this.value) equipment_type equipmentqty
	$.ajax({ 
		type: 'GET', 
		url: 'loadmaxdata.php', 
		data: { equipment_id: equipment_id }, 
		dataType: 'json',
		success: function (data) {
		$("#equipmentqty1").attr({
		   "max" : data.equipment_quantity,
		   "min" : 1 
		});
		$("#equipmentqty1").val('');
		$("#equipment_type1").val(data.equipment_type);
		$("#equipment_img1").val(data.equipment_img);
		/*
        $.each(data, function(index, element) {
            $('body').append($('<div>', {
                text: element.name
            }));
        });
		*/
		}
	});
}
</script>
<script>
var slider_1 = document.getElementById("myRange2");
var output_1 = document.getElementById("demo2");
var sliderMax_1=<?php echo $rshalldet['max_capacity']; ?>;
slider_1.value=sliderMax_1*0.5;

output_1.innerHTML = slider_1.value;

slider_1.oninput = function() {
  output_1.innerHTML = this.value;

  if(slider_1.value>sliderMax_1*0.9){
    slider_1.classList.add("slider-red");
    output_1.style.color="#ff0800";
    slider_1.classList.remove("slider-orange");
    slider_1.classList.remove("slider-green");
}else if(slider_1.value>sliderMax_1*0.6){
    slider_1.classList.add("slider-orange");
    output_1.style.color="#f95700ff";
    slider_1.classList.remove("slider-red");
    slider_1.classList.remove("slider-green");
} else{
    slider_1.classList.add("slider-green");
    output_1.style.color="#5cb85c";
    slider_1.classList.remove("slider-red");
    slider_1.classList.remove("slider-orange");
}
}
</script>
<!--Change Request Modal Starts here -->
<script>
var slider = document.getElementById("myRange1");
var output = document.getElementById("demo1");
var sliderMax=<?php echo $rshalldet['max_capacity']; ?>;
slider.value=sliderMax*0.5;

output.innerHTML = slider.value;

slider.oninput = function() {
  output.innerHTML = this.value;

  if(slider.value>sliderMax*0.9){
    slider.classList.add("slider-red");
    output.style.color="#ff0800";
    slider.classList.remove("slider-orange");
    slider.classList.remove("slider-green");
}else if(slider.value>sliderMax*0.6){
    slider.classList.add("slider-orange");
    output.style.color="#f95700ff";
    slider.classList.remove("slider-red");
    slider.classList.remove("slider-green");
} else{
    slider.classList.add("slider-green");
    output.style.color="#5cb85c";
    slider.classList.remove("slider-red");
    slider.classList.remove("slider-orange");
}
}
</script>
<!--Change Request Modal Starts here -->
<script>
// Get the modal
var modal1 = document.getElementById("myModal1");
// Get the button that opens the modal
var btn1 = document.getElementById("myBtn1");
// Get the <span> element that closes the modal
var span1 = document.getElementById("close-model1");
// When the user clicks the button, open the modal 
btn1.onclick = function() {
  modal1.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span1.onclick = function() {
  modal1.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal1.style.display = "none";
  }
}
</script>
<!--Change Request Modal Ends here -->
