<?php 
include("header.php"); 
if(!isset($_SESSION['adminid']))
{
    echo "<script>window.location='adminlogin.php';</script>";  
}
if(isset($_POST['btnsubmit']))
{
  $img = rand() . $_FILES['equipment_img']['name'];
  move_uploaded_file($_FILES['equipment_img']['tmp_name'],"equipment_images/" . $img);
  $equipment_detail = nl2br($_POST['equipment_detail']);
  if(isset($_GET['editid']))
  {
	  $sqlupdate = "UPDATE equipments SET equipment_type='$_POST[equipment_type]',equipment_detail='$equipment_detail'";
    if($_FILES['equipment_img']['name'] != "")
	  {
		  $sqlupdate = $sqlupdate . ",equipment_img='$img'";
	  }
	  $sqlupdate = $sqlupdate . ",equipment_quantity='$_POST[equipment_quantity]',equipment_status='$_POST[equipment_status]' WHERE equipment_id ='$_GET[editid]'";
	  echo $sqlupdate;
	  $qsqlupdate = mysqli_query($con,$sqlupdate);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('Equipment Record Updated successfully...');</script>";
      echo "<script>window.location='viewequipments.php';</script>";

    }	  
  }
  else
  {
  $sqlinsert ="INSERT INTO equipments( equipment_type, equipment_detail, equipment_quantity, equipment_img, equipment_status) VALUES('$_POST[equipment_type]','$equipment_detail','$_POST[equipment_quantity]','$img','$_POST[equipment_status]')";
  $qsqlinsert = mysqli_query($con,$sqlinsert);
  echo mysqli_error($con);
  if(mysqli_affected_rows($con) == 1)
  {
    echo "<script>alert('Equipments Record inserted successfully...');</script>";
    echo "<script>window.location='equipments.php';</script>";
  }
}
}
if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM equipments WHERE 	equipment_id='" . $_GET['editid'] . "'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}	
?>
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Equipments</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Equipments</li>
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
    <h2>Equipments</h2>
    <p class="separator">Kindly Add or Update Equipment Details</p>
  </div>

  <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">

    <div class="col-lg-6 col-md-6 col-sm-offset-6">
      <div class="form">
        <form action="" method="post" role="form" class="php-email-form" name="frm" enctype="multipart/form-data" onsubmit="return validateform()">
        <div class="form-group mt-3">
            Equipment Name <span class="errmsg"  id="errequipment_type"></span>
            <input type="text" class="form-control" name="equipment_type" id="equipment_type" placeholder="Enter Equipment name" value="<?php echo $rsedit['equipment_type']; ?>"  onkeyup="validateform()">
          </div>
          <div class="form-group mt-3">
            Equipment Detail
            <textarea class="form-control" name="equipment_detail" id="equipment_detail" placeholder="Enter Equipment Details" ><?php echo $rsedit['equipment_detail']; ?></textarea>
          </div>
		   <div class="form-group mt-3">
            Equipment Quantity <span class="errmsg"  id="errequipment_quantity"></span>
            <input type="number" class="form-control" name="equipment_quantity" id="equipment_quantity" placeholder="Enter Equipment Quantity" value="<?php echo $rsedit['equipment_quantity']; ?>"  onchange="validateform()">
          </div>
          <div class="form-group mt-3">
            Equipment Image
            <input type="file" class="form-control" name="equipment_img" id="equipment_img" value="<?php echo $rsedit['equipment_type']; ?>">
          </div>          
          <div class="form-group mt-3">
            Equipment Status <span class="errmsg"  id="errequipment_status"></span>
            <select name="equipment_status" id="equipment_status"  class="form-control"  onchange="validateform()">
              <option value="">Select Equipment Status</option>
              <?php
              $arr = array("Active","Inactive");
              foreach($arr as $val)
              {
                if($rsedit['equipment_status'] == $val)
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
          <div class="text-center"><button type="submit" name="btnsubmit">Click here to Add/Update Equipments</button></div>
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
	if(!$('#equipment_type').val().match(alphaspaceExp))
	{
		$('#errequipment_type').html('Equipment_type should contain alphabets..');
		err = "true";
	}
	if($('#equipment_type').val() == "")
	{
		$('#errequipment_type').html('Equipment_type Should not be empty..');
		err = "true";
	}
  if(!$('#equipment_quantity').val().match(numericExpression))
	{
		$('#errequipment_quantity').html('Equipment quantity should contain Numeric value..');
		err = "true";
	}
	if($('#equipment_quantity').val() == "")
	{
		$('#errequipment_quantity').html('Equipment quantity Should not be empty..');
		err = "true";
	}
	if($('#equipment_status').val() == "")
	{
		$('#errequipment_status').html('Equipment Status Should not be empty..');
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