<?php
$prodcatid = 0;
if (isset($_GET['cat'])) {
	$prodcatid = $_GET['cat'];
}
?>
<section id="portfolio" class="bg-dark text-white">
<h2 class="text-center mt-0 pt-5">Our Products</h2>
  <hr class="divider my-4">
</section>
  <div class="container">
    <div class="row">
      <div class="col-lg-3">
        <h1 class="my-4">Category</h1>
        <div class="list-group">
          <a href="./?page=products" class="list-group-item">All</a>
          <?php 
			include("dbcon.php");
			$query = "SELECT * FROM product_category order by description";
			$result = mysqli_query($dbc, $query);
			while($row = mysqli_fetch_array($result)){
				?>
                <a href="./?page=products&cat=<?php echo $row['id']; ?>" class="list-group-item"><?php echo $row['description']; ?></a>
				<?php
			}
			?>
        </div>
      </div>

      <div class="col-lg-9">
	    <form class="form-horizontal" id="frmsearch" enctype="multipart/form-data">
      		<input type="hidden" class="form-control mb-2" name="HDNsearch" id="HDNsearch" value="" placeholder="Search" style="font-weight:bold;">
        </form>
        <input type="text" class="form-control mb-2" name="TXTsearch" id="TXTsearch" value="" placeholder="Search" style="font-weight:bold;">
        <?php
			$query = "select * from product_category where id='".mysqli_real_escape_string($dbc, $prodcatid)."'";
			$result = mysqli_query($dbc, $query);
			if (mysqli_num_rows($result)>0) {
				$row = mysqli_fetch_array($result);
				?>
				<h3><?php echo $row['description']; ?></h3>
				<?php
			}
		?>
        <div id="productlist_cont"></div>
      </div>
    </div>
  </div>
  <!-- /.container -->
<?php include("about.php"); ?>
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  
  <script>
  <!--
	$(document).ready(function(){
		$("#productlist_cont").load("products_list.php?cat=<?php echo $prodcatid; ?>");
		
		$("#TXTsearch").keyup(function(e) {
			if (e.which == 13){
				$("#HDNsearch").val($("#TXTsearch").val());
				$.post("products_list.php",$("form#frmsearch").serialize(),function(d){
					$("#productlist_cont").html(d);
				});
			} else if (e.which == 8){
				if ($("#TXTsearch").val()==""){
					$("#productlist_cont").load("products_list.php?cat=<?php echo $prodcatid; ?>");
				}
			}
		});
	})
  //-->
  </script>
