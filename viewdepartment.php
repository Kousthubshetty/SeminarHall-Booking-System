<?php
include("header.php");
if(!isset($_SESSION['adminid']))
{
    echo "<script>window.location='adminlogin.php';</script>";  
}
if(isset($_GET['delid']))
{
    $sqldel = "DELETE FROM department WHERE department_id='" . $_GET['delid'] . "'";
    $qsqldel = mysqli_query($con,$sqldel);
    echo mysqli_error($con);
    if(mysqli_affected_rows($con) == 1)
    {
        echo "<script>alert('Department Record deleted successfully..');</script>";
        echo "<script>window.location='viewdepartment.php';</script>";
    }
}
?>
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>View Department</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>View Department</li>
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
    <th>Department Name</th>
    <th><center>Action</center></th>
  </tr>
  </thead>
  <tbody>
<?php
$sql ="SELECT * FROM department";
$qsql = mysqli_query($con,$sql);
echo mysqli_error($con);
while($rs = mysqli_fetch_array($qsql))
{
  echo "
    <tr align=center>
        <td>"  . $rs['department_name'] . "</td>
        <td><center><a href='department.php?editid=$rs[department_id]' class='btn btn-info' style='width:20%;'>Edit</a> <a href='viewdepartment.php?delid=$rs[department_id]' class='btn btn-danger' onclick='return confirmdel()' style='width:20%;'>Delete</a></center></td>
    </tr>
  ";
}
?>
  </tbody>
</table>
<div class="text-center">
<a href='department.php' name="btnsubmit" class="btn btn-success btn-lg" style="background-color: #71c55d;">Add Department</a>
</div>
        </p>
      </div>
    </section>

  </main><!-- End #main -->
  <?php include("footer.php"); ?>