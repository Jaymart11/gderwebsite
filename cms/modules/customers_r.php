<?php
$msg = "";
$isallOK = true;
session_start();


if (trim($_POST['TXTfname'])=='') {
	$msg = "<br>Enter Firstname";
	$isAllOK=false;
}
if (trim($_POST['TXTmname'])=='') {
	$msg .= "<br>Enter Middlename";
	$isAllOK=false;
}
if (trim($_POST['TXTlname'])=='') {
	$msg .= "<br>Enter Lastname";
	$isAllOK=false;
}
if (trim($_POST['TXTemail'])=='') {
	$msg .= "<br>Enter Email address";
	$isAllOK=false;
}
if (trim($_POST['TXTcontact'])=='') {
	$msg .= "<br>Enter Contact No.";
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
					fname='".mysqli_real_escape_string($dbc, $_POST['TXTfname'])."',
					mname= '".mysqli_real_escape_string($dbc, $_POST['TXTmname'])."',
					lname= '".mysqli_real_escape_string($dbc, $_POST['TXTlname'])."',
					emailadd= '".mysqli_real_escape_string($dbc, $_POST['TXTemail'])."',
					contactno = '".mysqli_real_escape_string($dbc, $_POST['TXTcontact'])."',
					isactive = '".mysqli_real_escape_string($dbc, $isactive)."'
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