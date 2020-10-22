<?php
$logok = true;
$msg="Enter your username and password.{}0";
$cntlogs=0;
if (isset($_POST['BTNlogin'])) {
	if (trim($_POST['TXTusername'])=='') {
		$msg="Enter your username and password.{}0";
		$logok = false;
	}
	if (trim($_POST['TXTpassword'])=='') {
		$msg="Enter your username and password.{}0";
		$logok = false;
	}

	if ($logok) {



include('dbcon.php');
$query = "SELECT * FROM users WHERE `username`='".mysqli_real_escape_string($dbc, $_POST['TXTusername'])."'";// AND `password`='".$getPwd."'";

$result = @mysqli_query($dbc, $query) or die(mysqli_error($dbc));
if(mysqli_num_rows($result)>0){
	$row = mysqli_fetch_array($result);
	
	if ($row['password']==md5($_POST['TXTpassword'])) {

		  $getID=$row['id'];
		  $getName=$row['namae'];
		  $_SESSION['GDER'] = "1";
		  $_SESSION['GDERuid'] = $getID;
		  $_SESSION['GDERnamae'] = $getName;
		  $_SESSION['GDERidno'] = $row['username'];
		  $_SESSION['GDERulvl'] = $row['user_level'];
		
	} else {
		$msg="Invalid Login Details";
	}
} else {
	$msg="Invalid Login Details";
}
$msg .= "{}0";
//echo $msg."{}".$cntlogs;
	}
}
?>