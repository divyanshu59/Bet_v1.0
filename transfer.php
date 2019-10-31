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
    <title><?php echo $SiteName; ?> - Transfer</title>
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
                <h2>Withdrawal Amount</h2>

                <form action="transfer.php" method="post">
                    <label>Enter Amount To Withdrawal</label>
                    <input type="number" name='amount' placeholder="Enter Amount" required>
                    <input type="hidden" name='username' value="<?php echo $username; ?>" required>
                    <input type="submit" name='submit' value="Withdrawal Now" style="border: none; background: #15b03e; color: #fff; padding: 5px;">
                </form>
                <?php
                if (isset($_GET['error'])) {
                    echo "<span style='color: red;'>Withdrawal Amount Must be less than Credits in Your Account</span>";
                }
                ?>
                <h2>Recent Transaction</h2>
                <?php
                $sql = "SELECT * FROM `withdrawal` WHERE `username` = '$username' ";
                $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        echo "
                        <div style='padding: 10px; margin: 10px; background: #e3e3e3; border-radius: 10px;'>
                        ID: #$row[0] 
                        <br>
                        <br>
                        <p style='color: red;'> Amount: $row[2]</p>
                        <p style='color: green;'> Time: $row[3]</p>
                        ";
                        if ($row[4] == 0) {
                            echo "<span style='color: yellow;'>Pending</span>";
                        } elseif ($row[4] == -1) {
                            echo "<span style='color: red;'>Transaction Failed</span>";
                        } elseif ($row[4] == 1) {
                            echo "<span style='color: green;'>Transaction Completed</span>";
                        }
                        echo "</div>";
                    }
                } else {
                    echo "No Recent Transaction";
                }


                ?>
            </div>
        </div>
    </main>

    <script src="assets/main.js"></script>
</body>

</html>

<?php
if (isset($_POST['submit'])) {
    $amount  = $_POST['amount'];
    $username  = $_POST['username'];

    $sql = "SELECT * FROM `users` WHERE `username` = '$username' ";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $credits = $row[6];
        if ($credits > $amount) {
            $credits = $credits - $amount;
            $sql2 = "UPDATE `users` SET `credits`='$credits' WHERE `username` = '$username' ";
            $result2 = mysqli_query($con, $sql2);

            $sql = "INSERT INTO `withdrawal`(`username`, `amount`, `time`, `status`) 
                VALUES ('$username','$amount',NOW(), 0)";
            $result = mysqli_query($con, $sql);
            header('Location: transfer.php');
        } else {
            header('Location: transfer.php?error=true');
        }
    }
}
?>