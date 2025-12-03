<?php
include '../../app.php';

$storages = '../../storages/project/';

if (!empty($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int) $_GET['id'];

    // Ambil data untuk hapus file gambar
    $qSelect = "SELECT image FROM projects WHERE id = ?";
    $stmtSelect = $connect->prepare($qSelect);
    $stmtSelect->bind_param("i", $id);
    $stmtSelect->execute();
    $resultSelect = $stmtSelect->get_result();
    $project = $resultSelect->fetch_object();

    if ($project && !empty($project->image) && file_exists($storages . $project->image)) {
        unlink($storages . $project->image);
    }

    // Hapus data dari tabel projects
    $qDelete = "DELETE FROM projects WHERE id = ?";
    $stmtDelete = $connect->prepare($qDelete);
    $stmtDelete->bind_param("i", $id);
    $result = $stmtDelete->execute();

    if ($result) {
        echo "<script>alert('Data Berhasil dihapus');window.location.href='../../pages/project/index.php';</script>";
    } else {
        echo "<script>alert('Data Gagal Dihapus');window.location.href='../../pages/project/index.php';</script>";
    }
} else {
    echo "<script>alert('ID tidak ditemukan atau tidak valid');window.location.href='../../pages/project/index.php';</script>";
}
