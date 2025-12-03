<?php
include '../../app.php';

// Pastikan ID ada di URL
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<script>
        alert('ID tidak valid');
        window.location.href='../../pages/blog/index.php';
    </script>";
    exit;
}

$id = (int) $_GET['id'];

// Query ambil data
$qSelect = "SELECT * FROM blogs WHERE id = $id";
$result = mysqli_query($connect, $qSelect) or die(mysqli_error($connect));

$blog = mysqli_fetch_object($result);

if (!$blog) {
    echo "<script>
        alert('Data tidak ditemukan');
        window.location.href='../../pages/blog/index.php';
    </script>";
    exit;
}
