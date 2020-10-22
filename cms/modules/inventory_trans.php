<?php
$id = 0;
if (isset($_GET['id'])){
	$id = $_GET['id'];
}

include("../modules/dbcon.php");
$query = "select 'BegBal' transtype, p.beg_bal qty, '' date_trans
		from products p
		where p.id='".$id."'
		
		UNION
		
		select trans_type, qty, date_trans
		from product_trans
		where product_id='".$id."'
";
$result = mysqli_query($dbc, $query);
$rbal = 0;
if (mysqli_num_rows($result)>0){
	?>
    <div class="modal-header">
        <h5 class="modal-title">Transactions</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
          	<th>Date</th>
            <th>Trans. Type</th>
            <th>Quantity</th>
            <th>Running Bal.</th>
          </tr>
        </thead>

        <tbody>
        <?php
        while ($row = mysqli_fetch_array($result)){
			if ($row['transtype']=='purch' || $row['transtype']=='BegBal') {
			$rbal = $rbal + $row['qty'];
			} elseif ($row['transtype']=='sales') {
			$rbal = $rbal - $row['qty'];
			}
            ?>
            <tr>
            <td><?php echo $row['date_trans']; ?></td>
            <td><?php echo $row['transtype']; ?></td>
            <td><?php echo $row['qty']; ?></td>
            <td><?php echo $rbal ;?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
        </table>
        </div>
    </div>
    <?php
}
?>
<script>
$(document).ready(function() {
	$('#dataTable').DataTable();
});
</script>