<?php
include("header.php");
if(!isset($_SESSION['adminid']))
{
    echo "<script>window.location='adminlogin.php';</script>";  
}
if(isset($_GET['delid']))
{
    $sqldel = "DELETE FROM staff WHERE staffid='" . $_GET['delid'] . "'";
    $qsqldel = mysqli_query($con,$sqldel);
    echo mysqli_error($con);
    if(mysqli_affected_rows($con) == 1)
    {
        echo "<script>alert('Staff Record deleted successfully..');</script>";
        echo "<script>window.location='viewstaff.php';</script>";
    }
}
?>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>View Staff Accounts</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>View Staff Accounts</li>
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
    <th>Profile<br>Photo</th>
    <th>Staff Name</th>
    <th>department</th>
    <th>Email ID</th>
    <th>Phone Number</th>
    <th>Status</th>
    <th>Action</th>
  </tr>
  </thead>
  <tbody>
<?php
$sql ="SELECT staff.*, department.department_name FROM staff LEFT JOIN  department ON department.department_id=staff.department_id ";
$qsql = mysqli_query($con,$sql);
echo mysqli_error($con);
while($rs = mysqli_fetch_array($qsql))
{
  if(file_exists("staffimg/".$rs['profile_img']))
  {  
    $rsprofile = "staffimg/".$rs['profile_img'];
  }
  else{
    $rsprofile = 'staffimg/defaultimage.jpg';
  }
  if($rs['profile_img']== "")
  {
    $rsprofile = 'staffimg/defaultimage.jpg';
  }
  echo "
    <tr align=center>
        <td><img src='"  . $rsprofile . "' style='width: 135px;height: 100px;' ></td>
        <td>"  . $rs['staffname'] . "</td>
        <td>"  . $rs['department_name'] . "</td>
        <td>"  . $rs['emailid'] . "</td>
        <td>"  . $rs['phno'] . "</td>
        <td>"  . $rs['status'] . "</td>
        <td style='width:100px;'><a href='staff.php?editid=$rs[staffid]' class='btn btn-info' style='width:100%;background-color:#0dcaf0'>Edit</a><br><a href='viewstaff.php?delid=$rs[staffid]' class='btn btn-danger'  style='width:100%;' onclick='return confirmdel()' >Delete</a></td>
    </tr>
  ";
}
?>
  </tbody>
</table>
<div class="text-center">
<a href='staff.php' name="btnsubmit" class="btn btn-success btn-lg" style="background-color: #71c55d;">Add staff</a>
</div>
        </p>
      </div>
    </section>

  </main><!-- End #main -->
  <?php include("footer.php"); ?>