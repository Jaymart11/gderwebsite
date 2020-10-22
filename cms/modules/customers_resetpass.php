<style>
#uploadFile{
	display:none;
}
</style>
<?php
$mode = "add";
$id = "0";

if (isset($_GET['mode'])){
	$mode = $_GET['mode'];
}
if (isset($_GET['id'])){
	$id = $_GET['id'];
}
?>

<div class="modal-header">
    <h5 class="modal-title">Customer Reset Password</h5>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
    <form class="form-horizontal" id="frmpost" enctype="multipart/form-data">
        <input type="hidden" id="TXTpid" value="<?php echo $id; ?>" name="pid" />
        <input type="hidden" id="TXTmode" value="<?php echo 'edit'; ?>" name="mode" />
        <div class="form-row mb-1">      
            <table style="width:100%;">
                <tr>
                    <td>Password</td>
                    <td><input type="password" class="form-control mb-2" name="TXTpassword" id="TXTpassword" value="" style="font-weight:bold;"></td>
                </tr>
                <tr>
                    <td>Retype Password</td>
                    <td><input type="password" class="form-control mb-2" name="TXTvpassword" id="TXTvpassword" value="" style="font-weight:bold;"></td>
                </tr>
            </table>
        </div>
    </form>
    <div id="attachments_cont"></div> 
</div>
<div class="modal-footer m-0">
	<table border="0" width="100%" style="border-collapse:collapse;">
    	<tr>
        	<td class="pt-2">
            </td>
            <td align="right">
            	<button type="button" class="btn btn-secondary btn-md" data-dismiss="modal">Cancel</button>
			    <button type="button" class="btn btn-primary btn-md" id="btnSave_prodcat">Save</button>
            </td>
        </tr>
    </table>
    

    
</div>
<script>
<!--
$(document).ready(function(){
	$("#btnSave_prodcat").click(function(){
		
		$(this).prop("disabled",true);
		$(this).text("Saving...");
		
		$.post("modules/customers_resetpass_r.php",$("form#frmpost").serialize(),function(d){
			if (d.substring(0,7)=='Success') {
				alert('Successfully Saved');
				$("#btnSave_prodcat").text("Save");
				$("#btnSave_prodcat").prop("disabled",false);
				$("#modal_prodcat").modal("hide");
				$("#table_here").load("modules/customers_table.php");
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