<?php
session_start();
if (!isset($_POST['item'])){exit();}

unlink("../../images/banner/".$_POST['item']);
echo "Success";


?>