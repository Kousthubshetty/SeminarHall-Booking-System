<?php
include("header.php");
if(!isset($_SESSION['adminid']))
{
    echo "<script>window.location='adminlogin.php';</script>";  
}
if(isset($_GET['delid']))
{
    $sqldel = "DELETE FROM change_request WHERE request_id='" . $_GET['delid'] . "'";
    $qsqldel = mysqli_query($con,$sqldel);
    echo mysqli_error($con);
    if(mysqli_affected_rows($con) == 1)
    {
        echo "<script>alert('Change Request Record deleted successfully..');</script>";
        echo "<script>window.location='viewchange_request.php';</script>";
    }
}
?>
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>View Change Request</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>View Change Request</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page pt-4">
      <div class="container">
      <a href="#" class="back" onclick="window.history.back()" >&laquo; Back</a> 
        <p>
<table id="datatableplugin"  class="table table-bordered">
  <thead>
  <tr>
    <th>Hall Booking ID</th>
    <th>Staff Name</th>
    <th>Department</th>
    <th>Data and Time</th>
    <th>Reason</th>
    <th>Action</th>
  </tr>
  </thead>
  <tbody>
<?php
$sql ="SELECT change_request.*, department.department_name, staff.staffname,hall_booking.hall_booking_id FROM change_request LEFT JOIN  department ON department.department_id=change_request.department_id LEFT JOIN staff ON staff.staffid=change_request.staffid LEFT JOIN hall_booking ON change_request.hall_booking_id=hall_booking.hall_booking_id";
$qsql = mysqli_query($con,$sql);
echo mysqli_error($con);
while($rs = mysqli_fetch_array($qsql))
{
  echo "
    <tr>
        <td>"  . $rs['hall_booking_id'] . "</td>
        <td>"  . $rs['staffname'] . "</td>
        <td>"  . $rs['department_name'] . "</td>
        <td>"  . $rs['request_date'] . "</td>
        <td>"  . $rs['reason'] . "</td>
        <td><a href='change_request.php?editid=$rs[request_id]' class='btn btn-info' style='width:45%;'>Edit</a><a href='viewchange_request.php?delid=$rs[request_id]' class='btn btn-danger' onclick='return confirmdel()' style='width:45%;'>Delete</a></td>
    </tr>
  ";
}
?>
  </tbody>
</table>
 </p>
      </div>
    </section>

  </main><!-- End #main -->
  <?php include("footer.php"); ?>