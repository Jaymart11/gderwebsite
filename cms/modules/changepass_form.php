<style>
#uploadFile{
	display:none;
}
</style>

<div class="modal-header">
    <h5 class="modal-title">Change Password</h5>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
    <form class="form-horizontal" id="frmpost" enctype="multipart/form-data">
        <div class="form-row mb-1">         
            <input type="password" class="form-control mb-2" name="TXTpassold" id="TXTpassold" value="" placeholder="Current Password" style="font-weight:bold;">
            <input type="password" class="form-control mb-2" name="TXTpassnew1" id="TXTpassnew1" value="" placeholder="New Password" style="font-weight:bold;">
            <input type="password" class="form-control mb-2" name="TXTpassnew2" id="TXTpassnew2" value="" placeholder="Re-enter New Password" style="font-weight:bold;">
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
		
		$.post("modules/changepass_r.php",$("form#frmpost").serialize(),function(d){
			if (d.substring(0,7)=='Success') {
				alert('Successfully Saved');
				$("#btnSave_prodcat").text("Save");
				$("#btnSave_prodcat").prop("disabled",false);
				$("#modal_prodcat").modal("hide");
				$("#table_here").load("modules/users_table.php");
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