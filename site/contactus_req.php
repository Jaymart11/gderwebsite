<?php
$isAllOK = true;
$msg="";

if (trim($_POST['TXTname'])=='') {
	$isAllOK = false;
	$msg .= "\nEnter Name";
}

if (trim($_POST['TXTemail'])=='') {
	$isAllOK = false;
	$msg .= "\nEnter Email";
} else {
	if(filter_var($_POST['TXTemail'], FILTER_VALIDATE_EMAIL)) {
     //Valid email!
	} else {
		$isAllOK = false;
		$msg .= "\nEmail Invalid Format";
	}
}

if (trim($_POST['TXTmsg'])=='') {
	$isAllOK = false;
	$msg .= "\nEnter Message";
}


if ($isAllOK) {

	include("dbcon.php");
	$query = "INSERT INTO contactus (namae, email, message) VALUES (
				'".mysqli_real_escape_string($dbc, $_POST['TXTname'])."',
				'".mysqli_real_escape_string($dbc, $_POST['TXTemail'])."',
				'".mysqli_real_escape_string($dbc, $_POST['TXTmsg'])."'
				)";
	$result = mysqli_query($dbc, $query);
	if ($result) {
		$msg = "Success";
	}
}
echo $msg;
?>