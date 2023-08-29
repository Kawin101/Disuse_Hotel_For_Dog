<?php session_start(); ?>
<!DOCTYPE html>
<body>
<?php
// if you open web page do you check data before, it is keep you login with cookie
// if you keep login, To do next step create a session for keeping data when you login with form for automatic login with cookie
if(isset($_COOKIE['email']) && isset($_COOKIE['pswd'])) {
    $email = $_COOKIE['email'];
    $pswd = $_COOKIE['pswd'];
    if($email === "kawin@gmail.com" && $pswd === "KaWin1o1") {
        $_SESSION['email'] = $email;
    }
}
if(!isset($_SESSION['email'])) {
// if your data not have in session is you do not login yet.
?>
    <fieldset>
        <h2 class="red"><img src="Image\error.png">ท่านยังไม่เข้าสู่ระบบ</h2>
        <a href="login.php">เข้าสู่ระบบ</a>
    </fieldset>
<?php
}
else {
// if your data have in session is you are login yet.
?>
    <fieldset>
        <h2 class="green"><img src="Image\done.png">ท่านเข้าสู่ระบบแล้ว</h2>
        <a href="logout.php">ออกจากระบบ</a>
    </fieldset>
<?php
}
?>
</body>