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


$prodcat = "";
$prodcode = "";
$prodname = "";
$desc = "";
$price = "0.00";
$showprice = "0";
$begbal = "0";
$critqty = "0";

if ($mode=='add'){
	include("../modules/dbcon.php");
	$query = "INSERT INTO gderdb.products (product_category_id, prod_code, prod_name, description, price, show_price, iscancelled, critqty) 
				VALUES ('','','','','','','1','0')";
	$result = @mysqli_query($dbc, $query) or die(mysqli_error($dbc));
	$id = mysqli_insert_id($dbc);	
	mkdir("../../images/products/".$id."/",0777);
}  elseif ($mode=='edit'){
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
		$critqty = $row['critqty'];
	}
}
?>

<div class="modal-header">
    <h5 class="modal-title">Products</h5>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
    <form class="form-horizontal" id="frmpost" enctype="multipart/form-data">
        <input type="hidden" id="TXTpid" value="<?php echo $id; ?>" name="pid" />
        <input type="hidden" id="TXTmode" value="<?php echo 'edit'; ?>" name="mode" />
        <div class="form-row mb-1">
            <select name="TXTprodcatid" class="form-control mb-2">
            	<?php 
				include("../modules/dbcon.php");
				$query = "SELECT * FROM product_category order by description";
				$result = mysqli_query($dbc, $query);
				while ($row=mysqli_fetch_array($result)){
					?>
                    <option value="<?php echo $row['id']; ?>" <?php if($mode=='edit' && $prodcat==$row['id']) { ?> selected="selected" <?php } ?>><?php echo $row['description']; ?></option>
                    <?php
				}
				?>
            </select>
            
            <input type="text" class="form-control mb-2" name="TXTprodcode" id="TXTprodcode" value="<?php echo $prodcode; ?>" placeholder="Product Code" style="font-weight:bold;">
            <input type="text" class="form-control mb-2" name="TXTprodname" id="TXTprodname" value="<?php echo $prodname; ?>" placeholder="Name" style="font-weight:bold;">
            <input type="text" class="form-control mb-2" name="TXTdesc" id="TXTdesc" value="<?php echo $desc; ?>" placeholder="Description" style="font-weight:bold;">
            <input type="text" class="form-control mb-2" name="TXTprice" id="TXTprice" value="<?php echo $price; ?>" placeholder="Price" style="font-weight:bold;">
            <input type="text" class="form-control mb-2" name="TXTcritqty" id="TXTcritqty" value="<?php echo $critqty; ?>" placeholder="Critical Quantity" style="font-weight:bold;">
            <input type="text" class="form-control mb-2" name="TXTbegbal" id="TXTbegbal" value="<?php echo $begbal; ?>" placeholder="Beginning Balance" style="font-weight:bold;">
            <input type="checkbox" name="CHKshowprice" id="CHKshowprice" <?php if($showprice=='1'){ ?>checked="checked"<?php } ?> >&nbsp;Show Price
        </div>
    </form>
    <div id="attachments_cont"></div> 
</div>
<div class="modal-footer m-0">
	<table border="0" width="100%" style="border-collapse:collapse;">
    	<tr>
        	<td class="pt-2">
            <form action = 'modules/attachments_upload.php' enctype='multipart/form-data' method='POST' id="uploadImage">
                <input type="hidden" id="TXTlid" value="0" name="lid" />
                <label class="btn btn-info btn-md"> <i class="fas fa-paperclip"></i>Attach File
                <input class='btn' type='file' name = 'images[]' multiple = 'multiple' id="uploadFile" accept=".pdf, .doc, .docx, .xls, .xlsx, .ppt, .pptx, .rar, .zip, .jpg, .jpeg, .png, .gif" />
                </label>
            </form>
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
		
		$.post("modules/product_r.php",$("form#frmpost").serialize(),function(d){
			if (d.substring(0,7)=='Success') {
				alert('Successfully Saved');
				$("#btnSave_prodcat").text("Save");
				$("#btnSave_prodcat").prop("disabled",false);
				$("#modal_prodcat").modal("hide");
				$("#table_here").load("modules/product_table.php");
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
<script>
$(document).ready(function(){
	$("#attachments_cont").load("modules/attachments_load.php?id=<?php echo $id; ?>")
	
		
	$("#uploadFile").change(function(){
		$("#uploadImage").submit();
	});
	
	$("#uploadImage").submit(function(event){
		$("#TXTlid").val($("#TXTpid").val());
		if ($("#uploadFile").val()){
			
			event.preventDefault();
			if ($("#TXTlid").val()!=0){
				$(this).ajaxSubmit({
					beforeSubmit:function(){
						$(".progress").show();
						$(".progressstat").html("0%");
					}, uploadProgress: function(event, position, total, percentageComplete){
						$(".progressstat").html(percentageComplete + "%");
					}, success:function(){
						$(".progress").hide();
						$("#attachments_cont").load("modules/attachments_load.php?id=<?php echo $id; ?>")
					},
					resetForm: true
				});
			} else {
				//alert("Please Select Section");
			}
		}
		return false;
	});
})
</script>