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

$showprice = "0";
if (isset($_POST['CHKshowprice'])) {
	$showprice = "1";
}

if ($isallOK){
	include('../modules/dbcon.php');
	if($_POST['mode']=="add") {	
		$query = "INSERT INTO gderdb.products (product_category_id, prod_code, prod_name, description, price, show_price, iscancelled, beg_bal, critqty) 
				VALUES (
				'".mysqli_real_escape_string($dbc, $_POST['TXTprodcatid'])."',
				'".mysqli_real_escape_string($dbc, $_POST['TXTprodcode'])."',
				'".mysqli_real_escape_string($dbc, $_POST['TXTprodname'])."',
				'".mysqli_real_escape_string($dbc, $_POST['TXTdesc'])."',
				'".mysqli_real_escape_string($dbc, $_POST['TXTprice'])."',
				'".mysqli_real_escape_string($dbc, $showprice)."',
				'1',
				'".mysqli_real_escape_string($dbc, $_POST['TXTbegbal'])."',
				'".mysqli_real_escape_string($dbc, $_POST['TXTcritqty'])."'
				)
				";
		$result = @mysqli_query($dbc, $query) or die(mysqli_error($dbc));
		$lid=mysqli_insert_id($dbc);
	} elseif ($_POST['mode']=="edit") {
		$query = "UPDATE gderdb.products SET 
					product_category_id='".mysqli_real_escape_string($dbc, $_POST['TXTprodcatid'])."',
					prod_code = '".mysqli_real_escape_string($dbc, $_POST['TXTprodcode'])."',
					prod_name = '".mysqli_real_escape_string($dbc, $_POST['TXTprodname'])."',
					description = '".mysqli_real_escape_string($dbc, $_POST['TXTdesc'])."',
					price = '".mysqli_real_escape_string($dbc, $_POST['TXTprice'])."',
					show_price = '".mysqli_real_escape_string($dbc, $showprice)."',
					iscancelled='0',
					beg_bal='".mysqli_real_escape_string($dbc, $_POST['TXTbegbal'])."',
					critqty='".mysqli_real_escape_string($dbc, $_POST['TXTcritqty'])."'
					WHERE id = '".mysqli_real_escape_string($dbc, $_POST['pid'])."'";
		$result = @mysqli_query($dbc, $query) or die(mysqli_error($dbc));
	} else {
		$query = "UPDATE gderdb.products SET iscancelled='1' WHERE id = '".mysqli_real_escape_string($dbc, $_POST['pid'])."'";
		$result = @mysqli_query($dbc, $query) or die(mysqli_error($dbc));
	}
	if ($result) {
		echo "Success".$_POST['pid'];
	} else {
		echo "Failed";
	}	
}
?>