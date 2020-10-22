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
/*	include("../modules/dbcon.php");
	$query = "INSERT INTO gderdb.products (product_category_id, prod_code, prod_name, description, price, show_price, iscancelled, critqty) 
				VALUES ('','','','','','','1','0')";
	$result = @mysql_query($query,$dbc) or die(mysql_error());
	$id = mysql_insert_id();	
	mkdir("../../images/products/".$id."/",0777);*/
}  elseif ($mode=='edit'){
	include("dbcon.php");
	$query = "SELECT * FROM customers WHERE id = '".mysqli_real_escape_string($dbc, $id)."'";
	$result = mysqli_query($dbc, $query);
	if (mysqli_num_rows($result)>0){
		$row = mysqli_fetch_array($result);
		$fname = $row['fname'];
		$mname= $row['mname'];
		$lname = $row['lname'];
		$email = $row['emailadd'];
		$contact= $row['contactno'];
		$isactive = $row['isactive'];
	}
}
?>

<div class="modal-header">
    <h5 class="modal-title">Customers</h5>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
    <form class="form-horizontal" id="frmpost" enctype="multipart/form-data">
        <input type="hidden" id="TXTpid" value="<?php echo $id; ?>" name="pid" />
        <input type="hidden" id="TXTmode" value="<?php echo 'edit'; ?>" name="mode" />
        <div class="form-row mb-1">      
            <table style="width:100%;">
                <tr>
                    <td>Firstname</td>
                    <td><input type="text" class="form-control mb-2" name="TXTfname" id="TXTfname" value="<?php echo $fname; ?>" style="font-weight:bold;"></td>
                </tr>
                <tr>
                    <td>Middlename</td>
                    <td><input type="text" class="form-control mb-2" name="TXTmname" id="TXTmname" value="<?php echo $mname; ?>" style="font-weight:bold;"></td>
                </tr>
                <tr>
                    <td>Lastname</td>
                    <td><input type="text" class="form-control mb-2" name="TXTlname" id="TXTlname" value="<?php echo $lname; ?>" style="font-weight:bold;"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="text" class="form-control mb-2" name="TXTemail" id="TXTemail" value="<?php echo $email; ?>" style="font-weight:bold;"></td>
                </tr>
                <tr>
                    <td>Contact no.</td>
                    <td><input type="text" class="form-control mb-2" name="TXTcontact" id="TXTcontact" value="<?php echo $contact; ?>" style="font-weight:bold;"></td>
                </tr>
                <tr>
                	<td colspan="2">
                   	 <input type="checkbox" name="CHKactive" id="CHKactive" <?php if($isactive=='1'){ ?>checked="checked"<?php } ?> >&nbsp;Active
                    </td>
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
		
		$.post("modules/customers_r.php",$("form#frmpost").serialize(),function(d){
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