<?php 
include("header.php");
if(isset($_SESSION['staffid']))
{
    echo "<script>window.location='stafflogin.php';</script>";  
}
if($_GET['pwdsession'] != $_SESSION['pwdsession'])
{
	echo "<script>alert('Session Expired');</script>";
	echo "<script>window.location='index.php';</script>";
}
if(isset($_POST['btnsubmit']))
{
	$npwd = md5($_POST['password']);
    $sqlchpwd ="UPDATE admin SET password='$npwd' WHERE adminid='$_GET[id]'";
    $qsqlchpwd = mysqli_query($con,$sqlchpwd);
    echo mysqli_error($con);
    if(mysqli_affected_rows($con) == 1)
    {
		unset($_SESSION['pwdsession']);
        echo "<script>alert('Password updated successfully...');</script>";
        echo "<script>window.location='adminlogin.php';</script>";
    }
	else
	{
		echo "<script>alert('Failed to change password.');</script>";
	}
}
?>
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Admin Recovery Password</h2>
          <ol>
            <li><a href="#" class="back" onclick="window.history.back()" >&laquo; Back</a></li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->
<!-- ======= Contact Section ======= -->
<section id="contact" class="padd-section"  style="padding-top: 0px;">
<br>
<div class="container" data-aos="fade-up">
  <div class="section-title text-center" style="margin-bottom: 40px;">
    <h2>Reset Password</h2>
    <p class="separator">Reset Password by entering valid New password and Confirm the password</p>
  </div>
  
  <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">
    <div class="col-lg-6 col-md-6 col-sm-offset-6" >
      <div class="form">
        <form action="" method="post" role="form" class="php-email-form" name="frm" onsubmit="return validateform()">
          <div class="form-group mt-3">
			New  Password <span class="errmsg"  id="errpassword"></span>
            <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" onkeyup="validateform()">
          </div>
          <div class="form-group mt-3">
            Confirm Password <span class="errmsg"  id="errcpassword"></span>
            <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Confirm Password" onkeyup="validateform()">
          </div>
<br>
          <div class="text-center"><button type="submit" name="btnsubmit">Click Here to Change Password</button></div>
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