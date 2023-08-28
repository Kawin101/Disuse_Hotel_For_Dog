<!DOCTYPE html>
<html>
<h3>สมัครสมาชิก</h3>
<form method="post">
    <div>อีเมล:<br><input type="email" name="login"></div>
    <br>
    <div>รหัสผ่าน:<br><input type="password" name="password1"></div>
    <br>
    <div>รหัสผ่านอีกครั้ง:<br><input type="password" name="password2"></div>
    <div>
        <input type="hidden" name="code" 
        value="<?php echo mt_rand(); ?>">
        <button>ตกลง</button>
    </div>
</form>
<body>
<?php
if ($_POST) {
    $login = $_POST['login'];
    $pswd1 = $_POST['password1'];
    $pswd2 = $_POST['password2'];
    $code = $_POST['code'];

    if($login != "" && $pswd1 != "" && $pswd2 != "") {
        echo "<h4>สมัครสมาชิกเสร็จเรียบร้อย<br>ข้อมูลของท่านคือ:</h4>
                Login: $login <br>
                Password1: $pswd1 <br>
                Password2: $pswd2 <br>
                Code: $code";
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