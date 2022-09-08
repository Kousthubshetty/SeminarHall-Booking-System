<?php 
include("header.php"); 
if(!isset($_SESSION['hotel_id']))
{
    echo "<script>window.location='hotellogin.php';</script>";  
}
if(isset($_POST['btnsubmit']))
{
    $img = rand() . $_FILES['hotel_image']['name'];
    move_uploaded_file($_FILES['hotel_image']['tmp_name'],"hotelimg/" . $img);
    $sqlupd ="UPDATE hotel SET hotel_name='$_POST[hotel_name]', email_id='$_POST[email_id]' , ph_no='$_POST[ph_no]'";
    if( $_FILES['hotel_image']['name'] != "")
    {
    $sqlupd = $sqlupd . "  , hotel_image='$img'";
    }
    $sqlupd = $sqlupd . "  WHERE hotel_id='" . $_SESSION['hotel_id'] . "'";
    $qsqlupd = mysqli_query($con,$sqlupd);
    echo mysqli_error($con);
    if(mysqli_affected_rows($con) == 1)
    {
        echo "<script>alert('Hotel Record updated successfully...');</script>";
        echo "<script>window.location='hotelprofile.php';</script>";
    }
}
if(isset($_SESSION['hotel_id']))
{
    $sqlprofile = "SELECT * FROM hotel WHERE hotel_id='" . $_SESSION['hotel_id'] . "'";
    $qsqlprofile = mysqli_query($con,$sqlprofile);
    $rsprofile = mysqli_fetch_array($qsqlprofile);
}
?>
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Hotel Profile</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Hotel Profile</li>
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
    <h2>Hotel Profile</h2>
    <p class="separator">Kindly update your profile</p>
  </div>
  <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">
    <div class="col-lg-6 col-md-6 col-sm-offset-6">
      <div class="form">
        <form action="" method="post" role="form" class="php-email-form" name="frm" enctype="multipart/form-data" onsubmit="return validateform()">
        <div class="form-group">
            Hotel Image
            <input type="file" class="form-control" name="hotel_image" id="hotel_image">
            <img src="hotelimg/<?php echo $rsprofile['hotel_image']; ?>" style='width: 150px; height: 175px;'>
          </div>
          <div class="form-group mt-3">
            Hotel Name  <span class="errmsg"  id="errhotel_name"></span>
            <input type="text" class="form-control" name="hotel_name" id="hotel_name" placeholder="Hotel Name" value="<?php echo $rsprofile['hotel_name']; ?>" onkeyup="validateform()">
          </div>
          <div class="form-group mt-3">
            Email ID  <span class="errmsg"  id="erremail_id"></span>
            <input type="email" class="form-control" name="email_id" id="email_id" placeholder="Enter Email" value="<?php echo $rsprofile['email_id']; ?>" onkeyup="validateform()">
          </div>
          <div class="form-group mt-3">
            Phone Number  <span class="errmsg"  id="errph_no"></span>
            <input type="text" class="form-control" name="ph_no" id="ph_no" placeholder="Enter PhoneNumber" value="<?php echo $rsprofile['ph_no']; ?>" onkeyup="validateform()">
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
	if(!$('#hotel_name').val().match(alphaspaceExp))
	{
		$('#errhotel_name').html('Hotel name should contain alphabets..');
		err = "true";
	}
	if($('#hotel_name').val() == "")
	{
		$('#errhotel_name').html('Hotel Name Should not be empty..');
		err = "true";
	}
	if(!$('#email_id').val().match(emailExp))
	{
		$('#erremail_id').html('Entered Email ID is not valid..');
		err = "true";
	}
	if($('#email_id').val() == "")
	{
		$('#erremail_id').html('Email ID Should not be empty..');
		err = "true";
	}
	if($('#ph_no').val().length != 10)
	{
		$('#errph_no').html('Phone Number should contain 10 digits..');
		err = "true";
	}
	if($('#ph_no').val() == "")
	{
		$('#errph_no').html('Phone Number Should not be empty..');
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