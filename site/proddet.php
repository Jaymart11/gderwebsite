<?php
$prodid = 0;
if (isset($_GET['id'])) {
	$prodid = $_GET['id'];
}
?>

<section id="portfolio" class="bg-dark text-white py-3">
<?php
include("dbcon.php");
$query = "select * from products where id='".mysqli_real_escape_string($dbc, $prodid)."'";
$result = mysqli_query($dbc, $query);
if (mysqli_num_rows($result)>0){
	$row = mysqli_fetch_array($result);
?>
	<h2 class="text-center mt-0 pt-5"><?php echo $row['prod_name']?></h2>
	<hr class="divider my-4">


<div id="carouselExampleIndicators" class="carousel slide my-4">
	<?php
        function safefile($s){
            $s= str_replace("#","%23",$s);
            $s= str_replace("'","%27",$s);
            $s= str_replace("+","%2B",$s);
            $s= str_replace("&","%26",$s);
            return $s;
        }
    
        $thumbdir = "../images/products/".$prodid."/";
        $thumbdir2 = "../images/products/".$prodid."/";
        
        if (is_dir($thumbdir)){
            $gallery = opendir($thumbdir);
            $cnt=0;
            $ind="";
			$img = "";
            while(false !== ($file = readdir($gallery)))
            {
                if($file != '.' && $file != '..' && $file != 'Thumbs.db'  && $file != "actattach" && is_file($thumbdir.$file))
                {
                    $cnt=$cnt+1;
                    $file2 = safefile($file);
					$ind .= '<li data-target="#carouselExampleIndicators" data-slide-to="'.($cnt-1).'" '.($cnt==1?'class="active"':'').'></li> ';
					$img .= '<div class="carousel-item '.($cnt==1?'active':'').'"><img class="img-fluid" src="../images/products/'.$prodid.'/'.$file2.'" alt="First slide"></div>';
                }
            } 
        }
    ?>
  <ol class="carousel-indicators">
		<?php echo $ind; ?>
  </ol>
  <div class="carousel-inner" role="listbox" style="text-align:center;">
  <?php echo $img; ?>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</section>
<section id="portfolio" class="py-5" >
    <div class="container">
        <div>
        <h2><?php echo $row['prod_code']; ?></h2>
        </div>
        <div>
        <h5><?php echo $row['description']; ?></h5>
        </div>
        <?php
        if ($row['show_price']=='1') {
            ?>
            <div>
            <?php echo $row['price']; ?>
            </div>
            <?php
        }
        ?>
    </div>
</section>
<?php } ?>
<?php include("about.php"); ?>

