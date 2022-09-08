<?php
include("header.php");
if(!isset($_SESSION['hotel_id']) && !isset($_SESSION['adminid']))
{
    echo "<script>window.location='adminlogin.php';</script>";  
}
if(isset($_GET['delid']))
{
    $sqldel = "DELETE FROM food_item WHERE food_item_id ='" . $_GET['delid'] . "'";
    $qsqldel = mysqli_query($con,$sqldel);
    echo mysqli_error($con);
    if(mysqli_affected_rows($con) == 1)
    {
        echo "<script>alert('Food item Record deleted successfully..');</script>";
        echo "<script>window.location='viewfooditem.php';</script>";
    }
}
?>
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>View Food Items</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>View Food Items</li>
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
    <th>Item Image</th>
    <th>Item Name</th>
    <th style='text-align: center;'>Item Cost</th>
    <th>status</th>
    <th>Action</th>
  </tr>
  </thead>
  <tbody>
<?php
$sql ="SELECT * FROM food_item";
if(isset($_SESSION['hotel_id']))
{
	$sql = $sql . " WHERE hotel_id='$_SESSION[hotel_id]'";
}
if(isset($_GET['hotel_id']))
{
	$sql = $sql . " WHERE hotel_id='$_GET[hotel_id]'";
}
$qsql = mysqli_query($con,$sql);
echo mysqli_error($con);
while($rs = mysqli_fetch_array($qsql))
{
	if($rs['item_image'] == "")
	{
		$item_image =  "assets/img/defaulticonimage.jpg";
	}
	else if(file_exists("foodimg/".$rs['item_image']))
	{
		$item_image = "foodimg/".$rs['item_image'];
	}
	else
	{
		$item_image = "assets/img/defaulticonimage.jpg";
	}
  echo "
    <tr>
        <td style='width: 120px;height: 100px;'><img src='$item_image' style='width: 120px;height: 100px;'></td>
        <td>"  . $rs['item_name'] . "</td>
        <td style='text-align: center;'>₹"  . $rs['item_cost'] . "</td>
        <td style='text-align: center;'>"  . $rs['item_status'] . "</td>
        <td><a href='food_item.php?editid=$rs[0]' class='btn btn-info' style='width:40%;'>Edit</a><br><a href='viewfooditem.php?delid=$rs[0]' class='btn btn-danger' onclick='return confirmdel()' style='width:40%;'>Delete</a></td>
    </tr>
  ";
}
?>
  </tbody>
</table>
<div class="text-center">
<a href='food_item.php' name="btnsubmit" class="btn btn-success btn-lg" style="background-color: #71c55d;">Add Food Item</a>
</div>
        </p>
      </div>
    </section>

  </main><!-- End #main -->
  <?php include("footer.php"); ?>