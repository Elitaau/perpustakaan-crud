<?php
session_start(); // Memulai session
include 'koneksi.php'; // Memasukkan koneksi ke database
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css"> <!-- Tautkan file CSS -->
</head>
<body>

<?php
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Cek username dan password di database
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // Login berhasil
        $_SESSION['login'] = true;
        header('location: dashboard.php'); // Arahkan ke halaman dashboard
        exit;
    } else {
        // Login gagal
        echo "<h2 style='text-align: center; color: red;'>Username atau password salah!</h2>";
        echo "<p style='text-align: center;'>Anda Harus Login Terlebih Dahulu</p>";
        echo "<div style='text-align: center;'>
                <a href='index.php' style='color: blue; text-decoration: none; font-size: 18px;'>Klik ini untuk Login Kembali</a>
              </div>";
        exit;
    }
} else {
    // Jika username atau password tidak diisi
    echo "<h2 style='text-align: center; color: red;'>Silakan masukkan username dan password.</h2>";
    echo "<div style='text-align: center;'>
            <a href='index.php' style='color: blue; text-decoration: none; font-size: 18px;'>Kembali ke Login</a>
          </div>";
    exit;
}
?>
</body>
</html>

