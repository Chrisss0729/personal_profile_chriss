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
                        <h4 class="fw-bold text-primary">⭐ Edit Tabel Skill</h4>
                        <a href="./index.php" class="btn btn-primary">❮❮ Kembali</a>
                    </div>
                    <table class="table table-modern align-middle">
                        <?php
                        include '../../action/skill/show.php';
                        ?>
                        <form action="../../action/skill/update.php?id=<?= $skills->id ?>" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $skills->id ?>">

                            <div class="mb-3">
                                <label for="skillInput" class="form-label">Skill</label>
                                <input type="text" name="skill" class="form-control" id="skillInput"
                                    placeholder="Masukkan skill.."
                                    required value="<?= $skills->skill ?>"
                                    maxlength="255">
                            </div>

                            <div class="mb-3">
                                <label for="percentInput" class="form-label">Persentase</label>
                                <input type="number" name="percent" class="form-control" id="percentInput"
                                    placeholder="0-100" required value="<?= $skills->percent ?>">
                            </div>

                            <div class="mb-3">
                                <label for="descriptionInput" class="form-label">Deskripsi</label>
                                <input type="text" name="description" class="form-control" id="descriptionInput"
                                    placeholder="Masukan Deskripsi.." required value="<?= $skills->description ?>">
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-success" name="tombol">💾 Simpan</button>
                            </div>
                        </form>
                    </table>
                </div>
            </div>
        </div>
        <?php include '../../partials/footer.php'; ?>
    </div>
</div>
<?php include '../../partials/script.php'; ?>