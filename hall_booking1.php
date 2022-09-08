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
$sqlhalldet = "SELECT * FROM hall WHERE hallid='$_GET[hallid]'";
$qsqlhalldet = mysqli_query($con,$sqlhalldet);
$rshalldet = mysqli_fetch_array($qsqlhalldet);
?>
<div class="row">
	<div class="col-lg-4 col-md-4">
	   Hall
		<input type="hidden" readonly name="hallid" id="hallid" value="<?php echo $rshalldet['hallid']; ?>" class="form-control">
		<input type="text" readonly value="<?php echo $rshalldet['hallname']; ?>" class="form-control">
 	</div>
			
	<div  class="col-lg-4 col-md-4">
		Event Type
		<select name="eventtypeid" id="eventtypeid"  class="form-control" >
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
	  Total Strength
		<!-- <input type="number" class="form-control" name="total_strength" id="total_strength" placeholder="Enter Total Strength" min="1" max="" > -->
		<div class="slidecontainer">
  			<input type="range" name="total_strength" min="1" max="<?php echo $rshalldet['max_capacity']; ?>" class="slider slider-green" id="myRange">
  			<p>Value: <b><span id="demo" style="color: #5cb85c;"></span></b></p>
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
<div class="row">
	<div  class="col-lg-12 col-md-12"><br>
	Any Note
	<textarea name="staff_note" id="staff_note" class="form-control" placeholder="Enter Any Note"></textarea>
	</div>
</div>