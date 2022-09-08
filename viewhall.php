<?php
include("header.php"); 
if(!isset($_SESSION['adminid']))
{
    echo "<script>window.location='adminlogin.php';</script>";  
}
if(isset($_GET['delid']))
{
    $sqldel = "DELETE FROM hall WHERE hallid='" . $_GET['delid'] . "'";
    $qsqldel = mysqli_query($con,$sqldel);
    echo mysqli_error($con);
    if(mysqli_affected_rows($con) == 1)
    {
        echo "<script>alert('Hall Record deleted successfully..');</script>";
        echo "<script>window.location='viewhall.php';</script>";
    }
}
?>
<style>
  #hallimg:hover {
  width:100%;
  height:100%;
}
  </style>
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>View Hall Details</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>View Hall Details</li>
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
    <th>Hall Image</th>
    <th>Hall Name</th>
	<th>Max Capacity</th>
    <th>Description</th>
    <th>Action</th>
  </tr>
  </thead>
  <tbody>
<?php
$sql ="SELECT * FROM hall";
$qsql = mysqli_query($con,$sql);
echo mysqli_error($con);
while($rs = mysqli_fetch_array($qsql))
{
  echo "
    <tr align=center>
        <td><img src='imghall/"  . $rs['hallimage'] . "' height=100px id='hallimg'></td>
        <td>"  . $rs['hallname'] . "</td>
		<td>"  . $rs['max_capacity'] . "</td>
        <td>"  . $rs['halldescription'] . "</td>
        <td style='width:100px;'><a href='hall.php?editid=$rs[hallid]' class='btn btn-info' style='width: 100%;' >Edit</a> <a href='viewhall.php?delid=$rs[hallid]' class='btn btn-danger' onclick='return confirmdel()' style='width: 100%;'  >Delete </a></td>
    </tr>
  ";
}
?>
  </tbody>
</table>
<div class="text-center">
<a href='hall.php' name="btnsubmit" class="btn btn-success btn-lg" style="background-color: #71c55d;">Add Hall</a>
</div>
        </p>
      </div>
    </section>

  </main><!-- End #main -->
<script>
function bigImg(x) {
  x.style.width = 100%;
}

function normalImg(x) {
  x.style.height = "100px";

}
</script>
  <?php include("footer.php"); ?>
  