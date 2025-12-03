<?php
include '../../app.php'; // koneksi ke DB

// Pastikan id dikirim lewat GET dan berupa angka
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "
    <script>
        alert('ID tidak valid!');
        window.location.href='../../pages/blog/index.php';
    </script>";
    exit;
}

$id = intval($_GET['id']);
$storages = '../../storages/blog/'; // folder gambar

// Ambil data blog berdasarkan ID
$qSelect = "SELECT image FROM blogs WHERE id = '$id' LIMIT 1";
$resultSelect = mysqli_query($connect, $qSelect) or die('Query error: ' . mysqli_error($connect));
$blog = mysqli_fetch_object($resultSelect);

// Hapus gambar jika ada
if ($blog && !empty($blog->image) && file_exists($storages . $blog->image)) {
    unlink($storages . $blog->image);
}

// Hapus data dari database
$qDelete = "DELETE FROM blogs WHERE id = '$id'";
$resultDelete = mysqli_query($connect, $qDelete) or die('Query error: ' . mysqli_error($connect));

if ($resultDelete && mysqli_affected_rows($connect) > 0) {
    echo "
    <script>
        alert('Data Berhasil dihapus');
        window.location.href='../../pages/blog/index.php';
    </script>";
} else {
    echo "
    <script>
        alert('Data Gagal dihapus atau tidak ditemukan');
        window.location.href='../../pages/blog/index.php';
    </script>";
}
