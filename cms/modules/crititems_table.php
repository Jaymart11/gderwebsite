<?php
include("../modules/dbcon.php");
$query = "SELECT * FROM (
		SELECT pc.description category, p.* ,
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
			and p.critqty>'0'
				order by p.description
		) as x
where quantity<=critqty";
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
        <th>Crit. Qty</th>
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
        <th>Crit. Qty</th>
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
        <td><?php echo $row['critqty']; ?></td>
        <td><?php echo $row['quantity']; ?></td>
        
        <td><button type="button" class="btn btn-primary btn-sm btnpurch" id="btnpurch_<?php echo $row['id']; ?>"><i class="fas fa-shopping-cart"></i> Purchase</button>
	        <button type="button" class="btn btn-primary btn-sm btnsales" id="btnsales_<?php echo $row['id']; ?>"><i class="far fa-money-bill-alt"></i> Sales</button>
            <button type="button" class="btn btn-primary btn-sm btntrans" id="btntrans_<?php echo $row['id']; ?>">View Transactions</button>
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
	
	$(".btnpurch").click(function(){
		var id = $(this).attr("id").replace("btnpurch_","");
		$("#modal_prodcat_content").load("modules/inventory_form.php?mode=purch&id=" + id);
		$("#modal_prodcat").modal("show");
	});
	
	$(".btnsales").click(function(){
		var id = $(this).attr("id").replace("btnsales_","");
		$("#modal_prodcat_content").load("modules/inventory_form.php?mode=sales&id=" + id);
		$("#modal_prodcat").modal("show");
		return false;
	});
	
	$(".btntrans").click(function(){
		var id = $(this).attr("id").replace("btntrans_","");
		$("#modal_prodcat_content").load("modules/inventory_trans.php?id=" + id);
		$("#modal_prodcat").modal("show");
		return false;
	});
});
</script>