<?php 

setcookie("login", "", time() + (86400 * 5), "/");
setcookie("username", "", time() + (86400 * 5), "/");
setcookie("password", "", time() + (86400 * 5), "/");
header('Location: index.php');
?>