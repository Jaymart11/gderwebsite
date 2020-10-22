<style>
#uploadFile{
	display:none;
}
</style>
<?php
$mode = "purch";
$id = "0";

if (isset($_GET['mode'])){
	$mode = $_GET['mode'];
}
if (isset($_GET['id'])){
	$id = $_GET['id'];
}


$prodcat = "";
$prodcode = "";
$prodname = "";
$desc = "";
$price = "0.00";
$showprice = "0";
$begbal = "0";

include("../modules/dbcon.php");
$query = "SELECT * FROM products WHERE id = '".mysqli_real_escape_string($dbc, $id)."'";
$result = mysqli_query($dbc, $query);
if (mysqli_num_rows($result)>0){
	$row = mysqli_fetch_array($result);
	$prodcat = $row['product_category_id'];
	$prodcode = $row['prod_code'];
	$prodname = $row['prod_name'];
	$desc = $row['description'];
	$price = $row['price'];
	$showprice = $row['show_price'];
	$begbal = $row['beg_bal'];
}
?>

<div class="modal-header">
    <h5 class="modal-title">
    <?php if ($mode=='purch') {?>
    Purchases
    <?php } else { ?>
    Sales
    <?php } ?>
    </h5>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
    <form class="form-horizontal" id="frmpost" enctype="multipart/form-data">
        <input type="hidden" id="TXTpid" value="<?php echo $id; ?>" name="pid" />
        <input type="hidden" id="TXTmode" value="<?php echo $mode; ?>" name="mode" />
        <div class="form-row mb-1">
            Prod Details
            <input type="text" class="form-control mb-2" name="TXTprodcode" id="TXTprodcode" value="<?php echo $prodcode; ?>" placeholder="Product Code" style="font-weight:bold;" readonly="readonly">
            <input type="text" class="form-control mb-2" name="TXTprodname" id="TXTprodname" value="<?php echo $prodname; ?>" placeholder="Name" style="font-weight:bold;" readonly="readonly">
            <input type="text" class="form-control mb-2" name="TXTdesc" id="TXTdesc" value="<?php echo $desc; ?>" placeholder="Description" style="font-weight:bold;" readonly="readonly">
            Quantity
            <input type="text" class="form-control mb-2" name="TXTqty" id="TXTqty" value="0" placeholder="Quantity" style="font-weight:bold;">
        </div>
    </form>
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
		
		$.post("modules/inventory_r.php",$("form#frmpost").serialize(),function(d){
			if (d.substring(0,7)=='Success') {
				alert('Successfully Saved');
				$("#btnSave_prodcat").text("Save");
				$("#btnSave_prodcat").prop("disabled",false);
				$("#modal_prodcat").modal("hide");
				$("#table_here").load("modules/inventory_table.php");
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