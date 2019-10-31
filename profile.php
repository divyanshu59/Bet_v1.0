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
        $image = ($row[8]== "") ? "assets/img/avatar.png" : $row[8] ;
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
        <span id="user"><a href='profile.php'><img src="<?php echo $image; ?>"></a></span>
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
                <h2>Profile</h2>
                <form action="profile.php" method="post" id="profileform" enctype='multipart/form-data'>
                    <?php 
                    $sql = "SELECT * FROM `users` WHERE `username` = '$username' ";
                    $result = mysqli_query($con, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_array($result);
                        $image = ($row[8]== "") ? "assets/img/avatar.png" : $row[8] ;
                        echo '
                    <input type="hidden" name="username" value="'.$username.'" required>
                    <input type="text" name="name" placeholder="Enter Name" value="'.$row[1].'" required>
                    <input type="email" name="email" placeholder="Enter Email" value="'.$row[3].'" required>
                    <input type="text" name="phone" placeholder="Enter Phone Number" value="'.$row[5].'" required>
                    <input type="password" name="password" placeholder="Enter Password" value="'.$row[4].'" required>
                    <center><img src="'.$image.'" width="10%"></center>
                    <input type="file" name="image" required>
                    <input type="submit" name="submit" Value="Update Profile" style="background: green; color: white;">
                        ';
                    }
                
                    
                    ?>
                    
                    
                </form>
            </div>
        </div>
    </main>

    <script src="assets/main.js"></script>
</body>

</html>

<?php 
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $username = $_POST['username'];

    $date = date("Y-m-d");
    $file_name = $_FILES["image"]["name"];
    $file_tmp = $_FILES["image"]["tmp_name"];
    $ext = pathinfo($file_name,PATHINFO_EXTENSION);
	
    $newFileName = "Betting-$date".time();
    move_uploaded_file($file_tmp,"assets/photo/".$newFileName.'.'.$ext);
    
    $filenameToStore="assets/photo/".$newFileName.".".$ext;

    $sql = "UPDATE `users` SET `name`='$name',`email`='$email',`password`='$password',`phone`='$phone',`profile`= '$filenameToStore' WHERE `username` = '$username'";
    $result = mysqli_query($con, $sql);
        header('Location: profile.php');
}

?>