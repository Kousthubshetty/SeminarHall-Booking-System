<?php
session_start();
$dt=date("Y-m-d");
error_reporting(E_ALL & ~E_NOTICE  &  ~E_STRICT  &  ~E_WARNING);
date_default_timezone_set("Asia/Calcutta");
include("dbconnection.php");
if(isset($_SESSION['staffid']))
{
    $sqlprofile = "SELECT * FROM staff WHERE staffid='" . $_SESSION['staffid'] . "'";
    $qsqlprofile = mysqli_query($con,$sqlprofile);
    $rsprofile = mysqli_fetch_array($qsqlprofile);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Seminar Hall Booking</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/s_icon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Roboto:100,300,400,500,700|Philosopher:400,400i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- =======================================================
  * Template Name: eStartup - v4.3.0
  * Template URL: https://bootstrapmade.com/estartup-bootstrap-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  
  <link href="assets/css/jquery.dataTables.min.css" rel="stylesheet">
<style>
table.table-bordered{
    border:1px solid grey;
    margin-top:20px;
  }
table.table-bordered > thead > tr > th{
    border:1px solid grey;
}
table.table-bordered > tbody > tr > td{
    border:1px solid grey;
}
</style>
<style>
	.errmsg
	{
		color: red;
  animation: blink-animation 3s steps(5, start) infinite;
  -webkit-animation: blink-animation 3s steps(5, start) infinite;
}
@keyframes blink-animation {
  to {
    visibility: hidden;
  }
}
@-webkit-keyframes blink-animation {
  to {
    visibility: hidden;
  }
}
</style>
<style>

.back:hover {
  background-color: #ddd;
  color: black;
}

.back {
  text-decoration: none;
  display: inline-block;
  padding: 8px 16px;
  text-decoration: none;
  display: inline-block;
  padding: 8px 16px;
  background-color: #71c55d;
  color: white;
}

</style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div id="logo">
        <h1><a href="index.php"><span>Seminar</span> Hall Booking</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" title="" /></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link active" href="index.php">Home</a></li>
          <li><a class="nav-link" href="about.php">About</a></li>

<?php
if(isset($_SESSION['adminid']))
{
?>	
		  
	<li class="dropdown"><a href="#"><span>Hall Settings</span> 	<i class="bi bi-chevron-down"></i></a>
		<ul>
			<li><a href="hall.php">Add Hall</a></li>
			<li><a href="viewhall.php">View Hall</a></li>
			<li><a href="eventtype.php">Add Event Type</a></li>
			<li><a href="vieweventtype.php">View Event Types</a></li>
			<li><a href="equipments.php">Add Equipment</a></li>
			<li><a href="viewequipments.php">View Equipment</a></li>
		</ul>
	</li>

	<li class="dropdown"><a href="#"><span>User Account</span> 	<i class="bi bi-chevron-down"></i></a>
		<ul>
			<li><a href="staff.php">Add Staff</a></li>
			<li><a href="viewstaff.php">View Staff</a></li>
			<li><a href="admin.php">Add Admin</a></li>
			<li><a href="viewadmin.php">View Admin</a></li>
			<li><a href="hotel.php">Add Hotels</a></li>
			<li><a href="viewhotel.php">View Hotels</a></li>
		</ul>
	</li>
		  
	<li class="dropdown"><a href="#"><span>Food Order</span> 	<i class="bi bi-chevron-down"></i></a>
		<ul>
			<li><a href="foodorderhotelview.php?st=Pending">Food Order - Pending</a></li>
			<li><a href="foodorderhotelview.php?st=Approved">Food Order - Approved</a></li>
			<li><a href="foodorderhotelview.php?st=Rejected">Food Order - Rejected</a></li>
      <li><a href="foodorderhotelview.php?st=Cancelled">Food Order - Cancelled</a></li>

    </ul>
	</li>
	
	<li class="dropdown"><a href="#"><span>Report</span> 	<i class="bi bi-chevron-down"></i></a>
		<ul>
			<li><a href="viewhallbooking.php?st=Pending">Hall Booking - Pending</a></li>
			<li><a href="viewhallbooking.php?st=Approved">Hall Booking - Approved</a></li>
			<li><a href="viewhallbooking.php?st=Rejected">Hall Booking - Rejected</a></li>
			<li><a href="viewhallbooking.php?st=Cancelled">Hall Booking - Cancelled</a></li>
            <li><a href="viewhallbooking.php?st=Inactive">Change Request Report</a></li>
		</ul>
	</li>
		  
		  
	<li class="dropdown"><a href="#"><span>Admin Panel</span> 	<i class="bi bi-chevron-down"></i></a>
		<ul>
			<li><a href="dashboard.php">Dashboard</a></li>
			<li class="dropdown"><a href="adminprofile.php">Edit Profile</a></li>
			<li class="dropdown"><a  href="adminchangepassword.php">Change Password</a></li>
			<li><a href="logout.php" onclick="return confirmlogout()">Logout</a></li>
		</ul>
	</li>
<?php
}
else if(isset($_SESSION['staffid']))
{
?>	
          <li class="dropdown"><a href="#"><span>Staff Panel</span> 	<i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="staffdashboard.php">Dashboard</a></li>
                  <li><a href="staffprofile.php">Edit Profile</a></li>
                  <li><a href="staffchangepassword.php">Change Password</a></li>
              <li><a href="logout.php" onclick="return confirmlogout()">Logout</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Booking Panel</span> 	<i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="viewbookings.php">View Hall Bookings</a></li>
              <li><a href="foodorderhotelview.php">View Food Orders</a></li>
              <li><a href="viewstaffchangerequest.php">View Change Request</a></li>
            </ul>
          </li>
          <li><a class="nav-link" href="contact.php">Contact</a></li>       
<?php
}
else if(isset($_SESSION['hotel_id']))
{
	?>	
          <li class="dropdown"><a href="#"><span>Hotel Panel</span> 	<i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="hoteldashboard.php">Dashboard</a></li>
                  <li><a href="hotelprofile.php">Edit Profile</a></li>
                  <li><a href="hotelchangepassword.php">Change Password</a></li>
              <li><a href="logout.php" onclick="return confirmlogout()">Logout</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Food Item</span> 	<i class="bi bi-chevron-down"></i></a>
            <ul>
				<li><a href="food_item.php">Add Food Item</a></li>
                <li><a href="hoteldashboard.php">View Food Items</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="foodorderhotelview.php"><span>Food Order Report</span></a></li>
          <li><a class="nav-link" href="contact.php">Contact</a></li>        
<?php
}
else
{
?>
          <li><a class="nav-link" href="adminlogin.php">Admin</a></li>
          <li><a class="nav-link" href="stafflogin.php">Staff</a></li>  
		  <li><a class="nav-link" href="hotellogin.php">Hotel</a></li>
      <li><a class="nav-link" href="contact.php">Contact</a></li>
<?php
}
?>		  
		  
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->


  