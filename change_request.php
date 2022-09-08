<?php 
include("header.php"); 
if(isset($_POST['btnsubmit']))
{
  $reason = nl2br($_POST['reason']);
  if(isset($_GET['editid']))
  {
	  $sqlupdate = "UPDATE Change_request SET hall_booking_id='$_POST[hall_booking_id]',staffid='$_POST[staffid]',department_id='$_POST[department_id]',request_date='$_POST[request_date]',reason='$reason' where request_id='" . $_GET['editid'] . "'";
	  echo $sqlupdate;
	  $qsqlupdate = mysqli_query($con,$sqlupdate);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('Change_request Record Updated successfully...');</script>";
		}	  
  }
  else
  {
    $sqlinsert ="INSERT INTO change_request( hall_booking_id, staffid, department_id, request_date, reason, status) VALUES('$_POST[hall_booking_id]','$_POST[staffid]','$_POST[department_id]','$_POST[request_date]','$reason','$_POST[status]')";
    $qsqlinsert = mysqli_query($con,$sqlinsert);
    echo mysqli_error($con);
    if(mysqli_affected_rows($con) == 1)
    {
        echo "<script>alert('Change request Record inserted successfully...');</script>";
        echo "<script>window.location='change_request.php';</script>";
    }
  }
}
if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM change_request WHERE 	request_id='" . $_GET['editid'] . "'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}	
?>
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Change Request</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Change Request</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

<!-- ======= Contact Section ======= -->
<section id="contact" class="padd-section">

<div class="container" data-aos="fade-up">
  <div class="section-title text-center">
    <h2>Change Request</h2>
    <p class="separator">Kindly request for change</p>
  </div>

  <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">

    <div class="col-lg-6 col-md-6 col-sm-offset-6">
      <div class="form">
        <form action="" method="post" role="form" class="php-email-form" name="frm">
        <div class="form-group mt-3">
            Hall booking ID 
            <select name="hall_booking_id" id="hall_booking_id"  class="form-control"></select>
          </div>
          <div class="form-group mt-3">
            Staff Name <span class="errmsg"  id="errstaffid"></span>
            <select name="staffid" id="staffid"  class="form-control" onchange="validateform()"><option value="">Select Staff Name</option>
			<?php
			$sqlstaff = "SELECT * FROM staff where status='Active'";
			$qsqlstaff = mysqli_query($con,$sqlstaff);
			while($rsstaff = mysqli_fetch_array($qsqlstaff))
			{
				if($rsedit['staffid'] == $rsstaff['staffid'])
				{
				echo "<option value='$rsstaff[staffid]' selected >$rsstaff[staffname]</option>";
				}
				else
				{
				echo "<option value='$rsstaff[staffid]'>$rsstaff[staffname]</option>";
				}
			}
			?></select>
          </div>
          <div class="form-group">
            Department 
            <select name="department_id" id="department_id"  class="form-control"><option value="">Select Department</option>
			<?php
			$sqldepartment = "SELECT * FROM department where status='Active'";
			$qsqldepartment = mysqli_query($con,$sqldepartment);
			while($rsdepartment = mysqli_fetch_array($qsqldepartment))
			{
				if($rsedit['department_id'] == $rsdepartment['department_id'])
				{
				echo "<option value='$rsdepartment[department_id]' selected >$rsdepartment[department_name]</option>";
				}
				else
				{
				echo "<option value='$rsdepartment[department_id]'>$rsdepartment[department_name]</option>";
				}
			}
			?></select>
          </div>
          <div class="form-group mt-3">
            Request Date 
            <input type="datetime-local" class="form-control" name="request_date" id="request_date" placeholder="Enter Date" value="<?php echo $rsedit['request_date']; ?>">
          </div>
          <div class="form-group mt-3">
            Reason 
            <textarea class="form-control" name="reason" id="reason" placeholder="Enter the Reason for change"><?php echo $rsedit['reason']; ?></textarea>
          </div>
          <div class="form-group mt-3">
            Status 
            <select name="status" id="status"  class="form-control">
              <option value="">Select Status</option>
              <?php
              $arr = array("Active","Inactive");
              foreach($arr as $val)
              {
				  if($rsedit['status'] == $val)
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
<br>
          <div class="text-center"><button type="submit" name="btnsubmit">Change Request</button></div>
        </form>
      </div>
    </div>
  </div>
</div>
</section><!-- End Contact Section -->


  </main><!-- End #main -->
  <?php include("footer.php"); ?>