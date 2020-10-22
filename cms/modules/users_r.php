<?php
$msg = "";
$isallOK = true;
session_start();
if ($_SESSION['GDERulvl']!='1') { exit(); }
function isUsernameExists($uname){
	include("../modules/dbcon.php");
	$query = "select * from gderdb.users where username='".mysqli_real_escape_string($dbc, trim($uname))."'";
	$result = mysqli_query($dbc, $query);
	if (mysql_num_rows($result)>0) {
		return true;
	} else {
		return false;
	}
}

if ($_POST['mode']!="delete"){
	
	if ($_POST['mode']=="add"){
	if (isUsernameExists($_POST['TXTusername'])) {
		$msg .= "Username already taken\n";
		$isallOK = false;
	}
	}
	
	
	if (!isset($_POST['TXTusername'])){
		exit();
	} else {
		if(trim($_POST['TXTusername'])==''){
			$msg .= "Enter Username\n";
			$isallOK = false;
		}
	}
	
	if ($_POST['mode']=="add"){
		if (!isset($_POST['TXTpassword'])){
			exit();
		} else {
			if(trim($_POST['TXTpassword'])==''){
				$msg .= "Enter Password\n";
				$isallOK = false;
			}
		}
	}
	
	if (!isset($_POST['TXTname'])){
		exit();
	} else {
		if(trim($_POST['TXTname'])==''){
			$msg .= "Enter name\n";
			$isallOK = false;
		}
	}
}
echo $msg;

if ($isallOK){
	include('../modules/dbcon.php');
	if($_POST['mode']=="add") {	
		$query = "INSERT INTO gderdb.users (username, password, namae, user_level) 
				VALUES (
				'".mysql_real_escape_string($dbc, trim($_POST['TXTusername']))."',
				'".md5($_POST['TXTpassword'])."',
				'".mysql_real_escape_string($dbc, $_POST['TXTname'])."',
				'".mysql_real_escape_string($dbc, $_POST['TXTuserlevel'])."'
				)
				";
		$result = @mysqli_query($query,$dbc) or die(mysqli_error($dbc));
		$lid=mysqli_insert_id($dbc);
	} elseif ($_POST['mode']=="edit") {
		$query = "UPDATE gderdb.users SET 
					username='".mysqli_real_escape_string($dbc, $_POST['TXTusername'])."', ";
					if (trim($_POST['TXTpassword'])!='') {
						$query .= "password = '".md5($_POST['TXTpassword'])."', ";
					}
					$query .= "user_level = '".mysqli_real_escape_string($dbc, $_POST['TXTuserlevel'])."', 
								namae = '".mysqli_real_escape_string($dbc, $_POST['TXTname'])."'
							WHERE id = '".mysqli_real_escape_string($dbc, $_POST['pid'])."'";
		$result = @mysqli_query($dbc, $query) or die(mysqli_error($dbc));
	} else {
		$query = "DELETE FROM gderdb.users WHERE id = '".mysqli_real_escape_string($dbc, $_POST['pid'])."'";
		$result = @mysqli_query($dbc, $query) or die(mysqli_error($dbc));
	}
	if ($result) {
		echo "Success".$_POST['pid'];
	} else {
		echo "Failed";
	}	
}
?>