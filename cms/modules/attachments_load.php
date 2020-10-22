<?php
	if (!isset($_GET['id'])){exit();}

	$lid = $_GET['id'];


	function safefile($s){
		$s= str_replace("#","%23",$s);
		$s= str_replace("'","%27",$s);
		$s= str_replace("+","%2B",$s);
		$s= str_replace("&","%26",$s);
		return $s;
	}

	$thumbdir = "../../images/products/".$lid."/";
	$thumbdir2 = "../images/products/".$lid."/";
	
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
				$xmsg.='<form id="frm_'.$cnt.'" style="display:inline;">';
				$xmsg.="<a href='#' class='card-link deletefile' id='deletefile_".$cnt."'><div class='card attachment rounded-custom' data-toggle='tooltip' data-placement='top' title='".$file2."'><div class='card-body m-0 p-2 text-truncate' style='font-size:13px;'><i class='far fa-file-word mr-1'></i>".$file2."</div></div></a>";
				$xmsg.='<input type="hidden" value="'.$file.'" id="item_'.$cnt.'" name="item" />';
				$xmsg.='</form>';
			}
		} 
		if ($xmsg<>"") {
			?><?php
			echo "".$xmsg; 
			?><?php
		} else {
			
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
		$.post("modules/attachments_delete.php?lid=<?php echo $lid; ?>&cat=1",$("form#frm_" + fid).serialize(),function(d){
			$("#attachments_cont").html("<center><img src='../images/loading1.gif' /><br />Loading Attachments</center>");
			$("#attachments_cont").load("modules/attachments_load.php?id=<?php echo $lid; ?>");
			fid=0;
			return false;
		});
	});
});
//-->
</script>