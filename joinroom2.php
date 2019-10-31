<?php
require_once 'assets/import/config.php';

$login = 0;
$donebetting = 0;

if (isset($_COOKIE["login"])) {
    $username = $_COOKIE["username"];
    $password = $_COOKIE["password"];
    $login = 1;
}
if ($login != 1) {
    header('Location: index.php');
    die("Please Wait You are Rediritig..");
}

$id = $_GET['id'];

$sql = "SELECT * FROM `room` WHERE `id` = '$id' ";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);
    $tossid = $row[3];
   
    $percentage = $row[8];
    $personname = $row[4];
    $totalperson = $row[6];
    $amount = $row[5];
    $totalperson++;
    $personname .= ",".$username;
    $team = ($row[6]<2) ? $row[7] : $row[10] ;

    $sql3 = "UPDATE `room` SET `personuname`='$personname',`joined`=$totalperson WHERE `id` = $id";
    $result = mysqli_query($con, $sql3);

    $sql = "SELECT * FROM `users` WHERE `username` = '$username' ";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $credits = $row[6];
        if ($credits > $amount) {
            $credits = $credits - $amount;

            $amountwin = $amount + ($amount * $percentage) / 100;
            $sql2 = "UPDATE `users` SET `credits`='$credits' WHERE `username` = '$username' ";
            $result2 = mysqli_query($con, $sql2);

            $sql3 = "INSERT INTO `2v2bet`(  `roomid`, `username`, `tossid`, `team`, `amount`, `anoutwin`, `status`) 
            VALUES ('$id','$username','$tossid','$team','$amount','$amountwin', 1)";
            $result3 = mysqli_query($con, $sql3);
            header('Location: dashboard.php');
        }
    }
}
