<?php
include("header.php");
if(isset($_POST['btnsubmit']))
{
  
	if(isset($_GET['editid']))
  {
	  $sqlupdate = "UPDATE department SET department_name='$_POST[department_name]',status='$_POST[status]' WHERE department_id='$_GET[editid]'";
	  echo $sqlupdate;
	  $qsqlupdate = mysqli_query($con,$sqlupdate);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('Department Record Updated successfully...');</script>";
		}	  
  }
  else
  {
    $sqlinsert ="INSERT INTO department( department_name, status) VALUES('$_POST[department_name]','$_POST[status]')";
    $qsqlinsert = mysqli_query($con,$sqlinsert);
    echo mysqli_error($con);
    if(mysqli_affected_rows($con) == 1)
    {
        echo "<script>alert('Department Record inserted successfully...');</script>";
        echo "<script>window.location='department.php';</script>";
    }
	}
}

if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM department WHERE 	department_id='" . $_GET['editid'] . "'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}	
?>
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Department</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Department</li>
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
    <h2>Department</h2>
    <p class="separator">Kindly add or Update Department Record</p>
  </div>

  <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">

    <div class="col-lg-6 col-md-6 col-sm-offset-6">
      <div class="form">
        <form action="" method="post" role="form" class="php-email-form" name="frm" onsubmit="return validateform()">
          <div class="form-group">
            Department Name <span class="errmsg" id="errdepartment_name"></span>
            <input type="text" name="department_name" class="form-control" id="department_name" placeholder="Department Name" value="<?php echo $rsedit['department_name']; ?>" onkeyup="validateform()">
          </div>
        
          <div class="form-group mt-3">
            Status <span class="errmsg" id="errstatus"></span>
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
  if(!$('#department_name').val().match(alphaspaceExp))
	{
		$('#errdepartment_name').html('Department Name should contain alphabets..');
		err = "true";
	}
	if($('#department_name').val() == "")
	{
		$('#errdepartment_name').html('Department Name Should not be empty..');
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