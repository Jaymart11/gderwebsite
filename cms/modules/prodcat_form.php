<?php
$mode = "add";
$id = "0";

if (isset($_GET['mode'])){
	$mode = $_GET['mode'];
}
if (isset($_GET['id'])){
	$id = $_GET['id'];
}

$desc = "";
if ($mode=='edit'){
	include("../modules/dbcon.php");
	$query = "SELECT * FROM product_category WHERE id = '".mysqli_real_escape_string($dbc, $id)."'";
	$result = mysqil_query($dbc, $query);
	if (mysqli_num_rows($result)>0){
		$row = mysqli_fetch_array($result);
		$desc = $row['description'];
	}
}
?>

<div class="modal-header">
    <h5 class="modal-title">Product Category</h5>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
    <form class="form-horizontal" id="frmpost" enctype="multipart/form-data">
        <input type="hidden" id="TXTpid" value="<?php echo $id; ?>" name="pid" />
        <input type="hidden" id="TXTmode" value="<?php echo $mode; ?>" name="mode" />
        <div class="form-row mb-1">
            <input type="text" class="form-control" name="TXTdesc" id="TXTdesc" value="<?php echo $desc; ?>" placeholder="Description" style="font-weight:bold;">
        </div>
    </form>
</div>
<div class="modal-footer m-0">
    <button type="button" class="btn btn-secondary btn-md" data-dismiss="modal">Cancel</button>
    <button type="button" class="btn btn-primary btn-md" id="btnSave_prodcat">Save</button>
</div>
<script>
<!--
$(document).ready(function(){
	$("#btnSave_prodcat").click(function(){
		
		$(this).prop("disabled",true);
		$(this).text("Saving...");
		
		$.post("modules/prodcat_r.php",$("form#frmpost").serialize(),function(d){
			if (d.substring(0,7)=='Success') {
				alert('Successfully Saved');
				$("#btnSave_prodcat").text("Save");
				$("#btnSave_prodcat").prop("disabled",false);
				$("#modal_prodcat").modal("hide");
				$("#table_here").load("modules/prodcat_table.php");
				//window.location = "./?page=posts";	
			} else {
				alert(d);
				$("#btnSave_prodcat").text("Save");
				$("#btnSave_prodcat").prop("disabled",false);
			}
		});
	});
});
//-->
</script>