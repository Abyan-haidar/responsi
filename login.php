 <!DOCTYPE HTML>  <body>  

<html>
<head>
    <title>Login</title>
    <form method=post action=cek_login.php>
      <style type="text/css">
      body{
        /*background-color: #ec5858;*/
        background-image: url('bg2.jpeg');
        
      }
      .content{
        text-align:  center;
        background-color: white;
        padding-top: 1%;
        padding-bottom : 5%;
        margin-left: 25%;
        margin-right: 25%;
      }
      .error {color: #FF0000;}
    </style>
</head>

<?php

error_reporting(E_ERROR | E_PARSE);
  $c = new mysqli("localhost", "root", "", "kang_bangunan");
  if ($c->connect_errno) {
    echo json_encode(array('message' => 'Koneksi Gagal'));
    die();
  }

// define variables and set to empty values
$passErr = $emailErr = "";
$pass = $email = "";
$email_ok = false;
$pass_ok = false;
if ($_POST["captcha_code"] == $_SESSION["captcha_code"])

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
    else{
      $email_ok = true;
    }
  }

  if (empty($_POST["pass"])) {
    $passErr = "Pass is required";
  }
  else{
    $pass_ok = true;
  }

  

} 

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<a href="index.php">←KEMBALI</a>
  <div class="content">
  <h2>Login</h2>
      <p><span class="error">* required field.</span></p>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
        
        E-mail: <input type="text" name="email" value="<?php echo $email;?>">
        <span class="error">* <?php echo $emailErr;?></span>
        <br><br>
        Password: <input type="text" name="pass" value="<?php echo $pass;?>">
        <span class="error">*  <?php echo $passErr;?></span>
        <br><br>
        Captcha: <br>
        <img src='captcha.php' /></td><td> : <input name='captcha_code' type='text'></td></tr>
        <br><br>
        <input type="submit" name="submit" value="Submit">  
      </form>

<?php
  if ($email_ok && $pass_ok) {
      // echo "string";
      $pwd = $_POST['pass']; //password

      $sql = "SELECT * FROM user where email='$email'";
      $result = $c->query($sql);
      $pwdDB="";
      if ($result->num_rows > 0) {
        while ($obj = $result->fetch_assoc()) {
          $pwdDB = $obj['password'];
        }
        if ($pwdDB==$pwd) {
          $_SESSION['email'] = $email;
          echo "";
          echo "Login berhasil! Klik <a href='admin.php'>disini</a> untuk masuk ke pengaturan admin.";
        }
        else{
          echo "Kombinasi username dan password tidak ditemukan";
          // echo "alert('Hello\nHow are you?')";
        }
      }
      else{
        // echo "ERROR. sql=".$sql;
        echo "<br> email salah!";
      }

    }
// echo $email;
// echo "<br>";
// echo $pass;
// echo "<br>";

?>
  </div>
</body>
</html>