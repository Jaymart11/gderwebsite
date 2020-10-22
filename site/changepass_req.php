<?php
$msg = "";
$isAllOK = true;
session_start();

if (trim($_POST['TXTpassword2'])=='') {
	$msg .= "<br>Enter Password";
	$isAllOK=false;
}
if (trim($_POST['TXTvpassword2'])=='') {
	$msg .= "<br>Retype Password";
	$isAllOK=false;
}
if (trim($_POST['TXTpassword2'])!=trim($_POST['TXTvpassword2'])) {
	$msg .= "<br>Password do not match";
	$isAllOK=false;
}

function isValidPass($pass){
	include("dbcon.php");
	$query = "SELECT * FROM customers WHERE id='".mysqli_real_escape_string($dbc, $_SESSION['GDERuid'])."' and password=md5('".mysqli_real_escape_string($dbc, $pass)."')";
	$result = mysqli_query($dbc, $query);
	if (mysqli_num_rows($result)>0) {
		return true;
	} else {
		return false;
	}
}

if (!isValidPass($_POST['TXTcpassword2'])) {
	$msg .= "<br>Invalid Current Password";
	$isAllOK=false;
}

if ($isAllOK){
	include('dbcon.php');
	
	$query = "UPDATE gderdb.customers SET 
				password=md5('".mysqli_real_escape_string($dbc, trim($_POST['TXTpassword2']))."')
				WHERE id = '".mysqli_real_escape_string($dbc, $_SESSION['GDERuid'])."'";
	$result = @mysqli_query($dbc, $query) or die(mysqli_error($dbc));

	if ($result) {
		$msg = "success";
	} else {
		$msg = "Failed";
	}	
}

echo $msg;
?>