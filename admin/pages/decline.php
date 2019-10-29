<?php 

require_once '../../assets/import/config.php';
$id = $_GET['id'];

$sql = "UPDATE `withdrawal` SET `status`=-1 WHERE `id` = '$id'";
$result = mysqli_query($con, $sql);

header('Location: wallet.php');
?>