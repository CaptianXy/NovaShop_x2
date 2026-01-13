<?php
include '../config/db.php';

if(isset($_POST['register'])){
  $email = $_POST['email'];
  $pass  = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $conn->query("INSERT INTO users(email,password) VALUES('$email','$pass')");
  header("location:login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Register | NovaShop</title>
<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="auth-bg">
  <div class="auth-card">

    <div class="auth-logo">Create Account</div>
    <div class="auth-sub">Join NovaShop today</div>

    <form method="post">
      <input type="Username" name="Username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <input type="email" name="email"  placeholder ="Email" require >  
      <button class="auth-btn" name="register">REGISTER</button>
    </form>

    <div class="auth-divider">OR SIGN UP WITH</div>

    <div class="auth-social">
      <a href="#" class="btn-steam"> <img src="https://cdn3.emoji.gg/emojis/steam.png" width="20px" height="20px"  alt="steam">Steam</a>
      <a href="#" class="btn-google"> <img src="https://cdn3.emoji.gg/emojis/8515-google.png" width="20px" height="20px"  alt="Google">Google</a>
    </div>

    <div class="auth-footer">
      Already have account? <a href="login.php">Login</a>
    </div>

  </div>
</div>

</body>
</html>
