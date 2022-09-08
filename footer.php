<!-- ======= Footer ======= -->
<footer class="footer">
    <div class="container">
      <div class="row">

        <div class="col-md-12 col-lg-7">
          <div class="footer-logo">
            <a class="navbar-brand" href="#">Seminar Hall Booking</a>
            <p style="text-align: justify;font-family: 'Roboto';">
            <img src='assets/img/logo.png' align="left" style="height: 140px;"  >
            The system keeps track of SEMINAR HALL status and advance bookings. The system keeps records of SEMINAR HALL bookings along with associated event details and user contacts in a well-maintained database. “Seminar Hall Booking System” helps to reduce manual process of reservation and getting approvals and this helps in efficient management of availability and booking details. System helps to edit, update the details and shows the information of bookings.</p>
          </div>
        </div>

        <div class="col-sm-6 col-md-3 col-lg-2">
          <div class="list-menu">

            <h4>Menus</h4>

            <ul class="list-unstyled">
            <li><a href="index.php">Home</a></li>
              <li><a href="about.php">About us</a></li>
              <li><a href="contact.php">Contact</a></li>
            </ul>

          </div>
        </div>

        <div class="col-sm-6 col-md-3 col-lg-3">
          <div class="list-menu">

            <h4>Contact Us</h4>

            <p style='color: white;'>SDM College (Autonomous), Ujire - 574240
<br>
Ph. No.  08256-236221, 225
<br>
Email : sdmcollege@sdmcujire.in
<br>
Email : pgcenter@sdmcujire.in

          </div>
        </div>

      </div>
    </div>

    <div class="copyrights">
      <div class="container">
        <p>&copy; Copyrights Seminar Hall Booking. All rights reserved.</p>
        <div class="credits">
          Designed by Adithya, Kousthub Shetty, Sushrutha Jain, Sowjanya
        </div>
      </div>
    </div>

  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <script>
  function confirmdel()
  {
    if(confirm("Are you sure want to delete this record?(Delected record cannot ge recovered)") == true)
    {
        return true;
    }
    else
    {
        return false;
    }
  }
  </script>
   <script>
  function confirmlogout()
  {
    if(confirm("Are you sure you want to logout?") == true)
    {
        return true;
    }
    else
    {
        return false;
    }
  }
  </script>

<!-- Datatable Plugin STarts here -->
<script src="assets/js/jquery-3.5.1.js"></script>
<script src="assets/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready( function () {
  $('#datatableplugin').DataTable();
} );
</script>
<!-- Datatable Plugin Ends here -->

</body>

</html>