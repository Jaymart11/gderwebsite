<style>
.carousel-item {
  height: 100vh;
  min-height: 350px;
  background: no-repeat center center scroll;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
</style>
<header>
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
	<?php
        function safefile($s){
            $s= str_replace("#","%23",$s);
            $s= str_replace("'","%27",$s);
            $s= str_replace("+","%2B",$s);
            $s= str_replace("&","%26",$s);
            return $s;
        }
    
        $thumbdir = "../images/banner/";
        $thumbdir2 = "../images/banner/";
        
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
					$img .= '<div class="carousel-item '.($cnt==1?'active':'').'" style="background-image: url(\'../images/banner/'.$file2.'\')"></div>';
                }
            } 
        }
    ?>
    <ol class="carousel-indicators">
    	<?php echo $ind; ?>
    </ol>
    <div class="carousel-inner" role="listbox">
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

</header>
