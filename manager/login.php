<?php 
require_once '../assets/import/config.php';


if(isset($_COOKIE['Alogin']))
{
	header('Location: index.php');
	die("Please Wait You are Rediritig..");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $SiteName; ?> - Dashboard Login</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="assets/libs/css/login.css">
</head>
<body>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first" style="background: #2f4757;">
      <img src="assets/images/logo.png" id="icon" alt="User Icon" />
    </div>
    <br>
    <strong>Manager Account Login</strong>
    <!-- Login Form -->
    <form action="login.php" method="POST">
      <input type="email" id="login" class="fadeIn second" name="email" placeholder="EMAIL">
      <input type="password" id="password" class="fadeIn third" name="pass" placeholder="PASSWORD">
      <input type="submit" name="submit" class="fadeIn fourth" value="Log In">
    </form>

  
    <div id="formFooter">
      <a class="underlineHover" href="https://bilwg.com">Designed By Bilwg Services</a>
    </div>

  </div>
</div>

<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>

<?php 
if(isset($_POST['submit']))
{
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    if($email != "" && $pass != "")
    {
        $sql = "SELECT * FROM `manager` WHERE `email` = '$email' AND `password` = '$pass' AND `status` = 1 ";
        $queryRun = mysqli_query($con, $sql);
	    if (mysqli_num_rows($queryRun) > 0) {
            while ($row = mysqli_fetch_array($queryRun)) {
        $name= $row[3];
        }
    }
            setcookie("Mlogin", "1", time() + (86400 * 5), "/");
			setcookie("Memail", $email, time() + (86400 * 5), "/");
			setcookie("Mpassword", $pass, time() + (86400 * 5), "/");
			setcookie("Mname", $name, time() + (86400 * 5), "/");
			header('Location: index.php');
    }
}

?>