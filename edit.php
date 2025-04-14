<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION["login"])) {
    header('location: index.php');
    exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM books WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    $buku = mysqli_fetch_assoc($result);
}

if (isset($_POST['action']) && $_POST['action'] == 'edit') {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $kategori = $_POST['kategori'];
    $query = "UPDATE books SET judul='$judul', pengarang='$pengarang', tahun_terbit='$tahun_terbit', kategori='$kategori' WHERE id='$id'";
    mysqli_query($conn, $query);
    header('location: dashboard.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class = "tabel_edit">
    <h2>Edit Buku</h2>
    <form action="edit.php" method="POST">
        <input type="hidden" name="action" value="edit">
        <input type="hidden" name="id" value="<?php echo $buku['id']; ?>">
        <label>Judul:</label>
        <input type="text" name="judul" value="<?php echo $buku['judul']; ?>" required><br><br>
        <label>Pengarang:</label>
        <input type="text" name="pengarang" value="<?php echo $buku['pengarang']; ?>" required><br><br>
        <label>Tahun Terbit:</label>
        <input type="text" name="tahun_terbit" value="<?php echo $buku['tahun_terbit']; ?>" required><br><br>
        <label>Kategori:</label>
        <input type="text" name="kategori" value="<?php echo $buku['kategori']; ?>" required><br><br>
        <input type="submit" value="Update Buku">
    </form>

    <a href="dashboard.php" class="btn-kembali">Kembali</a>
    </div>
</body>
</html>