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
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h4 class="fw-bold text-primary">📋 Edit Tabel Blog</h4>
                        <a href="./index.php" class="btn btn-primary">❮❮ Kembali</a>
                    </div>
                    <table class="table table-modern align-middle">
                        <?php
                        include '../../action/blog/show.php';
                        ?>
                        <form action="../../action/blog/update.php?id=<?= $blog->id ?>" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="authorInput" class="form-label">Penulis</label>
                                <input type="text" name="author" class="form-control" id="authorInput"
                                    placeholder="Masukkan nama penulis.." required value="<?= $blog->author ?>">
                            </div>
                            <div class="mb-3">
                                <label for="dateInput" class="form-label">Tanggal</label>
                                <input type="date" name="date" class="form-control" id="dateInput"
                                    required value="<?= $blog->date ?>">
                            </div>
                            <div class="mb-3">
                                <label for="tittleInput" class="form-label">Judul</label>
                                <input type="text" name="tittle" class="form-control" id="tittleInput"
                                    placeholder="Masukkan judul blog.." required value="<?= $blog->tittle ?>">
                            </div>
                            <div class="mb-3">
                                <label for="descriptionInput" class="form-label">Deskripsi</label>
                                <textarea name="description" class="form-control" id="descriptionInput"
                                    placeholder="Masukkan deskripsi blog.." rows="5" required><?= $blog->description ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="imageInput" class="form-label">Gambar Blog</label>
                                <?php if (!empty($blog->image)) : ?>
                                    <div class="mb-2">
                                        <img class="border rounded" style="width: 400px; height: auto;"
                                            src="../../../storages/blog/<?= htmlspecialchars($blog->image) ?>" alt="Preview">
                                    </div>
                                <?php endif; ?>
                                <input type="file" name="image" class="form-control" id="imageInput">
                            </div>

                            <button type="submit" class="btn btn-success" name="tombol">💾 Simpan</button>
                        </form>
                    </table>
                </div>
            </div>
        </div>
        <?php include '../../partials/footer.php'; ?>
    </div>
</div>