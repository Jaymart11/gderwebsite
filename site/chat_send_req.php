<?php
session_start();
$isAllOK=true;
$msg='';


if (trim($_POST['TXTchatmsg'])=='') {
	$msg = "<br>Enter Message";
	$isAllOK=false;
}

if ($isAllOK){
	include("dbcon.php");
	$query = "INSERT INTO msg (content, customer_id) VALUES (
				'".mysqli_real_escape_string($dbc, trim($_POST['TXTchatmsg']))."',
				'".mysqli_real_escape_string($dbc, trim($_SESSION['GDERuid']))."'
				)";
	$result = mysqli_query($dbc, $query);
	$lid = mysqli_insert_id($dbc);
	
	$query = "INSERT INTO msg_for (msg_id, for_user, for_user_id, from_user, from_user_id, isread, isactive) VALUES (
				'".mysqli_real_escape_string($dbc, $lid)."',
				'1',
				'1',
				'0',
				'".mysqli_real_escape_string($dbc, trim($_SESSION['GDERuid']))."',
				'0',
				'1'
				)";
	$result = mysqli_query($dbc, $query);
	$query = "INSERT INTO msg_for (msg_id, for_user, for_user_id, from_user, from_user_id, isread, isactive) VALUES (
				'".mysqli_real_escape_string($dbc, $lid)."',
				'0',
				'".mysqli_real_escape_string($dbc, trim($_SESSION['GDERuid']))."',
				'0',
				'".mysqli_real_escape_string($dbc, trim($_SESSION['GDERuid']))."',
				'0',
				'1'
				)";
	$result = mysqli_query($dbc, $query);
		
	$msg = "success";
}

echo $msg;
?>