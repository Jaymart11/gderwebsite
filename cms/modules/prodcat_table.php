<?php
include("../modules/dbcon.php");
$query = "SELECT * FROM product_category order by description";
$result = mysqli_query($dbc, $query);
if (mysqli_num_rows($result)>0){
	?>
    <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
      <tr>
        <th>Description</th>
        <th>Action</th>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <th>Description</th>
        <th>Action</th>
      </tr>
    </tfoot>
    <tbody>
    <?php
	while ($row = mysqli_fetch_array($result)){
		?>
        <tr>
        <td><?php echo $row['description']; ?></td>
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
		$("#modal_prodcat_content").load("modules/prodcat_form.php?mode=edit&id=" + id);
		$("#modal_prodcat").modal("show");
	});
	
	$(".btndelete").click(function(){
		var id = $(this).attr("id").replace("btndelete_","");
		$("#TXTdeletepid").val(id);
		$("#DeleteModal").modal("show");
		return false;
	});
	
	$("#btndeleteyes").off('click').on('click',function(){
		$.post("modules/prodcat_r.php",$("form#frmdelete").serialize(),function(d){
			if (d.substring(0,7)=='Success') {
				alert('Successfully Deleted');
				$("#DeleteModal").modal("hide");
				$("#table_here").load("modules/prodcat_table.php");
				return false;
			} else {
				alert(d);
			}
		});
	});
});
</script>