<?php
include("../modules/dbcon.php");
$query = "SELECT * FROM customers";
$result = mysqli_query($dbc, $query);
if (mysqli_num_rows($result)>0){
	?>
    <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
      <tr>
      	<th>Name</th>
        <th>Email</th>
        <th>Contact No.</th>
        <th>Action</th>
      </tr>
    </thead>
    <tfoot>
      <tr>
      	<th>Name</th>
        <th>Email</th>
        <th>Contact No.</th>
        <th>Action</th>
      </tr>
    </tfoot>
    <tbody>
    <?php
	while ($row = mysqli_fetch_array($result)){
		?>
        <tr>
        <td><?php echo $row['lname'].", ".$row['fname']." ".$row['mname']; ?></td>
        <td><?php echo $row['emailadd']; ?></td>
        <td><?php echo $row['contactno']; ?></td>        
        <td><button type="button" class="btn btn-primary btn-sm btnedit" id="btnedit_<?php echo $row['id']; ?>"><i class="fas fa-edit"></i> Edit</button>
	        <button type="button" class="btn btn-primary btn-sm btnreset" id="btnresetpass_<?php echo $row['id']; ?>"><i class="fas fa-edit"></i> Reset Pass</button>
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
		$("#modal_prodcat_content").load("modules/customers_form.php?mode=edit&id=" + id);
		$("#modal_prodcat").modal("show");
	});
	
	$(".btnreset").click(function(){
		var id = $(this).attr("id").replace("btnresetpass_","");
		$("#modal_prodcat_content").load("modules/customers_resetpass.php?mode=edit&id=" + id);
		$("#modal_prodcat").modal("show");
	});

});
</script>