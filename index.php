<?php 
require_once 'assets/import/config.php';

$login =0;


if (isset($_COOKIE["login"]))
{
    $username = $_COOKIE["username"];
    $password = $_COOKIE["password"];
    $login = 1;
}
if($login == 1)
{
	header('Location: dashboard.php');
	die("Please Wait You are Rediritig..");
}

?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $SiteName; ?> - Home</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="bg"></div>

    <header>
        <a href="index.php"><?php echo $SiteName; ?></a>
    </header>

    <main>
       

        <section id="primary">
            <h1><?php echo $TagLine1; ?></h1>
            <p><?php echo $TagLine2; ?></p>

            <a href="#">Get More Info</a>
        </section>
        <section id="card">
            <form id="login" action="index.php" method="post">
                <label>Login</label><br><br>
                <input type="text" name="username" placeholder="User Name" required>
                <input type="password" name="password" placeholder="Password" required>
                <center><button name="login" type="submit">Login</button></center>
                <hr>
                <p> <a id="right" href="forgetpass.php">Forget Password?</a></p>
            </form>   
        </section>
    </main>
</body>
</html>
<?php 
if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username != "" && $password != "")
    {
        $sql = "SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password' AND `status` = 1 ";
        $queryRun = mysqli_query($con, $sql);
	    if(mysqli_num_rows($queryRun)>0)
		{
            setcookie("login", "1", time() + (86400 * 5), "/");
			setcookie("username", $username, time() + (86400 * 5), "/");
			setcookie("password", $password, time() + (86400 * 5), "/");
			header('Location: dashboard.php');
        }
    }
}
?>