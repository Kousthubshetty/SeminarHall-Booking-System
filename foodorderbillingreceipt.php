<?php
include("header.php");
//bill_id st
if(isset($_GET['st']))
{
    $sqlbill1 = "SELECT bill.*,eventtype.eventtype,bill.date_time, staff.staffname, staff.emailid, hotel.hotel_name,hotel.hotel_id as hotelid FROM `bill` LEFT JOIN hall_booking ON bill.hall_booking_id=hall_booking.hall_booking_id LEFT JOIN staff ON staff.staffid=hall_booking.staffid LEFT JOIN eventtype ON eventtype.eventtypeid=hall_booking.eventtypeid LEFT JOIN hotel ON hotel.hotel_id=bill.hotel_id where bill.bill_id='$_GET[bill_id]'";
    $qsqlbill1 = mysqli_query($con,$sqlbill1);
    $rsbill1 = mysqli_fetch_array($qsqlbill1);
    $bill_st = $rsbill1['bill_status'];

	$sqlupd = "UPDATE bill set bill_status='" . $_GET['st'] ."' WHERE bill_id='$_GET[bill_id]'";
	$qsqlupd = mysqli_query($con,$sqlupd);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Bill detail updated successfully.');</script>";
		//#######################################################################
		if(isset($_GET['st']))
		{
		$sqlbill = "SELECT bill.*,eventtype.eventtype,bill.date_time, staff.staffname, staff.emailid, hotel.hotel_name,hotel.hotel_id as hotelid FROM `bill` LEFT JOIN hall_booking ON bill.hall_booking_id=hall_booking.hall_booking_id LEFT JOIN staff ON staff.staffid=hall_booking.staffid LEFT JOIN eventtype ON eventtype.eventtypeid=hall_booking.eventtypeid LEFT JOIN hotel ON hotel.hotel_id=bill.hotel_id where bill.bill_id='$_GET[bill_id]'";
		$qsqlbill = mysqli_query($con,$sqlbill);
		$rsbill = mysqli_fetch_array($qsqlbill);
		$hotel_id = $rsbill['hotel_id'];
		//#######################################################################
		if(isset($_SESSION['hotel_id']) && $_GET['st'] == "Accepted")
        {
        $subject = "Food Order Receipt Accepted";
        }
        if(isset($_SESSION['adminid']) && $_GET['st'] == "Approved")
        {
        $subject = "Food Order Receipt";
        }
        if($_GET['st'] == "Rejected")
        {
        $subject = "Food Order Receipt Rejected";
        }
        if(isset($_SESSION['staffid']) && $_GET['st'] == "Cancelled")
        {
            $subject = "Food Order Cancellation";
        }
        $message ='<table class="mb mt" style="font-weight: normal;border-collapse: collapse;border: 0;margin: 0;padding: 0;font-family: Arial, sans-serif;margin-bottom: 15px;margin-top: 0;"><tr><th class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">';
		$message = $message . "<h2>Hotel:</h2>" . $rsbill['hotel_name'] ."<br>
		Food Order Date/Time: " . date("d-m-Y h:i A",strtotime($rsbill['date_time'])) ."<br>";
		$message = $message .  '</th><th class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;">';
		$message = $message . "<b>INVOICE:</b>" . $rsbill['bill_id'] ."<br>
		<b>Event:</b>" . $rsbill['eventtype'] ."<br>
		Event Date/Time: " . date("d-m-Y h:i A",strtotime($rsbill['date_time'])) ."<br>";
		$message = $message.  "</th></tr></table><br><hr>";
		$message = $message.  '<table  class="mb mt" style="font-weight: normal;border-collapse: collapse;border: 0;margin: 0;padding: 0;font-family: Arial, sans-serif;margin-bottom: 15px;margin-top: 0;"><tr><th class="grey-block" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;background-color: #fff; border-top: 1px solid #00a5b5; border-left: 1px solid #E6E6E6; border-right: 1px solid #E6E6E6; border-bottom: 1px solid #E6E6E6; width: 250px; text-align: left;"><thead><tr><th>#</th><th class="text-left">DESCRIPTION</th><th class="text-right">COST</th><th class="text-right">QUANTITY</th><th class="text-right">TOTAL</th></tr></thead><tbody>';
		$sqlitem = "SELECT food_order.*,food_item.item_name,food_item.item_cost,food_item.item_image FROM food_order LEFT JOIN food_item ON food_order.food_item_id=food_item.food_item_id where  food_order.bill_id='$_GET[bill_id]'";
		$qsqlitem = mysqli_query($con,$sqlitem);
		$i=1;
		$sum = 0;
			while($rsitem= mysqli_fetch_array($qsqlitem))
			{
			$message = $message.  '<tr><td class="no" style="width: 100px;">' . $i . '</td><td class="text-left" style="width: 500px;"><h3>' . $rsitem['item_name'] . '</h3></td><td class="unit" style="width: 100px;">Rs. ' . $rsitem['item_cost'] . '</td><td class="qty" style="width: 100px;">' . $rsitem['item_qty'] . '</td><td class="total" style="width: 100px;">Rs. ' . $rsitem['item_cost']*$rsitem['item_qty'] . '</td></tr>';
			$i = $i +1;
			$sum = $sum + ($rsitem['item_qty'] * $rsitem['item_cost']);
			}
		$message = $message.  "</tbody><tfoot><tr><td colspan='2'></td><td colspan='2'>GRAND TOTAL</td><td>Rs. $sum</td></tr></tfoot></table>";
		$tblmessage="";
        $billid = $_GET['bill_id'];
		$arrdatalink="http".(!empty($_SERVER['HTTPS']) ? 's' : '') . "://" . $_SERVER['SERVER_NAME'].substr($_SERVER['PHP_SELF'], 0, strrpos($_SERVER['PHP_SELF'], '/')) . "/foodorderbillingreceipt.php?bill_id=$billid";
		include("phpmailer.php");
		$sqlhotel ="SELECT * FROM hotel WHERE hotel_id='" . $hotel_id . "'";
		$qsqlhotel = mysqli_query($con,$sqlhotel);
		echo mysqli_error($con);
		$rshotel = mysqli_fetch_array($qsqlhotel);
        if(isset($_SESSION['adminid']) && $_GET['st'] == "Approved")
        {
		foodordermail($rshotel['email_id'],$rshotel['hotel_name'],$subject,$message,$tblmessage,$arrdatalink);
		}
        if(isset($_SESSION['hotel_id']) && $_GET['st'] == "Accepted")
        {
            foodordermail($rsbill['emailid'],$rsbill['staffname'],$subject,$message,$tblmessage,$arrdatalink);
        }
        if($_GET['st'] == "Rejected")
        {
            foodordermail($rsbill['emailid'],$rsbill['staffname'],$subject,$message,$tblmessage,$arrdatalink);  
        }
        if($_GET['st'] == "Cancelled")
        {
        if($bill_st == "Accepted")
        {
            foodordermail($rshotel['email_id'],$rshotel['hotel_name'],$subject,$message,$tblmessage,$arrdatalink);
        }
        else
        {
            $sqlmailtoadmin ="SELECT * FROM admin where status='Active'";
            $qsqlmailtoadmin = mysqli_query($con,$sqlmailtoadmin);
            echo mysqli_error($con);
            //echo $tblmessage;
            while($rsmailtoadmin = mysqli_fetch_array($qsqlmailtoadmin))
            {
            foodordermail($rsmailtoadmin['emailid'],$rsmailtoadmin['adminname'],$subject,$message,$tblmessage,$arrdatalink);
            }

        }
    }
        //#######################################################################
		}
	}
	echo "<script>window.location='foodorderbillingreceipt.php?bill_id=$_GET[bill_id]';</script>";
}
$sqlbill = "SELECT bill.*,eventtype.eventtype,bill.date_time, staff.staffname ,staff.emailid, hotel.hotel_name FROM `bill` LEFT JOIN hall_booking ON bill.hall_booking_id=hall_booking.hall_booking_id LEFT JOIN staff ON staff.staffid=hall_booking.staffid LEFT JOIN eventtype ON eventtype.eventtypeid=hall_booking.eventtypeid LEFT JOIN hotel ON hotel.hotel_id=bill.hotel_id where bill.bill_id='$_GET[bill_id]'";
$qsqlbill = mysqli_query($con,$sqlbill);
$rsbill = mysqli_fetch_array($qsqlbill);

?>
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Food Order Billing Receipt</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Food Order Billing Receipt</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page pt-4">
      <div class="container">
<style>
#invoice{
    padding: 30px;
}

.invoice {
    position: relative;
    background-color: #FFF;
    min-height: 680px;
    padding: 15px
}

.invoice header {
    padding: 10px 0;
    margin-bottom: 20px;
    border-bottom: 1px solid #3989c6
}

.invoice .company-details {
    text-align: right
}

.invoice .company-details .name {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .contacts {
    margin-bottom: 20px
}

.invoice .invoice-to {
    text-align: left
}

.invoice .invoice-to .to {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .invoice-details {
    text-align: right
}

.invoice .invoice-details .invoice-id {
    margin-top: 0;
    color: #3989c6
}

.invoice main {
    padding-bottom: 50px
}

.invoice main .thanks {
    margin-top: -100px;
    font-size: 2em;
    margin-bottom: 50px
}

.invoice main .notices {
    padding-left: 6px;
    border-left: 6px solid #3989c6
}

.invoice main .notices .notice {
    font-size: 1.2em
}

.invoice table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px
}

.invoice table td,.invoice table th {
    padding: 15px;
    background: #eee;
    border-bottom: 1px solid #fff
}

.invoice table th {
    white-space: nowrap;
    font-weight: 400;
    font-size: 16px
}

.invoice table td h3 {
    margin: 0;
    font-weight: 400;
    color: #3989c6;
    font-size: 1.2em
}

.invoice table .qty,.invoice table .total,.invoice table .unit {
    text-align: right;
    font-size: 1.2em
}

.invoice table .no {
    color: #fff;
    font-size: 1.6em;
    background: #3989c6
}

.invoice table .unit {
    background: #ddd
}

.invoice table .total {
    background: #3989c6;
    color: #fff
}

.invoice table tbody tr:last-child td {
    border: none
}

.invoice table tfoot td {
    background: 0 0;
    border-bottom: none;
    white-space: nowrap;
    text-align: right;
    padding: 10px 20px;
    font-size: 1.2em;
    border-top: 1px solid #aaa
}

.invoice table tfoot tr:first-child td {
    border-top: none
}

.invoice table tfoot tr:last-child td {
    color: #3989c6;
    font-size: 1.4em;
    border-top: 1px solid #3989c6
}

.invoice table tfoot tr td:first-child {
    border: none
}

.invoice footer {
    width: 100%;
    text-align: center;
    color: #777;
    border-top: 1px solid #aaa;
    padding: 8px 0
}

@media print {
    .invoice {
        font-size: 11px!important;
        overflow: hidden!important
    }

    .invoice footer {
        position: absolute;
        bottom: 10px;
        page-break-after: always
    }

    .invoice>div:last-child {
        page-break-before: always
    }
}
</style>
<!------ Include the above in your HEAD tag ---------->

<!--Author      : @arboshiki-->

<div id="invoice"  style="border: 1px solid black;padding-top: 5px;">

    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
            <header>
                <div class="row">
                    <div class="col">
                        <a target="_blank" href=""><img src="assets/img/logo.png" data-holder-rendered="true" style="height: 100px;" /></a>
                    </div>
                    <div class="col company-details">
                        <h2 class="name">
                            <a target="_blank" href="https://lobianijs.com">
                            SDM Ujire
                            </a>
                        </h2>
                        <div>SDM College (Autonomous), Ujire - 574240</div>
                        <div>08256-236221, 225</div>
                        <div> pgcenter@sdmcujire.in</div>
                    </div>
                </div>
            </header>
            <main>
                <div class="row contacts">
                    <div class="col invoice-to">
                        <div class="text-gray-light">Hotel:</div>
                        <h2 class="to"><?php echo $rsbill['hotel_name']; ?></h2>
                        <div class="date">Food Order Date/Time: <?php echo date("d-m-Y h:i A",strtotime($rsbill['date_time'])); ?></div>
                    </div>
                    <div class="col invoice-details">
                        <h1 class="invoice-id">INVOICE - <?php echo $_GET['bill_id']; ?></h1>
                        <div class="date"><b>Event:</b> <?php echo $rsbill['eventtype']; ?></div>
                        <div class="date"><b>Event Date/Time:</b> <?php echo date("d-m-Y h:i A",strtotime($rsbill['date_time'])); ?></div>
                    </div>
                </div>
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th class="text-left">DESCRIPTION</th>
                            <th class="text-right">COST</th>
                            <th class="text-right">QUANTITY</th>
                            <th class="text-right">TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
<?php
$sqlitem = "SELECT food_order.*,food_item.item_name,food_item.item_cost,food_item.item_image FROM food_order LEFT JOIN food_item ON food_order.food_item_id=food_item.food_item_id where  food_order.bill_id='$_GET[bill_id]'";
$qsqlitem = mysqli_query($con,$sqlitem);
$i=1;
$sum = 0;
while($rsitem= mysqli_fetch_array($qsqlitem))
{
?>
	<tr>
		<td class="no" style="width: 100px;"><?php echo $i; ?></td>
		<td class="text-left" style="width: 500px;"><h3><?php echo $rsitem['item_name']; ?></h3>
		</td>
		<td class="unit" style="width: 100px;">₹<?php echo $rsitem['item_cost'];?></td>
		<td class="qty" style="width: 100px;"><?php echo $rsitem['item_qty'];?></td>
		<td class="total" style="width: 100px;">₹<?php echo $rsitem['item_cost']*$rsitem['item_qty'];?></td>
	</tr>
<?php
$i = $i +1;
			$sum = $sum + ($rsitem['item_qty'] * $rsitem['item_cost']);
}
?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">GRAND TOTAL</td>
                            <td>₹<?php echo $sum; ?></td>
                        </tr>
                    </tfoot>
                </table><br>
                <div class="thanks">Thank you!</div>
                <div class="notices">
                    <div>Bill Status:</div>
                    <div class="notice"><?php 
                    if($rsbill['bill_status'] == "Approved" && (isset($_SESSION['hotel_id']) || isset($_SESSION['staffid'])) )
                    {
                        echo "Pending";
                    }
                    else
                    {
                    echo $rsbill['bill_status'];
                    } 
                    ?></div>
                </div>
            </main>
            <footer>
                Invoice was created on a computer and is valid without the signature and seal.
            </footer>
        </div>
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div></div>
    </div>
</div>
<br>
<center>
<?php
$currentdate = strtotime(date("Y-m-d"));
$bookeddate = strtotime(date("Y-m-d",strtotime($rsbill['date_time'])));
if(isset($_SESSION['adminid']) && $bookeddate > $currentdate && $rsbill['bill_status'] != "Accepted" && $rsbill['bill_status'] != "Cancelled")
{
?>
<a class="btn btn-success" href="foodorderbillingreceipt.php?bill_id=<?php echo $_GET['bill_id']; ?>&st=Approved" id="btn-approved" name="btn-approved">Accept</a>
<a class="btn btn-danger" href="foodorderbillingreceipt.php?bill_id=<?php echo $_GET['bill_id']; ?>&st=Rejected" id="btn-rejected" name="btn-rejected">Reject</a>
<?php
}
?>
<?php

if(isset($_SESSION['hotel_id']) && $bookeddate > $currentdate && $rsbill['bill_status'] != "Cancelled") 
{
?>
<a class="btn btn-success" href="foodorderbillingreceipt.php?bill_id=<?php echo $_GET['bill_id']; ?>&st=Accepted" id="btn-accepted" name="btn-accepted">Accept</a>
<a class="btn btn-danger" href="foodorderbillingreceipt.php?bill_id=<?php echo $_GET['bill_id']; ?>&st=Rejected" id="btn-rejected" name="btn-rejected">Reject</a>
<?php
}
?>
<?php
if(isset($_SESSION['staffid']) && $bookeddate > $currentdate ) 
{
    if($rsbill['bill_status'] != "Cancelled" && $rsbill['bill_status'] != "Rejected")
{
?>
<a class="btn btn-danger" href="foodorderbillingreceipt.php?bill_id=<?php echo $_GET['bill_id']; ?>&st=Cancelled" id="btncancelsubmit" name="btncancelsubmit">Cancel Order</a>
    <?php
}
}
?>
<input type="button"  onclick="printDiv('invoice')" name="btnbutton" id="btnbutton" class="btn btn-primary" value="Print" ></centeR><br>
      </div>
	  
    </section>

  </main><!-- End #main -->
  <?php include("footer.php"); ?>
  <script>
   $('#printInvoice').click(function(){
            Popup($('.invoice')[0].outerHTML);
            function Popup(data) 
            {
                window.print();
                return true;
            }
        });
		</script>
<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>

<script>
	 status="<?php echo $rsbill['bill_status'] ?>";
	  if(status=="Accepted")
	  {
		document.getElementById("btn-accepted").style.display="none";
	  }
	  else if(status=='Rejected')
	  {
		document.getElementById('btn-rejected').style.display="none";
	  }
      else if(status=='Approved')
	  {
		document.getElementById('btn-approved').style.display="none";
	  }
  </script>