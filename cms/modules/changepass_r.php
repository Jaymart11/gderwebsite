<?php
$msg = "";
$isallOK = true;
session_start();

function isValidCurrentPass($pass){
	include("../modules/dbcon.php");
	$query = "select * from gderdb.users where id='".mysqli_real_escape_string($dbc, $_SESSION['GDERuid'])."' and password=md5('".$_POST['TXTpassold']."')";
	$result = mysqli_query($dbc, $query);
	if (mysqli_num_rows($result)>0) {
		return true;
	} else {
		return false;
	}
}





if (!isset($_POST['TXTpassold'])){
	exit();
} else {
	if(trim($_POST['TXTpassold'])==''){
		$msg .= "Enter Current password\n";
		$isallOK = false;
	} else {
		if (!isValidCurrentPass($_POST['TXTpassold'])) {
			$msg .= "Invalid Current Password\n";
			$isallOK = false;
		}
	}
}

if (!isset($_POST['TXTpassnew1'])){
	exit();
} else {
	if(trim($_POST['TXTpassnew1'])==''){
		$msg .= "Enter new password\n";
		$isallOK = false;
	}
}

if (!isset($_POST['TXTpassnew2'])){
	exit();
} else {
	if(trim($_POST['TXTpassnew2'])==''){
		$msg .= "Re-enter new password\n";
		$isallOK = false;
	}
}

echo $msg;

if ($isallOK){
	include('../modules/dbcon.php');
	$query = "UPDATE gderdb.users SET 
				password='".md5($_POST['TXTpassnew1'])."'
				WHERE id = '".mysqli_real_escape_string($dbc, $_SESSION['GDERuid'])."'";
	$result = @mysqli_query($dbc, $query) or die(mysqli_error($dbc));
	if ($result) {
		echo "Success";
	} else {
		echo "Failed";
	}	
}
?>