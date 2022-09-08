<?php 
include("header.php"); 
if(!isset($_SESSION['adminid']))
{
    echo "<script>window.location='adminlogin.php';</script>";  
}	
if(isset($_POST['btnsubmit']))
{
  $countfiles = count($_FILES['files']['name']);
 
  // Looping all files
  $filename = array();
  for($i=0;$i<$countfiles;$i++){
    $filename[$i] = $_FILES['files']['name'][$i];
    // Upload file
    move_uploaded_file($_FILES['files']['tmp_name'][$i],'uploads/'.$filename[$i]); 
  }
  $images = serialize($filename);
  $sqlinsert = "UPDATE hall_booking SET event_description='$_POST[event_description]',gallery='$images' where hall_booking_id = '$_GET[viewid]'";
  $qsqlinsert = mysqli_query($con,$sqlinsert);
  //echo mysqli_error($con);
  if(mysqli_affected_rows($con) == 1)
  {
      echo "<script>alert('Event Images inserted successfully...');</script>";
      echo "<script>window.location='addeventimages.php?viewid=$_GET[viewid]';</script>";
  }
  else
  {
    echo "<script>alert('Admin Account already exists..');</script>";
    // echo "<script>window.location='viewadmin.php';</script>";
  } 
}

?>
<style>
    input[type="file"] {

     display:block;
    }
    .imageThumb {
     max-height: 150px;
     max-width: 150px;
     border: 2px solid;
     margin: 10px 10px 0 0;
     padding: 1px;
     }
    </style>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Event Images</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Event Images</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->
    <div style="padding-left:70px; padding-top: 20px;">
	<a href="#" class="back" onclick="window.history.back()" >&laquo; Back</a>
	</div> 
<!-- ======= Contact Section ======= -->
<section id="contact" class="padd-section" style="padding-top: 0px;">

<div class="container" data-aos="fade-up">
  <div class="section-title text-center">
    <h2>Event Images</h2>
    <p class="separator">Kindly upload event images</p>
  </div>

  <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">

    <div class="col-lg-6 col-md-6 col-sm-offset-6">
      <div class="form">
        <form action="" method="post" role="form" class="php-email-form" name="frm" enctype="multipart/form-data" onsubmit="return validateform()">
        <div class="form-group">
            Event Description 
            <textarea  class="form-control" name="event_description" id="event_description" placeholder="Enter Event Description"><?php echo $rsedit['event_description']; ?></textarea>
          </div><br>
          <div class="form-group">
        <div class="field" align="left">
            <span>
                Upload event images <span class="errmsg"  id="errfiles"></span>
                <input type="file" id="files" name="files[]" class="form-control" accept="image/png, image/gif, image/jpeg" multiple />
            </span>
        </div>
    </div>
<br>
          <div class="text-center"><button type="submit" name="btnsubmit">Click Here to Submit</button></div>
        </form>
      </div>
    </div>
  </div>
</div>
</section><!-- End Contact Section -->


  </main><!-- End #main -->
  <?php include("footer.php"); ?>
  <script>
function validateform()
{
	var numericExpression = /^[0-9]+$/;
	var alphaExp = /^[a-zA-Z]+$/;
	var alphaNumericExp = /^[0-9a-zA-Z]+$/;
	var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,5}$/;
	var alphaspaceExp = /^[a-zA-Z\s]+$/;
	var err = "false";
	$('.errmsg').empty();
	if($('#files').val() == "")
	{
		$('#errfiles').html('Select event images..');
		err = "true";
	}
	if(err == "true")
	{
		return false;
	}
	else
	{
		return true;
	}
}
</script>

    <script type="text/javascript">
    $(document).ready(function() {

     if(window.File && window.FileList && window.FileReader) {
        $("#files").on("change",function(e) {
            document.querySelectorAll('.imageThumb').forEach(e => e.remove());
            var files = e.target.files ,
            filesLength = files.length ;
            for (var i = 0; i < filesLength ; i++) {
                var f = files[i]
                var fileReader = new FileReader();
                fileReader.onload = (function(e) {
                    var file = e.target;
                    $("<img></img>",{
                        class : "imageThumb",
                        src : e.target.result,
                        title : file.name
                    }).insertAfter("#files");
               });
               fileReader.readAsDataURL(f);
           }
      });
     } else { alert("Your browser doesn't support to File API") }
    });

    </script>

    <script>
        $( "form" ).on('click', '.remove-image-preview', function(){
      $(this).parent('.imageThumb').remove();
      $('#files').val('');
    });
        </script>

