<?php
$isAllOK=true;
$msg='';
if (trim($_POST['TXTemail'])=='') {
	$msg .= "<br>Enter Email address";
	$isAllOK=false;
}
if (trim($_POST['TXTpassword'])=='') {
	$msg .= "<br>Enter Password";
	$isAllOK=false;
}

if ($isAllOK){
	include("dbcon.php");
	$query = "SELECT * FROM customers WHERE emailadd='".mysqli_real_escape_string($dbc, $_POST['TXTemail'])."' AND password=md5('".mysqli_real_escape_string($dbc, $_POST['TXTpassword'])."')";
	$result = mysqli_query($dbc, $query);
	if (mysqli_num_rows($result)>0) {
		$row = mysqli_fetch_array($result);
		session_start();
		$_SESSION['GDER']='0';
		$_SESSION['GDERutype']='2';
		$_SESSION['GDERuid']=$row['id'];
		$_SESSION['GDERnamae']=$row['lname'].", ".$row['fname']." ".$row['mname'];
		$msg = "success";
	} else {
		$msg = "failed";
	}
	
}

echo $msg;
?>