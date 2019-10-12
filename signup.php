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
    <link rel="stylesheet" href="css/signup.css">
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
                <label>Create Your Account</label><br><br>
                <input type="text" name="username" placeholder="User Name" required>
                <input type="text" name="username" placeholder="User Name" required>
                <input type="text" name="username" placeholder="User Name" required>
                <input type="text" name="username" placeholder="User Name" required>
                <input type="text" name="username" placeholder="User Name" required>
               <center><button name="login" type="submit">Signup</button></center>
                <hr>
                <p><a href="index.php">Already Have Account, Login</a> <a id="right" href="forgetpass.php">Forget Password?</a></p>
            </form>   
        </section>
    </main>
</body>
</html>
