<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION["login"])) {
    header('location: index.php');
    exit;
}

// Proses tambah, edit, dan hapus buku
if (isset($_POST['action'])) {
    if ($_POST['action'] == 'tambah') {
            $judul = $_POST['judul'];
            $pengarang = $_POST['pengarang'];
            $tahun_terbit = $_POST['tahun_terbit'];
            $kategori = $_POST['kategori'];
            $q = "INSERT INTO books (judul, pengarang, tahun_terbit, kategori) VALUES ('$judul', '$pengarang', '$tahun_terbit', '$kategori')";
            mysqli_query($conn, $q);

    } elseif ($_POST['action'] == 'edit') {
            $id = $_POST['id'];
            $judul = $_POST['judul'];
            $pengarang = $_POST['pengarang'];
            $tahun_terbit = $_POST['tahun_terbit'];
            $kategori = $_POST['kategori'];
            $query = "UPDATE books SET judul='$judul', pengarang='$pengarang', tahun_terbit='$tahun_terbit', kategori='$kategori' WHERE id='$id'";
        mysqli_query($conn, $query);

    } elseif ($_POST['action'] == 'hapus') {
        $id = $_POST['id'];
        $query = "DELETE FROM books WHERE id='$id'";
        mysqli_query($conn, $query);
    }
}

// Ambil data buku
$query = "SELECT * FROM books";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <div class="container">
    <marquee><h2>Selamat Datang di Perpustakaan Wijaya</h2></marquee>

    <h3>Daftar Buku Perpustakaan</h3>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Pengarang</th>
            <th>Tahun Terbit</th>
            <th>Kategori</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['judul']; ?></td>
            <td><?php echo $row['pengarang']; ?></td>
            <td><?php echo $row['tahun_terbit']; ?></td>
            <td><?php echo $row['kategori']; ?></td>
            <td>
                <form action="dashboard.php" method="POST" style="display:inline;">
                    <input type="hidden" name="action" value="hapus">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <input type="submit" value="Hapus">
                </form>
                <form action="edit.php" method="GET" style="display:inline;">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <input type="submit" value="Edit">
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

    <h3>Tambah Buku</h3>
    <form action="dashboard.php" method="POST">
        <input type="hidden" name="action" value="tambah">
        <label>Judul:</label>
        <input type="text" name="judul" required><br><br>
        <label>Pengarang:</label>
        <input type="text" name="pengarang" required><br><br
        <label>Tahun Terbit:</label>
        <input type="text" name="tahun_terbit" required><br><br>
        <label>Kategori:</label>
        <input type="text" name="kategori" required><br><br>
        <input type="submit" value="Tambah Buku">
    </form>

    <a href="logout.php" class="btn-logout">Logout</a>

    </div>
</body>
</html>