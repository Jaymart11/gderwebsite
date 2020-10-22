<?php
include("../modules/dbcon.php");
$query = "SELECT * FROM contactus c order by date_trans desc;";
$result = mysqli_query($dbc, $query);
if (mysqli_num_rows($result)>0){
	?>
    <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
      <tr>
      	<th>Name</th>
        <th>Email</th>
        <th>Message</th>
        <th>Action</th>
      </tr>
    </thead>
    <tfoot>
      <tr>
		<th>Name</th>
        <th>Email</th>
        <th>Message</th>
        <th>Action</th>
      </tr>
    </tfoot>
    <tbody>
    <?php
	while ($row = mysqli_fetch_array($result)){
		?>
        <tr>
        <td><?php echo $row['namae']; ?></td>
        <td id="txtemail_<?php echo $row['id']; ?>"><?php echo $row['email']; ?></td>
        <td><?php echo $row['message']; ?></td>        
        <td><button type="button" class="btn btn-primary btn-sm btnreply" id="btnreply_<?php echo $row['id']; ?>">Send Reply</button>
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
	
	$(".btnreply").click(function(){
		var id = $(this).attr("id").replace("btnreply_","");
		window.open ("mailto://" + $("#txtemail_" + id).text())
		/*$("#modal_prodcat_content").load("modules/inventory_trans.php?id=" + id);
		$("#modal_prodcat").modal("show");*/
		return false;
	});
});
</script>