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



$sql = "SELECT * FROM `users` WHERE `username` = '$username' ";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);
    $credits = $row[6];
    $image = ($row[8]== "") ? "assets/img/avatar.png" : $row[8] ;
}

$netExposure = exposer($con, $username);
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $SiteName; ?> - Open Bets</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <header>
        <span id="mobile" onclick="opennav()"><i class="fa fa-bars" aria-hidden="true"></i></span>
        <span id="sitetitle"><a href="dashboard.php"><?php echo $SiteName; ?></a></span>
        <span id="user"><a href='profile.php'><img src="<?php echo $image; ?>"></a></span>
        <span id="username"><?php echo $username ?></span>
        <span id="credits">C: <?php echo $credits ?></span>
    </header>
    <main>
        <div id="menu">
            <div id="items"><a><i class="fa fa-bank" aria-hidden="true"></i> Balance Information
                    <br><br>
                    Credits: <?php echo $credits ?>
                    <br><br>
                    Net Exposure: <?php echo $netExposure; ?>
                </a></div>
            <div id="items"><a href="openbets.php"><i class="fa fa-list" aria-hidden="true"></i> Open Bets</a></div>
            <div id="items"><a href="bettingpnl.php"><i class="fa fa-money" aria-hidden="true"></i> Betting P&L</a></div>
            <div id="items"><a href="transfer.php"><i class="fa fa-book" aria-hidden="true"></i> Transfer Statement</a></div>
            <div id="items"><a href="rules.php"><i class="fa fa-ban" aria-hidden="true"></i> Rules & Regulations</a></div>
            <div id="items"><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></div>


        </div>

        <div id="content">
            <div id="box">
                <h2>Open Bets</h2>
                <hr>
                <p><b>1 Vs 1 Betting</b></p>
                <?php
                 $sql = "SELECT * FROM `1v1bet` WHERE `username` = '$username' and `status` = 1 ";
                 $result = mysqli_query($con, $sql);
                 if (mysqli_num_rows($result) > 0) {
                     while($row = mysqli_fetch_array($result)){
                         echo "
                         <div style='padding: 10px; margin: 10px; background: #e3e3e3; border-radius: 10px;'>
                         ID: #$row[0] &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; RoomID: #$row[1]
                         <br>
                         <br>
                         <span style='font-size: 25px;'>Team : $row[4]</span>
                         <p style='color: red;'> Amount: $row[5]</p>
                         <p style='color: green;'> Winning Prize: $row[6]</p>
                         </div>
                         ";
                     }
                 }
                 else{
                     echo "No Bets Available";
                 }
                ?>
                <p><b>2 Vs 2 Betting</b></p>
                <?php
                 $sql = "SELECT * FROM `2v2bet` WHERE `username` = '$username' and `status` = 1 ";
                 $result = mysqli_query($con, $sql);
                 if (mysqli_num_rows($result) > 0) {
                     while($row = mysqli_fetch_array($result)){
                         echo "
                         <div style='padding: 10px; margin: 10px; background: #e3e3e3; border-radius: 10px;'>
                         ID: #$row[0] &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; RoomID: #$row[1]
                         <br>
                         <br>
                         <span style='font-size: 25px;'>Team : $row[4]</span>
                         <p style='color: red;'> Amount: $row[5]</p>
                         <p style='color: green;'> Winning Prize: $row[6]</p>
                         </div>
                         ";
                     }
                 }
                 else{
                    echo "No Bets Available";
                }
                ?>
                <p><b>Multiplayer Betting</b></p>
                <?php
                 $sql = "SELECT * FROM `multiplayerbet` WHERE `username` = '$username' and `status` = 1 ";
                 $result = mysqli_query($con, $sql);
                 if (mysqli_num_rows($result) > 0) {
                     while($row = mysqli_fetch_array($result)){
                         echo "
                         <div style='padding: 10px; margin: 10px; background: #e3e3e3; border-radius: 10px;'>
                         ID: #$row[0]
                         <br>
                         <br>
                         <span style='font-size: 25px;'>Team : $row[3]</span>
                         <p style='color: red;'> Amount: $row[4]</p>
                         <p style='color: green;'> Winning Prize: $row[5]</p>
                         </div>
                         ";
                     }
                 }
                 else{
                    echo "No Bets Available";
                }
                ?>
                <p><b>Score Betting</b></p>
                <?php
                 $sql = "SELECT * FROM `scorebet` WHERE `username` = '$username' and `status` = 1 ";
                 $result = mysqli_query($con, $sql);
                 if (mysqli_num_rows($result) > 0) {
                     while($row = mysqli_fetch_array($result)){
                         echo "
                         <div style='padding: 10px; margin: 10px; background: #e3e3e3; border-radius: 10px;'>
                         ID: #$row[0]
                         <br>
                         <br>
                         <span style='font-size: 25px;'>Team : $row[3]</span>
                         <p>You Bet For Score @$row[4]</p>
                         <p style='color: red;'> Amount: $row[5]</p>
                         <p style='color: green;'> Winning Prize: $row[6]</p>
                         </div>
                         ";
                     }
                 }
                 else{
                    echo "No Bets Available";
                }
                ?>
                <p><b>Toss Betting</b></p>
                <?php
                 $sql = "SELECT * FROM `tossbet` WHERE `username` = '$username' and `status` = 1 ";
                 $result = mysqli_query($con, $sql);
                 if (mysqli_num_rows($result) > 0) {
                     while($row = mysqli_fetch_array($result)){
                         echo "
                         <div style='padding: 10px; margin: 10px; background: #e3e3e3; border-radius: 10px;'>
                         ID: #$row[0]
                         <br>
                         <br>
                         <span style='font-size: 25px;'>Team : $row[3]</span>
                         <p style='color: red;'> Amount: $row[4]</p>
                         <p style='color: green;'> Winning Prize: $row[5]</p>
                         </div>
                         ";
                     }
                 }
                 else{
                    echo "No Bets Available";
                }
                ?>


            </div>
        </div>
    </main>

    <script src="assets/main.js"></script>
</body>

</html>