<?php
include_once '../../app.php';
include './show.php';

// Validasi data socmed
if (!isset($sosmed) || !$sosmed) {
    echo "<script>alert('Data tidak ditemukan');window.location.href='../../pages/socmed/index.php';</script>";
    exit;
}

// Hapus data socmed
$qDelete = "DELETE FROM sosmeds WHERE id='$sosmed->id'";
$result = mysqli_query($connect, $qDelete) or die(mysqli_error($connect));

if ($result) {
    echo "<script>
    alert('Data berhasil dihapus');
    window.location.href = '../../pages/socmed/index.php';
    </script>";
} else {
    echo "<script>
    alert('Data gagal dihapus');
    window.location.href = '../../pages/socmed/index.php';
    </script>";
}
