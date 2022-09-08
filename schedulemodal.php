<div id="myModal" class="modal" style="overflow-y: scroll;">
  <!-- Modal content -->
  <div class="modal-content">
	<form action="" method="post" role="form" name="frm">
	<div id="divchangedate">
		<input type="hidden" name="schedulestartdate" id="schedulestartdate">
		<input type="hidden" name="scheduleenddate" id="scheduleenddate">
		<input type="hidden" name="sc_bookingdate" id="sc_bookingdate">
		<input type="hidden" name="sc_starttime" id="sc_starttime">
		<input type="hidden" name="sc_endtime" id="sc_endtime">
	</div>
		<div class="modal-header">
		  <h4>Hall Booking Panel</h4>
		  <span id="close-model" class="close">&times;</span>
		</div>
		<div class="modal-body" style="padding-bottom:0px;">
			<div class="row">
<div class="tabs" style="background-color: #e9ecef;">
  <input type="radio" name="tabs" id="tabone" checked="checked">
  <label for="tabone">Hall Booking Entry</label>
  <div class="tab" style="padding-bottom:0px;">
	  <div class="row">
		<?php include("hall_booking.php"); ?>
	  </div>
	  <div class="modal-footer" style="align-items: center;justify-content: flex-end;display:flex;margin-top:15px;margin-left:-1.5rem;margin-right:-1.5rem;">
		<h3><a class="btn btn-warning btn-lg" style="width:200px;" onclick="nextTab(1)">Next</a></h3>
	  </div>
	  <script>
		  function nextTab(n){
			  if(n==1){
				// validateform();
				document.getElementById('tabtwo').click();
			  }
		  }
	  </script>
  </div>
  <input type="radio" name="tabs" id="tabtwo">
  <label for="tabtwo">Requirement</label>
  <div class="tab" style="padding-bottom:0px;">
		<!--Equipment booking starts here -->
		<div class="row">
			<div class="col-md-4">
				<select name="equipment_id" id="equipment_id" class="form-control" onchange="funloadmaxqty(this.value)" >
				<option value="">SELECT Equipment</option>
				<?php
				$sqlequipments ="SELECT * FROM equipments";
				$qsqlequipments = mysqli_query($con,$sqlequipments);
				echo mysqli_error($con);
				while($rsequipments = mysqli_fetch_array($qsqlequipments))
				{
				echo "<option value='$rsequipments[equipment_id]'>$rsequipments[equipment_type] (Max Qty " . $rsequipments['equipment_quantity'] . ")</option>";
				}
				?>
				</select>
				<input type="hidden" name="equipment_type" id="equipment_type">
				<input type="hidden" name="equipment_img" id="equipment_img">
			</div>
			<div class="col-md-4">
				<input type="number" name="equipmentqty" id="equipmentqty" class="form-control" placeholder="Required quantity" >
			</div>
			<div class="col-md-4">
				<input type="button" class="btn btn-info" value="Add" onclick="funinsertequip(equipment_id.value,equipmentqty.value,equipment_type.value,equipment_img.value)" > 
			</div>
		</div>
		<table class="table table-bordered" id="tblequipmenttable">
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
		<h3><button class="btn btn-warning btn-lg" type="submit" name="btnsubmit" onclick="validate()">Click Here to Book</button></h3>
		</div>
		<script>
			function validate(){
				document.getElementById('tabone').click();
				// validateform();
			}
		</script>
	</div>
	</div>
	</div>
	
</div>
		
	</form>
  </div>
</div>
