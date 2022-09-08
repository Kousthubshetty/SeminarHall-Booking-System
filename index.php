<?php include("header.php");

if(isset($_POST['contact']))
{
  $sendername=$_POST['name'];
  $senderemail=$_POST['email'];
  $subject=$_POST['subject'];
  $message=nl2br($_POST['message']);
  include("phpmailer.php");
  $sqlmailtoadmin ="SELECT * FROM admin";
  $qsqlmailtoadmin = mysqli_query($con,$sqlmailtoadmin);
  echo mysqli_error($con);
  while($rsmailtoadmin = mysqli_fetch_array($qsqlmailtoadmin))
    {
    contactussendmail($rsmailtoadmin['emailid'],$rsmailtoadmin['adminname'],$subject,$message,$sendername,$senderemail);
    }
	echo "<script>alert('Your Enquiry message sent successfully..');</script>";
}
?>

<link rel="stylesheet" href="assets/css/w3.css">
<!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato"> -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
<style>
.mySlides {display: none}
</style>
<style>
/* The Modal (background) */
.modal {
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.hidden_module{
        display:none;
}
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 80%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}
</style>
<style>
    /* Next & previous buttons */
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 40%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}
.hidden_photos{
    width:100%;
    height:100%;
    background-color:black;
    /* display:none; */
    top:0;
    left:0;
    position:absolute;
    z-index:3;
    outline:0;
    border-radius:calc(.3rem - 1px);
    border:1px solid white;
}
</style>
<!-- Page content -->
<div class="w3-content" style="max-width:2000px;margin-top:46px">

  <!-- Automatic Slideshow Images -->
  <!-- <div class="mySlides w3-display-container w3-center">
    <img src="assets/img/IMG-20210411-WA0020.jpg" style="width:100%">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
      <h3>Los Angeles</h3>
      <p><b>We had the best time playing at Venice Beach!</b></p>   
    </div>
  </div> -->
  <div class="mySlides w3-display-container w3-center">
    <img src="assets/img/IMG-20210411-WA0021.jpg" style="width:100%">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
      <!-- <h3>New York</h3>
      <p><b>The atmosphere in New York is lorem ipsum.</b></p>     -->
    </div>
  </div>
  <div class="mySlides w3-display-container w3-center">
    <img src="assets/img/IMG-20210411-WA0022.jpg" style="width:100%">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
      <!-- <h3>Chicago</h3>
      <p><b>Thank you, Chicago - A night we won't forget.</b></p>     -->
    </div>
  </div>
  <div class="mySlides w3-display-container w3-center">
    <img src="assets/img/IMG-20210411-WA0023.jpg" style="width:100%">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
      <!-- <h3>Chicago</h3>
      <p><b>Thank you, Chicago - A night we won't forget.</b></p>     -->
    </div>
  </div>
  <div class="mySlides w3-display-container w3-center">
    <img src="assets/img/IMG-20210411-WA0025.jpg" style="width:100%">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
      <!-- <h3>Chicago</h3>
      <p><b>Thank you, Chicago - A night we won't forget.</b></p>     -->
    </div>
  </div>



  <main id="main">

<style>
.container_hallindex {
  position: relative;
  /* width: 50%; */
}

.image_hallindex {
  opacity: 1;
  display: block;
  width: 100%;
  height: auto;
  transition: .5s ease;
  backface-visibility: hidden;
}

.middle_hallindex {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  width:100%;
  height:100%;
  background-color:gray;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}
.middle_hallindex:hover{
  opacity: 0.7;
}
.container_hallindex:hover .image {
  /* opacity: 0.3; */
}

.container_hallindex:hover .middle {
  opacity: 1;
}

.text_hallindex {
  color: white;
  font-size: 16px;
  padding: 16px 32px;
  margin-top:20%;
}
</style>




    <!-- ======= Blog Section ======= -->
    <section id="blog" class="padd-sectio">

      <div class="container">
        <div class="section-title text-center">
        </div>
        
        <div class="row">
      <?php
        $sql ="SELECT * FROM hall WHERE hall_status='Active'";
        $qsql = mysqli_query($con,$sql);
        echo mysqli_error($con);
        while($rs = mysqli_fetch_array($qsql))
        {
          echo "
          <div class='col-md-6 col-lg-4' style='margin-bottom:20px;'>
            <div class='block-blog text-left'>
              <div class='container_hallindex'>
                <div>
                <img src='imghall/".$rs['hallimage']."' alt='Hall Image' style='object-fit:cover;height:200px;' class='image_hallindex'>
                </div>
                <div class='middle_hallindex'>
                <div class='text_hallindex'>
                  <a href='staffdashboard.php?hallid=".$rs['hallid']."' class='btn btn-primary'>Book Hall</a>
                </div>
                </div>
              </div>
              <div class='content-blog' style='min-height:0px;text-align:center;'>
                <h4 style='margin:0px 0px;'><a href='staffdashboard.php?hallid=".$rs['hallid']."'>".$rs['hallname']."</a></h4>
              </div>
            </div>
          </div>";
        }
      ?>

        </div>
      </div>
    </section><!-- End Blog Section -->

    <!-- Project Section -->
    <div class="w3-container w3-padding-32" id="projects">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Previous Events</h3>
  </div>

  <div class="w3-row-padding">
  <?php
$sql ="SELECT eventtype.*, hall_booking.gallery FROM eventtype LEFT JOIN hall_booking ON hall_booking.eventtypeid=eventtype.eventtypeid WHERE eventtype.status='Active' AND hall_booking.gallery <> ''";
$qsql = mysqli_query($con,$sql);
echo mysqli_error($con);
while($rs = mysqli_fetch_array($qsql))
{
  echo "
    <div class='w3-col l3 m6 w3-margin-bottom' onclick='eventGallery($rs[eventtypeid])'>
    <div class='w3-display-container' style='height:175px;display:flex;'>
      <div class='w3-display-topleft w3-black w3-padding'>"  . $rs['eventtype'] . "</div>
      <img src='eventicon/"  . $rs['eventicon'] . "' alt='House' style='width:100%;object-fit:cover;'>
    </div>
    </div>
    <div class='hidden_module' id='eid_$rs[eventtypeid]'>
    <div id='event-gallery' class='modal' style='display:block;'>
    <div class='modal-content' style='width:80%;height:90%;margin-top:0px;position:relative;'>";

$sqlhi ="SELECT hall_booking_id,gallery FROM hall_booking WHERE eventtypeid='$rs[eventtypeid]' AND gallery <> ''";
$qsqlhi = mysqli_query($con,$sqlhi);
echo mysqli_error($con);
while($rshi = mysqli_fetch_array($qsqlhi))
{
  $images=unserialize($rshi['gallery']);
  echo "<script>images_js_".$rshi[hall_booking_id]."=" . json_encode($images) . ";</script>";
  $n=count($images);
  $all_image=100/$n;
  echo "
  <div class='hidden_photos' id='hid_$rshi[hall_booking_id]' style='display:none;'>
    <span class='close' style='color:white;font-size: 28px;font-weight: bold;right:0;position:absolute;margin-right:10px;' onclick='showImages($rshi[hall_booking_id],0);'>&times;</span>
    <div style='height:80%;width:100%;display:flex;'>
        <span class='prev' onclick='changeImage(0," . $rshi[hall_booking_id] . ",1)'>&#10094;</span>
        <span class='next' onclick='changeImage(0," . $rshi[hall_booking_id] . ",2)'>&#10095;</span>
        <img id='show_image_$rshi[hall_booking_id]' src='uploads/" . $images[0] . "'style='height:100%;margin-left:auto;margin-right:auto;'>
    </div>
    <div style='height:20%;width:100%;display:flex;bottom:0;position:absolute;'>";
      for($i=0;$i<$n;$i++){
        echo "
        <div style='height:100%;width:" . $all_image . "%;display:flex;'>
            <img src='uploads/" . $images[$i] . "' style='width:100%;object-fit:cover;' class='w3-hover-opacity' onclick='changeImage(" . '"' . strval($images[$i]) . '",'.$rshi[hall_booking_id].",0)'>
        </div>";
      }

    echo "
    </div>
  </div>
  ";
}
    echo "<div class='modal-header' style='background-color:white;border-bottom:1px solid gray;'>
            <h4 style='margin:auto;color:black;font-weight:700;font-size: 13px;'>"  . $rs['eventtype'] . "</h4>
            <span class='close' id='close-modal' style='color:gray;font-size: 28px;font-weight: bold;float:right;' onclick='closeEventGallery($rs[eventtypeid])'>&times;</span>
          </div>
          <div class='modal-body' style='overflow-y: scroll;height:40vh;font-size:16px;'>
          <div class='w3-row-padding w3-padding-32' style='margin:0 -16px;'>";
    $sqlei ="SELECT hall_booking.*, department.department_name FROM hall_booking LEFT JOIN department ON department.department_id=hall_booking.department_id  WHERE eventtypeid='$rs[eventtypeid]' AND gallery <> '' ORDER BY booking_start_dt_tim DESC";
    $qsqlei = mysqli_query($con,$sqlei);
    echo mysqli_error($con);
    while($rsei = mysqli_fetch_array($qsqlei))
    {
    $images=unserialize($rsei['gallery']);
        echo "
        <div class='w3-third w3-margin-bottom'>
          <div style='border-radius:15px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);'>
          <div style='height:170px;display:flex;'>
            <img src='uploads/" . $images[0] . "' style='width:100%;object-fit:cover;border-top-left-radius:15px;border-top-right-radius:15px;' class='w3-hover-opacity' onclick='showImages($rsei[hall_booking_id],1)'>
          </div>
          <div class='w3-container w3-white' style='border-bottom-left-radius:15px;border-bottom-right-radius:15px;'>
            <p style='margin-bottom:0px;'><b>" . $rsei['department_name'] . "</b></p>
            <p style='margin-bottom:0px;' class='w3-opacity'>"  . date_format(date_create($rsei['booking_start_dt_tim']),'D d M Y') . "</p>
          </div>
          </div>
        </div>";

    }
    echo "
        </div>
        </div>
    </div>
    </div>
    </div>
  ";
}
?>
<style>
</style>
<div id="eventgallery" style="display:none;">
<?php 
// include("eventgallery.php");
 ?>
</div>
<script>
    function eventGallery(eid){
        document.getElementById("eid_"+eid).style.display="block";
    }
    function closeEventGallery(eid){
        document.getElementById("eid_"+eid).style.display="none";
    }
</script>
<script>
    showingImage=0;
    function changeImage(img_name,hid,pn){
      if(pn==0){
        // alert(img_name + " " + hid + " " + ino);
        document.getElementById("show_image_"+hid).src="uploads/"+img_name;
        showingImage=img_name;
      }
      hhid=hid;
      if(pn==1){
        if(showingImage==0){
        arraylen=eval("images_js_"+hhid+".length");
        showingImage=eval("images_js_"+hhid+"["+(arraylen-1)+"]");
        document.getElementById("show_image_"+hid).src="uploads/"+showingImage;
        }else{
          // index= eval("images_js_"+hhid).findindex(showingImage);
          if(eval("images_js_"+hhid+"[0]")==showingImage){
              showingImage=eval("images_js_"+hhid+"["+(arraylen-1)+"]");
          }
          for(i=0;i<=(arraylen-1);i++){
            if(showingImage==eval("images_js_"+hhid+"["+i+"]")){
              showingImage=eval("images_js_"+hhid+"["+(i-1)+"]");
            }
          }
          // alert("prev "+showingImage);
          document.getElementById("show_image_"+hid).src="uploads/"+showingImage;
        }
      }else if(pn==2){
        if(showingImage==0){
        // showImages="images_js_"+hid+"[0]";
        showingImage=eval("images_js_"+hhid+"[1]");
        document.getElementById("show_image_"+hid).src="uploads/"+showingImage;
        }else{
          arraylen=eval("images_js_"+hhid+".length");
          if(eval("images_js_"+hhid+"["+(arraylen-1)+"]")==showingImage){
              showingImage=eval("images_js_"+hhid+"[0]");
          }else{
            for(i=0;i<arraylen;i++){
              if(eval("images_js_"+hhid+"["+i+"]")==showingImage){
                nextImage=eval("images_js_"+hhid+"["+(i+1)+"]");
              }
            }
            showingImage=nextImage;
          }

          // alert("Next "+showingImage);
          document.getElementById("show_image_"+hid).src="uploads/"+showingImage;
        }
      }
    }
    function showImages(hid,opcl){
    showingImage=0;
    if(opcl==0){
        document.getElementById("hid_"+hid).style.display="none";
    }else{
        document.getElementById("hid_"+hid).style.display="block";
        
    }
    // alert(hid+","+opcl);
    }
</script>


  </div>
  
  <!-- The Contact Section -->
  <div class="w3-container w3-content w3-padding-64" style="max-width:800px" id="contact">
    <h2 class="w3-wide w3-center">CONTACT</h2>
    <p class="w3-opacity w3-center"><i>Leave Us Your Info And We Will Get Back To You</i></p>
    <div class="w3-row w3-padding-32">
      <div class="w3-col m6 w3-large w3-margin-bottom">
        <i class="fa fa-map-marker" style="width:30px"></i> SDM College(Autonomous),<br>Ujire,D.k, 574240<br>
        <i class="fa fa-phone" style="width:30px"></i> Phone: 08256-236101,236488<br>
        <i class="fa fa-envelope" style="width:30px"> </i> Email: sdmcollege@sdmcujire.in<br>
      </div>
      <div class="w3-col m6">
        <form action="" method="post" target="_blank">
          <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
            <div class="w3-half">
              <input class="w3-input w3-border" type="text" id="name" name="name" placeholder="Name" required name="Name" required>
            </div>
            <div class="w3-half">
              <input class="w3-input w3-border" type="text" id="email" name="email" placeholder="Email" required name="Email" required><br>
            </div>
          </div>
          <input class="w3-input w3-border" type="text" name="subject" id="subject" placeholder="Subject" required><br>
          <input class="w3-input w3-border" type="text" name="message" id="message" placeholder="Message" required>
          <button class="w3-button w3-black w3-section w3-right" id="contact" name="contact" type="submit">SEND</button>
        </form>
      </div>
    </div>
  </div>
  
<!-- End Page Content -->
</div>

<!-- Image of location/map -->
<img src="/w3images/map.jpg" class="w3-image w3-greyscale-min" style="width:100%">

<script>
// Automatic Slideshow - change image every 4 seconds
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 4000);    
}

// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}

// When the user clicks anywhere outside of the modal, close it
var modal = document.getElementById('ticketModal');
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

<?php include("footer.php"); ?>