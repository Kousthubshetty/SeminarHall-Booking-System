<?php
include("header.php");
if(!isset($_SESSION['adminid']))
{
    echo "<script>window.location='adminlogin.php';</script>";  
}
if(isset($_GET['delid']))
{
    $sqldel = "DELETE FROM hotel WHERE hotel_id='" . $_GET['delid'] . "'";
    $qsqldel = mysqli_query($con,$sqldel);
    echo mysqli_error($con);
    if(mysqli_affected_rows($con) == 1)
    {
        echo "<script>alert('Hotel Record deleted successfully..');</script>";
        echo "<script>window.location='viewhotel.php';</script>";
    }
}
?>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>View Hotel Accounts</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>View Hotel Accounts</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->
 
    <section class="inner-page pt-4">
      <div class="container">
      <a href="#" class="back" onclick="window.history.back()" >&laquo; Back</a> 
        <p>
        <h4 style="text-align:right;">Search Records Here<i class="fa fa-down" aria-hidden="true"></i></i></h4>
<table id="datatableplugin"  class="table table-bordered">
  <thead align=center>
  <tr>
    <th>Hotel Image</th>
    <th>Hotel Name</th>
    <th>Email ID</th>
    <th>Phone Number</th>
    <th>Action</th>
  </tr>
  </thead>
  <tbody>
<?php
$sql ="SELECT * FROM hotel";
$qsql = mysqli_query($con,$sql);
echo mysqli_error($con);
while($rs = mysqli_fetch_array($qsql))
{
  if(file_exists("hotelimg/".$rs['hotel_image']))
  {  
    $rsprofile = "hotelimg/".$rs['hotel_image'];
  }
  else{
    $rsprofile = 'hotelimg/defaultimage.img';
  }
  if($rs['hotel_image']== "")
  {
    $rsprofile = 'hotelimg/defaultimage.png';
  }
  echo "
    <tr align=center>
        <td><img src='"  . $rsprofile . "' style='width: 135px;height: 100px;' ></td>
        <td>"  . $rs['hotel_name'] . "</td>
        <td>"  . $rs['email_id'] . "</td>
        <td>"  . $rs['ph_no'] . "</td>
        <td style='width:100px;'><a href='hotel.php?editid=$rs[hotel_id]' class='btn btn-info' style='width:100%;'>Edit</a><br><a href='viewhotel.php?delid=$rs[hotel_id]' class='btn btn-danger'  style='width:100%;' onclick='return confirmdel()' >Delete</a></td>
    </tr>
  ";
}
?>
  </tbody>
</table>
<div class="text-center">
<a href='hotel.php' name="btnsubmit" class="btn btn-success btn-lg" style="background-color: #71c55d;">Add Hotel</a>
</div>
        </p>
      </div>
    </section>

  </main><!-- End #main -->
  <?php include("footer.php"); ?>