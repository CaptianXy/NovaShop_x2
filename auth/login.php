<?php
include '../config/db.php';
session_start();

$error = null;

if (isset($_POST['login'])) {

  // ✅ ประกาศตัวแปรให้ชัด
  $email = $_POST['email'] ?? '';
  $pass  = $_POST['password'] ?? '';

  // ป้องกัน SQL error เบื้องต้น
  if ($email && $pass) {

    $q = $conn->query("SELECT * FROM users WHERE email='$email'");

    // ✅ เช็กก่อนว่ามี user จริงไหม
    if ($q && $q->num_rows === 1) {

      $u = $q->fetch_assoc();

      // ✅ ตรวจรหัสผ่าน
      if (password_verify($pass, $u['password'])) {

        $_SESSION['user_id'] = $u['id'];

        // ✅ Remember me
        if (isset($_POST['remember'])) {
          $token = bin2hex(random_bytes(32));
          setcookie(
            "remember_token",
            $token,
            time() + (86400 * 30),
            "/"
          );
          $conn->query(
            "UPDATE users SET remember_token='$token' WHERE id={$u['id']}"
          );
        }

        header("Location: ../index.php");
        exit;

      } else {
        $error = "Incorrect password";
      }

    } else {
      $error = "Account not found";
    }

  } else {
    $error = "Please fill all fields";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login | NovaShop</title>
<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="auth-bg">
  <div class="auth-card">

    <div class="auth-logo">NovaShop</div>
    <div class="typing">กรุณาล็อกอิน หากไม่มี โปรดสมัครผู้ใช้</div><br>

    <?php if ($error): ?>
      <p style="color:#ff6b6b; margin:10px 0;">
        <?= htmlspecialchars($error) ?>
      </p>
    <?php endif; ?>

    <form method="post">
      <input type="username" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>

      <label style="font-size:13px;color:#cbd1ff;">
        <input type="checkbox" name="remember"> Remember me
      </label>

      <button class="auth-btn" name="login">LOGIN</button>
    </form>

    <div class="auth-divider">OR CONTINUE WITH</div>
    <div class="auth-social">
      <a href="oauth_steam.php" class="btn-steam"> <img src="https://cdn3.emoji.gg/emojis/steam.png" width="20px" height="20px" margin="20px" alt="steam">Steam</a>
      <a href="oauth_google.php" class="btn-google"> <img src="https://cdn3.emoji.gg/emojis/8515-google.png" width="20px" height="20px" margin="20px" alt="Google">Google</a>
      <a href="#" class="btn-facebook"> <img src="https://img.icons8.com/?size=100&id=118497&format=png&color=000000" width="20px" height="20px" margin="20px" alt="Facebook">Facebook</a>
    </div>

    <div class="auth-footer">
      No account? <a href="register.php">Register</a>
    </div>

  </div>
</div>

</body>
</html>
