<?php
session_start();
if (isset($_SESSION["login"])) {
    header('location: dashboard.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div class="Kotak_login">
    <marquee><p class="tulis_login">Silahkan Login Untuk Mengakses</p></marquee>
    <form action="cek login.php" method="POST">
        <label>Username:</label>
        <input type="text" name="username" class="from_login" required><br><br>
        <label>Password:</label>
        <input type="password" name="password" class="from_login" required><br><br>
        <input type="submit" class="tombol_login" value="Login">
    </form>
    </div>
    
</body>
</html>