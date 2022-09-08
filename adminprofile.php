<?php 
include("header.php");
if(!isset($_SESSION['adminid']))
{
    echo "<script>window.location='adminlogin.php';</script>";  
} 
if(isset($_POST['btnsubmit']))
{
    $sqlupd ="UPDATE admin SET adminname='$_POST[adminname]', emailid='$_POST[emailid]' WHERE adminid='" . $_SESSION['adminid'] . "'";
    $qsqlupd = mysqli_query($con,$sqlupd);
    echo mysqli_error($con);
    if(mysqli_affected_rows($con) == 1)
    {
        echo "<script>alert('Admin Record updated successfully...');</script>";
        echo "<script>window.location='adminprofile.php';</script>";
    }
}
if(isset($_SESSION['adminid']))
{
    $sqlprofile = "SELECT * FROM admin WHERE adminid='" . $_SESSION['adminid'] . "'";
    $qsqlprofile = mysqli_query($con,$sqlprofile);
    $rsprofile = mysqli_fetch_array($qsqlprofile);
}
?>
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Admin Profile</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Admin Profile</li>
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
    <h2>Admin Profile</h2>
    <p class="separator">Kindly Update Your Profile</p>
  </div>

  <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100" >
    <div class="col-lg-6 col-md-6 col-sm-offset-6">
      <div class="form">
        <form action="" method="post" role="form" class="php-email-form" name="frm" onsubmit="return validateform()">
          <div class="form-group mt-3">
          Admin Name
            <input type="text" name="adminname" class="form-control" id="adminname" placeholder="Admin Name" value="<?php echo $rsprofile['adminname']; ?>">
          </div>
          <div class="form-group mt-3">
            Email ID  <span class="errmsg"  id="erremailid"></span>
            <input type="email" class="form-control" name="emailid" id="emailid" placeholder="Email ID "  value="<?php echo $rsprofile['emailid']; ?>"onkeyup="validateform()" >
          </div>
<br>
          <div class="text-center"><button type="submit" name="btnsubmit">Update Profile</button></div>
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