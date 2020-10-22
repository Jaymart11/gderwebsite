<section id="portfolio" class="bg-dark text-white">
<h2 class="text-center mt-0 pt-5">Our Products</h2>
      <hr class="divider my-4">
    <div class="container-fluid p-0">
      <div class="row no-gutters">
      	<?php
		include("dbcon.php");
		$query = "select p.*, pc.description pcd
				from products p
				inner join product_category pc on pc.id=p.product_category_id
				order by rand() limit 6
				";
		$result = mysqli_query($dbc, $query);
		while ($row = mysqli_fetch_array($result)){
			
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
                        <div class="col-lg-4 col-sm-6">
                          <a class="portfolio-box" href="./?page=proddet&id=<?php echo $row['id']; ?>">
                            <img class="img-fluid" src="../images/products/<?php echo $row["id"]."/".$file2; ?>" alt="" width="650" height="350">
                            <div class="portfolio-box-caption">
                              <div class="project-category text-white-50">
                                <?php echo $row['pcd']; ?>
                              </div>
                              <div class="project-name">
                                <?php echo $row['description']; ?>
                              </div>
                            </div>
                          </a>
                        </div>
						<?php
						}
					}
					
				} 
			}
		}
		?>
      </div>
    </div>
  </section>
    <section class="page-section bg-dark text-white">
    <div class="container text-center">
      <a class="btn btn-light btn-xl" href="./?page=products">See more Products</a>
    </div>
  </section>