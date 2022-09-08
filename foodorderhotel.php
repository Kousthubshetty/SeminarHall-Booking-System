<?php include("header.php"); ?>


  <main id="main">
 
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Select Hotel to Order Food Items</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Select Hotel to Order Food Items</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->
	<br>
    <!-- ======= Blog Section ======= -->
    <section id="blog" class="padd-sectio">
    <a href="#" class="back" onclick="window.history.back()" style="margin-left:70px;">&laquo; Back</a>
	<center><h2>HOTEL LIST</h2></center>
      <div class="container" data-aos="fade-up">
<hr>
        <div class="row" data-aos="fade-up" data-aos-delay="100">
<?php
$sql ="SELECT * FROM hotel WHERE status='Active'";
$qsql = mysqli_query($con,$sql);
echo mysqli_error($con);
while($rs = mysqli_fetch_array($qsql))
{
	$sqlitem = "SELECT * FROM food_item WHERE hotel_id='$rs[hotel_id]'";
	$qsqlitem = mysqli_query($con,$sqlitem);
	if($rs['hotel_image'] == "")
	{
		$img =  "assets/img/defaulticonimage.jpg";
	}
	else if(file_exists("hotelimg/".$rsedit['hotel_image']))
	{
		$img =   "hotelimg/".$rs['hotel_image'];
	}
	else
	{
		$img =   "assets/img/defaulticonimage.jpg";
	}
?>
          <div class="col-md-6 col-lg-4">
            <div class="block-blog text-left">
              <a href="#"><img src="<?php echo $img; ?>" style="height: 250px;" alt="img"></a>
              <div class="content-blog" style="box-shadow: 0 0 0 0 rgb(0 0 0 / 20%), inset 0px -2px 4px 0 rgb(42 15 15 / 19%);">
                <h4><b><a href="#"><?php echo $rs['hotel_name']; ?></b></a></h4>
                <span><?php echo mysqli_num_rows($qsqlitem); ?> Items</span>
                <a class="float-end readmore btn-info" style="padding: 10px;color: white;" href="foodorderitem.php?hall_booking_id=<?php echo $_GET['hall_booking_id']; ?>&hotel_id=<?php echo $rs['hotel_id']; ?>"><b>ORDER</b></a>
              </div>
            </div>
		  <hr>
          </div>
<?php
}
?>
        </div>
      </div>
    </section><!-- End Blog Section -->

<br>
<br>
<br>
  </main><!-- End #main -->

  <?php include("footer.php"); ?>