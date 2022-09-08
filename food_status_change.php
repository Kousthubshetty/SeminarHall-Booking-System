<?php
    include("dbconnection.php"); 
    if($_GET['status']=='Active'){
        $sqlupdate = "UPDATE food_item SET item_status='Inactive' WHERE food_item_id='$_GET[foodid]'";
    }
    else{
        $sqlupdate = "UPDATE food_item SET item_status='Active' WHERE food_item_id='$_GET[foodid]'";
        }
    $qsqlupdate = mysqli_query($con,$sqlupdate);
    echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>window.location='hoteldashboard.php';</script>";
		}	  
    
?>
