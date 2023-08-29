<fieldset><legend>สมัครสมาชิกเข้าสู่ระบบ</legend>
<form id="login" method="post">
    <a href="#">สมัครสมาชิก</a> | <a href="#">ลืมรหัสผ่าน</a><br>
    <input type="email" name="email" placeholder="อีเมล" require><br>
    <input type="password" name="pswd" placeholder="รหัสผ่าน" require><br>
    <input type="checkbox" name="save_account">
    <span>บันทึกเข้าสู่ระบบ</span><br>
    <a href="index.php" id="index">หน้าหลัก</a>
    <button>เข้าสู่ระบบ</button>
</form>
</fieldset>
<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<?php
if($_POST) {
    $email = $_POST['email'];
    $pswd = $_POST['pswd'];
    if($email === "kawin@gmail.com" && $pswd === "KaWin1o1") {
        if($_POST['save_account']) {
            $exprie = time() + 15 * 60; // Cookie is have a 15 mins
            setcookie('email', $email, $exprie);
            setcookie('pswd', $pswd, $exprie);
        }
        $_SESSION['email'] = $email;
        echo '<h3 class="green">ท่านเข้าสู่ระบบแล้ว จะกลับสู่หน้าหลักใน 3 วินาที</h3>';
        header("refresh: 3; url=index.php");
        exit('</body></html>');
        ob_end_flush();
    }
    else { echo '<h3 class="red">ท่านใส่อีเมลหรือรหัสผ่านไม่ถูกต้อง</h3>'; }
}
?>