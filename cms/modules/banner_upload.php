<?php
	$lid = $_POST['lid'];
	
	$dir = "../../images/banner/";
	$counting =1;
	$allimg =0;

	foreach ($_FILES["images"]["name"] as $k=>$name) {
		$allimg++;
		$imgname = $_FILES["images"]["name"][$k];
		$sizeimg = $_FILES["images"]["size"][$k];
		$tmpname = $_FILES["images"]["tmp_name"][$k];
		$ext = explode('.', $imgname);
	 	$actualExt = strtolower(end($ext));
	 	$maxfilesize = 250 * 1024 * 1024; 
		//2MB -> 2097152 bytes
		//20MB -> 20971520 bytes
		//50 MB -> 52428800 bytes 
		$extension = strtolower(pathinfo($dir.$imgname,PATHINFO_EXTENSION));
		//1.
		$allowed = array('png','jpg','jpeg','gif','PNG','JPG','JPEG');

		if(in_array($actualExt,$allowed)){
		  if($sizeimg < 524288009999999999){ //3.
		  	if(!file_exists($dir.$imgname)){
		  	  if(move_uploaded_file($tmpname,$dir.$imgname)){
				$counting++;
			  }	
		  	}
		  }
	    }
	}
	exit();
?>
