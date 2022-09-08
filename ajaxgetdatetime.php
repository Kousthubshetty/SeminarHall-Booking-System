<?php
session_start();
include("dbconnection.php");
date_default_timezone_set("Asia/Calcutta");
$startdate = substr($_GET['startdt'], 0, 10);
$enddate = substr($_GET['enddt'], 0, 10);
$booking_date = date("Y-m-d", $startdate);
$booking_st_time = date("H:i:s", $startdate);
$booking_end_time = date("H:i:s", $enddate);
$beforestartdatetime = date("Y-m-d 08:00:00", $startdate);
$afterenddatetime = date("Y-m-d 20:00:00", $enddate);
$startdate = date("Y-m-d H:i:s", $startdate);
$enddate = date("Y-m-d H:i:s", $enddate);
if(strtotime($beforestartdatetime) > strtotime($startdate))
{
	$type="Before8AM";
	$arrrec = array("bookingtype"=>$type);
	echo json_encode($arrrec);
}
else if(strtotime($afterenddatetime) < strtotime($enddate))
{
	$type="After8PM";
	$arrrec = array("bookingtype"=>$type);
	echo json_encode($arrrec);
}
else
{
	//######################################################
	
	$sqlchkdate = "SELECT hall_booking.*,department.department_name,staff.staffname,eventtype.eventtype FROM hall_booking LEFT JOIN department ON hall_booking.department_id=department.department_id LEFT JOIN staff ON staff.staffid=hall_booking.staffid LEFT JOIN eventtype ON eventtype.eventtypeid=hall_booking.eventtypeid where 
	(('$startdate' BETWEEN hall_booking.booking_start_dt_tim AND booking_end_dt_tim) OR ('$startdate' BETWEEN hall_booking.booking_start_dt_tim AND hall_booking.booking_end_dt_tim) OR (hall_booking.booking_start_dt_tim BETWEEN '$startdate' AND '$enddate') OR (hall_booking.booking_end_dt_tim BETWEEN '$startdate' AND '$enddate')) AND ('$enddate' <> hall_booking.booking_start_dt_tim AND '$startdate' <> hall_booking.booking_end_dt_tim) AND hall_booking.status='Approved' AND hall_booking.hallid='$_GET[hallid]'";
	$qsqchkdate = mysqli_query($con,$sqlchkdate);
	
	while($rschkdate = mysqli_fetch_array($qsqchkdate))
	{
		$arrhallbooking[] = array("hall_booking_id"=>$rschkdate[0],"booking_start_dt_tim"=>$rschkdate['booking_start_dt_tim'],"booking_end_dt_tim"=>$rschkdate['booking_end_dt_tim'],"booking_view_start_dt_tim"=>date("d-m-Y h:i A",strtotime($rschkdate['booking_start_dt_tim'])),"booking_view_end_dt_tim"=>date("d-m-Y h:i A",strtotime($rschkdate['booking_end_dt_tim'])),"department_name"=>$rschkdate['department_name'],"staffname"=>$rschkdate['staffname'],"eventtype"=>$rschkdate['eventtype']);
	}
	
	$sqlchkdate1 = "SELECT hall_booking.*,department.department_name,staff.staffname,eventtype.eventtype FROM hall_booking LEFT JOIN department ON hall_booking.department_id=department.department_id LEFT JOIN staff ON staff.staffid=hall_booking.staffid LEFT JOIN eventtype ON eventtype.eventtypeid=hall_booking.eventtypeid where 
	(('$startdate' BETWEEN hall_booking.booking_start_dt_tim AND booking_end_dt_tim) OR ('$startdate' BETWEEN hall_booking.booking_start_dt_tim AND hall_booking.booking_end_dt_tim) OR (hall_booking.booking_start_dt_tim BETWEEN '$startdate' AND '$enddate') OR (hall_booking.booking_end_dt_tim BETWEEN '$startdate' AND '$enddate')) AND ('$enddate' <> hall_booking.booking_start_dt_tim AND '$startdate' <> hall_booking.booking_end_dt_tim) AND hall_booking.status='Approved' AND hall_booking.hallid='$_GET[hallid]' AND hall_booking.staffid='$_SESSION[staffid]'";
	$qsqchkdate1 = mysqli_query($con,$sqlchkdate1);
	//######################################################
	//######################################################
	$sc_bookingdate = date("Y-m-d", strtotime($startdate));
	$sc_starttime =date("H:i:s", strtotime($startdate));
	$sc_endtime = date("H:i:s", strtotime($enddate));
	//######################################################
	$cdt = date("Y-m-d");
	$edt = date("Y-m-d", strtotime($startdate));
	$curdate=strtotime($cdt);
	$mydate=strtotime($edt);
	if(mysqli_num_rows($qsqchkdate1) >= 1)
	{
		$type="SelfBook";
		$arrrec = array("bookingtype"=>$type);
		echo json_encode($arrrec);
	}
	else if(mysqli_num_rows($qsqchkdate) >= 1  && $mydate > $curdate)
	{
		$type="ChangeRequest";
		$arrrec = array("bookingtype"=>$type, "booking_date"=>$booking_date,"booking_st_time"=>$booking_st_time,"booking_end_time"=>$booking_end_time,"changestartdate"=>$startdate, "changeenddate"=>$enddate,  "arrbookings"=>$arrhallbooking, "bookingnumrec"=>mysqli_num_rows($qsqchkdate));
		echo json_encode($arrrec);
	}
	else if($mydate > $curdate)
	{
		$type="Schedule";
		$arrrec = array("bookingtype"=>$type, "schedulestartdate"=>$startdate, "scheduleenddate"=>$enddate, "sc_bookingdate"=>$sc_bookingdate, "sc_starttime"=>$sc_starttime, "sc_endtime"=>$sc_endtime);
		echo json_encode($arrrec);
	}
	else
	{
		$type="PastDate";
		$arrrec = array("bookingtype"=>$type);
		echo json_encode($arrrec);
	}
}
?>