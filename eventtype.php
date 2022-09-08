<?php 
include("header.php"); 
if(!isset($_SESSION['adminid']))
{
    echo "<script>window.location='adminlogin.php';</script>";  
}
if(isset($_POST['btnsubmit']))
{
    $img = rand() . $_FILES['eventicon']['name'];
    move_uploaded_file($_FILES['eventicon']['tmp_name'],"eventicon/" . $img);
    $eventdescription = nl2br($_POST['eventdescription']);
    if(isset($_GET['editid']))
  {
	  $sqlupdate = "UPDATE eventtype SET eventtype='$_POST[eventtype]',eventdescription='$eventdescription',status='$_POST[status]'";
    if($_FILES['eventicon']['name'] != "")
	  {
		  $sqlupdate = $sqlupdate . ",eventicon='$img'";
	  }
	  $sqlupdate = $sqlupdate . ",status='$_POST[status]' WHERE eventtypeid='$_GET[editid]'";
	  echo $sqlupdate;
	  $qsqlupdate = mysqli_query($con,$sqlupdate);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('Eventtype Record Updated successfully...');</script>";
		}	  
  }
  else
  {
    $sqlinsert ="INSERT INTO eventtype(eventtype, eventicon, eventdescription, status) VALUES('$_POST[eventtype]','$img','$eventdescription','$_POST[status]')";
    $qsqlinsert = mysqli_query($con,$sqlinsert);
    echo mysqli_error($con);
    if(mysqli_affected_rows($con) == 1)
    {
        echo "<script>alert('Event Type Record inserted successfully...');</script>";
        echo "<script>window.location='eventtype.php';</script>";
    }
}
}
if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM eventtype WHERE 	eventtypeid='" . $_GET['editid'] . "'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}	
?>
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Event Type</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Event Type</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->
    <div style="padding-left:70px; padding-top: 20px;">
	<a href="#" class="back" onclick="window.history.back()" >&laquo; Back</a>
	</div> 
<!-- ======= Contact Section ======= -->
<section id="contact" class="padd-section" style="padding-top: 0px;">

<div class="container" data-aos="fade-up">
  <div class="section-title text-center">
    <h2>Event Type</h2>
    <p class="separator">Kindly Add or Update Event Type</p>
  </div>

  <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">

    <div class="col-lg-6 col-md-6 col-sm-offset-6">
      <div class="form">
        <form action="" method="post" role="form" class="php-email-form" name="frm" enctype="multipart/form-data" onsubmit="return validateform()">
        <div class="form-group mt-3">
            Event Type <span class="errmsg"  id="erreventtype"></span>
            <input type="text" class="form-control" name="eventtype" id="eventtype" placeholder="Enter Event Type" value="<?php echo $rsedit['eventtype']; ?>" onkeyup="validateform()" >
          </div>
          <div class="form-group mt-3">
            Event Icon <span class="errmsg"  id="erreventicon"></span>
            <input type="file" class="form-control" name="eventicon" id="eventicon">
			<?php
			if(isset($_GET['editid']))
			{
				echo "<img src='eventicon/"  . $rsedit['eventicon'] . "' height=100px>";
			}
			?>
          </div>
          <div class="form-group mt-3">
            Event Description <span class="errmsg"  id="erreventdescription"></span>
            <textarea class="form-control" name="eventdescription" id="eventdescription" placeholder="Enter Event Description"><?php echo $rsedit['eventdescription']; ?></textarea>
          </div>          
          <div class="form-group mt-3">
            Status <span class="errmsg"  id="errstatus"></span>
            <select name="status" id="status"  class="form-control" onchange="validateform()">
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
          <div class="text-center"><button type="submit" name="btnsubmit">Click here to Add/Update Event Type</button></div>
        </form>
      </div>
    </div>
  </div>
</div>
</section><!-- End Contact Section -->


  </main><!-- End #main -->
  <?php include("footer.php"); ?>
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
  if(!$('#eventtype').val().match(alphaspaceExp))
	{
		$('#erreventtype').html('event type should contain alphabets..');
		err = "true";
	}
	if($('#eventtype').val() == "")
	{
		$('#erreventtype').html('event type Should not be empty..');
		err = "true";
	}
	if($('#status').val() == "")
	{
		$('#errstatus').html('Status Should not be empty..');
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