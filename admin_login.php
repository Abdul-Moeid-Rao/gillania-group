<?php
session_start();
$admin_user = 'admin';
$admin_pass = '1234'; // Change this!

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $admin_user && $password === $admin_pass) {
        $_SESSION['admin_logged_in'] = true;
        header("Location: admin-dashboard.php");
        exit();
    } else {
        $error = "Invalid login credentials.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Login</title>
  <style>
    body { font-family: Arial; background: #f2f2f2; display: flex; justify-content: center; align-items: center; height: 100vh; }
    form { background: #fff; padding: 40px; border-radius: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); }
    input { display: block; margin: 10px 0; padding: 10px; width: 100%; }
    button { background: #333; color: white; padding: 10px; border: none; cursor: pointer; }
    .error { color: red; margin-top: 10px; }
  </style>
</head>
<body>
<form method="POST">
  <h2>Admin Login</h2>
  <input type="text" name="username" placeholder="Username" required>
  <input type="password" name="password" placeholder="Password" required>
  <button type="submit">Login</button>
  <?php if (isset($error)) echo "<div class='error'>$error</div>"; ?>
</form>
</body>
</html>
