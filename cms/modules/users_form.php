<?php session_start(); if ($_SESSION['GDERulvl']!='1') { exit(); } ?>
<style>
#uploadFile{
	display:none;
}
</style>
<?php
$mode = "add";
$id = "0";
$username = "";
$namae = "";


if (isset($_GET['mode'])){
	$mode = $_GET['mode'];
}
if (isset($_GET['id'])){
	$id = $_GET['id'];
}


if ($mode=='add'){
/*	include("../modules/dbcon.php");
	$query = "INSERT INTO gderdb.products (product_category_id, prod_code, prod_name, description, price, show_price, iscancelled) 
				VALUES ('','','','','','','1')";
	$result = @mysql_query($query,$dbc) or die(mysql_error());
	$id = mysql_insert_id();	
	mkdir("../../images/products/".$id."/",0777);*/
	
}  elseif ($mode=='edit'){
	include("../modules/dbcon.php");
	$query = "SELECT * FROM users WHERE id = '".mysqli_real_escape_string($dbc, $id)."'";
	$result = mysqli_query($dbc, $query);
	if (mysqli_num_rows($result)>0){
		$row = mysqli_fetch_array($result);
		$id = $row['id'];
		$username = $row['username'];
		$namae = $row['namae'];
	}
}
?>

<div class="modal-header">
    <h5 class="modal-title">Users</h5>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
    <form class="form-horizontal" id="frmpost" enctype="multipart/form-data">
        <input type="hidden" id="TXTpid" value="<?php echo $id; ?>" name="pid" />
        <input type="hidden" id="TXTmode" value="<?php echo $mode; ?>" name="mode" />
        <div class="form-row mb-1">    
        	<select name="TXTuserlevel" class="form-control mb-2">
				<option value="1"<?php if($mode=='edit' && $row['user_level']=='1') { ?> selected="selected" <?php } ?>>Super Admin</option>
                <option value="2"<?php if($mode=='edit' && $row['user_level']=='2') { ?> selected="selected" <?php } ?>>Admin</option>
            </select>        
            <input type="text" class="form-control mb-2" name="TXTusername" id="TXTusername" value="<?php echo $username; ?>" placeholder="Username" style="font-weight:bold;" <?php if($mode=='edit'){ ?> readonly="readonly"<?php } ?>>
            <input type="password" class="form-control mb-2" name="TXTpassword" id="TXTpassword" value="" placeholder="Password" style="font-weight:bold;">
            <input type="text" class="form-control mb-2" name="TXTname" id="TXTname" value="<?php echo $namae; ?>" placeholder="Name" style="font-weight:bold;">
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
		
		$.post("modules/users_r.php",$("form#frmpost").serialize(),function(d){
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