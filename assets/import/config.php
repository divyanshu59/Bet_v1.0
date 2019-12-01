<?php 
ob_start();
/*  CONNECTION TO MYSQL DATABASE  */

$servername = "localhost";
$username = "root";
$password = "";
$database = "betting";

// Create connection
$con = new mysqli($servername, $username, $password, $database);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
// echo "Database Connected successfully";

/* GLOBAL VARIABLES */
$SiteName = "FutureBet Online";
$TagLine1 = "A Good Punter Never";
$TagLine2 = "looses his nerve. He just keep playing on!";


function exposer($con,$username){
    $returnVal = 0; 

    $sql = "SELECT * FROM `1v1bet` WHERE `username` = '$username' and `status` = 1 ";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_array($result)){
            $returnVal += $row[5];
        }
    }
    $sql = "SELECT * FROM `2v2bet` WHERE `username` = '$username' and `status` = 1 ";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_array($result)){
            $returnVal += $row[5];
        }
    }
    $sql = "SELECT * FROM `multiplayerbet` WHERE `username` = '$username' and `status` = 1 ";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_array($result)){
            $returnVal += $row[4];
        }
    }
    $sql = "SELECT * FROM `scorebet` WHERE `username` = '$username' and `status` = 1 ";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_array($result)){
            $returnVal += $row[5];
        }
    }
    $sql = "SELECT * FROM `tossbet` WHERE `username` = '$username' and `status` = 1 ";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_array($result)){
            $returnVal += $row[4];
        }
    }



    return $returnVal;
}
?>