<?php
include_once 'config.php';
$id = $_POST['id'];

$output = "";
$sql = "SELECT * FROM `team` WHERE `sportid` = '$id' ";
$result = mysqli_query($con, $sql);
if(mysqli_num_rows($result)>0)
{
    while ($row = mysqli_fetch_array($result)) { 
        echo "<option value='$row[1]'>$row[1]</option>";
    }
}

