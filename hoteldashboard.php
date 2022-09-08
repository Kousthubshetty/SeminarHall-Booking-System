<?php include("header.php"); 
$sqlchkdate = "UPDATE bill set bill_status='Rejected' where  ('$currentdate' > date_time) AND bill_status='Pending'";
$qsqchkdate = mysqli_query($con,$sqlchkdate);
if(!isset($_SESSION['hotel_id']))
{
    echo "<script>window.location='hotellogin.php';</script>";  
}
if(isset($_GET['delid']))
{
    $sqldel = "DELETE FROM food_item WHERE food_item_id='" . $_GET['delid'] . "'";
    $qsqldel = mysqli_query($con,$sqldel);
    echo mysqli_error($con);
    if(mysqli_affected_rows($con) == 1)
    {
        echo "<script>alert('Food Item Record deleted successfully..');</script>";
        echo "<script>window.location='hoteldashboard.php';</script>";
    }
}

?>

  <main id="main">
    <!-- ======= Newsletter Section ======= -->
    <!-- <section id="newsletter" class="newsletter text-center">
      <div class="overlay padd-section">
        <div class="container" data-aos="zoom-in">
          <div class="row justify-content-center">
            <div class="col-md-9 col-lg-6"><br><br><h2> Dashboard</h2></div>
          </div>
        </div>
      </div>
    </section> -->
    <!-- End Newsletter Section -->
    <style>
    .food-card{
            width: 23%;
            margin: 2% 1%;
            float: left;
            overflow: hidden;
            border-radius: 10px 10px 10px 10px;
            box-shadow: 0;
            transform: scale(0.95);
            transition: box-shadow 0.5s, transform 0.5s;
        }
        .food-item-details{
            background-color: #E3E3D8;
        }
        .food-card:hover{
            transform: scale(1);
            box-shadow: 5px 20px 30px rgba(0,0,0,0.2);      
        }
        .food-item-image{
            display: flex;
            height: 150px;
        }
        .food-item-image img{
            object-fit: cover;
            width: 100%;
            margin: 0 auto;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;

        }
        .food-item-details table{
            width: 100%;
            background-color: white;
            /* margin: 2%; */
        }
        .food-item-details tr td:nth-child(2){
            width: 25%;
            text-align: center;
            border-left: 1px solid gray;
            font-size: 1.5em;
        }
        .food-item-details tr td:nth-child(2) a{
          color:black;
        }
        .food-item-details tr td:nth-child(2) a:hover{
          color: #00BCD4;
          cursor: pointer;
        }
        .food-item-details tr td:nth-child(2):hover{
            font-size: 1.6em;
            color: #00BCD4 !important;
        }
        .food-item-details tr:nth-child(2) td{
            display: block;
            margin-left: 7px;
            /* margin-bottom: 5px; */
        }
        .food-item-details tr:nth-child(3) td{
            display: block;
            /* margin-left: 7px; */
            margin-bottom: 5px;
        }
        .food-item-details tr:nth-child(1) td:nth-child(1){
            font-family: sans-serif;
            display: block;
            font-size: 1.5em;
            font-weight: bold;
            margin-left: 7px;
            margin-top: 10px;
        }
  </style>

    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="padd-section text-cente" style="background-color:#E3E3D8;height:100%;">

      <div class="container"><br><br>
      <div class='col'><div class='row'>
      <?php
      $arr = array("Breakfast","Juices and Milkshakes","Icecreams and Salads","Lunch","Chats");
      foreach($arr as $val)
        {
$sql ="SELECT * FROM food_item WHERE item_status='Active' AND hotel_id='". $_SESSION['hotel_id'] ."' AND food_type = '$val'";
$qsql = mysqli_query($con,$sql);
echo mysqli_error($con);
if(mysqli_affected_rows($con) >= 1)
{
	echo "<div class='container'><div class='row'><div class='col-md-12'><div class='alert alert-warning' role='alert' style ='background-color:#ffff;'>". $val ."</div></div></div></div>";
}
// if(mysqli_num_rows($qsql)==0){
//   echo "<div style='height:70vh;'></div>";
// }
// echo mysqli_num_rows($qsql);
$card_animation=0;
while($rs = mysqli_fetch_array($qsql))
{
  // setting Default Image
  if(file_exists('foodimg/'.$rs['item_image'])){
    $card_img=$rs['item_image'];
  }
  else{
    $card_img='Default-food.jpg';
  }
 // flip Animation changes
 $card_animation=$card_animation+1;
  // if($card_animation%2==0){
  //   $flip_animation='flip-left';
  // }else{
  //   $flip_animation='flip-right';
  // }
  // if($card_animation%4==1){
  //   echo "<div style='float:none;display:inline-block;width:100%'></div>";
  // }
  echo "
    <div class='food-card' style='padding:0px;'>
            <div class='food-item-details' data-aos=". $flip_animation ." data-aos-duration='25' data-aos-delay='10'>
                <div class='food-item-image'>
                  <img src='foodimg/". $card_img ."'>
                </div>
                <table>
                    <tr>
                        <td>" . $rs['item_name'] . "</td>
                        <td rowspan='1'>
                          <a href='food_item.php?editid=$rs[food_item_id]'><i class='bi bi-pencil-square'></i></a>
                          <br><a href='hoteldashboard.php?delid=$rs[food_item_id]' onclick='return confirmdel()'><i class='bi bi-trash'></i></a>
                          </td>
                    </tr>
                    <tr>
                        <td>₹"  . $rs['item_cost'] . "</td>
                    </tr>
                    <tr>
                      <td style='text-align:center;font-size:12px;'> 
                        <a style='color:green;' href='food_status_change.php?foodid=$rs[food_item_id]&status=$rs[item_status]'>AVAILABLE</a>
                      </td>
                    </tr>
                </table>
            </div>
      </div>
  ";
}
// echo "<br><br><br>";
        }
?>
</div>
</div>
      </div>
      <div class="container">
        <div style='float:none;display:inline-block;width:100%;'>
      <?php
$sql ="SELECT * FROM food_item WHERE item_status='Inactive' AND hotel_id='". $_SESSION['hotel_id'] ."'";
$qsql = mysqli_query($con,$sql);
echo mysqli_error($con);
$card_animation=0;
if(mysqli_affected_rows($con) >= 1)
{
	echo "<div class='container'><div class='row'><div class='col-md-12'><div class='alert alert-warning' role='alert' style ='background-color:#e05959; color:#ffff'>Not Available</div></div></div></div>";
}
while($rs = mysqli_fetch_array($qsql))
{
  if(file_exists('foodimg/'.$rs['item_image'])){
    
    $card_img=$rs['item_image'];
  }
  else{
    $card_img='Default-food.jpg';
  }
  $card_animation=$card_animation+1;
  if($card_animation%4==1){
    echo "<div style='float:none;display:inline-block;width:100%'></div>";
  }
  // data-aos='flip-right' data-aos-duration='2' data-aos-delay='5'
  echo "
    <div class='food-card'>
            <div class='food-item-details' >
                <div class='food-item-image'>
                  <img src='foodimg/".$card_img."'>
                </div>
                <table>
                    <tr>
                        <td>" . $rs['item_name'] . "</td>
                        <td rowspan='3'>
                          <a href='food_item.php?editid=$rs[food_item_id]'><i class='bi bi-pencil-square'></i></a>
                          <br><a href='hoteldashboard.php?delid=$rs[food_item_id]' onclick='return confirmdel()'><i class='bi bi-trash'></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>₹"  . $rs['item_cost'] . "</td>
                    </tr>
                    <tr>
                      <td style='text-align:center;font-size:12px;'> 
                      <a style='color:red;' href='food_status_change.php?foodid=$rs[food_item_id]&status=$rs[item_status]'>NOT AVAILABLE</a>
                      </td>
                    </tr>
                </table>
            </div>
      </div>
  ";
}
?>
      </div>
      </div>
      <div style="float:none;width:100%;display:inline-block;text-align:center;" >
        <a class="btn btn-primary" href="food_item.php"><i class="bi bi-plus-circle"></i>ADD ITEM</a>
      </div>
    </section><!-- End Pricing Section -->



  </main><!-- End #main -->

  <?php include("footer.php"); ?>