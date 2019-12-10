<?php

require_once '../../assets/import/config.php';
$id = $_GET['id'];





$sql = "SELECT * FROM `withdrawal` WHERE `id` = '$id' ";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);
    $username = $row[1];
    $amount = $row[2];

    $sql = "SELECT * FROM `users` WHERE `username` = '$username' ";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $credits = $row[6];
        $credits = $credits + $amount;
    }

    $sql = "UPDATE `users` SET `credits`=$credits WHERE `username` = '$username' ";
    $result = mysqli_query($con, $sql);
}


$sql = "UPDATE `withdrawal` SET `status`=-1 WHERE `id` = '$id'";
$result = mysqli_query($con, $sql);

header('Location: wallet.php');
