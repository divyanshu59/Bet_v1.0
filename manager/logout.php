<?php
setcookie("Mlogin", "0", time() + (-86400 * 5), "/");
setcookie("Memail", "", time() + (-86400 * 5), "/");
setcookie("Mpassword", "", time() + (-86400 * 5), "/");
setcookie("Mname", "", time() + (-86400 * 5), "/");
header('Location: login.php');

?>