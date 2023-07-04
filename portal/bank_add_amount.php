<?php
session_start();
$id = $_SESSION['id'];
$amount = $_GET['amount'];
$url  = 'https://hafteno.ir/portal/add_amount.php?id='.$id.'&a='.$amount;
$set_token = file_get_contents($url);
header('location:https://hafteno.ir/portal/index.php?p=wallet&success=1');
?>