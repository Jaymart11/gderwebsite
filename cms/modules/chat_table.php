<style>
.unread{
	background:#F00;
	color:#FFF;
	padding:2px 6px;
	font-size:9px;
	border-radius: 5px;
	margin-right:10px;
}
</style>
<?php
include("../modules/dbcon.php");
$query = "select *
		,(select content from msg m where m.customer_id=c.id order by date_sent desc limit 1) content
		,(select date_sent from msg m where m.customer_id=c.id order by date_sent desc limit 1) date_sent
		,(select count(m.id) from msg m inner join msg_for mf on mf.msg_id=m.id and mf.for_user='1' and isread='0' where m.customer_id=c.id order by date_sent desc limit 1) unread
		from customers c
		where c.id in (select customer_id from msg m)
		order by 10";
$result = mysqli_query($dbc, $query);
if (mysqli_num_rows($result)>0){
	?>
    <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
      <tr>
      	<th>Customer Name</th>
        <th>Message</th>
        <th>Date</th>
        <th>Action</th>
      </tr>
    </thead>
    <tfoot>
      <tr>
      	<th>Customer Name</th>
        <th>Message</th>
        <th>Date</th>
        <th>Action</th>
      </tr>
    </tfoot>
    <tbody>
    <?php
	while ($row = mysqli_fetch_array($result)){
		?>
        <tr>
        <td>
        	<?php if ($row['unread']>0) { ?>
        	<span class="unread"><?php echo $row['unread']; ?></span>
            <?php } ?>
			<?php echo $row['lname'].", ".$row['fname']." ".$row['mname']; ?>
        </td>
        <td><?php echo $row['content']; ?></td>
        <td><?php echo $row['date_sent']; ?></td>
        <td><button type="button" class="btn btn-primary btn-sm btnchat" id="btnchat_<?php echo $row['id']; ?>"><i class="fas fa-edit"></i> Chat</button>
	   
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
	
	$(".btnchat").click(function(){
		var id = $(this).attr("id").replace("btnchat_","");
		$("#modal_prodcat_content").load("modules/chat_form.php?mode=edit&cid=" + id);
		$("#modal_prodcat").modal({backdrop: 'static', keyboard: false});
	});
	
});
</script>