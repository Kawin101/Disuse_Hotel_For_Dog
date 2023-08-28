<!DOCTYPE html>
<html>
<h3>สมัครสมาชิก</h3>
<form method="post">
    <div>อีเมล:<br><input type="email" name="login"></div>
    <br>
    <div>รหัสผ่าน:<br><input type="password" name="password1"></div>
    <br>
    <div>
        <button>ตกลง</button>
    </div>
</form>
<body>
<?php
if ($_POST) {
    $login = $_POST['login'];
    $pswd1 = $_POST['password1'];

    if($login === "kawin@gmail.com" && $pswd1 === "KaWin$$##!!") {
        echo "<h4>เข้าสู่ระบบเสร็จเรียบร้อย<br>ข้อมูลของท่านคือ:</h4>
                Login: $login <br>";
        // if data is not ture don't display form
        exit("</body><html>");
    }
    else {
        echo '<p class="err">
                ท่านใส่ข้อมูลไม่ถูกต้อง</p>';
    }
}
?>
<form method="post">
</body>
</html>