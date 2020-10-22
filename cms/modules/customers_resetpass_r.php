<?php
$msg = "";
$isallOK = true;
session_start();

if (trim($_POST['TXTpassword'])=='') {
	$msg .= "<br>Enter Password";
	$isAllOK=false;
}
if (trim($_POST['TXTvpassword'])=='') {
	$msg .= "<br>Retype Password";
	$isAllOK=false;
}
if (trim($_POST['TXTpassword'])!=trim($_POST['TXTvpassword'])) {
	$msg .= "<br>Password do not match";
	$isAllOK=false;
}

echo $msg;

$isactive = "0";
if (isset($_POST['CHKactive'])) {
	$isactive = "1";
}

if ($isallOK){
	include('../modules/dbcon.php');
	if($_POST['mode']=="add") {	
		
	} elseif ($_POST['mode']=="edit") {
		$query = "UPDATE gderdb.customers SET 
					password=md5('".mysqli_real_escape_string($dbc, trim($_POST['TXTpassword']))."')
					WHERE id = '".mysqli_real_escape_string($dbc, $_POST['pid'])."'";
		$result = @mysqli_query($dbc, $query) or die(mysqli_error($dbc));
	} else {

	}
	if ($result) {
		echo "Success".$_POST['pid'];
	} else {
		echo "Failed";
	}	
}
?>