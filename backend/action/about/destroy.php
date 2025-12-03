<?php
include '../../app.php';

$storages = '../../storages/about/';

if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data dulu untuk hapus file
    $qSelect = "SELECT * FROM abouts WHERE id = '$id'";
    $resSelect = mysqli_query($connect, $qSelect);
    $about = mysqli_fetch_object($resSelect);

    if (!empty($about->image) && file_exists($storages . $about->image)) {
        unlink($storages . $about->image);
    }

    // Hapus data dari database
    $qDelete = "DELETE FROM abouts WHERE id = '$id'";
    $result = mysqli_query($connect, $qDelete) or die(mysqli_error($connect));

    if ($result) {
        echo "<script>alert('Data Berhasil dihapus');window.location.href='../../pages/about/index.php';</script>";
    } else {
        echo "<script>alert('Data Gagal Dihapus');window.location.href='../../pages/about/index.php';</script>";
    }
} else {
    echo "<script>alert('ID tidak ditemukan');window.location.href='../../pages/about/index.php';</script>";
}
