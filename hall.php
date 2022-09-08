<?php 
include("header.php"); 
if(!isset($_SESSION['adminid']))
{
    echo "<script>window.location='adminlogin.php';</script>";  
}
if(isset($_POST['btnsubmit']))
{
  $img = rand() . $_FILES['hallimage']['name'];
  move_uploaded_file($_FILES['hallimage']['tmp_name'],"imghall/" . $img);
  $halldescription = nl2br($_POST['halldescription']);
  $halldesc = mysqli_real_escape_string($con,$halldescription);
  if(isset($_GET['editid']))
  {
		$sqlupdate = "UPDATE hall SET hallname='$_POST[hallname]',halldescription='$halldesc',max_capacity='$_POST[max_capacity]'";
		if($_FILES['hallimage']['name'] != "")
		{
		$sqlupdate = $sqlupdate . ",hallimage='$img'";
		}
		$sqlupdate = $sqlupdate . ",hall_status='$_POST[hall_status]' WHERE hallid='$_GET[editid]'";
		$qsqlupdate = mysqli_query($con,$sqlupdate);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('Hall Record Updated successfully...');</script>";
		}	  
  }
  else
  {
    $sqlinsert ="INSERT INTO hall( hallname, halldescription, max_capacity, hallimage, hall_status) VALUES('$_POST[hallname]','$halldesc','$_POST[max_capacity]','$img','$_POST[hall_status]')";
    $qsqlinsert = mysqli_query($con,$sqlinsert);
    echo mysqli_error($con);
    if(mysqli_affected_rows($con) == 1)
    {
        echo "<script>alert('Hall Record inserted successfully...');</script>";
        echo "<script>window.location='hall.php';</script>";
    }
  }
}
if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM hall WHERE 	hallid='" . $_GET['editid'] . "'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}	
?>
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Hall</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Hall</li>
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
    <h2>Hall</h2>
    <p class="separator">Kindly Enter Hall Details</p>
  </div>

  <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">

    <div class="col-lg-6 col-md-6 col-sm-offset-6">
      <div class="form">
        <form action="" method="post" role="form" class="php-email-form" name="frm" enctype="multipart/form-data" onsubmit="return validateform()">
        <div class="form-group mt-3">
            Hall Name <span class="errmsg" id="errhallname"></span>
            <input type="text" class="form-control" name="hallname" id="hallname" placeholder="Enter Hall Name" value="<?php echo $rsedit['hallname']; ?>" onkeyup="validateform()">
          </div>
          <div class="form-group mt-3">
           Hall Description 
           <textarea  class="form-control" name="halldescription" id="halldescription" placeholder="Enter Hall Description"><?php echo $rsedit['halldescription']; ?></textarea>
          </div> 
		  <div class="form-group mt-3">
            Maximum Capacity <span class="errmsg" id="errmax_capacity"></span>
            <input type="number" class="form-control" name="max_capacity" id="max_capacity" placeholder="Enter Maximum Capacity" value="<?php echo $rsedit['max_capacity']; ?>" onkeyup="validateform()">
          </div>
          <div class="form-group mt-3">
           Hall Image
           <input type="file" class="form-control" name="hallimage" id="hallimage" value="<?php echo $rsedit['hallimage']; ?>" onkeyup="validateform()">
          </div>          
          <div class="form-group mt-3">
            Status <span class="errmsg" id="errhall_status"></span>
            <select name="hall_status" id="hall_status"  class="form-control">
              <option value="">Select Hall Status</option>
              <?php
              $arr = array("Active","Inactive");
              foreach($arr as $val)
              {
				  if($rsedit['hall_status'] == $val)
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
          <div class="text-center"><button type="submit" name="btnsubmit">Click here to Add Hall Details</button></div>
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
	var alphaNumbericExp = /^[0-9a-zA-Z]+$/;
	var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,5}$/;
	var alphaspaceExp = /^[a-zA-Z\s]+$/;
	
	var err = "false";
	$('.errmsg').empty();
	 hall_status
	if(!$('#hallname').val().match(alphaspaceExp))
	{
		$('#errhallname').html('Hall name should contain alphabets..');
		err = "true";
	}
	if($('#hallname').val() == "")
	{
		$('#errhallname').html('Hall Name Should not be empty..');
		err = "true";
	}
	if(!$('#max_capacity').val().match(numericExpression))
	{
		$('#errmax_capacity').html('Max capacity should be in numbers..');
		err = "true";
	}
	if($('#max_capacity').val() == "")
	{
		$('#errmax_capacity').html('Max Capacity Should not be empty..');
		err = "true";
	}
	if($('#hall_status').val() == "")
	{
		$('#errhall_status').html('Status Should not be empty..');
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