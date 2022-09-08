<?php
include("header.php");
if(isset($_POST['submitorder']))
{
	$sqlorder= "INSERT INTO bill(hall_booking_id,hotel_id,staffid,date_time,total_amt,bill_status) VALUES('$_GET[hall_booking_id]','$_GET[hotel_id]','$_SESSION[staffid]','$_POST[dte] $_POST[tme]','$_POST[total_amt]','Pending')";
	$qsqlhall_booking = mysqli_query($con,$sqlorder);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		$insid = mysqli_insert_id($con);
		$sqlfoodorder ="UPDATE food_order SET bill_id='$insid', status='Active' WHERE  bill_id='0' AND status='Pending'";
		$qsqlfoodorder = mysqli_query($con,$sqlfoodorder);
		echo "<script>alert('Food Ordered successfully. Admin needs to verify this Food order..');</script>";
//#######################################################################
$sqlbill = "SELECT bill.*,eventtype.eventtype,bill.date_time, staff.staffname, hotel.hotel_name FROM `bill` LEFT JOIN hall_booking ON bill.hall_booking_id=hall_booking.hall_booking_id LEFT JOIN staff ON staff.staffid=hall_booking.staffid LEFT JOIN eventtype ON eventtype.eventtypeid=hall_booking.eventtypeid LEFT JOIN hotel ON hotel.hotel_id=bill.hotel_id where bill.bill_id='$insid'";
$qsqlbill = mysqli_query($con,$sqlbill);
$rsbill = mysqli_fetch_array($qsqlbill);
//#######################################################################
$subject = "Food Order Receipt";
$message ='<table class="mb mt" style="font-weight: normal;border-collapse: collapse;border: 0;margin: 0;padding: 0;font-family: Arial, sans-serif;margin-bottom: 15px;margin-top: 0;"><tr><th class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">';
$message = $message . "<h2>Hotel:</h2>" . $rsbill['hotel_name'] ."<br>
Food Order Date/Time: " . date("d-m-Y h:i A",strtotime($rsbill['date_time'])) ."<br>";
$message = $message .  '</th><th class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">';
$message = $message . "<b>INVOICE:</b>" . $rsbill['bill_id'] ."<br>
<b>Event:</b>" . $rsbill['eventtype'] ."<br>
Event Date/Time: " . date("d-m-Y h:i A",strtotime($rsbill['date_time'])) ."<br>";
$message = $message.  "</th></tr></table><br><hr>";
$message = $message.  '<table  class="mb mt" style="font-weight: normal;border-collapse: collapse;border: 0;margin: 0;padding: 0;font-family: Arial, sans-serif;margin-bottom: 15px;margin-top: 0;"><tr><th class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;"><thead><tr><th>#</th><th class="text-left">DESCRIPTION</th><th class="text-right">COST</th><th class="text-right">QUANTITY</th><th class="text-right">TOTAL</th></tr></thead><tbody>';
$sqlitem = "SELECT food_order.*,food_item.item_name,food_item.item_cost,food_item.item_image FROM food_order LEFT JOIN food_item ON food_order.food_item_id=food_item.food_item_id where  food_order.bill_id='$insid'";
$qsqlitem = mysqli_query($con,$sqlitem);
$i=1;
$sum = 0;
while($rsitem= mysqli_fetch_array($qsqlitem))
{
$message = $message.  '<tr><td class="no" style="width: 100px;">$i</td><td class="text-left" style="width: 500px;"><h3>' . $rsitem['item_name'] . '</h3></td><td class="unit" style="width: 100px;">Rs. ' . $rsitem['item_cost'] . '</td><td class="qty" style="width: 100px;">' . $rsitem['item_qty'] . '</td><td class="total" style="width: 100px;">Rs. ' . $rsitem['item_cost']*$rsitem['item_qty'] . '</td></tr>';
$i = $i +1;
$sum = $sum + ($rsitem['item_qty'] * $rsitem['item_cost']);
}
$message = $message.  "</tbody><tfoot><tr><td colspan='2'></td><td colspan='2'>GRAND TOTAL</td><td>Rs. $sum</td></tr></tfoot></table>";
$tblmessage="";
$arrdatalink="http".(!empty($_SERVER['HTTPS']) ? 's' : '') . "://" . $_SERVER['SERVER_NAME'].substr($_SERVER['PHP_SELF'], 0, strrpos($_SERVER['PHP_SELF'], '/')) . "/foodorderbillingreceipt.php?bill_id=$insid";
include("phpmailer.php");
$sqlmailtoadmin ="SELECT * FROM admin WHERE status='Active'";
$qsqlmailtoadmin = mysqli_query($con,$sqlmailtoadmin);
echo mysqli_error($con);
//echo $tblmessage;
while($rsmailtoadmin = mysqli_fetch_array($qsqlmailtoadmin))
{
foodordermail($rsmailtoadmin['emailid'],$rsmailtoadmin['adminname'],$subject,$message,$tblmessage,$arrdatalink);
}
//#######################################################################
		echo "<script>window.location='foodorderbillingreceipt.php?bill_id=$insid';</script>";
	}
}
else
{
	$sqldel = "DELETE FROM food_order WHERE bill_id='0' AND status='Pending'";
	$qsqldel = mysqli_query($con,$sqldel);
	$sqlhall_booking = "SELECT * FROM hall_booking where hall_booking_id='$_GET[hall_booking_id]'";
	$qsqlhall_booking = mysqli_query($con,$sqlhall_booking);
	$rshall_booking = mysqli_fetch_array($qsqlhall_booking);
}
?>


  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Select Items to Order Food</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Food Items List</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->
	<br>
    <!-- ======= Blog Section ======= -->
    <section id="blog" class="padd-sectio">
    <a href="#" class="back" onclick="window.history.back()" style="margin-left:70px;">&laquo; Back</a><br><br>
      <div class="container" data-aos="fade-up">

        <div class="row" data-aos="fade-up" data-aos-delay="100">
<div class="col-md-7 col-lg-7" style="border: 1px solid black;padding-top: 5px;">
	<div class="row" >
<?php
$arr = array("Breakfast","Juices and Milkshakes","Icecreams and Salads","Lunch","Chats");
foreach($arr as $val)
	{
$sql ="SELECT * FROM food_item WHERE item_status='Active'";
$sql = $sql . " AND hotel_id='$_GET[hotel_id]' AND food_type = '$val'";
$qsql = mysqli_query($con,$sql);
echo mysqli_error($con);
if(mysqli_affected_rows($con) >= 1)
{
	echo "<div class='container'><div class='row'><div class='col-md-12'><div class='alert alert-warning' role='alert'>". $val ."</div></div></div></div>";
}
while($rsitem_image = mysqli_fetch_array($qsql))
{
	if($rsitem_image['item_image'] == "")
	{
		$item_image =  "assets/img/defaulticonimage.jpg";
	}
	else if(file_exists("foodimg/".$rsitem_image['item_image']))
	{
		$item_image = "foodimg/".$rsitem_image['item_image'];
	}
	else
	{
		$item_image = "assets/img/defaulticonimage.jpg";
	}
?>
          <div class="col-md-6 col-lg-4">
            <div class="block-blog text-left" >
              <a href="#"><img src="<?php echo $item_image; ?>" style="height: 150px;" alt="img"></a>
              <div class="content-blog"  style="box-shadow: 0 0 0 0 rgb(0 0 0 / 20%), inset 0px -2px 4px 0 rgb(42 15 15 / 19%);">
                <h4><a href="#"><b><?php echo $rsitem_image['item_name']; ?></b></a></h4>
                <a class="float-end readmore btn-warning" style="padding: 10px;" href=""onclick="return fun_foodorder(<?php echo $rsitem_image[0]; ?>)" >ORDER</a>
              </div>
				<br>&nbsp;
            </div>
          </div>
<?php
}
}
?>
	</div>
</div>
<div class="col-md-5 col-lg-5 " style="border: 1px solid black;padding-top: 5px;">
<form method="post" action="" onsubmit="return validateform()">
<div id="divfoodordercart"><?php include("jsfoodordercart.php"); ?></div>
<span class="errmsg"  id="errtotal_amt"></span>
<hr>
	<div class="row">
		<div class="col-md-6">
			<b>Delivery Date</b>
			<input type="date" name="dte" id="dte" class="form-control" readonly value="<?php echo date("Y-m-d",strtotime($rshall_booking['booking_start_dt_tim'])); ?>" ><br>
		</div>
		<div class="col-md-6">
			<b>Delivery Time</b><span class="errmsg"  id="errtme"></span>
			<input type="time" name="tme" id="tme" class="form-control" >
		</div>
		<div class="col-md-12"><hr>
			<center><input type="submit" name="submitorder" id="submitorder" class="btn btn-info" value="Click Here to Order Food" ></center>
		</div>
	</div>
</div>
</form>
        </div>
      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->
<br>
<br>
  <?php include("footer.php"); ?>
<script>
function fun_foodorder(item_id)
{
	$.post(
		"jsfoodordercart.php",
		{
		item_id: item_id 
		},
		function(data) {
			$('#divfoodordercart').html(data);
		}
	);
	return false;
}
</script>
<script>
function fun_changeqty(food_order_id,item_qty)
{
	$.post(
		"jsfoodordercart.php",
		{
		food_order_id: food_order_id,		
		item_qty: item_qty		
		},
		function(data) {
			$('#divfoodordercart').html(data);
		}
	);
	return false;
}
</script>
<script>
function fun_del_food_order_id(del_food_order_id)
{
	$.post(
		"jsfoodordercart.php",
		{
		del_food_order_id: del_food_order_id
		},
		function(data) {
			$('#divfoodordercart').html(data);
		}
	);
	return false;
}
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
	if($('#tme').val() == "")
	{
		$('#errtme').html("Enter Time..");
		err = "true";
	}
	
	if($('#total_amt').val() == "0")
	{
		$('#errtotal_amt').html("Select food item..");
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