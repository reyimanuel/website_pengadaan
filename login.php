<?php
require 'function.php';

if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
    
    if ($result && $row = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $row['password'])) {
            switch ($row["role"]) {
                case 'managerPengadaan':
                    header('location: managerPengadaan.php');
                    exit();
                case 'vendor':
                    header('location: vendor.php');
                    exit();
                case 'managerProyek':
                    header('location: managerProyek.php');
                    exit();
            }
        } else {
            $error = true;
        }
    } else {
      $error = true;
    }
}
?>
<!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <title>Login Page</title>
    <link rel="stylesheet" href="stylesLogin.css" media="screen" title="no title">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
      <div class="login">

          <div class="avatar">
            <i class="fa fa-user"></i>
          </div>

          <h2>Login Form</h2>

          <?php if( isset($error) ) : ?>
            <p style="color: red; font-style: italic;">Email / Password salah</p>
          <?php endif; ?>

<form action="" method="post">

          <div class="box-login">
            <i class="fas fa-envelope-open-text"></i>
            <input type="text" name="email" id="email" placeholder="Email" required>
          </div>

          <div class="box-login">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" id="password" placeholder="Password" required>
          </div>
          <button type="submit" name="login" class="btn-login">Login</button>
</form>
          <div class="bottom">
            <a href="register.php">Buat Akun Baru</a>
          </div>
      </div>
      <div class="sign">
        <p>&copy; 2023 LagaItang</p>
    </div>
  </head>
  </html>