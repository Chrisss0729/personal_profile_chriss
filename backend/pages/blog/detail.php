<?php include '../../partials/header.php'; ?>
<?php $page = 'blog'; ?>
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

        <!-- Header -->
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h4 class="fw-bold text-primary">📋 Detail Tabel Blog</h4>
        </div>

        <!-- Card Table -->
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-modern align-middle">
                        <?php
                        include '../../action/blog/show.php';
                        ?>
                        <form>
                            <div class="mb-3">
                                <label class="form-label">Penulis</label>
                                <input type="text" class="form-control" value="<?= $blog->author ?>" disabled>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tanggal</label>
                                <input type="date" class="form-control" value="<?= $blog->date ?>" disabled>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Judul</label>
                                <input type="text" class="form-control" value="<?= $blog->tittle ?>" disabled>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Deskripsi</label>
                                <textarea class="form-control" rows="5" disabled><?= $blog->description ?></textarea>
                            </div>
                            <div class="mb-3">
                                <h6>Gambar</h6>
                                <img class="w-25" src="../../../storages/blog/<?= $blog->image ?>" alt="">
                            </div>
                            <a href="./index.php" class="btn btn-primary">❮❮ Kembali</a>
                        </form>
                    </table>
                </div>
            </div>
        </div>
        <?php include '../../partials/footer.php'; ?>
    </div>
</div>
<?php include '../../partials/script.php'; ?>