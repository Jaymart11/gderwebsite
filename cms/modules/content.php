<?php 
$page = "";
if (isset($_GET['page'])) {
	$page = $_GET['page'];
}

$mod = "";
if (isset($_GET['mod'])) {
	$mod = $_GET['mod'];
}
?>
<body id="page-top">
	<?php include("modules/header.php"); ?>
    <div id="wrapper">
		<?php include("modules/sidebar.php"); ?>
        <div id="content-wrapper">
            <div class="container-fluid">
            	<?php
					switch($page){
						case '': include("home.php"); break;
						case 'prodcat': include("prodcat.php"); break;
						//case 'prodcat': include("tables.html"); break;
						case 'prod': include("product.php"); break;
						case 'users': include("users.php"); break;
						case 'banner': include("banner.php"); break;
						case 'inventory': include("inventory.php"); break;
						case 'crititems': include("crititems.php"); break;
						case 'inquiries': include("inquiries.php"); break;
						case 'customers': include("customers.php"); break;
						case 'chat': include("chat.php"); break;
						default: include("error404.php"); break;
					}
				?>
            </div>
            <?php include("modules/footer.php"); ?>
        </div>
    </div>

	<?php include("modules/modal.php"); ?>
	<script src="vendor/datatables/jquery.dataTables.js"></script>
	<script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin.min.js"></script>
</body>
