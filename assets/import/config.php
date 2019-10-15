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
$SiteName = "Bet World";
$TagLine1 = "Your Personal Assistant";
$TagLine2 = "Get Help With Your Daily Life Stuff.";

?>