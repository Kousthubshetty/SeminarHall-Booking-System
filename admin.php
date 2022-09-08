<?php 
include("header.php"); 
if(!isset($_SESSION['adminid']))
{
    echo "<script>window.location='adminlogin.php';</script>";  
}
if(isset($_POST['btnsubmit']))
{
  $pwd = md5($_POST['password']);
  if(isset($_GET['editid']))
  {
	  $sqlupdate = "UPDATE admin SET adminname='$_POST[adminname]',emailid='$_POST[emailid]'";
	  if($_POST['password'] != "")
	  {
		  $sqlupdate = $sqlupdate . ",password='$pwd'";
	  }
	  $sqlupdate = $sqlupdate . ",status='$_POST[status]' WHERE adminid='$_GET[editid]'";
	 // echo $sqlupdate;
	  $qsqlupdate = mysqli_query($con,$sqlupdate);
		//echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('Admin Record Updated successfully...');</script>";
		}	  
    else
		{
			echo "<script>alert('Admin Account already exists..');</script>";
			echo "<script>window.location='viewadmin.php';</script>";
		} 
  }
  else
  {
    $sqlinsert ="INSERT INTO admin( adminname, emailid, password, status) VALUES('$_POST[adminname]','$_POST[emailid]','$pwd','$_POST[status]')";
    $qsqlinsert = mysqli_query($con,$sqlinsert);
    //echo mysqli_error($con);
    if(mysqli_affected_rows($con) == 1)
    {
        echo "<script>alert('Admin Record inserted successfully...');</script>";
        echo "<script>window.location='admin.php';</script>";
    }
    else
		{
			echo "<script>alert('Admin Account already exists..');</script>";
			echo "<script>window.location='viewadmin.php';</script>";
		} 
  }
}
if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM admin WHERE 	adminid='" . $_GET['editid'] . "'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}	
?>
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Admin</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Admin</li>
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
    <h2>Admin</h2>
    <p class="separator">Kindly add or Update Admin Record</p>
  </div>

  <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">

    <div class="col-lg-6 col-md-6 col-sm-offset-6">
      <div class="form">
        <form action="" method="post" role="form" class="php-email-form" name="frm" onsubmit="return validateform()">
          <div class="form-group">
            Admin Name <span class="errmsg"  id="erradminname"></span>
            <input type="text" name="adminname" class="form-control" id="adminname" placeholder="Admin Name" value="<?php echo $rsedit['adminname']; ?>" onkeyup="validateform()" >
          </div>
          <div class="form-group mt-3">
            Email ID <span class="errmsg"  id="erremailid"></span>
            <input type="email" class="form-control" name="emailid" id="emailid" placeholder="Email ID " value="<?php echo $rsedit['emailid']; ?>"  onkeyup="validateform()">
          </div>
          <div class="form-group mt-3">
            Password <span class="errmsg"  id="errpassword"></span>
            <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password"  onkeyup="validateform()">
          </div>
          <div class="form-group mt-3">
            Confirm Password <span class="errmsg"  id="errcpassword"></span>
            <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Confirm Password"  onkeyup="validateform()">
          </div>
          <div class="form-group mt-3">
            Status <span class="errmsg"  id="errstatus"></span>
            <select name="status" id="status"  class="form-control"  onchange="validateform()">
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
          <div class="text-center"><button type="submit" name="btnsubmit">Click Here to Submit</button></div>
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
	if(!$('#adminname').val().match(alphaspaceExp))
	{
		$('#erradminname').html('Admin name name should contain alphabets..');
		err = "true";
	}
	if($('#adminname').val() == "")
	{
		$('#erradminname').html('Admin name Name Should not be empty..');
		err = "true";
	}
	if(!$('#emailid').val().match(emailExp))
	{
		$('#erremailid').html('Entered Email ID is not valid..');
		err = "true";
	}
	if($('#emailid').val() == "")
	{
		$('#erremailid').html('Email ID Should not be empty..');
		err = "true";
	}
	if($('#editid').val() == 0)
	{
	if($('#password').val().length < 6)
	{
		$('#errpassword').html('Password should contain more than 6 characters..');
		err = "true";
	}
	if($('#password').val() == "")
	{
		$('#errpassword').html('Password Should not be empty..');
		err = "true";
	}
	if($('#password').val() != $('#cpassword').val())
	{
		$('#errcpassword').html('Password and confirm password is not matching..');
		err = "true";
	}
	if($('#cpassword').val() == "")
	{
		$('#errcpassword').html('Confirm Password Should not be empty..');
		err = "true";
	}
	}
	if($('#editid').val() != 0)
  {
  if($('#password').val() != "")
		{
      if($('#password').val().length < 6)
		{
			$('#errpassword').html('Password should contain more than 6 characters..');
			err = "true";
		}
  if($('#password').val() != $('#cpassword').val())
		{
			$('#errcpassword').html('Password and confirm password is not matching..');
			err = "true";
		}
    if($('#cpassword').val() == "")
		{
			$('#errcpassword').html('Confirm Password Should not be empty..');
			err = "true";
		}
    }
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