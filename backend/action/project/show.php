<?php
include '../../app.php';

// Ambil ID dari GET (untuk halaman edit) atau POST (untuk proses update)
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
} elseif (isset($_POST['id']) && !empty($_POST['id'])) {
    $id = $_POST['id'];
} else {
    die("ID project tidak ditemukan.");
}

// Ambil data project dari database
$qSelect = "SELECT * FROM projects WHERE id = '$id'";
$result = mysqli_query($connect, $qSelect) or die(mysqli_error($connect));

if (mysqli_num_rows($result) === 0) {
    die("Data project tidak ditemukan.");
}

$project = mysqli_fetch_object($result);
