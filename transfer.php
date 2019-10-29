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
}

$netExposure = exposer($con, $username);
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $SiteName; ?> - Transfer</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <header>
        <span id="mobile" onclick="opennav()"><i class="fa fa-bars" aria-hidden="true"></i></span>
        <span id="sitetitle"><a href="dashboard.php"><?php echo $SiteName; ?></a></span>
        <span id="user"><img src="assets/img/avatar.png"></span>
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

        </div>
    </main>

    <script src="assets/main.js"></script>
</body>

</html>