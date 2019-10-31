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

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header('Location: dashboard.php');
}
$error = "";
if(isset($_GET['error'])){
    $error = $_GET['error'];
}

$sql = "SELECT * FROM `users` WHERE `username` = '$username' ";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);
    $credits = $row[6];
    $image = ($row[8]== "") ? "assets/img/avatar.png" : $row[8] ;
}

$sql2 = "SELECT * FROM `multiplayerbet` WHERE `username` = '$username' and `tossid` = '$id' ";
$result2 = mysqli_query($con, $sql2);
if (mysqli_num_rows($result2) > 0) {
    $row2 = mysqli_fetch_array($result2);
    $donebetting = 1;
}



$netExposure = exposer($con, $username);
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $SiteName; ?> - Show Toss</title>
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
                <h2>Betting</h2>
                <hr>
                <?php
                $sql = "SELECT * FROM `multiplayer` WHERE `status` = 1 and `time` > now() and `id` = '$id' ";
                $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);
                    $totalP = 100 + $row[5];
                    echo "
                            <div id='card1'>
                            #$row[0]
                            <h4>$row[2]<h4>
                            <hr>
                            <li>Team 1: $row[3]</li>
                            <br>
                            <li>Team 2: $row[4]</li>
                            <br>
                            <span style='color: green'>Winner Will Get: $totalP%</span>
                            <br>
                            <br>
                            <h3>Place Your Bet </h3>";
                    if ($donebetting == 1) {
                        echo "<h4 style='color: #f00;'>You have Already Done Betting For this Multiplayer Bet.</h4>";
                    }
                    elseif($error == 'true')
                    {
                        echo "<h4 style='color: #f00;'>You dont have Enough Credits to bet</h4>";
                        echo "<a href='showmultiplayer.php?id=$id'>Bet Another Amount</a>";
                    }
                    else {
                        echo "<form action='showmultiplayer.php' id='betform' method='post'>
                                <label> Select Team </label>
                                <select name='team' id=''>
                                    <option value='$row[3]'>$row[3]</option>
                                    <option value='$row[4]'>$row[4]</option>
                                </select>
                                <br>
                                <br>
                                <label>Enter Credits Amount</label>
                                <input type='number' id='text' name='amount'>
                                <br>
                                <input type='hidden' value='$username' name='username' >
                                <input type='hidden' value='$row[0]' name='tossid' >
                                <input type='hidden' value='$row[5]' name='percentage' >
                                <input type='submit' id='btn' name='betme' value='Pay Credits'>
                            </form>";
                    }
                    echo "

                            </div>
                            ";
                } else {
                    echo "<center style='color: red;'>Multiplayer Game Expired</center>";
                }
                ?>

            </div>
        </div>
    </main>

    <script src="assets/main.js"></script>
</body>

</html>

<?php
if (isset($_POST['betme'])) {
    $team = $_POST['team'];
    $username = $_POST['username'];
    $tossid = $_POST['tossid'];
    $amount = $_POST['amount'];
    $percentage = $_POST['percentage'];

    $sql = "SELECT * FROM `users` WHERE `username` = '$username' ";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $credits = $row[6];
        if ($credits > $amount) {
            $credits = $credits - $amount;

            $amountwin = $amount + ($amount*$percentage)/100;
            $sql2 = "UPDATE `users` SET `credits`='$credits' WHERE `username` = '$username' ";
            $result2 = mysqli_query($con, $sql2);

            $sql3 = "INSERT INTO `multiplayerbet`(  `username`, `tossid`, `team`, `amount`, `anoutwin`, `status`) 
        VALUES ('$username','$tossid','$team','$amount','$amountwin', 1)";
            $result3 = mysqli_query($con, $sql3);

            $sql5 = "SELECT * FROM `multiplayer` WHERE `id` = '$tossid' ";
            $result5 = mysqli_query($con, $sql5);
            if (mysqli_num_rows($result5) > 0) {
                $row2 = mysqli_fetch_array($result5);
                $totalentry = $row2[6] + 1;
                $totalcollected = $row2[8] + $amount;

                $sql4 = "UPDATE `multiplayer` SET `totalentry`=$totalentry,`totalCollected`=$totalcollected WHERE `id` = $tossid ";
                $result4 = mysqli_query($con, $sql4);
            }

            if ($result3)
                header('Location: dashboard.php');
        } else { 
            header("Location: showmultiplayer.php?id=$tossid&error=true");
        }
    }
}
?>