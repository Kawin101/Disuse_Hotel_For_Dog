<?php
session_start();
session_destroy();
// Clear up data in cookie for seession on login
$expire = time() - 3600;
setcookie('email', '', $expire);
setcookie('pswd', '', $expire);
// you use a header for wait a moment when php doing with browser because php is can do return data back form browser
header("refresh: 3; url=index.php");
?>
<!DOCTYPE html>
