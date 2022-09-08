<?php
include("header.php");
if(isset($_POST['btnsubmit']))
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
 
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="padd-section">

      <div class="container" data-aos="fade-up">
        <div class="section-title text-center">
          <h2>Contact</h2>
         <p class="separator">Leave us your info and we will get back to you</p>
        </div>

        <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">

          <div class="col-lg-3 col-md-4">

            <div class="info">
              <div>
                <i class="bi bi-geo-alt"></i>
                <p>SDM College(Autonomous),<br>Ujire,D.k, 574240</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <p>sdmcollege@sdmcujire.in</p>
              </div>

              <div>
                <i class="bi bi-phone"></i>
                <p>08256-236101,236488</p>
              </div>
            </div>

          </div>

          <div class="col-lg-5 col-md-8">
            <div class="form">
              <form action="" method="post" role="form" class="php-email-form" onsubmit="return validateform()">
                <div class="form-group">
                <span class="errmsg"  id="errname"></span>
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required  onkeyup="validateform()">
                </div>
                <div class="form-group mt-3">
                <span class="errmsg"  id="erremail"></span>
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required  onkeyup="validateform()">
                </div>
                <div class="form-group mt-3">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                </div>
                <div class="form-group mt-3">
                  <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea >
                </div><br>
                <div class="text-center"><button type="submit" name="btnsubmit">Click Here to send message</button></div>
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
	if(!$('#name').val().match(alphaspaceExp))
	{
		$('#errname').html('Name should contain alphabets..');
		err = "true";
	}
	if(!$('#email').val().match(emailExp))
	{
		$('#erremail').html('Entered Email ID is not valid..');
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