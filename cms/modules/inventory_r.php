<?php
$msg = "";
$isallOK = true;
session_start();


if (!isset($_POST['TXTqty'])){
	exit();
} else {
	if(trim($_POST['TXTqty'])==''){
		$msg .= "Enter Quantity\n";
		$isallOK = false;
	}
}

echo $msg;

$showprice = "0";
if (isset($_POST['CHKshowprice'])) {
	$showprice = "1";
}

if ($isallOK){
	include('../modules/dbcon.php');
	$query = "INSERT INTO gderdb.product_trans (product_id, trans_type, qty) 
				VALUES (
				'".mysqli_real_escape_string($dbc, $_POST['pid'])."',
				'".$_POST['mode']."',
				'".mysqli_real_escape_string($dbc, $_POST['TXTqty'])."'
				)
				";
		$result = @mysqli_query($dbc, $query) or die(mysqli_error($dbc));
		$lid=mysqli_insert_id($dbc);
	if ($result) {
		echo "Success".$_POST['pid'];
	} else {
		echo "Failed";
	}	
}
?>