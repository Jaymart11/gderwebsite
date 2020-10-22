<?php session_start(); if ($_SESSION['GDERulvl']!='1') { exit(); } ?>
<?php
include("../modules/dbcon.php");
$query = "SELECT * FROM users order by namae";
$result = mysqli_query($dbc, $query);
if (mysqli_num_rows($result)>0){
	?>
    <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
      <tr>
      	<th>Username</th>
        <th>Name</th>
        <th>Level</th>
        <th>Action</th>
      </tr>
    </thead>
    <tfoot>
      <tr>
      	<th>Username</th>
        <th>Name</th>
        <th>Level</th>
        <th>Action</th>
      </tr>
    </tfoot>
    <tbody>
    <?php
	while ($row = mysqli_fetch_array($result)){
		?>
        <tr>
        <td><?php echo $row['username']; ?></td>
        <td><?php echo $row['namae']; ?></td>
        <td><?php echo ($row['user_level']=="1"?"Super Admin":"Admin"); ?></td>
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
		$("#modal_prodcat_content").load("modules/users_form.php?mode=edit&id=" + id);
		$("#modal_prodcat").modal("show");
	});
	
	$(".btndelete").click(function(){
		var id = $(this).attr("id").replace("btndelete_","");
		$("#TXTdeletepid").val(id);
		$("#DeleteModal").modal("show");
		return false;
	});
	
	$("#btndeleteyes").off('click').on('click',function(){
		$.post("modules/users_r.php",$("form#frmdelete").serialize(),function(d){
			if (d.substring(0,7)=='Success') {
				alert('Successfully Deleted');
				$("#DeleteModal").modal("hide");
				$("#table_here").load("modules/users_table.php");
				return false;
			} else {
				alert(d);
			}
		});
	});
});
</script>