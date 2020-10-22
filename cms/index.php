<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>CMS GDER</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <link href="css/css.css" rel="stylesheet">
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="js/jquery.form.js"></script>
    <script src="js/imagesloaded.pkgd.js"></script>
</head>
<?php 
if (isset($_SESSION['GDER']) && $_SESSION['GDER']=='1'){ 
?>
<body>
<?php
	include("modules/content.php");
?>
</body>
<?php
} else {
	include("modules/login.php");
}
?>
</html>
