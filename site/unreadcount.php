<?php
session_start();
include("dbcon.php");
$query = "select count(m.id) cnt
	from msg m 
	inner join msg_for mf on mf.msg_id=m.id and mf.for_user='0' and isread='0' 
	where m.customer_id='".$_SESSION['GDERuid']."' 
	order by date_sent desc limit 1";
$result = mysqli_query($dbc, $query);
$row = mysqli_fetch_array($result);
echo $row['cnt'];
?>