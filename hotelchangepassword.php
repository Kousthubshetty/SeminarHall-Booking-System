<?php 
include("header.php");
if(!isset($_SESSION['hotel_id']))
{
    echo "<script>window.location='hotellogin.php';</script>";  
} 
if(isset($_POST['btnsubmit']))
{ 
  $cpwd = md5($_POST['currentpassword']);
  $npwd = md5($_POST['password']);
    $sqlchpwd ="UPDATE hotel SET password='$npwd' WHERE password='$cpwd' AND hotel_id='$_SESSION[hotel_id]'";
    $qsqlchpwd = mysqli_query($con,$sqlchpwd);
    echo mysqli_error($con);
    if(mysqli_affected_rows($con) == 1)
    {
        echo "<script>alert('Password updated successfully...');</script>";
        echo "<script>window.location='hotelchangepassword.php';</script>";
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
          <h2>Hotel</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Hotel</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->
    <div style="padding-left:70px; padding-top: 20px;">
	<a href="#" class="back" onclick="window.history.back()" >&laquo; Back</a>
	</div> 
<!-- ======= Contact Section ======= -->
<section id="contact" class="padd-section"  style="padding-top: 0px;">

<div class="container" data-aos="fade-up">
  <div class="section-title text-center">
    <h2>Change Password</h2>
    <p class="separator">Change Password by entering valid Current password, new password and Confirm the password</p>
  </div>
  
  <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">
    <div class="col-lg-6 col-md-6 col-sm-offset-6" >
      <div class="form">
        <form action="" method="post" role="form" class="php-email-form" name="frm" onsubmit="return validateform()">
          <div class="form-group mt-3">
			Current  Password <span class="errmsg"  id="errcurrentpassword"></span>
            <input type="password" class="form-control" name="currentpassword" id="currentpassword" placeholder="Enter Password"  onkeyup="validateform()">
          </div>
          <div class="form-group mt-3">
			New  Password <span class="errmsg"  id="errpassword"></span>
            <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" onkeyup="validateform()" >
          </div>
          <div class="form-group mt-3">
            Confirm Password <span class="errmsg"  id="errcpassword"></span>
            <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Confirm Password"  onkeyup="validateform()">
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
  if($('#currentpassword').val().length < 6)
	{
		$('#errcurrentpassword').html('Current password should contain more than 6 characters..');
		err = "true";
	}
	if($('#currentpassword').val() == "")
	{
		$('#errcurrentpassword').html('Current password Should not be empty..');
		err = "true";
	}
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