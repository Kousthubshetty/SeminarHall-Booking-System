<?php 
include("header.php"); 
// if(!isset($_SESSION['adminid']))
// {
//     echo "<script>window.location='adminlogin.php';</script>";  
// }
if(isset($_POST['btnsubmit']))
{
  $pwd = md5($_POST['password']);
  $img = rand() . $_FILES['profile_img']['name'];
  move_uploaded_file($_FILES['profile_img']['tmp_name'],"staffimg/" . $img);
  if(isset($_GET['editid']))
  {
    $sql = "SELECT * FROM staff WHERE 	staffid='" . $_GET['editid'] . "'";
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
      $sql ="SELECT department_name FROM  department where department_id = '$_POST[department_id]'";
      $qsql = mysqli_query($con,$sql);
      echo mysqli_error($con);
      $rs = mysqli_fetch_array($qsql);
      $subject="Your Account Has Been Activated Successfully";
      $button= '<a style="color:#ffffff; background-color: #ff8300; border: 20px solid #ff8300; border-left: 20px solid #ff8300; border-right: 20px solid #ff8300; border-top: 10px solid #ff8300; border-bottom: 10px solid #ff8300;border-radius: 3px; text-decoration:none;" href="' . $arrdata['link'] . '">Login</a>';
      $tblmessage = '<table class="mb mt" style="font-weight: normal;border-collapse: collapse;border: 0;margin: 0;padding: 0;font-family: Arial, sans-serif;margin-bottom: 15px;margin-top: 0;">
    <tr>
      <th class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">Staff Name.</th>
      <td class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">' . $_POST['staffname'] .'</td>
    </tr>	
    <tr>
      <th class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">Department Name</th>
      <td class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">' . $rs['department_name'] .'</td>
    </tr>	
    <tr>
      <th class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">Email ID</th>
      <td class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">' . $_POST['emailid'] .'</td>
    </tr>
    <tr>
      <th class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">Phone Number</th>
      <td class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">' . $_POST['phno'] .'</td>
    </tr>
    <tr>
    <th class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">Your Account Password</th>
    <td class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">' . $_POST['password'] .'</td>
  </tr>
    </table>';

    }
	  $sqlupdate = "UPDATE staff SET department_id='$_POST[department_id]',staffname='$_POST[staffname]',emailid='$_POST[emailid]'";
	  if($_POST['password'] != "")
	  {
		  $sqlupdate = $sqlupdate . ",password='$pwd'";
	  }
	  $sqlupdate = $sqlupdate . ",phno='$_POST[phno]'";
	  if($_FILES['profile_img']['name'] != "")
	  {
		  $sqlupdate = $sqlupdate . ",profile_img='$img'";
	  }
	  $sqlupdate = $sqlupdate . ",status='$_POST[status]' WHERE staffid='$_GET[editid]'";
	  $qsqlupdate = mysqli_query($con,$sqlupdate);
		//echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
      // Mail code starts here
      $mailid= $_POST['emailid'];
      $mailname= $_POST['staffname'];
      $arrdata['link'] = "http".(!empty($_SERVER['HTTPS']) ? 's' : '') . "://" . $_SERVER['SERVER_NAME'].substr($_SERVER['PHP_SELF'], 0, strrpos($_SERVER['PHP_SELF'], '/')) . "/stafflogin.php";

  include("phpmailer.php");
  if($subject != "")
  {
  staffverification($mailid,$mailname,$tblmessage,$subject,$button);
  }
  echo "<script>alert('Staff Record Updated successfully...');</script>";

		// Mail code ends here
    }	 
		else
		{
			echo "<script>alert('Staff Account already exists..');</script>";
			echo "<script>window.location='viewstaff.php';</script>";
		} 
  }
  else
  {
    $sqlinsert ="INSERT INTO staff( department_id, staffname, emailid, password, phno, profile_img, status) VALUES('$_POST[department_id]','$_POST[staffname]','$_POST[emailid]','$pwd','$_POST[phno]','$img','$_POST[status]')";
    $qsqlinsert = mysqli_query($con,$sqlinsert);
    //echo mysqli_error($con);
    if(mysqli_affected_rows($con) == 1)
    { 
        // Mail code starts here
      $sql ="SELECT department_name FROM  department where department_id = '$_POST[department_id]'";
      $qsql = mysqli_query($con,$sql);
      echo mysqli_error($con);
      $rs = mysqli_fetch_array($qsql);
      $mailid= $_POST['emailid'];
      $mailname= $_POST['staffname'];
      $subject="Your Account Has Been Registered Successfully";
      $arrdata['link'] = "http".(!empty($_SERVER['HTTPS']) ? 's' : '') . "://" . $_SERVER['SERVER_NAME'].substr($_SERVER['PHP_SELF'], 0, strrpos($_SERVER['PHP_SELF'], '/')) . "/stafflogin.php";
      $button= '<a style="color:#ffffff; background-color: #ff8300; border: 20px solid #ff8300; border-left: 20px solid #ff8300; border-right: 20px solid #ff8300; border-top: 10px solid #ff8300; border-bottom: 10px solid #ff8300;border-radius: 3px; text-decoration:none;" href="' . $arrdata['link'] . '">Login</a>';
      $tblmessage = '<table class="mb mt" style="font-weight: normal;border-collapse: collapse;border: 0;margin: 0;padding: 0;font-family: Arial, sans-serif;margin-bottom: 15px;margin-top: 0;">
    <tr>
      <th class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">Staff Name.</th>
      <td class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">' . $_POST['staffname'] .'</td>
    </tr>	
    <tr>
      <th class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">Department Name</th>
      <td class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">' . $rs['department_name'] .'</td>
    </tr>	
    <tr>
      <th class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">Email ID</th>
      <td class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">' . $_POST['emailid'] .'</td>
    </tr>
    <tr>
      <th class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">Phone Number</th>
      <td class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">' . $_POST['phno'] .'</td>
    </tr>
    <tr>
    <th class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">Your Account Password</th>
    <td class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">' . $_POST['password'] .'</td>
  </tr>
    </table>';
    include("phpmailer.php");
    staffverification($mailid,$mailname,$tblmessage,$subject,$button);
    // Mail code ends here
        echo "<script>alert('Staff Record inserted successfully...');</script>";
        echo "<script>window.location='staff.php';</script>";
    }
	else
	{
		echo "<script>alert('Staff Account already exists..');</script>";
		echo "<script>window.location='viewstaff.php';</script>";
	}
  }
}
if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM staff WHERE 	staffid='" . $_GET['editid'] . "'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}	
?>
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Staff</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Staff</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->
    <div style="padding-left:70px; padding-top: 20px;">
    <a href="#" class="back" onclick="window.history.back()" style="font-size:15px">&laquo; Back</a>
  </div> 
<!-- ======= Contact Section ======= -->
<section id="contact" class="padd-section" style="padding-top: 0px;">

<div class="container" data-aos="fade-up">
  <div class="section-title text-center">
    <h2>Staff</h2>
    <p class="separator">Kindly add or Update Staff Record</p>
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
            Department <span class="errmsg" id="errdepartment_id"></span>
            <select name="department_id" id="department_id"  class="form-control" onchange="validateform()">
			<option value="">Select Department</option>
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
			?>
			</select>
          </div>
          <div class="form-group mt-3">
            Staff Name <span class="errmsg"  id="errstaffname"></span>
            <input type="text" class="form-control" name="staffname" id="staffname" placeholder="Staff Name" value="<?php echo $rsedit['staffname']; ?>"  onkeyup="validateform()" >
          </div>
          <div class="form-group mt-3">
            Email ID <span class="errmsg"  id="erremailid"></span>
            <input type="email" class="form-control" name="emailid" id="emailid" placeholder="Enter Email" value="<?php echo $rsedit['emailid']; ?>" onkeyup="validateform()" >
          </div>
          <div class="form-group mt-3">
            Password <span class="errmsg"  id="errpassword"></span>
            <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password"  onkeyup="validateform()" >
          </div>
          <div class="form-group mt-3">
            Confirm Password <span class="errmsg"  id="errcpassword"></span>
            <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Confirm Password"   onkeyup="validateform()">
          </div>
          <div class="form-group mt-3">
            Phone Number <span class="errmsg"  id="errphno"></span>
            <input type="text" class="form-control" name="phno" id="phno" placeholder="Enter PhoneNumber" value="<?php echo $rsedit['phno']; ?>"  onkeyup="validateform()" >
          </div>
          <div class="form-group mt-3">
            Status <span class="errmsg"  id="errstatus"></span>
            <select name="status" id="status"  class="form-control"   onchange="validateform()">
              <option value="">Select Status</option>
              <?php
              $arr = array("Active","Inactive","Not_verified");
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
            Profile Image
            <input type="file" class="form-control" name="profile_img" id="profile_img">
			<img src="<?php
				if($rsedit['profile_img'] == "")
				{
					echo "assets/img/defaultimage.jpg";
				}
				else if(file_exists("staffimg/".$rsedit['profile_img']))
				{
					echo "staffimg/".$rsedit['profile_img'];
				}
				else
				{
				echo "assets/img/defaultimage.jpg";
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
  $('#profile_img').change(function(){
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
$('#imgpreview').click(function(){ $('#profile_img').trigger('click'); });
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
	if($('#department_id').val() == "")
	{
		$('#errdepartment_id').html("Kindly select Department Name..");
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