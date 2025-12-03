<?php
include "../../../config/koneksi.php";

// Ambil data skills dari database
$qSkill = "SELECT * FROM skills";
$result = mysqli_query($connect, $qSkill) or die(mysqli_error($connect));
?>

<?php include '../../partials/header.php'; ?>
<?php $page = 'skill'; ?>
<?php include '../../partials/sidebar.php'; ?>

<style>
    /* ===== Custom Table Styling ===== */
    .table-modern {
        border-collapse: separate;
        border-spacing: 0 10px;
    }

    .table-modern thead th {
        background-color: #f5f7fa;
        color: #6c757d;
        text-transform: uppercase;
        font-size: 12px;
        font-weight: bold;
        border: none;
        padding: 12px;
    }

    .table-modern tbody tr {
        background-color: #ffffff;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        border-radius: 10px;
        transition: all 0.2s ease-in-out;
    }

    .table-modern tbody tr:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.08);
    }

    .table-modern td {
        border: none;
        padding: 14px;
        vertical-align: middle;
    }

    .table-modern img {
        border-radius: 8px;
    }

    /* Tombol aksi minimalis */
    .btn-action {
        border-radius: 6px;
        padding: 6px 12px;
        font-size: 13px;
    }
</style>

<div class="container-fluid page-body-wrapper">
    <div id="main" class="p-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h4 class="fw-bold text-primary">⭐ Tabel Skill</h4>
                        <a href="./create.php" class="btn btn-primary">✚ Tambah</a>
                    </div>
                    <table class="table table-modern align-middle">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kemampuan</th>
                                <th>Persen</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            while ($item = mysqli_fetch_object($result)):
                            ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= htmlspecialchars($item->skill ?? '') ?></td>
                                    <td><?= htmlspecialchars($item->percent ?? '0') ?>%</td>
                                    <td><?= htmlspecialchars($item->description ?? '') ?></td>
                                    <td class="text-start">
                                        <a href="./edit.php?id=<?= $item->id ?>" class="btn btn-outline-warning btn-sm btn-action">🖋 Edit</a>
                                        <a href="../../action/skill/destroy.php?id=<?= $item->id ?>"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" class="btn btn-outline-danger btn-sm btn-action"> 🗑 Hapus</a>
                                    </td>
                                </tr>
                            <?php
                                $no++;
                            endwhile;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php include '../../partials/footer.php'; ?>
    </div>
</div>
<?php include '../../partials/script.php'; ?>