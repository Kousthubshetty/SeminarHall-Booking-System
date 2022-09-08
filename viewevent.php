<?php include("header.php"); ?>
  <!-- ======= Hero Section ======= -->
  
  <main id="main">
<br><br><br><br>

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="padd-sectio">

      <div class="container" data-aos="fade-up">
        <div class="section-title text-center">

          <h2>Event Images</h2>
          <p class="separator">Click view more to see more images of the event</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
        <?php
        $sqlcount ="SELECT hall_booking.*, hall.hallname, department.department_name, staff.staffname, eventtype.eventtype FROM hall_booking LEFT JOIN hall ON hall_booking.hallid=hall.hallid LEFT JOIN department ON department.department_id=hall_booking.department_id LEFT JOIN staff ON staff.staffid=hall_booking.staffid LEFT JOIN eventtype ON eventtype.eventtypeid=hall_booking.eventtypeid where gallery<> ''";

        // $sqlcount = "SELECT * FROM hall_booking where gallery<> ''";
        $qsqlcount = mysqli_query($con,$sqlcount);
        while($rs = mysqli_fetch_array($qsqlcount))
        {
        $rsimg = unserialize($rs['gallery']);
        ?>
          <div class="col-md-6 col-lg-4">
            <div class="block-blog text-left">
              <a href="#"><img src="uploads/<?php echo $rsimg[0]; ?>" alt="img" style="width:100%"></a>
              <div class="content-blog">
                <h4><a href="vieweventimages.php?viewid=<?php echo $rs['hall_booking_id']; ?>"><h4><?php echo $rs['eventtype'];?></h4>
<b>Staff:</b> <?php echo $rs['staffname'];?><br>
<b>Department:</b> <?php echo $rs['department_name'];?><br>
<b>Date:</b>  <?php echo date("d-m-Y h:i A",strtotime($rs['booking_start_dt_tim'])) . " - " .  date("h:i A",strtotime($rs['booking_end_dt_tim'])); ?>
</a></h4>
                <a class="float-end readmore" href="vieweventimages.php?viewid=<?php echo $rs['hall_booking_id']; ?>">View more</a>
              </div>
            </div>
          </div>

            <?php
            }
            ?>
          
        </div>
      </div>
    </section><!-- End Blog Section -->

   
  </main><!-- End #main -->

  <?php include("footer.php"); ?>