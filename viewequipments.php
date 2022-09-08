<?php
include("header.php");
if(!isset($_SESSION['adminid']))
{
    echo "<script>window.location='adminlogin.php';</script>";  
}
if(isset($_GET['delid']))
{
    $sqldel = "DELETE FROM equipments WHERE equipment_id='" . $_GET['delid'] . "'";
    $qsqldel = mysqli_query($con,$sqldel);
    echo mysqli_error($con);
    if(mysqli_affected_rows($con) == 1)
    {
        echo "<script>alert('Equipment Record deleted successfully..');</script>";
        echo "<script>window.location='viewequipments.php';</script>";
    }
}
?>
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>View equipments</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>View equipments</li>
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
    <th>Equipment Name</th>
    <th>Details</th>
	<th>Quantity</th>
    <th>Image</th>
    <th>Action</th>
  </tr>
  </thead>
  <tbody>
<?php
$sql ="SELECT * FROM equipments";
$qsql = mysqli_query($con,$sql);
echo mysqli_error($con);
while($rs = mysqli_fetch_array($qsql))
{
  if(file_exists("equipment_images/".$rs['equipment_img']))
  {  
    $rsimg = $rs['equipment_img'];
  }
  else{
    $rsimg = 'defaultimage.png';
  }
  if($rs['equipment_img']== "")
  {
    $rsprofile = 'defaultimage.png';
  }
  echo "
    <tr align=center>
        <td>"  . $rs['equipment_type'] . "</td>
        <td>"  . $rs['equipment_detail'] . "</td>
		<td>"  . $rs['equipment_quantity'] . "</td>
        <td><img src='equipment_images/"  . $rsimg. "' height=100px></td>
        <td style='width:100px;'><a href='equipments.php?editid=$rs[equipment_id]' class='btn btn-info' style='width:100%;'>Edit</a><a href='viewequipments.php?delid=$rs[equipment_id]' class='btn btn-danger' onclick='return confirmdel()' style='width:100%;'>Delete</a></td>
    </tr>
  ";
}
?>
  </tbody>
</table>
<div class="text-center">
<a href='equipments.php' name="btnsubmit" class="btn btn-success btn-lg" style="background-color: #71c55d;">Add Equipments</a>
</div>
        </p>
      </div>
    </section>

  </main><!-- End #main -->
  <?php include("footer.php"); ?>