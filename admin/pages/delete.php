<?php
require_once '../../assets/import/config.php';



$login = 0;
if (isset($_COOKIE['Alogin'])) {
    $adminemail = $_COOKIE["Aemail"];
    $adminname = $_COOKIE["Aname"];
} else {
    header('Location: login.php');
    die("Please Wait You are Rediritig..");
}
?>

<?php

    $id = $_GET['id'];
    $type = $_GET['type'];

    if ($type == 'toss') {
        $sql = "SELECT * FROM `tossbet` WHERE `tossid` = '$id' ";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $teamid = $row[0];
            $username = $row[1];
            $winamount = $row[4];
            $selectedteam = $row[3];

                $sql = "SELECT * FROM `users` WHERE `username` = '$username' ";
                $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);
                    $credits = $row[6];
                    $credits = $credits + $winamount;

                    $sql = "UPDATE `users` SET `credits`=$credits WHERE `username` = '$username' ";
                    $result = mysqli_query($con, $sql);



                    $sql = "DELETE FROM `toss` WHERE `id` = '$id' ";
                    $result = mysqli_query($con, $sql);

                    $sql = "DELETE FROM `tossbet` WHERE `tossid` = '$id' ";
                    $result = mysqli_query($con, $sql);

                    header('Location: ../index.php');
                }
        }
    } elseif ($type == 'score') {
        $sql = "SELECT * FROM `scorebet` WHERE `tossid` = '$id' ";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $teamid = $row[0];
            $username = $row[1];
            $winamount = $row[5];
            $selectedteam = $row[3];

                $sql = "SELECT * FROM `users` WHERE `username` = '$username' ";
                $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);
                    $credits = $row[6];
                    $credits = $credits + $winamount;

                    $sql = "UPDATE `users` SET `credits`=$credits WHERE `username` = '$username' ";
                    $result = mysqli_query($con, $sql);



                    $sql = "DELETE FROM `score` WHERE `id` = '$id' ";
                    $result = mysqli_query($con, $sql);

                    $sql = "DELETE FROM `scorebet` WHERE `tossid` = '$id' ";
                    $result = mysqli_query($con, $sql);

                    header('Location: ../index.php');
                }
        }
    } elseif ($type == 'multiplayer') {
        $sql = "SELECT * FROM `multiplayerbet` WHERE `tossid` = '$id' ";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $teamid = $row[0];
            $username = $row[1];
            $winamount = $row[4];
            $selectedteam = $row[3];

                $sql = "SELECT * FROM `users` WHERE `username` = '$username' ";
                $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);
                    $credits = $row[6];
                    $credits = $credits + $winamount;

                    $sql = "UPDATE `users` SET `credits`=$credits WHERE `username` = '$username' ";
                    $result = mysqli_query($con, $sql);



                    $sql = "DELETE FROM `multiplayer` WHERE `id` = '$id' ";
                    $result = mysqli_query($con, $sql);

                    $sql = "DELETE FROM `multiplayerbet` WHERE `tossid` = '$id' ";
                    $result = mysqli_query($con, $sql);

                    header('Location: ../index.php');
                }
        }
    } elseif ($type == '1v1') {

        $sql = "SELECT * FROM `1v1bet` WHERE `tossid` = '$id' ";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $teamid = $row[0];
            $username = $row[1];
            $winamount = $row[5];
            $selectedteam = $row[3];

                $sql = "SELECT * FROM `users` WHERE `username` = '$username' ";
                $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);
                    $credits = $row[6];
                    $credits = $credits + $winamount;

                    $sql = "UPDATE `users` SET `credits`=$credits WHERE `username` = '$username' ";
                    $result = mysqli_query($con, $sql);



                    $sql = "DELETE FROM `1v1` WHERE `id` = '$id' ";
                    $result = mysqli_query($con, $sql);
                    $sql = "DELETE FROM `1v1bet` WHERE `tossid` = '$id' ";
                    $result = mysqli_query($con, $sql);

                    header('Location: ../index.php');
                }
        }
    } 
    elseif ($type == '2v2') {

        $sql = "SELECT * FROM `2v2bet` WHERE `tossid` = '$id' ";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $teamid = $row[0];
            $username = $row[1];
            $winamount = $row[5];
            $selectedteam = $row[3];

                $sql = "SELECT * FROM `users` WHERE `username` = '$username' ";
                $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);
                    $credits = $row[6];
                    $credits = $credits + $winamount;

                    $sql = "UPDATE `users` SET `credits`=$credits WHERE `username` = '$username' ";
                    $result = mysqli_query($con, $sql);



                    $sql = "DELETE FROM `2v2` WHERE `id` = '$id' ";
                    $result = mysqli_query($con, $sql);
                    
                    $sql = "DELETE FROM `2v2bet` WHERE `tossid` = '$id' ";
                    $result = mysqli_query($con, $sql);

                    header('Location: ../index.php');
                }
        }
    }

?>