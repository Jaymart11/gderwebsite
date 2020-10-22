<?php
session_start();
$isAllOK=true;
$msg='';

$cid = 0;
if (isset($_POST['TXTcid'])) {
	$cid = $_POST['TXTcid'];
}


if (trim($_POST['TXTchatmsg'])=='') {
	$msg = "<br>Enter Message";
	$isAllOK=false;
}

if ($isAllOK){
	include("dbcon.php");
	$query = "INSERT INTO msg (content, customer_id) VALUES (
				'".mysqli_real_escape_string($dbc, trim($_POST['TXTchatmsg']))."',
				'".mysqli_real_escape_string($dbc, $cid)."'
				)";
	$result = mysqli_query($dbc, $query);
	$lid = mysqli_insert_id($dbc);
	
	$query = "INSERT INTO msg_for (msg_id, for_user, for_user_id, from_user, from_user_id, isread, isactive) VALUES (
				'".mysqli_real_escape_string($dbc, $lid)."',
				'1',
				'1',
				'1',
				'1',
				'0',
				'1'
				)";
	$result = mysqli_query($dbc, $query);
	$query = "INSERT INTO msg_for (msg_id, for_user, for_user_id, from_user, from_user_id, isread, isactive) VALUES (
				'".mysqli_real_escape_string($dbc, $lid)."',
				'0',
				'".mysqli_real_escape_string($dbc, $cid)."',
				'1',
				'1',
				'0',
				'1'
				)";
	$result = mysqli_query($dbc, $query);
		
	$msg = "success";
}

echo $msg;
?>