<?php 
include("header.php"); 
if(!isset($_SESSION['adminid']))
{
    echo "<script>window.location='adminlogin.php';</script>";  
}
if(isset($_POST['btnsubmit']))
{
  $pwd = md5($_POST['password']);
  $img = rand() . $_FILES['hotel_image']['name'];
  move_uploaded_file($_FILES['hotel_image']['tmp_name'],"hotelimg/" . $img);
  if(isset($_GET['editid']))
  {
	$sql = "SELECT * FROM hotel WHERE hotel_id='" . $_GET['editid'] . "'";
	$qsql = mysqli_query($con,$sql);
	$rs = mysqli_fetch_array($qsql);			
	if($_POST['status']=='Active' && $rs['status']=='Inactive')
	{
	$subject="Your Account Has Been Activated Successfully";
	$button= '<a style="color:#ffffff; background-color: #ff8300; border: 20px solid #ff8300; border-left: 20px solid #ff8300; border-right: 20px solid #ff8300; border-top: 10px solid #ff8300; border-bottom: 10px solid #ff8300;border-radius: 3px; text-decoration:none;" href="' . $arrdata['link'] . '">Login</a>';
	}
	else if($_POST['status']=='Inactive' && $rs['status']=='Active')
	{
	  $subject="Your Account Has Been Inactivated";
	} 
	if($_POST['password']!= "" && $_POST['status']=='Active')
	{
		$subject="Your Account Has Been Activated Successfully";
		$button= '<a style="color:#ffffff; background-color: #ff8300; border: 20px solid #ff8300; border-left: 20px solid #ff8300; border-right: 20px solid #ff8300; border-top: 10px solid #ff8300; border-bottom: 10px solid #ff8300;border-radius: 3px; text-decoration:none;" href="' . $arrdata['link'] . '">Login</a>';
		$tblmessage = '<table class="mb mt" style="font-weight: normal;border-collapse: collapse;border: 0;margin: 0;padding: 0;font-family: Arial, sans-serif;margin-bottom: 15px;margin-top: 0;">
	  <tr>
		<th class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">Hotel Name.</th>
		<td class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">' . $_POST['hotel_name'] .'</td>
	  </tr>		
	  <tr>
		<th class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">Email ID</th>
		<td class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">' . $_POST['email_id'] .'</td>
	  </tr>
	  <tr>
		<th class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">Phone Number</th>
		<td class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">' . $_POST['ph_no'] .'</td>
	  </tr>
	  <tr>
	  <th class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">Your Account Password</th>
	  <td class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">' . $_POST['password'] .'</td>
	</tr>
	  </table>';
	}
	  $sqlupdate = "UPDATE hotel SET hotel_name='$_POST[hotel_name]',email_id='$_POST[email_id]'";
	  if($_POST['password'] != "")
	  {
		  $sqlupdate = $sqlupdate . ",password='$pwd'";
	  }
	  $sqlupdate = $sqlupdate . ",ph_no='$_POST[ph_no]'";
	  if($_FILES['hotel_image']['name'] != "")
	  {
		  $sqlupdate = $sqlupdate . ",hotel_image='$img'";
	  }
	  $sqlupdate = $sqlupdate . ",status='$_POST[status]' WHERE hotel_id='$_GET[editid]'";
	  $qsqlupdate = mysqli_query($con,$sqlupdate);
		//echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			$mailid= $_POST['email_id'];
			$mailname= $_POST['hotel_name'];
			$arrdata['link'] = "http".(!empty($_SERVER['HTTPS']) ? 's' : '') . "://" . $_SERVER['SERVER_NAME'].substr($_SERVER['PHP_SELF'], 0, strrpos($_SERVER['PHP_SELF'], '/')) . "/stafflogin.php";
	  
		include("phpmailer.php");
		if($subject != "")
		{
		staffverification($mailid,$mailname,$tblmessage,$subject,$button);	
		}
			echo "<script>alert('Hotel Record Updated successfully...');</script>";
		}	 
		else
		{
			echo "<script>alert('Hotel Account already exists..');</script>";
			echo "<script>window.location='viewhotel.php';</script>";
		} 
  }
  else
  {
    $sqlinsert ="INSERT INTO hotel( hotel_name, email_id, password, ph_no, hotel_image, status) VALUES('$_POST[hotel_name]','$_POST[email_id]','$pwd','$_POST[ph_no]','$img','$_POST[status]')";
    $qsqlinsert = mysqli_query($con,$sqlinsert);
    //echo mysqli_error($con);
    if(mysqli_affected_rows($con) == 1)
    {
		$mailid= $_POST['email_id'];
      $mailname= $_POST['hotel_name'];
      $subject="Your Account Has Been Registered Successfully";
      $arrdata['link'] = "http".(!empty($_SERVER['HTTPS']) ? 's' : '') . "://" . $_SERVER['SERVER_NAME'].substr($_SERVER['PHP_SELF'], 0, strrpos($_SERVER['PHP_SELF'], '/')) . "/hotellogin.php";
      $button= '<a style="color:#ffffff; background-color: #ff8300; border: 20px solid #ff8300; border-left: 20px solid #ff8300; border-right: 20px solid #ff8300; border-top: 10px solid #ff8300; border-bottom: 10px solid #ff8300;border-radius: 3px; text-decoration:none;" href="' . $arrdata['link'] . '">Login</a>';
      $tblmessage = '<table class="mb mt" style="font-weight: normal;border-collapse: collapse;border: 0;margin: 0;padding: 0;font-family: Arial, sans-serif;margin-bottom: 15px;margin-top: 0;">
    <tr>
      <th class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">Hotel Name.</th>
      <td class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">' . $_POST['hotel_name'] .'</td>
    </tr>		
    <tr>
      <th class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">Email ID</th>
      <td class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">' . $_POST['email_id'] .'</td>
    </tr>
    <tr>
      <th class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">Phone Number</th>
      <td class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">' . $_POST['ph_no'] .'</td>
    </tr>
    <tr>
    <th class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">Your Account Password</th>
    <td class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">' . $_POST['password'] .'</td>
  </tr>
    </table>';
    include("phpmailer.php");
    staffverification($mailid,$mailname,$tblmessage,$subject,$button);
    // Mail code ends here

        echo "<script>alert('Hotel Record inserted successfully...');</script>";
        echo "<script>window.location='hotel.php';</script>";
    }
	else
	{
		echo "<script>alert('Hotel Account already exists..');</script>";
		echo "<script>window.location='viewhotel.php';</script>";
	}
  }
}
if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM hotel WHERE 	hotel_id='" . $_GET['editid'] . "'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}	
?>
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>	<a href="#" class="back" onclick="window.history.back()" style="font-size:15px">&laquo; Back</a>  </h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Hotel</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->
    <div style="padding-left:70px; padding-top: 20px;">
	</div> 
<!-- ======= Contact Section ======= -->
<section id="contact" class="padd-section" style="padding-top: 0px;">

<div class="container" data-aos="fade-up">
  <div class="section-title text-center">
    <h2>Hotel</h2>
    <p class="separator">Kindly add or Update Hotel Record</p>
  </div>

<form action="" method="post" role="form" class="php-email-form" name="frm" enctype="multipart/form-data" onsubmit="return validateform()">
<input type="hidden" name="editid" id="editid" value="<?php
	if(isset($_GET['editid']))
	{
		echo $_GET['editid'];
	}
	else
	{
		echo 0;
	}
	?>" > 
  <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">

    <div class="col-lg-6 col-md-6">
      <div class="form">
    
          <div class="form-group">
            Hotel Name <span class="errmsg"  id="errhotel_name"></span>
            <input type="text" class="form-control" name="hotel_name" id="hotel_name" placeholder="Hotel Name" value="<?php echo $rsedit['hotel_name']; ?>" onkeyup="return validateform()" >
          </div>
          <div class="form-group mt-3"> 
            Email ID <span class="errmsg"  id="erremail_id"></span>
            <input type="email" class="form-control" name="email_id" id="email_id" placeholder="Enter Email" value="<?php echo $rsedit['email_id']; ?>" onkeyup="return validateform()">
          </div>
		  <div class="form-group mt-3">
			Phone Number <span class="errmsg"  id="errph_no"></span>
            <input type="number" class="form-control" name="ph_no" id="ph_no" placeholder="Enter Phone Number" value="<?php echo $rsedit['ph_no']; ?>" onkeyup="return validateform()">
          </div>
          <div class="form-group mt-3">
            Password <span class="errmsg"  id="errpassword"></span>
            <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password"   onkeyup="return validateform()">
          </div>
          <div class="form-group mt-3">
            Confirm Password <span class="errmsg"  id="errcpassword"></span>
            <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Confirm Password" onkeyup="return validateform()" >
          </div>
          <div class="form-group mt-3">
            Status <span class="errmsg"  id="errstatus"></span>
            <select name="status" id="status"  class="form-control" onchange="return validateform()">
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
      </div>
    </div>
	<div class="col-md-4 col-sm-offset-2">
      <div class="form">
        <div class="form-group">
            Hotel Image
            <input type="file" class="form-control" name="hotel_image" id="hotel_image">
			<img src="<?php
				if($rsedit['hotel_image'] == "")
				{
					echo "assets/img/defaulticonimage.jpg";
				}
				else if(file_exists("hotelimg/".$rsedit['hotel_image']))
				{
					echo "hotelimg/".$rsedit['hotel_image'];
				}
				else
				{
				echo "assets/img/defaulticonimage.jpg";
				}
			?>" style="width: 100%;max-height: 400px;" id="imgpreview">
          </div>
      </div>
    </div>
	<div class="col-md-12">
      <div class="form">
        <div class="form-group">
		<br>
		<br>
          <div class="text-center"><button type="submit" name="btnsubmit">Click Here to Submit</button></div>
          </div>
          <div class="form-group">
			<img src="">
          </div>

      </div>
    </div>
  </div>
</form>
</div>
</section><!-- End Contact Section -->


  </main><!-- End #main -->
  <?php include("footer.php"); ?>
 <script>
$(function(){
  $('#hotel_image').change(function(){
    var input = this;
    var url = $(this).val();
    var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
    if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) 
     {
        var reader = new FileReader();

        reader.onload = function (e) {
           $('#imgpreview').attr('src', e.target.result);
        }
       reader.readAsDataURL(input.files[0]);
    }
    else
    {
      $('#imgpreview').attr('src', '/assets/img/defaultimage.jpg');
    }
  });

});
	</script>
<script>
$('#imgpreview').click(function(){ $('#hotel_image').trigger('click'); });
</script>

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
		$('#errhotel_name').html('Staff name should contain alphabets..');
		err = "true";
	}
	if($('#hotel_name').val() == "")
	{
		$('#errhotel_name').html('Staff Name Should not be empty..');
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