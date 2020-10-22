<?php
	function safefile($s){
		$s= str_replace("#","%23",$s);
		$s= str_replace("'","%27",$s);
		$s= str_replace("+","%2B",$s);
		$s= str_replace("&","%26",$s);
		return $s;
	}

	$thumbdir = "../../images/banner/";
	$thumbdir2 = "../images/banner/";
	
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
				?>
                <form id="frm_<?php echo $cnt; ?>" style="display:inline;">
                <a href='#' class='card-link deletefile' id='deletefile_<?php echo $cnt; ?>'>
                <img src="../images/banner/<?php echo $file2; ?>" width="200" />
                </a>
                <input type="hidden" value="<?php echo $file; ?>" id="item_<?php echo $cnt; ?>" name="item" />
                </form>
                <?php
			}
		} 
	}
?>
<script type="text/javascript">
<!--
$(document).ready(function(){
	var fid = 0;
	
	$(".deletefile").click(function(){
		fid = $(this).attr("id").split("_")[1];
		$("#DelAttachModal").modal("show");
		return false;
	});
	
	$("#btndelattach").click(function(){
		$("#DelAttachModal").modal("hide");
		$.post("modules/banner_delete.php",$("form#frm_" + fid).serialize(),function(d){
			$("#banner_cont").html("<center><img src='../images/loading.gif' /><br />Loading Attachments</center>");
			$("#banner_cont").load("modules/banner_load.php");
			fid=0;
			return false;
		});
	});
});
//-->
</script>