<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE  &  ~E_STRICT  &  ~E_WARNING);
date_default_timezone_set("Asia/Calcutta");
include("dbconnection.php");
if(isset($_POST['food_order_id']))
{
	$sqlupd = "UPDATE food_order SET item_qty='$_POST[item_qty]' WHERE food_order_id='$_POST[food_order_id]' ";
	$qsqlupd = mysqli_query($con,$sqlupd);
	echo mysqli_error($con);
}
if(isset($_POST['del_food_order_id']))
{
	$sqlupd = "DELETE FROM food_order WHERE food_order_id='$_POST[del_food_order_id]' ";
	$qsqlupd = mysqli_query($con,$sqlupd);
	echo mysqli_error($con);
}
if(isset($_POST['item_id']))
{
	$sqlfooditem = "SELECT * FROM food_item where food_item_id='$_POST[item_id]'";
	$qsqlfooditem = mysqli_query($con,$sqlfooditem);
	$rsfooditem = mysqli_fetch_array($qsqlfooditem);
	$sqlfood_order = "SELECT * FROM food_order where food_item_id='$_POST[item_id]' AND food_order.status='Pending' AND food_order.bill_id='0'";
	$qsqlfood_order = mysqli_query($con,$sqlfood_order);
	$rsfood_order = mysqli_fetch_array($qsqlfood_order);
	if(mysqli_num_rows($qsqlfood_order) >= 1)
	{
		$sqlupd = "UPDATE food_order SET item_qty=item_qty+1 WHERE food_order_id='$rsfood_order[food_order_id]' ";
		$qsqlupd = mysqli_query($con,$sqlupd);
		echo mysqli_error($con);
	}
	else
	{
		$sqlinsert = "INSERT INTO food_order (bill_id,food_item_id,item_qty,item_cost,status) VALUES('0','$_POST[item_id]','1','$rsfooditem[item_cost]','Pending')";
		$qsqlinsert = mysqli_query($con,$sqlinsert);
		echo mysqli_error($con);
	}
}
?>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>Food Item Name</th>				
			<th style='text-align: right;'>Cost</th>
			<th>Quantity</th>
			<th style='text-align: right;'>Total</th>
			<th><i class="fa fa-trash" aria-hidden="true"></i></th>
		</tr>
	</thead>
	<tbody>
		<?php
		$sqlitem = "SELECT food_order.*,food_item.item_name,food_item.item_cost,food_item.item_image FROM food_order LEFT JOIN food_item ON food_order.food_item_id=food_item.food_item_id where food_order.status='Pending' AND food_order.bill_id='0'";
		$qsqlitem = mysqli_query($con,$sqlitem);
		$sum = 0;
		while($rsitem= mysqli_fetch_array($qsqlitem))
		{
			echo "<tr>
				<td>$rsitem[item_name]</td>				
				<td style='text-align: right;'>₹$rsitem[item_cost]</td>
				<td style='width: 100px;' ><input type='number' id='item_qty[]' name='item_qty[]' class='form-control' style='width: 100px;' value='$rsitem[item_qty]' onchange='fun_changeqty($rsitem[food_order_id],this.value)' min='1' ></td>
				<td style='text-align: right;'>₹" . ($rsitem['item_qty'] * $rsitem['item_cost']) . "</td>
				<td><i class='fa fa-trash' aria-hidden='true' style='color: red;cursor: pointer;' onclick='fun_del_food_order_id($rsitem[food_order_id])' ></i></td>
			</tr>";
			$sum = $sum + ($rsitem['item_qty'] * $rsitem['item_cost']);
		}
		?>
	</tbody>
	<tfoot>
		<tr>
			<th colspan="3">Total</th>
			<th style='text-align: right;'>₹<?php echo $sum; ?>
			<input type="hidden" name="total_amt" id="total_amt" value="<?php echo $sum; ?>" ></th>
			<th></th>
		</tr>
	</tfoot>
</table>