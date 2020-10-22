<div class="row">
    <?php
	$prodcatid = 0;
	if (isset($_GET['cat'])) {
		$prodcatid = $_GET['cat'];
	}
	$s = "";
	if (isset($_POST['HDNsearch'])) {
		$s = $_POST['HDNsearch'];
	}
	
	function safefile($s){
		$s= str_replace("#","%23",$s);
		$s= str_replace("'","%27",$s);
		$s= str_replace("+","%2B",$s);
		$s= str_replace("&","%26",$s);
		return $s;
	}
	
	include("dbcon.php");

	$query = "SELECT * FROM products ";
	$query .= "WHERE iscancelled='0' ";
	if ($prodcatid != 0) {
		$query .= "and product_category_id='".mysqli_real_escape_string($dbc, $prodcatid)."' ";
	}
	$query .= "and description like '%".mysqli_real_escape_string($dbc, $s)."%' ";
	
	$result = mysqli_query($dbc, $query);
	if (mysqli_num_rows($result)>0) {
		while($row = mysqli_fetch_array($result)){
			?>
            	
				<div class="col-lg-4 col-md-6 mb-4">
				<div class="card h-100">
				
				<?php
					$thumbdir = "../images/products/".$row['id']."/";
					$thumbdir2 = "../images/products/".$row['id']."/";
					
					if (is_dir($thumbdir)){
						$gallery = opendir($thumbdir);
						$cnt=0;
						$xmsg="";
						while(false !== ($file = readdir($gallery)))
						{
							if($file != '.' && $file != '..' && $file != 'Thumbs.db'  && $file != "actattach" && is_file($thumbdir.$file))
							{
								$cnt=$cnt+1;
								$file2 = safefile($file);
								if ($cnt==1) {
								?>
								<a href="./?page=proddet&id=<?php echo $row['id']; ?>"><img class="card-img-top" src="../images/products/<?php echo $row["id"]."/".$file2; ?>" alt=""></a>
								<?php
								}
							}
						} 
					}
				?>            
				  <div class="card-body">
					<h4 class="card-title">
					  <a href="./?page=proddet&id=<?php echo $row['id']; ?>"><?php echo $row['prod_name']; ?></a>
					</h4>
					<?php if($row['show_price']=='1') { ?>
					<h5><?php echo $row['price']; ?></h5>
					<?php } ?>
					<p class="card-text"><?php echo $row['description']; ?></p>
				  </div>
				  <div class="card-footer">
					<small class="text-muted">Prod. Code : <?php echo $row['prod_code']; ?></small>
				  </div>
				</div>
				</div>
			<?php
		}
	} else {
		?>
        
        <div class="alert alert-info w-100 text-center">
        <h4>No Products found</h4>
        </div>
        </div>
        <?php
	}
	?>
</div>