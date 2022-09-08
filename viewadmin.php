<?php
include("header.php");
if(!isset($_SESSION['adminid']))
{
    echo "<script>window.location='adminlogin.php';</script>";  
}
if(isset($_GET['delid']))
{
    $sqldel = "DELETE FROM admin WHERE adminid='" . $_GET['delid'] . "'";
    $qsqldel = mysqli_query($con,$sqldel);
    echo mysqli_error($con);
    if(mysqli_affected_rows($con) == 1)
    {
        echo "<script>alert('Admin Record deleted successfully..');</script>";
        echo "<script>window.location='viewadmin.php';</script>";
    }
}
?>
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>View Admin</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>View Admin</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page pt-4">
      <div class="container">
      <a href="#" class="back" onclick="window.history.back()" >&laquo; Back</a> 
        <p>
        <h4 style="text-align:right;">Search Records Here<i class="fa fa-down" aria-hidden="true"></i></i></h4>
<table id="datatableplugin"  class="table table-bordered" align=center>
  <thead align=center>
  <tr>
    <th>Admin Name</th>
    <th>Email ID</th>
    <th>Action</th>
  </tr>
  </thead>
  <tbody>
<?php
$sql ="SELECT * FROM admin";
$qsql = mysqli_query($con,$sql);
echo mysqli_error($con);
while($rs = mysqli_fetch_array($qsql))
{
  echo "
    <tr align=center>
        <td>"  . $rs['adminname'] . "</td>
        <td>"  . $rs['emailid'] . "</td>
        <td><a href='admin.php?editid=$rs[adminid]' class='btn btn-success'  style='width:30%;background-color:#0dcaf0'>Edit</a> <a href='viewadmin.php?delid=$rs[adminid]' class='btn btn-danger'  style='width:30%;' onclick='return confirmdel()' >Delete</a></td>
    </tr>
  ";
}
?>
</tbody>
</table>
<div class="text-center">
<a href='admin.php' name="btnsubmit" class="btn btn-success btn-lg" style="background-color: #71c55d;">Add Admin</a>
</div>
        </p>
      </div>
    </section>

  </main><!-- End #main -->
  <?php include("footer.php"); ?>