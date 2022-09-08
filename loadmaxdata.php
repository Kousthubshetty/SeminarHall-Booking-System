<?php
include("dbconnection.php");
$sqlmax = "SELECT * FROM equipments WHERE equipment_id='$_GET[equipment_id]'";
$qsqlmax= mysqli_query($con,$sqlmax);
$rsmax= mysqli_fetch_array($qsqlmax);
$arr['equipment_type'] = $rsmax['equipment_type'];
$arr['equipment_quantity'] = $rsmax['equipment_quantity'];
$arr['equipment_img'] = $rsmax['equipment_img'];
echo json_encode($arr);
?>