<?php
$koneksi = mysqli_connect("localhost", "root", "", "kampus");

// Tambah data
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $jurusan = $_POST['jurusan'];

    $query = "INSERT INTO mahasiswa (nama, nim, jurusan) VALUES ('$nama', '$nim', '$jurusan')";
    mysqli_query($koneksi, $query);
}

// Ambil data
$data = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
</head>
<body>
    <h2>Form Tambah Mahasiswa</h2>
    <form method="POST">
        <label>Nama:</label><br>
        <input type="text" name="nama" required><br><br>
        <label>NIM:</label><br>
        <input type="text" name="nim" required><br><br>
        <label>Jurusan:</label><br>
        <input type="text" name="jurusan" required><br><br>
        <input type="submit" name="submit" value="Simpan">
    </form>

    <h2>Daftar Mahasiswa</h2>
    <table border="1" cellpadding="10">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Jurusan</th>
        </tr>
        <?php $no = 1; ?>
        <?php while ($row = mysqli_fetch_assoc($data)): ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['nim']; ?></td>
            <td><?= $row['jurusan']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>