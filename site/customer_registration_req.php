<?php
$isAllOK=true;
$msg='';
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

if (trim($_POST['TXTpassword'])=='') {
	$msg .= "<br>Enter Password";
	$isAllOK=false;
}
if (trim($_POST['TXTvpassword'])=='') {
	$msg .= "<br>Retype Firstname";
	$isAllOK=false;
}
if (trim($_POST['TXTpassword'])!=trim($_POST['TXTvpassword'])) {
	$msg .= "<br>Password do not match";
	$isAllOK=false;
}

function isEmailUsed($email){
	include("dbcon.php");
	$query = "SELECT * FROM customers WHERE emailadd='".mysqli_real_escape_string($dbc, trim($email))."'";
	$result = mysqli_query($dbc, $query);
	if (mysqli_num_rows($result)>0) {
		return true;
	} else {
		return false;
	}
	
}

if (isEmailUsed($_POST['TXTemail'])) {
	$msg .= "<br>Email Already Registered";
	$isAllOK=false;
}

if ($isAllOK){
	include("dbcon.php");
	$query = "INSERT INTO customers (lname, fname, mname, emailadd, password, contactno, isactive) VALUES (
				'".mysqli_real_escape_string($dbc, trim($_POST['TXTlname']))."',
				'".mysqli_real_escape_string($dbc, trim($_POST['TXTfname']))."',
				'".mysqli_real_escape_string($dbc, trim($_POST['TXTmname']))."',
				'".mysqli_real_escape_string($dbc, trim($_POST['TXTemail']))."',
				md5('".mysqli_real_escape_string($dbc, trim($_POST['TXTpassword']))."'),
				'".mysqli_real_escape_string($dbc, trim($_POST['TXTcontact']))."',
				'1'
				)";
	mysqli_query($dbc, $query);
	$msg = "success";
}

echo $msg;
?>