<?php
include("header.php");
if(!isset($_SESSION['adminid']))
{
    echo "<script>window.location='adminlogin.php';</script>";  
}
if(isset($_GET['delid']))
{
    $sqldel = "DELETE FROM eventtype WHERE eventtypeid='" . $_GET['delid'] . "'";
    $qsqldel = mysqli_query($con,$sqldel);
    echo mysqli_error($con);
    if(mysqli_affected_rows($con) == 1)
    {
        echo "<script>alert('Event type Record deleted successfully..');</script>";
        echo "<script>window.location='vieweventtype.php';</script>";
    }
}
?>
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>View Event Type</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>View Event type</li>
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
    <th>Icon</th>
    <th>Event type</th>
    <th>Description</th>
    <th>Action</th>
  </tr>
  </thead>
  <tbody>
<?php
$sql ="SELECT * FROM eventtype";
$qsql = mysqli_query($con,$sql);
echo mysqli_error($con);
while($rs = mysqli_fetch_array($qsql))
{
  echo "
    <tr align=center>
        <td><img src='eventicon/"  . $rs['eventicon'] . "' height=100px></td>
        <td>"  . $rs['eventtype'] . "</td>
        <td>"  . $rs['eventdescription'] . "</td>
        <td style='width:100px;'><a href='eventtype.php?editid=$rs[eventtypeid]' class='btn btn-info' style='width:100%;'>Edit</a> <a href='vieweventtype.php?delid=$rs[eventtypeid]' class='btn btn-danger' onclick='return confirmdel()' style='width:100%;'>Delete</a></td>
    </tr>
  ";
}
?>
  </tbody>
</table>
<div class="text-center">
<a href='eventtype.php' name="btnsubmit" class="btn btn-success btn-lg" style="background-color: #71c55d;">Add Eventtype</a>
</div>
        </p>
      </div>
    </section>

  </main><!-- End #main -->
  <?php include("footer.php"); ?>