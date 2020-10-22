<?php
$msg = "";
$isallOK = true;
session_start();


if ($_POST['mode']!="delete"){
	if (!isset($_POST['TXTdesc'])){
		exit();
	} else {
		if(trim($_POST['TXTdesc'])==''){
			$msg .= "Enter Description\n";
			$isallOK = false;
		}
	}
}
echo $msg;

if ($isallOK){
	include('../modules/dbcon.php');
	if($_POST['mode']=="add") {	
		$query = "INSERT INTO gderdb.product_category (description) 
				VALUES 
				('".mysqli_real_escape_string($dbc, $_POST['TXTdesc'])."')
				";
		$result = @mysqli_query($dbc, $query) or die(mysqli_error($dbc));
		$lid=mysqli_insert_id($dbc);
	} elseif ($_POST['mode']=="edit") {
		$query = "UPDATE gderdb.product_category SET description = '".mysqli_real_escape_string($dbc, $_POST['TXTdesc'])."'
					WHERE id = '".mysqli_real_escape_string($dbc, $_POST['pid'])."'";
		$result = @mysqli_query($dbc, $query) or die(mysqli_error($dbc));
	} else {
		$query = "DELETE FROM gderdb.product_category WHERE id = '".mysqli_real_escape_string($dbc, $_POST['pid'])."'";
		$result = @mysqli_query($dbc, $query) or die(mysqli_error($dbc));
	}
	if ($result) {
		echo "Success".$_POST['pid'];
	} else {
		echo "Failed";
	}	
}
?>