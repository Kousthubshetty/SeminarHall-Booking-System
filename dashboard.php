<?php include("header.php"); 
if(!isset($_SESSION['adminid']))
{
    echo "<script>window.location='adminlogin.php';</script>"; 
 }
 $currentdate = date("Y-m-d h:i A");
 $sqlchkdate = "UPDATE hall_booking set status='Rejected' where 
  ('$currentdate' > hall_booking.booking_start_dt_tim) AND status='Pending' OR status ='Inactive'";
  $qsqchkdate = mysqli_query($con,$sqlchkdate);

  $sqlchkdate = "UPDATE bill set bill_status='Rejected' where  ('$currentdate' > date_time) AND bill_status='Pending'";
 $qsqchkdate = mysqli_query($con,$sqlchkdate);
?>

  <main id="main">
    <div style="height:80vh;padding-top:90px;">
      <?php
      include("vendor/calendar/hallbookingscalendarview.php");
      ?>
    </div>
    <!-- ======= Newsletter Section ======= -->
    <!-- <section id="newsletter" class="newsletter text-center">
      <div class="overlay padd-section">
        <div class="container" data-aos="zoom-in">
          <div class="row justify-content-center">
            <div class="col-md-9 col-lg-6"><br><br><h2>Admin Dashboard</h2></div>
          </div>
        </div>
      </div>
    </section> -->
    <!-- End Newsletter Section -->
    <!-- ======= Pricing Section ======= --><br>
    <section id="pricing" class="padd-section text-cente" style="padding-top: 65px;">

      <div class="container">
        <div class="row">

          <div class="col-md-6 col-lg-3">
            <div class="block-pricing">
              <div class="table">
                <h4>Admin Accounts</h4>
                <h2><img src="assets/img/admin.png" width=100%></h2>
                <ul class="list-unstyled">
                  <li><b><?php 
                  $sqlcount = "SELECT * FROM admin";
                  $qsqlcount = mysqli_query($con,$sqlcount);
                  echo mysqli_num_rows($qsqlcount);
                  ?></b> Records</li>
                </ul>
                <div class="table_btn">
                  <a href="viewadmin.php" class="btn"><i class="bi bi-table"></i> View</a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-3">
            <div class="block-pricing">
              <div class="table">
                <h4>Staff Accounts</h4>
                <h2><img src="assets/img/stafficon.png" width=100%></h2>
                <ul class="list-unstyled">
                  <li><b><?php 
                  $sqlcount = "SELECT * FROM staff";
                  $qsqlcount = mysqli_query($con,$sqlcount);
                  echo mysqli_num_rows($qsqlcount);
                  ?></b> Records</li>
                </ul>
                <div class="table_btn">
                  <a href="viewstaff.php" class="btn"><i class="bi bi-table"></i> View</a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-3">
            <div class="block-pricing">
              <div class="table">
                <h4>Hotel Accounts</h4>
                <h2><img src="assets/img/hotel.png" width=100%></h2>
                <ul class="list-unstyled">
                  <li><b><?php 
                  $sqlcount = "SELECT * FROM hotel";
                  $qsqlcount = mysqli_query($con,$sqlcount);
                  echo mysqli_num_rows($qsqlcount);
                  ?></b> Records</li>
                </ul>
                <div class="table_btn">
                  <a href="viewhotel.php" class="btn"><i class="bi bi-table"></i> View</a>
                </div>
              </div>
            </div>
          </div>


          <div class="col-md-6 col-lg-3">
            <div class="block-pricing">
              <div class="table">
                <h4>Department</h4>
                <h2><img src="assets/img/department.png" width=100%></h2>
                <ul class="list-unstyled">
                  <li><b><?php 
                  $sqlcount = "SELECT * FROM department";
                  $qsqlcount = mysqli_query($con,$sqlcount);
                  echo mysqli_num_rows($qsqlcount);
                  ?></b> Records</li>
                </ul>
                <div class="table_btn">
                  <a href="viewdepartment.php" class="btn"><i class="bi bi-table"></i> View</a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-3">
            <div class="block-pricing">
              <div class="table">
                <h4>Hall</h4>
                <h2><img src="assets/img/hallicon.jpg" width=100%></h2>
                <ul class="list-unstyled">
                  <li><b><?php 
                  $sqlcount = "SELECT * FROM hall";
                  $qsqlcount = mysqli_query($con,$sqlcount);
                  echo mysqli_num_rows($qsqlcount);
                  ?></b> Records</li>
                </ul>
                <div class="table_btn">
                  <a href="viewhall.php" class="btn"><i class="bi bi-table"></i> View</a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-3">
            <div class="block-pricing">
              <div class="table">
                <h4>Event Type</h4>
                <h2><img src="assets/img/eventtypeicon.jpg" width=100%></h2>
                <ul class="list-unstyled">
                  <li><b><?php 
                  $sqlcount = "SELECT * FROM eventtype";
                  $qsqlcount = mysqli_query($con,$sqlcount);
                  echo mysqli_num_rows($qsqlcount);
                  ?></b> Records</li>
                </ul>
                <div class="table_btn">
                  <a href="vieweventtype.php" class="btn"><i class="bi bi-table"></i> View</a>
                </div>
              </div>
            </div>
          </div>

          


          <div class="col-md-6 col-lg-3">
            <div class="block-pricing">
              <div class="table">
                <h4>Equipments</h4>
                <h2><img src="assets/img/equipmentsicon.png" width=100%></h2>
                <ul class="list-unstyled">
                  <li><b><?php 
                  $sqlcount = "SELECT * FROM equipments";
                  $qsqlcount = mysqli_query($con,$sqlcount);
                  echo mysqli_num_rows($qsqlcount);
                  ?></b> Records</li>
                </ul>
                <div class="table_btn">
                  <a href="viewequipments.php" class="btn"><i class="bi bi-table"></i> View</a>
                </div>
              </div>
            </div>
          </div>
                   
          <div class="col-md-6 col-lg-3">
            <div class="block-pricing">
              <div class="table">
                <h4>Hall Bookings</h4>
                <h2><img src="assets/img/booking.png" width=100%></h2>
                <ul class="list-unstyled">
                  <li><b><?php 
                  $sqlcount = "SELECT * FROM hall_booking";
                  $qsqlcount = mysqli_query($con,$sqlcount);
                  echo mysqli_num_rows($qsqlcount);
                  ?></b> Records</li>
                </ul>
                <div class="table_btn">
                  <a href="viewhallbooking.php" class="btn"><i class="bi bi-table"></i> View</a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-3">
            <div class="block-pricing">
              <div class="table">
                <h4>Change Request</h4>
                <h2><img src="assets/img/changerequesticon.png" width=100%></h2>
                <ul class="list-unstyled">
                  <li><b><?php 
                  $sqlcount = "SELECT * FROM change_request";
                  $qsqlcount = mysqli_query($con,$sqlcount);
                  echo mysqli_num_rows($qsqlcount);
                  ?></b> Records</li>
                </ul>
                <div class="table_btn">
                  <a href="viewhallbooking.php?st=Inactive" class="btn"><i class="bi bi-table"></i> View</a>
                </div>
              </div>
            </div>
          </div>

      

          <div class="col-md-6 col-lg-3">
            <div class="block-pricing">
              <div class="table">
                <h4>Event Images</h4>
                <h2><img src="assets/img/event.png" width=100%></h2>
                <ul class="list-unstyled">
                  <li><b><?php 
                  $abc = "";
                  $sqlcount = "SELECT * FROM hall_booking where gallery<> ''";
                  $qsqlcount = mysqli_query($con,$sqlcount);
                  echo mysqli_num_rows($qsqlcount);
                  ?></b> Records</li>
                </ul>
                <div class="table_btn">
                  <a href="viewevent.php" class="btn"><i class="bi bi-table"></i> View</a>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section><!-- End Pricing Section -->



  </main><!-- End #main -->

  <?php include("footer.php"); ?>