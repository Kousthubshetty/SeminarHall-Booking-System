<?php 
include("header.php"); 
if(!isset($_SESSION['staffid']))
{
    echo "<script>window.location='stafflogin.php';</script>";  
}
if(isset($_POST['btndelprofile']))
{
  $sqlupd ="UPDATE staff SET profile_img='' where staffid='" . $_SESSION['staffid'] . "'";
  $qsqlupd = mysqli_query($con,$sqlupd);
  if(mysqli_affected_rows($con) == 1)
{
  echo "<script>alert('Staff Profile deleted successfully...');</script>";
}
}
if(isset($_POST['btnsubmit']))
{
    $img = rand() . $_FILES['profile_img']['name'];
    move_uploaded_file($_FILES['profile_img']['tmp_name'],"staffimg/" . $img);
    $sqlupd ="UPDATE staff SET department_id='$_POST[department_id]', staffname='$_POST[staffname]', emailid='$_POST[emailid]' , phno='$_POST[phno]'";
    if( $_FILES['profile_img']['name'] != "")
    {
    $sqlupd = $sqlupd . "  , profile_img='$img'";
    }
    $sqlupd = $sqlupd . "  WHERE staffid='" . $_SESSION['staffid'] . "'";
    $qsqlupd = mysqli_query($con,$sqlupd);
    echo mysqli_error($con);
    if(mysqli_affected_rows($con) == 1)
    {
        echo "<script>alert('Staff Record updated successfully...');</script>";
        echo "<script>window.location='staffprofile.php';</script>";
    }
}
if(isset($_SESSION['staffid']))
{
    $sqlprofile = "SELECT * FROM staff WHERE staffid='" . $_SESSION['staffid'] . "'";
    $qsqlprofile = mysqli_query($con,$sqlprofile);
    $rsprofile = mysqli_fetch_array($qsqlprofile);
}
?>
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Staff Profile</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Staff Profile</li>
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
    <h2>Staff Profile</h2>
    <p class="separator">Kindly update your profile</p>
  </div>
  <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">
    <div class="col-lg-6 col-md-6 col-sm-offset-6">
      <div class="form">
        <form action="" method="post" role="form" class="php-email-form" name="frm" enctype="multipart/form-data" onsubmit="return validateform()">
        <div class="form-group">
            Profile Image
            <input type="file" class="form-control" name="profile_img" id="profile_img" >
            <img src="<?php 
            
            if($rsprofile['profile_img'] == "")
				{
					echo "assets/img/defaultimage.jpg";
				}
				else if(file_exists("staffimg/".$rsprofile['profile_img']))
				{
					echo "staffimg/".$rsprofile['profile_img'];
				}
				else
				{
				echo "assets/img/defaultimage.jpg";
				}
            ?>" style='width: 150px; height: 175px;'>
          <?php
          if($rsprofile['profile_img'] != "")
          {
            ?>
            	<br><button type="submit" id="btndelprofile" name="btndelprofile" class="btn btn-info" style="border-radius:0px; padding: 10px 20px;margin-left:15px">Delete Profile</button>
            <?php
          }

          ?>  
            
          </div>
          <div class="form-group">
            Department <span class="errmsg"  id="errdepartment_id"></span>
            <select name="department_id" id="department_id"  class="form-control" onchange="validateform()">
			<option value="">Select Department</option>
			<?php
			$sqldepartment = "SELECT * FROM department where status='Active'";
			$qsqldepartment = mysqli_query($con,$sqldepartment);
			while($rsdepartment = mysqli_fetch_array($qsqldepartment))
			{
				if($rsprofile['department_id'] == $rsdepartment['department_id'])
				{
				echo "<option value='$rsdepartment[department_id]' selected >$rsdepartment[department_name]</option>";
				}
				else
				{
				echo "<option value='$rsdepartment[department_id]'>$rsdepartment[department_name]</option>";
				}
			}
			?>
			</select>         
     </div>
          <div class="form-group mt-3">
            Staff Name <span class="errmsg"  id="errstaffname"></span>
            <input type="text" class="form-control" name="staffname" id="staffname" placeholder="Staff Name" value="<?php echo $rsprofile['staffname']; ?>"  onkeyup="validateform()" >
          </div>
          <div class="form-group mt-3">
            Email ID <span class="errmsg"  id="erremailid"></span>
            <input type="email" class="form-control" name="emailid" id="emailid" placeholder="Enter Email" value="<?php echo $rsprofile['emailid']; ?>"  onkeyup="validateform()" >
          </div>
          <div class="form-group mt-3">
            Phone Number <span class="errmsg"  id="errphno"></span>
            <input type="text" class="form-control" name="phno" id="phno" placeholder="Enter PhoneNumber" value="<?php echo $rsprofile['phno']; ?>" onkeyup="validateform()" >
          </div>
<br>
          <div class="text-center"><button type="submit" name="btnsubmit">Click Here to Update Profile</button></div>
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
  if($('#department_id').val() == "")
	{
		$('#errdepartment_id').html('Department_id Should not be empty..');
		err = "true";
	}
	if(!$('#staffname').val().match(alphaspaceExp))
	{
		$('#errstaffname').html('Staff name should contain alphabets..');
		err = "true";
	}
	if($('#staffname').val() == "")
	{
		$('#errstaffname').html('Staff Name Should not be empty..');
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
	if($('#phno').val().length != 10)
	{
		$('#errphno').html('Phone Number should contain 10 digits..');
		err = "true";
	}
	if($('#phno').val() == "")
	{
		$('#errphno').html('Phone Number Should not be empty..');
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