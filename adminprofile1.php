<?php 
include("header.php");
if(!isset($_SESSION['adminid']))
{
    echo "<script>window.location='adminlogin.php';</script>";  
} 
if(isset($_POST['btnsubmit']))
{
    $sqlupd ="UPDATE admin SET adminname='$_POST[adminname]', emailid='$_POST[emailid]' WHERE adminid='" . $_SESSION['adminid'] . "'";
    $qsqlupd = mysqli_query($con,$sqlupd);
    echo mysqli_error($con);
    if(mysqli_affected_rows($con) == 1)
    {
        echo "<script>alert('Admin Record updated successfully...');</script>";
        echo "<script>window.location='adminprofile.php';</script>";
    }
}
if(isset($_SESSION['adminid']))
{
    $sqlprofile = "SELECT * FROM admin WHERE adminid='" . $_SESSION['adminid'] . "'";
    $qsqlprofile = mysqli_query($con,$sqlprofile);
    $rsprofile = mysqli_fetch_array($qsqlprofile);
}
?>
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Admin Profile</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Admin Profile</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="padd-section">
      <div class="container" data-aos="fade-up">
        <div class="row justify-content-center">

          <div class="col-md-8">

            <div class="testimonials-content">
              <div id="carousel-example-generic" class="carousel slide" data-bs-ride="carousel">

                <div class="carousel-inner" role="listbox">

                  <div class="carousel-item  active">
                    <div class="top-top">

                      <h2>Admin Profile</h2>
                      <p>Kindly Update Your Profile</p>
        <form action="" method="post" role="form" class="php-email-form" name="frm">
          <div class="form-group">
            Admin Name
            <input type="text" name="adminname" class="form-control" id="adminname" placeholder="Admin Name" value="<?php echo $rsprofile['adminname']; ?>" >
          </div>
          <div class="form-group mt-3">
            Email ID
            <input type="email" class="form-control" name="emailid" id="emailid" placeholder="Email ID "  value="<?php echo $rsprofile['emailid']; ?>" >
          </div>
<br>
          <div class="text-center"><button type="submit" name="btnsubmit" class="btn btn-success btn-lg">Update Profile</button></div>
        </form>

                    </div>
                  </div>

                </div>


            </div>
          </div>

        </div>
      </div>
    </section><!-- End Testimonials Section -->


</main><!-- End #main -->
  <?php include("footer.php"); ?>