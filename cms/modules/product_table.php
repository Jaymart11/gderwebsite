<?php
include("../modules/dbcon.php");
$query = "SELECT pc.description category, p.*,
		p.beg_bal
		+
		coalesce((
		select sum(qty) from product_trans
		where trans_type='purch'
		and product_id=p.id
		),0)
		-
		coalesce((
		select sum(qty) from product_trans
		where trans_type='sales'
		and product_id=p.id
		),0) quantity
		FROM products p 
		INNER JOIN product_category pc on pc.id=p.product_category_id
		WHERE p.iscancelled='0'
		order by p.description";
$result = mysqli_query($dbc, $query);
if (mysqli_num_rows($result)>0){
	?>
    <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
      <tr>
      	<th>Product Category</th>
        <th>Product Code</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price/Shown</th>
        <th>Quantity</th>
        <th>Action</th>
      </tr>
    </thead>
    <tfoot>
      <tr>
      	<th>Product Category</th>
        <th>Product Code</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price/Shown</th>
        <th>Quantity</th>
        <th>Action</th>
      </tr>
    </tfoot>
    <tbody>
    <?php
	while ($row = mysqli_fetch_array($result)){
		?>
        <tr>
        <td><?php echo $row['category']; ?></td>
        <td><?php echo $row['prod_code']; ?></td>
        <td><?php echo $row['prod_name']; ?></td>
        <td><?php echo $row['description']; ?></td>
        <td><?php echo $row['price']; ?> - <?php echo ($row['show_price']=='1'?"Yes":"No"); ?></td>
        <td><?php echo $row['quantity']; ?></td>
        
        <td><button type="button" class="btn btn-primary btn-sm btnedit" id="btnedit_<?php echo $row['id']; ?>"><i class="fas fa-edit"></i> Edit</button>
	        <button type="button" class="btn btn-primary btn-sm btndelete" id="btndelete_<?php echo $row['id']; ?>"><i class="fas fa-trash-alt"></i> Delete</button>
        </td>
        </tr>
        <?php
	}
	?>
    </tbody>
    </table>
    </div>
    <?php
}
?>
           
<script>
$(document).ready(function() {
	$('#dataTable').DataTable();
	
	$(".btnedit").click(function(){
		var id = $(this).attr("id").replace("btnedit_","");
		$("#modal_prodcat_content").load("modules/product_form.php?mode=edit&id=" + id);
		$("#modal_prodcat").modal("show");
	});
	
	$(".btndelete").click(function(){
		var id = $(this).attr("id").replace("btndelete_","");
		$("#TXTdeletepid").val(id);
		$("#DeleteModal").modal("show");
		return false;
	});
	
	$("#btndeleteyes").off('click').on('click',function(){
		$.post("modules/product_r.php",$("form#frmdelete").serialize(),function(d){
			if (d.substring(0,7)=='Success') {
				alert('Successfully Deleted');
				$("#DeleteModal").modal("hide");
				$("#table_here").load("modules/product_table.php");
				return false;
			} else {
				alert(d);
			}
		});
	});
});
</script>