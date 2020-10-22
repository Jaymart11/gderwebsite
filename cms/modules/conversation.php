<style>
	.chat{
			margin-top: auto;
			margin-bottom: auto;
		}
		.card{
			height: 500px;
			border-radius: 15px !important;
			background-color: rgba(0,0,0,0.4) !important;
		}
		.contacts_body{
			padding:  0.75rem 0 !important;
			overflow-y: auto;
			white-space: nowrap;
		}
		.msg_card_body{
			overflow-y: auto;
		}
		.card-header{
			border-radius: 15px 15px 0 0 !important;
			border-bottom: 0 !important;
		}
	 .card-footer{
		border-radius: 0 0 15px 15px !important;
			border-top: 0 !important;
	}
		.container{
			align-content: center;
		}
		.search{
			border-radius: 15px 0 0 15px !important;
			background-color: rgba(0,0,0,0.3) !important;
			border:0 !important;
			color:white !important;
		}
		.search:focus{
		     box-shadow:none !important;
           outline:0px !important;
		}
		.type_msg{
			background-color: rgba(0,0,0,0.3) !important;
			border:0 !important;
			color:white !important;
			height: 60px !important;
			overflow-y: auto;
		}
			.type_msg:focus{
		     box-shadow:none !important;
           outline:0px !important;
		}
		.attach_btn{
	border-radius: 15px 0 0 15px !important;
	background-color: rgba(0,0,0,0.3) !important;
			border:0 !important;
			color: white !important;
			cursor: pointer;
		}
		.send_btn{
	border-radius: 0 15px 15px 0 !important;
	background-color: rgba(0,0,0,0.3) !important;
			border:0 !important;
			color: white !important;
			cursor: pointer;
		}
		.search_btn{
			border-radius: 0 15px 15px 0 !important;
			background-color: rgba(0,0,0,0.3) !important;
			border:0 !important;
			color: white !important;
			cursor: pointer;
		}
		.contacts{
			list-style: none;
			padding: 0;
		}
		.contacts li{
			width: 100% !important;
			padding: 5px 10px;
			margin-bottom: 15px !important;
		}
		.user_img{
			height: 70px;
			width: 70px;
			border:1.5px solid #f5f6fa;
		
		}
		.user_img_msg{
			height: 40px;
			width: 40px;
			border:1.5px solid #f5f6fa;
		
		}
	.img_cont{
			position: relative;
			height: 70px;
			width: 70px;
	}
	.img_cont_msg{
			height: 40px;
			width: 40px;
	}
	.online_icon{
		position: absolute;
		height: 15px;
		width:15px;
		background-color: #4cd137;
		border-radius: 50%;
		bottom: 0.2em;
		right: 0.4em;
		border:1.5px solid white;
	}
	.offline{
		background-color: #c23616 !important;
	}
	.user_info{
		margin-top: auto;
		margin-bottom: auto;
		margin-left: 15px;
	}
	.user_info span{
		font-size: 20px;
		color: white;
	}
	.user_info p{
	font-size: 10px;
	color: rgba(255,255,255,0.6);
	}
	.video_cam{
		margin-left: 50px;
		margin-top: 5px;
	}
	.video_cam span{
		color: white;
		font-size: 20px;
		cursor: pointer;
		margin-right: 20px;
	}
	.msg_cotainer{
		margin-top: auto;
		margin-bottom: auto;
		margin-left: 10px;
		border-radius: 25px;
		background-color: #82ccdd;
		padding: 10px;
		position: relative;
		min-width:150px;
	}
	.msg_cotainer_send{
		margin-top: auto;
		margin-bottom: auto;
		margin-right: 10px;
		border-radius: 25px;
		background-color: #78e08f;
		padding: 10px;
		position: relative;
		min-width:150px;
		text-align:right;
	}
	.msg_time{
		position: absolute;
		left: 0;
		bottom: -15px;
		color: rgba(0,0,0,0.5);
		font-size: 10px;
	}
	.msg_time_send{
		position: absolute;
		right:0;
		bottom: -15px;
		color: rgba(0,0,0,0.5);
		font-size: 10px;
	}
	.msg_head{
		position: relative;
	}
</style>
<?php
$cid = 0;
if (isset($_GET['cid'])) {
	$cid = $_GET['cid'];
}


session_start();
include("dbcon.php");

$query = "UPDATE msg_for set isread='1' where for_user='1'
			and msg_id in (select id from msg where customer_id='".mysqli_real_escape_string($dbc, $cid)."')";
mysqli_query($dbc, $query);

$query = "select m.*, mf.from_user
	from msg_for mf
	inner join msg m on m.id=mf.msg_id
	where mf.for_user='1'
	and m.customer_id='".mysqli_real_escape_string($dbc, $cid)."'
	order by date_sent asc";
$result = mysqli_query($dbc, $query);
?>
<div class="card-body msg_card_body">
<?php
while ($row = mysqli_fetch_array($result)) {
	?>
    <?php if ($row['from_user']=='1') { ?>
    <div class="d-flex justify-content-start mb-4">
        <div class="img_cont_msg">
            <img src="images/customerservice.jpg" class="rounded-circle user_img_msg">
        </div>
        <div class="msg_cotainer">
            <?php echo $row['content']; ?>
            <span class="msg_time"><?php echo $row['date_sent']; ?></span>
        </div>
    </div>
    <?php } else { ?>
	<div class="d-flex justify-content-end mb-4">
        <div class="msg_cotainer_send">
            <?php echo $row['content']; ?>
            <span class="msg_time_send"><?php echo $row['date_sent']; ?></span>
        </div>
        <div class="img_cont_msg">
    		<img src="images/customer.png" class="rounded-circle user_img_msg">
        </div>
    </div>
	<?php } 
}
?>
</div>