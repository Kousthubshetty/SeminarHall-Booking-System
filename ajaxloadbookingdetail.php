<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE  &  ~E_STRICT  &  ~E_WARNING);
date_default_timezone_set("Asia/Calcutta");
include("dbconnection.php");
$sqlrec = "SELECT hall_booking.*, staff.staffname, eventtype.eventtype FROM `hall_booking` LEFT JOIN hall ON hall_booking.hallid=hall.hallid LEFT JOIN staff ON staff.staffid=hall_booking.staffid LEFT JOIN eventtype ON eventtype.eventtypeid=hall_booking.eventtypeid  WHERE hall_booking.status='Approved' AND  hall_booking.hallid='$_GET[hallid]'";
$qsqlrec = mysqli_query($con,$sqlrec);
$i=0;
while($rsrec = mysqli_fetch_array($qsqlrec))
{
	/*
				content: 'Note 2nd dimention is not relevant here',
				disabled: true,
				startDate: new Date(2021, 8, i+i, 14 , 30),
				endDate: new Date(2021, 8, i+i, 16 , 30)
	*/
	$arr[$i]['hall_booking_id'] = $rsrec['hall_booking_id'];
	$arr[$i]['content'] = $rsrec['eventtype'] . " - " . $rsrec['staffname'];
	$arr[$i]['disabled'] = true;
	$arr[$i]['startdate'] = date("Y-m-d H:i",strtotime($rsrec['booking_start_dt_tim']));
	$arr[$i]['enddate'] = 	date("Y-m-d H:i",strtotime($rsrec['booking_end_dt_tim']));
	/*		
	$arr[$i]['content'] = $rsrec['eventtype'] . "-" . $rsrec['staffname'];
	$arr[$i]['content'] = true;
	$arr[$i]['startdate'] = $rsrec['booking_start_dt_tim'];
	$arr[$i]['enddate'] = $rsrec['booking_end_dt_tim'];
	*/
	$i++;
}
echo json_encode($arr);
?>