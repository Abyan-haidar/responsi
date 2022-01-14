<?php
session_start();
include "login.php";
if ($_POST["captcha_code"] == $_SESSION["captcha_code"]) {

$login=mysqli_query($con,$sql);
$ketemu=mysqli_num_rows($login);
$r= mysqli_fetch_array($login);
if ($ketemu > 0){
}
mysqli_close($con);
}
else {
echo "<center>Login gagal! Captcha tidak sesuai<br>";
echo "<a href=login.php><b>ULANGI LAGI</b></a></center>"; }
?>