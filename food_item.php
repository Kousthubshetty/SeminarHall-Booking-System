<?php 
include("header.php"); 
if(!isset($_SESSION['hotel_id']))
{
    echo "<script>window.location='hotellogin.php';</script>";  
}
if(isset($_POST['btnsubmit']))
{
  $pwd = md5($_POST['password']);
  $img = rand() . $_FILES['item_image']['name'];
  move_uploaded_file($_FILES['item_image']['tmp_name'],"foodimg/" . $img);
  if(isset($_GET['editid']))
  {
	  $sqlupdate = "UPDATE food_item SET food_type = '$_POST[food_type]',item_name='$_POST[item_name]',item_cost='$_POST[item_cost]'";
	  if($_FILES['item_image']['name'] != "")
	  {
		  $sqlupdate = $sqlupdate . ",item_image='$img'";
	  }
	  $sqlupdate = $sqlupdate . ",item_status='$_POST[item_status]' WHERE food_item_id='$_GET[editid]'";
	  $qsqlupdate = mysqli_query($con,$sqlupdate);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('Food Item Record Updated successfully...');</script>";
			echo "<script>window.location='hoteldashboard.php';</script>";
		}	
  }
  else
  {
    $sqlinsert ="INSERT INTO food_item( hotel_id, food_type, item_name, item_cost, item_image, item_status) VALUES('$_SESSION[hotel_id]','$_POST[food_type]','$_POST[item_name]','$_POST[item_cost]','$img','$_POST[item_status]')";
    $qsqlinsert = mysqli_query($con,$sqlinsert);
    //echo mysqli_error($con);
    if(mysqli_affected_rows($con) == 1)
    {
        echo "<script>alert('Food Item Record inserted successfully...');</script>";
        echo "<script>window.location='food_item.php';</script>";
    }
	else
	{
		echo "<script>alert('Food item already exists..');</script>";
		echo "<script>window.location='viewfooditem.php';</script>";
	}
  }
}
if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM food_item WHERE food_item_id='" . $_GET['editid'] . "'";
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
            <li>Food Item</li>
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
    <h2>Food Item</h2>
    <p class="separator">Kindly add or Update Food Item</p>
  </div>

<form action="" method="post" role="form" class="php-email-form" name="frm" enctype="multipart/form-data" onsubmit="return validateform()">
  <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">

		<div class="col-lg-6 col-md-6">
		  <div class="form">
		  <div class="form-group mt-3">
				Food Category <span class="errmsg"  id="erritem_food_type"></span>
				<select name="food_type" id="food_type"  class="form-control" onchange="validateform()">
				  <option value="">Select Status</option>
				  <?php
				  $arr = array("Breakfast","Juices and Milkshakes","Icecreams and Salads","Lunch","Chats");
				  foreach($arr as $val)
				  {
					  if($rsedit['food_type'] == $val)
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
			  <div class="form-group mt-3">
				Item Name <span class="errmsg"  id="erritem_name"></span>
				<input type="text" class="form-control" name="item_name" id="item_name" placeholder="Item Name" value="<?php echo $rsedit['item_name']; ?>" onkeyup="validateform()">
			  </div>
			  <div class="form-group mt-3">
				Price <span class="errmsg"  id="erritem_cost"></span>
				<input type="number" class="form-control" name="item_cost" id="item_cost" placeholder="Enter item cost" value="<?php echo $rsedit['item_cost']; ?>" onchange="validateform()">
			  </div>
	   
			  <div class="form-group mt-3">
				Status <span class="errmsg"  id="erritem_status"></span>
				<select name="item_status" id="item_status"  class="form-control" onchange="validateform()">
				  <option value="">Select Status</option>
				  <?php
				  $arr = array("Active","Inactive");
				  foreach($arr as $val)
				  {
					  if($rsedit['item_status'] == $val)
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
		<div class="col-lg-6 col-md-6">
		  <div class="form">
			<div class="form-group">
				Item Image
				<input type="file" class="form-control" name="item_image" id="item_image"  onchange="loadFile(event)">
				<img src="<?php
					if($rsedit['item_image'] == "")
					{
						echo "assets/img/defaulticonimage.jpg";
					}
					else if(file_exists("foodimg/".$rsedit['item_image']))
					{
						echo "foodimg/".$rsedit['item_image'];
					}
					else
					{
					echo "assets/img/defaulticonimage.jpg";
					}
				?>" style="width: 220px;max-height: 200px;" id="output">
			</div>
		  </div>
		</div>
    </div>
	<div class="col-md-12">
      <div class="form">
        <div class="form-group">
		<br>
		<br>
          <div class="text-center"><hr><button type="submit" name="btnsubmit">Click Here to Submit</button></div>
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
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
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
	if($('#food_type').val() == "")
	{
		$('#erritem_food_type').html('Catogory Should not be empty..');
		err = "true";
	}
	if(!$('#item_name').val().match(alphaspaceExp))
	{
		$('#erritem_name').html('Item name should contain alphabets..');
		err = "true";
	}
	if($('#item_name').val() == "")
	{
		$('#erritem_name').html('Item Name Should not be empty..');
		err = "true";
	}
	if($('#item_cost').val() == "")
	{
		$('#erritem_cost').html('Price Should not be empty..');
		err = "true";
	}
	if($('#item_status').val() == "")
	{
		$('#erritem_status').html('Status Should not be empty..');
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