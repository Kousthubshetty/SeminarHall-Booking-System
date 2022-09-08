<div id="myModal1" class="modal" style="overflow-y: scroll;">
  <!-- Modal content -->
  <div class="modal-content">
	<form action="" method="post" role="form" name="frm1">
		<div class="modal-header">
		  <h4>Change Request</h4>
		  <span id="close-model1" class="close">&times;</span>
		</div>
		<div class="modal-body" style="padding-bottom:0px;">
			<div class="row">
<div class="tabs" style="background-color: #e9ecef;">
  <input type="radio" name="tabs" id="tabsiz" checked="checked">
  <label for="tabsiz">Change Request</label>
  <div class="tab" style="padding-bottom:0px;">
		<div class="row">
			<div class="col-md-12">
				
			<!-- <span class="errmsg"  id="erreventtypeid"></span> -->
				<table id="tblhallschedule" class="table table-bordered">
					<thead>
						<tr>
							<th>Event</th>
							<th>Staff</th>
							<th>Department</th>
							<th>Start Time</th>
							<th>End Time</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
				<hr>
				<div class="row">
				<div class="col-md-6">
					Start Date:
					<input type="datetime" name="ch_start_date" id="ch_start_date" class="form-control" readonly ><bR>
				</div>
				<div class="col-md-6">
					End Date
					<input type="datetime" name="ch_end_date" id="ch_end_date" class="form-control" readonly ><bR>
				</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						Reason for Change Request <span class="errmsg"  id="errchange_reason"></span>
						<textarea name="change_reason" id="change_reason" class="form-control" required></textarea>
					</div>
				</div>
				
			</div>
	</div>
	<div class="modal-footer" style="align-items: center;justify-content: flex-end;display:flex;margin-top:15px;margin-left:-1.5rem;margin-right:-1.5rem;">
		<h3><a class="btn btn-warning btn-lg" style="width:200px;" onclick="nextTab_1(1)">Next</a></h3>
	</div>
	<script>
		  function nextTab_1(n){
			  if(n==1){
				// validateform();
				document.getElementById('tabfour').click();
			  }else if(n==2){
				// validateform();
				document.getElementById('tabfive').click();
			  }
		  }
	  </script>
  </div>
  <input type="radio" name="tabs" id="tabfour">
  <label for="tabfour">Hall Booking Entry</label>
  <div class="tab" style="padding-bottom:0px;">
		<?php include("hall_booking_change_req.php"); ?>
		<div class="modal-footer" style="align-items: center;justify-content: flex-end;display:flex;margin-top:15px;margin-left:-1.5rem;margin-right:-1.5rem;">
		<h3><a class="btn btn-warning btn-lg" style="width:200px;" onclick="nextTab_1(2)">Next</a></h3>
		</div>
  </div>
  <input type="radio" name="tabs" id="tabfive">
  <label for="tabfive">Equipment Booking</label>
  <div class="tab"  style="padding-bottom:0px;">
		<!--Equipment booking starts here -->
		<div class="row">
			<div class="col-md-4">
				<select name="equipment_id1" id="equipment_id1" class="form-control" onchange="funloadmaxqty1(this.value)">
				<option value="">SELECT Equipment</option>
				<?php
				$sqlequipments ="SELECT * FROM equipments";
				$qsqlequipments = mysqli_query($con,$sqlequipments);
				echo mysqli_error($con);
				while($rsequipments = mysqli_fetch_array($qsqlequipments))
				{
				echo "<option value='$rsequipments[equipment_id]'>$rsequipments[equipment_type] (Max Qty " . $rsequipments[equipment_quantity] .")</option>";
				}
				?>
				</select>
				<input type="hidden" name="equipment_type1" id="equipment_type1">
				<input type="hidden" name="equipment_img1" id="equipment_img1">
			</div>
			<div class="col-md-4">
				<input type="number" name="equipmentqty1" id="equipmentqty1" class="form-control" placeholder="Required quantity" >
			</div>
			<div class="col-md-4">
				<input type="button" class="btn btn-info" value="Add" onclick="funinsertequip1(equipment_id1.value,equipmentqty1.value,equipment_type1.value,equipment_img1.value)" > 
			</div>
		</div>
		<table class="table table-bordered" id="tblequipmenttable1">
			<thead>
				<tr>
					<th>Image</th>
					<th>Equipment</th>
					<th>Quantity</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
		<!--Equipment booking ends here -->
		<div class="modal-footer" style="align-items: center;justify-content: flex-end;display:flex;margin-top:15px;margin-left:-1.5rem;margin-right:-1.5rem;">
		<h3><button class="btn btn-warning btn-lg" type="submit" name="btnsubmitchangereq" onclick="validate_1()">Click Here to Book</button></h3>
		</div>
		<script>
			function validate_1(){
				mn=document.getElementById('change_reason').value;
				if(mn==''){
					// alert(document.getElementById('eventtypeid').value);
					document.getElementById('tabsiz').click();
				}else{
					document.getElementById('tabfour').click();
				}
				// validateform();
			}
		</script>
	</div>
</div>
			</div>
		</div>
		<!-- <div class="modal-footer">
		  <h3><button class="btn btn-warning btn-lg" type="submit" name="btnsubmitchangereq" onclick="return validateform()">Click Here to send Change Request</button></h3>
		</div> -->
	</form>
  </div>
</div>

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
	if($('#eventtypeid').val() == "")
	{
		$('#erreventtypeid').html("Select Event Type..");
		err = "true";
	}
	
	if($('#total_strength').val() == "")
	{
		$('#errtotal_strength').html('Staff Name Should not be empty..');
		err = "true";
	}
	if(!$('#emailid').val().match(emailExp))
	{
		$('#erremailid').html('Entered Email ID is not valid..');
		err = "true";
	}
	if($('#emailid').val() == "")
	{
		$('#erremailid').html('Email ID Should not be empty..');
		err = "true";
	}
	if($('#editid').val() == 0)
	{
		if($('#password').val().length < 6)
		{
			$('#errpassword').html('Password should contain more than 6 characters..');
			err = "true";
		}
		if($('#password').val() == "")
		{
			$('#errpassword').html('Password Should not be empty..');
			err = "true";
		}
		if($('#password').val() != $('#cpassword').val())
		{
			$('#errcpassword').html('Password and confirm password is not matching..');
			err = "true";
		}
		if($('#cpassword').val() == "")
		{
			$('#errcpassword').html('Confirm Password Should not be empty..');
			err = "true";
		}
	}
	if($('#phno').val().length != 10)
	{
		$('#errphno').html('Phone Number should contain 10 digits..');
		err = "true";
	}
	if($('#phno').val() == "")
	{
		$('#errphno').html('Phone Number Should not be empty..');
		err = "true";
	}
	if($('#status').val() == "")
	{
		$('#errstatus').html('Status Should not be empty..');
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