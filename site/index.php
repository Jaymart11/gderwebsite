<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>GDER Furniture Enterprises</title>
    <link rel="icon" type="image/gif" href="img/gder_logo2.png" />
  <!-- Font Awesome Icons -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>

  <!-- Plugin CSS -->
  <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

  <!-- Theme CSS - Includes Bootstrap -->
  <link href="css/creative.min.css" rel="stylesheet">
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="js/jquery.form.js"></script>
</head>

<body id="page-top">
	<?php include("customer_registration.php"); ?>
    <?php include("login.php"); ?>
    <?php 
	if (isset($_SESSION['GDER'])) {
		include("user.php"); 
		include("chat.php"); 
	}
	?>
    <?php 
	$page = '';
	if (isset($_GET['page'])){
		$page = $_GET['page'];
	}
	?>
    <?php include("navigation.php"); ?>
    <?php
	switch($page){
		case '': include("home.php"); break;
		case 'products': include("products.php"); break;
		case 'proddet': include("proddet.php"); break;
	}
	?>
    <?php include("contactus.php"); ?>
    <?php include("footer.php"); ?>
    <!-- Bootstrap core JavaScript -->
    
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    
    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!--<script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>-->
    
    <!-- Custom scripts for this template -->
    <script src="js/creative.min.js"></script>

</body>

</html>
