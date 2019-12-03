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

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="../assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="../assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <title><?php echo $SiteName; ?> Admin Dashboard </title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="../index.php"><?php echo $SiteName; ?></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">

                        <li class="nav-item dropdown notification">
                            <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-fw fa-bell"></i> <span class="indicator"></span></a>
                            <ul class="dropdown-menu dropdown-menu-right notification-dropdown">
                                <li>
                                    <div class="notification-title"> Notification</div>
                                    <div class="notification-list">
                                        <div class="list-group">
                                            <center>
                                                <p>No Notifications</p>
                                            </center>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="list-footer"> <a href="#">View all notifications</a></div>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../assets/images/avatar-1.jpg" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"><?php echo $adminname ?> </h5>
                                    <span class="status"></span><span class="ml-2">Available</span>
                                </div>
                                <span class="dropdown-item" href="#"><?php echo $adminemail ?></span>
                                <a class="dropdown-item" href="logout.php"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="../index.php"><i class="fa fa-fw fa-user-circle"></i>Dashboard </a>

                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fa-fw fa-rocket"></i>Users</a>
                                <div id="submenu-2" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="adduser.php">Add User </a>
                                            <a class="nav-link" href="manageuser.php">Manage User </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fab fa-fw fa-wpforms"></i>Bet</a>
                                <div id="submenu-3" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="addtoss.php">Add Toss Game</a>
                                            <a class="nav-link" href="score.php">Score Gussing</a>
                                            <a class="nav-link" href="1v1.php">1 Vs 1 Game</a>
                                            <a class="nav-link" href="2v2.php">2 vs 2 Game</a>
                                            <a class="nav-link" href="multiplayer.php">Multiplayer Game</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fab fa-fw fa-wpforms"></i>Manage Bets</a>
                                <div id="submenu-4" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="managetoss.php">Manage Toss Game</a>
                                            <a class="nav-link" href="managescore.php">Manage Score Gussing</a>
                                            <a class="nav-link" href="manage1v1.php">Manage 1 Vs 1 Game</a>
                                            <a class="nav-link" href="manage2v2.php">Manage 2 vs 2 Game</a>
                                            <a class="nav-link" href="managemultiplayer.php">Manage Multiplayer Game</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-divider">
                                Features
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-6" aria-controls="submenu-6"><i class="fas fa-fw fa-file"></i> Sports </a>
                                <div id="submenu-6" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="addsport.php">Add Sport</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="managesport.php">Manage All Sports</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-7" aria-controls="submenu-7"><i class="fas fa-fw fa-inbox"></i>Teams</a>
                                <div id="submenu-7" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="addteam.php">Add Team</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="manageteam.php">Manage All Teams</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="rules.php"><i class="fa fa-gavel"></i>Rules</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="wallet.php"><i class="fa fa-google-wallet"></i>Withdrawal</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title"><?php echo $SiteName; ?> Dashboard</h2>

                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="../index.php" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="" class="breadcrumb-link">Manage Bet</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Select Winner</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->

                    <div class="container1" id="formbox">
                        <h2>Manage Toss</h2>
                        <?php
                        if (isset($_GET['id']) && isset($_GET['type'])) {
                            $id = $_GET['id'];
                            $type = $_GET['type'];

                            if ($type == 'toss') {
                                $sql = "SELECT * FROM `toss` where `id` = '$id' ";
                                $result = mysqli_query($con, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    $row = mysqli_fetch_array($result);
                                    echo "
                                    <form action='selectwinner.php' method='post'>
                                        <label>Select Winner</label>
                                        <select class='form-control' name='team'>
                                            <option>$row[3]</option>
                                            <option>$row[4]</option>
                                        </select>
                                        <br>
                                        <input type='hidden' name='type' value='toss'>
                                        <input type='hidden' name='id' value='$id'>
                                        <input type='submit' name='submit' class='btn btn-lg btn-success' value='Declare Winner'>
                                    </form>
                                    ";
                                }
                            } elseif ($type == 'score') {
                                $sql = "SELECT * FROM `score` where `id` = '$id' ";
                                $result = mysqli_query($con, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    $row = mysqli_fetch_array($result);
                                    echo "
                                    <form action='selectwinner.php' method='post' >
                                        <label>Select Winner</label>
                                        <select class='form-control' name='team'>
                                            <option>$row[3]</option>
                                            <option>$row[4]</option>
                                        </select>
                                        <br>
                                        <input type='number' name='score' class='form-control' placeholder='Enter Score' required>
                                        <br>
                                        <input type='hidden' name='type' value='score'>
                                        <input type='hidden' name='id' value='$id'>
                                        <input type='submit' name='submit' class='btn btn-lg btn-success' value='Declare Winner'>
                                    </form>
                                    ";
                                }
                            } elseif ($type == 'multiplayer') {
                                $sql = "SELECT * FROM `multiplayer` where `id` = '$id' ";
                                $result = mysqli_query($con, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    $row = mysqli_fetch_array($result);
                                    echo "
                                    <form action='selectwinner.php' method='post'>
                                        <label>Select Winner</label>
                                        <select class='form-control' name='team'>
                                            <option>$row[3]</option>
                                            <option>$row[4]</option>
                                        </select>
                                        <br>
                                        <input type='hidden' name='type' value='multiplayer'>
                                        <input type='hidden' name='id' value='$id'>
                                        <input type='submit' name='submit' class='btn btn-lg btn-success' value='Declare Winner'>
                                    </form>
                                    ";
                                }
                            } elseif ($type == '1v1') {
                                $sql = "SELECT * FROM `1v1` where `id` = '$id' ";
                                $result = mysqli_query($con, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    $row = mysqli_fetch_array($result);
                                    echo "
                                    <form action='selectwinner.php' method='post'>
                                        <label>Select Winner</label>
                                        <select class='form-control' name='team'>
                                            <option>$row[3]</option>
                                            <option>$row[4]</option>
                                        </select>
                                        <br>
                                        <input type='hidden' name='type' value='1v1'>
                                        <input type='hidden' name='id' value='$id'>
                                        <input type='submit' name='submit' class='btn btn-lg btn-success' value='Declare Winner'>
                                    </form>
                                    ";
                                }
                            } elseif ($type == '2v2') {
                                $sql = "SELECT * FROM `2v2` where `id` = '$id' ";
                                $result = mysqli_query($con, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    $row = mysqli_fetch_array($result);
                                    echo "
                                    <form action='selectwinner.php' method='post'>
                                        <label>Select Winner</label>
                                        <select class='form-control' name='team'>
                                            <option>$row[3]</option>
                                            <option>$row[4]</option>
                                        </select>
                                        <br>
                                        <input type='hidden' name='type' value='2v2'>
                                        <input type='hidden' name='id' value='$id'>
                                        <input type='submit' name='submit' class='btn btn-lg btn-success' value='Declare Winner'>
                                    </form>
                                    ";
                                }
                            }
                        } else {
                            header('Location: ../index.php');
                        }

                        ?>
                    </div>

                </div>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            Copyright © 2019 <?php echo $SiteName; ?> All rights reserved. Dashboard by <a href="https://bilwg.com/">Bilwg</a>.
                        </div>

                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="../assets/libs/js/main-js.js"></script>
    <script src="../assets/libs/js/myfun.js"></script>
</body>

</html>

<?php
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $type = $_POST['type'];
    $team = $_POST['team'];

    if ($type == 'toss') {
        $sql = "SELECT * FROM `tossbet` WHERE `tossid` = '$id' ";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $teamid = $row[0];
                $username = $row[1];
                $winamount = $row[5];
                $selectedteam = $row[3];

                if ($selectedteam == $team) {

                    $sql1 = "SELECT * FROM `users` WHERE `username` = '$username' ";
                    $result1 = mysqli_query($con, $sql1);
                    if (mysqli_num_rows($result1) > 0) {
                        $row1 = mysqli_fetch_array($result1);
                        $credits = $row1[6];
                        $credits = $credits + $winamount;

                        $sql2 = "UPDATE `users` SET `credits`=$credits WHERE `username` = '$username' ";
                        $result2 = mysqli_query($con, $sql2);



                        $sql3 = "UPDATE `tossbet` SET `status` = 2 WHERE `id` = '$teamid' ";
                        $result3 = mysqli_query($con, $sql3);

                        header('Location: ../index.php');
                    }
                } else {
                    $sql4 = "UPDATE `tossbet` SET `status` = 0 WHERE `id` = '$teamid' ";
                    $result4 = mysqli_query($con, $sql4);
                }
            }

            $sql = "UPDATE `toss` SET `winteam`= '$team', `status` = 0 WHERE `id` = '$id' ";
            $result = mysqli_query($con, $sql);
        }
    } elseif ($type == 'score') {
        $score = $_POST['score'];
        $sql = "SELECT * FROM `scorebet` WHERE `tossid` = '$id' ";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $teamid = $row[0];
            $username = $row[1];
            $winamount = $row[6];
            $selectedteam = $row[3];
            $swlwctedscore = $row[4];

            if ($selectedteam == $team && $score == $swlwctedscore) {

                $sql = "SELECT * FROM `users` WHERE `username` = '$username' ";
                $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);
                    $credits = $row[6];
                    $credits = $credits + $winamount;

                    $sql = "UPDATE `users` SET `credits`=$credits WHERE `username` = '$username' ";
                    $result = mysqli_query($con, $sql);

                    $sql = "UPDATE `score` SET `winteam`= '$team', `status` = 0 WHERE `id` = '$id' ";
                    $result = mysqli_query($con, $sql);

                    $sql = "UPDATE `scorebet` SET `status` = 2 WHERE `id` = '$teamid' ";
                    $result = mysqli_query($con, $sql);

                    header('Location: ../index.php');
                }
            } else {
                $sql = "UPDATE `scorebet` SET `status` = 0 WHERE `id` = '$teamid' ";
                $result = mysqli_query($con, $sql);
            }
        }
    } elseif ($type == 'multiplayer') {
        $sql = "SELECT * FROM `multiplayerbet` WHERE `tossid` = '$id'";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $teamid = $row[0];
            $username = $row[1];
            $winamount = $row[5];
            $selectedteam = $row[3];

            if ($selectedteam == $team) {

                $sql = "SELECT * FROM `users` WHERE `username` = '$username' ";
                $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);
                    $credits = $row[6];
                    $credits = $credits + $winamount;

                    $sql = "UPDATE `users` SET `credits`=$credits WHERE `username` = '$username' ";
                    $result = mysqli_query($con, $sql);



                    $sql = "UPDATE `multiplayerbet` SET `status` = 2 WHERE `id` = '$teamid' ";
                    $result = mysqli_query($con, $sql);

                    header('Location: ../index.php');
                }
            } else {
                $sql = "UPDATE `multiplayerbet` SET `status` = 0 WHERE `id` = '$teamid' ";
                $result = mysqli_query($con, $sql);
            }

            $sql = "UPDATE `multiplayer` SET `winteam`= '$team', `status` = 0 WHERE `id` = '$id' ";
            $result = mysqli_query($con, $sql);
        }
    } elseif ($type == '1v1') {

        $sql = "SELECT * FROM `1v1bet` WHERE `tossid` = '$id'  ";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $teamid = $row[0];
            $roomid = $row[1];
            $winamount = $row[6];
            $selectedteam = $row[4];

            if ($selectedteam == $team) {
                $sql = "SELECT * FROM `room` WHERE `totalperson` <= `joined` and `bettype`= 1 and `gameid` = '$id' ";
                $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);
                    $usernameTEMP = $row[4];
                    $array = explode(',', $usernameTEMP);
                    foreach ($array as $username) //loop over values
                    {

                        $sql = "SELECT * FROM `users` WHERE `username` = '$username' ";
                        $result = mysqli_query($con, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_array($result);
                            $credits = $row[6];
                            $credits = $credits + $winamount;

                            $sql = "UPDATE `users` SET `credits`=$credits WHERE `username` = '$username' ";
                            $result = mysqli_query($con, $sql);



                            $sql = "UPDATE `1v1bet` SET `status` = 2 WHERE `id` = '$teamid' ";
                            $result = mysqli_query($con, $sql);

                            header('Location: ../index.php');
                        }
                    }
                }

                $sql = "UPDATE `1v1` SET `winteam`= '$team', `status` = 0 WHERE `id` = '$id' ";
                $result = mysqli_query($con, $sql);
            } else {
                $sql = "UPDATE `1v1bet` SET `status` = 0 WHERE `id` = '$teamid' ";
                $result = mysqli_query($con, $sql);
            }
        }
    } elseif ($type == '2v2') {

        $sql = "SELECT * FROM `2v2bet` WHERE `tossid` = '$id'  ";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $teamid = $row[0];
            $roomid = $row[1];
            $winamount = $row[6];
            $selectedteam = $row[4];

            if ($selectedteam == $team) {
                $sql = "SELECT * FROM `room` WHERE `totalperson` <= `joined` and `bettype`= 2 and `gameid` = '$id' ";
                $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);
                    $usernameTEMP = $row[4];
                    $array = explode(',', $usernameTEMP);
                    foreach ($array as $username) //loop over values
                    {

                        $sql = "SELECT * FROM `users` WHERE `username` = '$username' ";
                        $result = mysqli_query($con, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_array($result);
                            $credits = $row[6];
                            $credits = $credits + $winamount;

                            $sql = "UPDATE `users` SET `credits`=$credits WHERE `username` = '$username' ";
                            $result = mysqli_query($con, $sql);



                            $sql = "UPDATE `2v2bet` SET `status` = 2 WHERE `id` = '$teamid' ";
                            $result = mysqli_query($con, $sql);

                            header('Location: ../index.php');
                        }
                    }
                }
            } else {
                $sql = "UPDATE `2v2bet` SET `status` = 0 WHERE `id` = '$teamid' ";
                $result = mysqli_query($con, $sql);
            }
            $sql = "UPDATE `2v2` SET `winteam`= '$team', `status` = 0 WHERE `id` = '$id' ";
            $result = mysqli_query($con, $sql);
        }
    }
}


?>