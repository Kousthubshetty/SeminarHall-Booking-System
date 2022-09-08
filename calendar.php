<?php
session_start();
if(!isset($_SESSION['staffid']))
{
    echo "<script>window.location='stafflogin.php';</script>";  
}
?>
<link rel="stylesheet" href="plugins/alloy-3.0.1/build/aui-css/css/bootstrap.css">
<script src="plugins/alloy-3.0.1/build/aui/aui.js"></script>
<div id="scheduler"></div>
<script>
//################################
var arrhallbookingrec  = "";
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
	if (this.readyState == 4 && this.status == 200) {
		arrhallbookingrec = this.responseText;
	}
};
xmlhttp.open("GET", "ajaxloadbookingdetail.php?hallid="+document.getElementById("hallid").value, true);
xmlhttp.send();
//################################
YUI({ filter: 'raw' }).use('aui-scheduler', function(Y) {
const m = 4;
const  n = 5; // Note 2nd dimention is not relevant here
let arr = [];
//#############################################
i=0;
var obj = jQuery.parseJSON(arrhallbookingrec);
$.each(obj, function(key,value) {
		arr[i] = {
			content: value.content,
			startDate: new Date(value.startdate),
			endDate:  new Date(value.enddate),
		};
		i = i+ 1;
});
//#############################################
/*
for (var i = 0; i < m; i++) {
  arr[i] = {
				content: 'Note 2nd dimention is not relevant here',
				disabled: true,
				startDate: new Date(2021, 8, i+i, 14 , 30),
				endDate: new Date(2021, 8, i+i, 16 , 30)
			};
}
*/ 

	var items = arr;

	var schedulerViews = [
		new Y.SchedulerWeekView(),
		//new Y.SchedulerDayView(),
		new Y.SchedulerMonthView(),
		new Y.SchedulerAgendaView()
	];
	
	
	new Y.Scheduler({
		boundingBox: '#scheduler',
		items: items,
		views: schedulerViews,
		activeView: schedulerViews[0],
		eventRecorder: new Y.SchedulerEventRecorder(),
		 firstDayOfWeek: 1,
		// activeView: weekView,
		// views: [dayView, weekView, monthView, agendaView]
	}).render();
	calendarFix();
		  
});
</script>
<script>
function calendarFix()
{
	document.querySelector('.scheduler-view-content').addEventListener("click",waitgetDatetime);
}
</script>
<script>
function waitgetDatetime()
{
	setTimeout(function() { getDatetime(); }, 1);
}
function getDatetime()
{
	document.querySelector('#schedulerEventRecorderForm').style.display='none';
	{
	//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
	//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
	//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
		var hallid = document.getElementById("hallid").value;
		var startdt = document.getElementById("startDate").value;
		var enddt = document.getElementById("endDate").value;
		//################################
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200)
			{
		var obj = JSON.parse(this.responseText);
		//############################
		if(obj.bookingtype == "SelfBook")
		{
			alert("Hall booking done by you. So you cannot send Change Request to this date...");
		}
		else if(obj.bookingtype == "Before8AM")
		{
			alert("Hall Booking Before 8 AM Not allowed..");
		}
		else if(obj.bookingtype == "After8PM")
		{
			alert("Hall Booking After 8 PM Not allowed..");
		}
		else if(obj.bookingtype == "PastDate")
		{
			alert("You cannot book for past date..");
		}
		else if(obj.bookingtype == "Schedule")
		{
			document.getElementById("schedulestartdate").value=obj.schedulestartdate;
			document.getElementById("scheduleenddate").value=obj.scheduleenddate;
			document.getElementById("sc_bookingdate").value=obj.sc_bookingdate;
			document.getElementById("sc_starttime").value=obj.sc_starttime;
			document.getElementById("sc_endtime").value=obj.sc_endtime;
			document.getElementById("booking_date").value=obj.sc_bookingdate;
			document.getElementById("booking_st_time").value=obj.sc_starttime;
			document.getElementById("booking_end_time").value=obj.sc_endtime;
			document.getElementById("myBtn").click();
		}
		else if(obj.bookingtype == "ChangeRequest")
		{
			console.log(obj.booking_date + "-" + obj.booking_st_time + "-" + obj.booking_end_time);
			document.getElementById("booking_date1").value = obj.booking_date;
			document.getElementById("booking_st_time1").value = obj.booking_st_time;
			document.getElementById("booking_end_time1").value = obj.booking_end_time;
			document.getElementById("ch_start_date").value=obj.changestartdate;
			document.getElementById("ch_end_date").value=obj.changeenddate;
			var rowCount = tblhallschedule.rows.length;
			for (var i = rowCount - 1; i > 0; i--)
			{
					tblhallschedule.deleteRow(i);
			}
			var id=document.getElementById('tblhallschedule').getElementsByTagName('tbody')[0];
			for (let index = 0; index < obj.arrbookings.length; index++)
			{
				var count=id.rows.length;
				var newrow=id.insertRow();
				newrow.innerHTML="<td><input type='hidden' name='hall_booking_id[]' id='hall_booking_id[]' value='" + obj.arrbookings[index].hall_booking_id + "'>" + obj.arrbookings[index].eventtype + "</td><td>" + obj.arrbookings[index].staffname + "</td><td>" + obj.arrbookings[index].department_name + "</td><td>" + obj.arrbookings[index].booking_view_start_dt_tim + "</td><td>" + obj.arrbookings[index].booking_view_end_dt_tim + "</td>";
			}
			document.getElementById("myBtn1").click();
		}
		//############################
			}
		};
		xmlhttp.open("GET", "ajaxgetdatetime.php?startdt=" + startdt + "&enddt=" + enddt + "&hallid=" + hallid, true);
		xmlhttp.send(); 
		//################################
	//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
	//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
	//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
	}
}
</script>