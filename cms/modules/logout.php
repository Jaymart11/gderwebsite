<?php
	session_start();
	if (isset($_SESSION['GDER']) && $_SESSION['GDER']=='1'){
		session_destroy();
		header("location: ../");
		exit();
	}
?>