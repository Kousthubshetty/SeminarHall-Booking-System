<?php include("header.php"); ?>
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>View Food Orders</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>View Food Orders</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page pt-4">
      <div class="container">
      <a href="#" class="back" onclick="window.history.back()" >&laquo; Back</a>
<br>
<br>
<table id="datatableplugin"  class="table table-bordered">
  <thead>
  <tr>
    <th>Hotel</th>
    <th>Staff</th>
    <th>Date Time</th>
    <th>Total Amount</th>
    <th>Status</th>
    <th>Action</th>
  </tr>
  </thead>
  <tbody>
<?php
$sql ="SELECT bill.*, hotel.hotel_name,hotel.email_id,hotel.ph_no, staff.staffname FROM `bill` LEFT JOIN hotel ON bill.hotel_id=hotel.hotel_id LEFT JOIN staff ON staff.staffid=bill.staffid";
if(isset($_SESSION['adminid']))
{
  if($_GET['st']=='Pending' || $_GET['st']=='Rejected' || $_GET['st']=='Cancelled')
  {
    $sql = $sql . " WHERE bill.bill_status='$_GET[st]' ";
  }
  else
  {
	  $sql = $sql . " WHERE bill.bill_status='$_GET[st]' OR bill.bill_status='Accepted' ORDER BY `bill`.`bill_status` DESC";
  }
}
if(isset($_SESSION['staffid']))
{
	$sql = $sql . " WHERE bill.staffid='$_SESSION[staffid]'";
}
if(isset($_SESSION['hotel_id']))
{
	$sql = $sql . " WHERE bill.hotel_id='$_SESSION[hotel_id]' AND bill.bill_status='Approved' OR bill.bill_status='Accepted' OR bill.bill_status='Cancelled'";
}
$qsql = mysqli_query($con,$sql);
echo mysqli_error($con);
while($rs = mysqli_fetch_array($qsql))
{
  if($rs['bill_status'] == 'Approved' && (isset($_SESSION['hotel_id']) || isset($_SESSION['staffid'])))
  {
    $bill_status = "Pending";
  }
  else
  {
    $bill_status =$rs['bill_status'];
  }
  echo "
    <tr>
        <td>" . $rs['hotel_name'] . "</td>
        <td>"  . $rs['staffname'] . "</td>
        <td>"  . date("d-m-Y h:i A",strtotime($rs['date_time']))  . "</td>
        <td>₹"  . $rs['total_amt'] . "</td>
        <td>"  . $bill_status . "</td>
        <td><a href='foodorderbillingreceipt.php?bill_id=$rs[0]' target='_blank' class='btn btn-info' >View</a></td>
    </tr>
  ";
}
?>
  </tbody>
</table>
<br>
      </div>
    </section>

  </main><!-- End #main -->
  <?php include("footer.php"); ?>