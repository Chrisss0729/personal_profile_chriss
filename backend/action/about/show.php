<?php
include '../../app.php';

// Pastikan ID ada di URL
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<script>
        alert('ID tidak valid');
        window.location.href='../../pages/about/index.php';
    </script>";
    exit;
}

$id = (int) $_GET['id'];

// Query ambil data
$qSelect = "SELECT * FROM abouts WHERE id = $id";
$result = mysqli_query($connect, $qSelect) or die(mysqli_error($connect));

$about = mysqli_fetch_object($result);

if (!$about) {
    echo "<script>
        alert('Data tidak ditemukan');
        window.location.href='../../pages/about/index.php';
    </script>";
    exit;
}
