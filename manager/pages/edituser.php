<?php
require_once '../../assets/import/config.php';


$login = 0;
if (isset($_COOKIE['Mlogin'])) {
    $adminemail = $_COOKIE["Memail"];
    $adminname = $_COOKIE["Mname"];

    $sql = "SELECT * FROM `manager` Where email = '$adminemail' ";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $credits = $row[5];
        $managerid = $row[0];
    }
} else {
    header('Location: login.php');
    die("Please Wait You are Rediritig..");
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header('Location: manageuser.php');
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
    <title><?php echo $SiteName; ?> Manager Dashboard </title>
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
                            <span style="font-size: 23px; padding: 30px;">Credits - <?php echo $credits ?></span>
                        </li>

                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../assets/images/avatar-1.jpg" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"><?php echo $adminname ?> </h5>
                                    <span class="status"></span><span class="ml-2">Available</span>
                                </div>
                                <span class="dropdown-item" href="#"><?php echo $adminemail ?></span>
                                <a class="dropdown-item" href="../logout.php"><i class="fas fa-power-off mr-2"></i>Logout</a>
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
                                <a class="nav-link " href="../index.php"><i class="fa fa-fw fa-user-circle"></i>Dashboard </a>

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
                                            <a class="nav-link" href="manageteam.php">Manage All Teams</a>
                                        </li>
                                    </ul>
                                </div>
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
                                            <li class="breadcrumb-item"><a href="" class="breadcrumb-link">Users</a></li>
                                            <li class="breadcrumb-item"><a href="" class="breadcrumb-link">Manage Users</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Edit User</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->

                    <div class="container1">
                        <h2>Edit User</h2>
                        <?php
                        $sql = "SELECT * FROM `users` WHERE `id` = '$id' and `manager` = '$managerid' ";
                        $result = mysqli_query($con, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_array($result);

                            echo "
                                    <form action='edituser.php' method='post'>
                                        <input type='hidden' value='$row[0]' name='id'>
                                        <label>Name</label>
                                        <input type='text' value='$row[1]' placeholder='Sport Name' name='name' class='form-control' required>
                                        <br>
                                        <label>Username</label>
                                        <input type='text' value='$row[2]'  class='form-control' disabled>
                                        <br>
                                        <label>Eamil</label>
                                        <input type='text' value='$row[3]'  class='form-control' disabled>
                                        <br>
                                        <label>Phone</label>
                                        <input type='text' value='$row[5]'  class='form-control' disabled>
                                        <br>
                                        <label>Credits</label>

                                        <input type='hidden' name='manager' value='$managerid'>
                                        <input type='hidden' name='oldcredit' value='$row[6]'>
                                        <input type='number' value='$row[6]'  placeholder='credits' name='credits' class='form-control' required>
                                        <br>
                                        <label>Status</label>
                                        <select name='status' class='form-control'>
                                            <option value='1'>Active</option>
                                            <option value='0'>Ban</option>
                                        </select>
                                        <br>
                                        <input type='submit' name='submit' value='update' class='btn btn-warning'>
                                    </form>
                                    ";
                        }
                        else {  
                            echo "<center><h4>You Cannot Edit This Profile.</h4></center>";
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
</body>

</html>
<?php 
if (isset($_POST['submit'])) {
    # code...
    $id = $_POST['id'];
    $name = $_POST['name'];
    $credits = $_POST['credits'];
    $status = $_POST['status'];
    $oldcredit = $_POST['oldcredit'];
    $manager = $_POST['manager'];


    $sql = "SELECT * FROM `manager` Where id = '$manager' ";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $managercredits = $row[5];
    }

    if($credits > $oldcredit){
        $managercredits = $managercredits - ($credits-$oldcredit);

        $sql = "UPDATE `manager` SET `credits`='$managercredits' WHERE `id` = '$manager' ";
        $result = mysqli_query($con, $sql);
    }
    $sql = "UPDATE `users` SET `name`='$name',`credits`='$credits',`status`='$status' WHERE `id` = '$id' ";
    $queryRun = mysqli_query($con, $sql);
    if($queryRun)
    {
        header('Location: manageuser.php');
    }
    
}


?>