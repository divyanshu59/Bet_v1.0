<?php
require_once 'assets/import/config.php';

$login = 0;


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
    <title><?php echo $SiteName; ?> - Home</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <header>
        <span id="mobile" onclick="opennav()"><i class="fa fa-bars" aria-hidden="true"></i></span>
        <span id="sitetitle"><?php echo $SiteName; ?></span>
        <span id="user"><a href='profile.php'><img src="assets/img/avatar.png"></a></span>
        <span id="username"><?php echo $username ?></span>
        <span id="credits">C: <?php echo $credits ?></span>
        
    </header>
    <main>
        <div id="menu">
            <div id="items"><a ><i class="fa fa-bank" aria-hidden="true"></i> Balance Information
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
                <h2>New Betting</h2>
                <hr>
                <p>Toss Betting</p>
                <div id="flexbox">
                    <?php
                    $i = 0;
                    $sql = "SELECT * FROM `toss` WHERE `status` = 1 and `time` > now() ";
                    $result = mysqli_query($con, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            $i++;
                          
                            echo "
                            <div id='card1'>
                            <center><h4>$row[2]<h4></center>
                            <hr>
                            <li>Team 1: $row[3]</li>
                            <br>
                            <li>Team 2: $row[4]</li>
                            <br>
                            <span style='color: green'>Price: $row[5]%</span>
                            <br>
                            <br>
                            <br>
                            <a id='btn' href='showtoss.php?id=$row[0]'>Bet Now</a>
                            
                            </div>
                            ";
                            if($i%3==0)
                            {
                               echo '</div><br><div id="flexbox">'; 
                            }
                        }
                    }
                    else{
                        echo "<span style='color: red;'>No Active Bets Options</span>";
                    }

                    ?>
                </div>
                <hr>
                <p>Score Gussing</p>
                <div id="flexbox">
                    <?php
                    $i = 0;
                    $sql = "SELECT * FROM `score` WHERE `status` = 1 and `time` > now() ";
                    $result = mysqli_query($con, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            $i++;
                          
                            echo "
                            <div id='card1'>
                            <center><h4>$row[2]<h4></center>
                            <hr>
                            <li>Team 1: $row[3]</li>
                            <br>
                            <li>Team 2: $row[4]</li>
                            <br>
                            <span style='color: green'>Price: $row[5]%</span>
                            <br>
                            <br>
                            <br>
                            <a id='btn' href='showscore.php?id=$row[0]'>Bet Now</a>
                            
                            </div>
                            ";
                            if($i%3==0)
                            {
                               echo '</div><br><div id="flexbox">'; 
                            }
                        }
                    }
                    else{
                        echo "<span style='color: red;'>No Active Bets Options</span>";
                    }

                    ?>
                </div>
                <hr>
                <p>Multiplayer Betting</p>
                <div id="flexbox">
                    <?php
                    $i = 0;
                    $sql = "SELECT * FROM `multiplayer` WHERE `status` = 1 and `time` > now() ";
                    $result = mysqli_query($con, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            $i++;
                          
                            echo "
                            <div id='card1'>
                            <center><h4>$row[2]<h4></center>
                            <hr>
                            <li>Team 1: $row[3]</li>
                            <br>
                            <li>Team 2: $row[4]</li>
                            <br>
                            <span style='color: green'>Price: $row[5]%</span>
                            <br>
                            <br>
                            <br>
                            <a id='btn' href='showmultiplayer.php?id=$row[0]'>Bet Now </a>
                            
                            </div>
                            ";
                            if($i%3==0)
                            {
                               echo '</div><br><div id="flexbox">'; 
                            }
                        }
                    }
                    else{
                        echo "<span style='color: red;'>No Active Bets Options</span>";
                    }

                    ?>
                </div>
                <hr>
                <p>1 Vs 1 Betting</p>
                <div id="flexbox">
                    <?php
                    $i = 0;
                    $sql = "SELECT * FROM `1v1` WHERE `status` = 1 and `time` > now() ";
                    $result = mysqli_query($con, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            $i++;
                          
                            echo "
                            <div id='card1'>
                            <center><h4>$row[2]<h4></center>
                            <hr>
                            <li>Team 1: $row[3]</li>
                            <br>
                            <li>Team 2: $row[4]</li>
                            <br>
                            <span style='color: green'>Price: $row[5]%</span>
                            <br>
                            <br>
                            <br>
                            <a id='btn' href='show1v1.php?id=$row[0]'>Bet Now </a>
                            
                            </div>
                            ";
                            if($i%3==0)
                            {
                               echo '</div><br><div id="flexbox">'; 
                            }
                        }
                    }
                    else{
                        echo "<span style='color: red;'>No Active Bets Options</span>";
                    }

                    ?>
                </div>
                <hr>
                <p>2 Vs 2 Betting</p>
                <div id="flexbox">
                    <?php
                    $i = 0;
                    $sql = "SELECT * FROM `2v2` WHERE `status` = 1 and `time` > now() ";
                    $result = mysqli_query($con, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            $i++;
                          
                            echo "
                            <div id='card1'>
                            <center><h4>$row[2]<h4></center>
                            <hr>
                            <li>Team 1: $row[3]</li>
                            <br>
                            <li>Team 2: $row[4]</li>
                            <br>
                            <span style='color: green'>Price: $row[5]%</span>
                            <br>
                            <br>
                            <br>
                            <a id='btn' href='show2v2.php?id=$row[0]'>Bet Now </a>
                            
                            </div>
                            ";
                            if($i%3==0)
                            {
                               echo '</div><br><div id="flexbox">'; 
                            }
                        }
                    }
                    else{
                        echo "<span style='color: red;'>No Active Bets Options</span>";
                    }

                    ?>
                </div>
            </div>
        </div>
    </main>

    <script src="assets/main.js"></script>
</body>

</html>