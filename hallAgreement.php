<style>
.modal-header-agreement{
  padding: 2px px;
  background-color: #5cb85c;
  color: white;
}
.modal-footer-agreement {
  padding: 10px 16px;
  /* background-color: #5cb85c; */
  color: white;
}
#agreed{
	width:100%;
	/* transform:scale(1); */
	cursor:pointer;
	color:blue;
	background-color:white;
	border:2px solid blue;
	border-radius:20px;
	height:35px;
}
#agreed:hover{
	/* transform:scale(0.98); */
	color:white;
	background-color:blue;
	border:2px solid white;
}
.showmodal{
	display:block;
}
</style>
<?php
if(isset($_GET['hallid'])){
echo"
<div id='hallAgreement' class='showmodal modal'>
  <!-- Modal content -->
  <div class='modal-content' style='width:60%;margin-top:30px;font-family:'Helvetica Neue', Helvetica, Arial, sans-serif;'>
		<div class='modal-header' style='background-color:white;border-bottom:1px solid gray;'>
		  <h4 style='margin:auto;color:black;font-weight:700;font-size: 13px;'>Terms and Conditions</h4>
		  <span class='close' id='close-modal-agreement' style='color:gray;font-size: 28px;font-weight: bold;float:right;'>&times;</span>
		</div>
		<div class='modal-body' style='overflow-y: scroll;height:40vh;font-size:16px;'>
		<p>These terms and conditions set out the basis on which you may book, and we will provide seminar hall rooms and related services to you. Please read these terms and conditions carefully before booking any Seminar hall rooms or related services with us.</p>
		<p>When making a Booking, you must check that the details of your reservation are complete and accurate, before you confirm your Booking. We will not be liable for any delay or non-performance if you provide us with incorrect or incomplete information.</p>
		<p>* Seminar hall is available for use from 8 AM TO 8PM.</p>
		<p>* Admin approves the bookings on priority basis.</p>
		<p>* The booking cannot be done on the same day .Booking can be done until previous date.</p>
		<p>* Staffs bookings are invalid until admin approves. After staff books the hall, the admin will approve or reject according to the circumstances. </p>
		<p>* 10 minutes from your bookings will be taken for stage settings.</p>
		<p>* Staff can request for time which is already booked by another staff.</p>
		<p>* Staffs need to arrange particular equipments(such as camera,laptop etc.,)prior which cannot be guaranteed of availability in hall.</p>
		<p>* Staffs who book seminar hall are not allowed to use the equipments(which belong to seminar hall)outside the seminar hall.</p>
		<p>* If equipments which belongs to seminar hall gets damaged, then the person who damaged it will be responsible.</p>
		<p></p>
		</div>
		<div class='modal-footer-agreement' style='width:70%;margin:auto;'>
		<input id='condition-check' type='checkbox' onchange=\"document.getElementById('agreed').disabled=!this.checked;\"/><label style='color:black;' for='condition-check'> &nbsp;I have read and agree to the Terms and conditions</label> <br>
		<button id='agreed' disabled onclick=\"document.getElementById('hallAgreement').style.display='none'\">AGREE & CONTINUE</button>
		</div>
  </div>
</div>";
}
?>