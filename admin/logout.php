<?php
setcookie("Alogin", "0", time() + (-86400 * 5), "/");
setcookie("Aemail", "", time() + (-86400 * 5), "/");
setcookie("Apassword", "", time() + (-86400 * 5), "/");
setcookie("Aname", "", time() + (-86400 * 5), "/");
header('Location: login.php');

?>