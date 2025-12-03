<?php include '../../partials/header.php'; ?>
<?php $page = 'project'; ?>
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
                        <h4 class="fw-bold text-primary">🗂️ Edit Tabel Project</h4>
                        <a href="./index.php" class="btn btn-primary">❮❮ Kembali</a>
                    </div>
                    <table class="table table-modern align-middle">
                        <?php include '../../action/project/show.php'; ?>

                        <form action="../../action/project/update.php" method="POST" enctype="multipart/form-data">
                            <!-- ID tersembunyi -->
                            <input type="hidden" name="id" value="<?= $project->id ?>">

                            <div class="mb-3">
                                <label for="titleInput" class="form-label">Judul Project</label>
                                <input type="text" name="title" class="form-control" id="titleInput"
                                    placeholder="Masukkan Judul Project.." required
                                    value="<?= htmlspecialchars($project->title) ?>">
                            </div>

                            <div class="mb-3">
                                <label for="jobInput" class="form-label">Pekerjaan</label>
                                <input type="text" name="job" class="form-control" id="jobInput"
                                    placeholder="Masukkan Pekerjaan.." required
                                    value="<?= htmlspecialchars($project->job) ?>">
                            </div>

                            <div class="mb-3">
                                <label for="categoryInput" class="form-label">Kategori</label>
                                <select class="form-select" name="category" id="categoryInput" required>
                                    <option disabled <?= empty($project->category) ? 'selected' : '' ?>>Pilih Kategori</option>
                                    <option value="Web Development" <?= ($project->category == 'Web Development') ? 'selected' : '' ?>>Web Development</option>
                                    <option value="Desain & Kreatif" <?= ($project->category == 'Desain & Kreatif') ? 'selected' : '' ?>>Desain & Kreatif</option>
                                    <option value="Video & Multimedia" <?= ($project->category == 'Video & Multimedia') ? 'selected' : '' ?>>Video & Multimedia</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="descriptionInput" class="form-label">Deskripsi</label>
                                <textarea name="description" id="descriptionInput" class="form-control"
                                    placeholder="Masukkan Deskripsi.." rows="5" required><?= htmlspecialchars($project->description) ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="imageInput" class="form-label">Gambar Project</label>
                                <?php if (!empty($project->image)) : ?>
                                    <div class="mb-2">
                                        <img class="border rounded" style="width: 400px; height: auto;"
                                            src="../../../storages/project/<?= htmlspecialchars($project->image) ?>" alt="Preview">
                                    </div>
                                <?php endif; ?>
                                <input type="file" name="image" class="form-control" id="imageInput">
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