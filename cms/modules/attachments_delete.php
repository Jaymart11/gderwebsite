<?php
session_start();
if (!isset($_GET['cat'])){exit();}
if (!isset($_POST['item'])){exit();}

$cat=$_GET['cat'];

if ($cat==1) {
	unlink("../../images/products/".$_GET['lid']."/".$_POST['item']);
	echo "Success";
} elseif ($cat==2) {
	unlink("../../postsattachments/".$_GET['lid']."/".$_POST['item']);
	echo "Success";
} elseif ($cat==3) {
	unlink("../../postsattachments/".$_GET['lid']."/actattach/".$_POST['item']);
	echo "Success";
}

?>