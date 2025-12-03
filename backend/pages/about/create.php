<?php include '../../partials/header.php'; ?>
<?php $page = 'about'; ?>
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
        <!-- Card Table -->
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <!-- Header -->
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h4 class="fw-bold text-primary">👤 Tambah Tabel About</h4>
                        <a href="./index.php" class="btn btn-primary">❮❮ Kembali</a>
                    </div>
                    <table class="table table-modern align-middle">
                        <form action="../../action/about/store.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="nameInput" class="form-label">Nama</label>
                                <input type="text" name="name" class="form-control" id="nameInput"
                                    placeholder="Masukan Nama.. " required>
                            </div>
                            <div class="mb-3">
                                <label for="bornInput" class="form-label">Tanggal Lahir</label>
                                <input type="date" name="born" class="form-control" id="bornInput">
                            </div>
                            <div class="mb-3">
                                <label for="zip_codeInput" class="form-label">Kode Pos</label>
                                <input type="number" name="zip_code" class="form-control" id="zip_codeInput"
                                    placeholder="Masukan Kode Pos.. " required>
                            </div>
                            <div class="mb-3">
                                <label for="emailInput" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="emailInput">
                            </div>
                            <div class="mb-3">
                                <label for="phoneInput" class="form-label">No.Telepon</label>
                                <input type="text" name="phone" class="form-control" id="phoneInput"
                                    placeholder="Masukan Nomer Telepon.. " required>
                            </div>
                            <div class="mb-3">
                                <label for="total_projectInput" class="form-label">Total Project</label>
                                <input type="number" name="total_project" class="form-control" id="total_projectInput"
                                    placeholder="Masukan total project.. " required>
                            </div>
                            <div class="mb-3">
                                <label for="workInput" class="form-label">Pekerjaan Sekarang</label>
                                <input type="text" name="work" class="form-control" id="workInput"
                                    placeholder="Masukan Pekerjaan.. " required>
                            </div>
                            <div class="mb-3">
                                <label for="addressInput" class="form-label">Alamat</label>
                                <textarea name="address" id="address" class="form-control"
                                    placeholder="Masukan Alamat.. " rows="5"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="descriptionInput" class="form-label">Deskripsi</label>
                                <textarea name="description" id="description" class="form-control"
                                    placeholder="Masukan Deskripsi.. " rows="5"></textarea>
                            </div>
                            <div class="mb-3">
                                <label type="imageInput" name="form-label">Pilih Gambar</label>
                                <input type="file" name="image" class="form-control" id="imageInput" required>
                            </div>
                            <button type="submit" class="btn btn-success" name="tombol">✚ Tambah</button>
                        </form>
                    </table>
                </div>
            </div>
        </div>
        <?php include '../../partials/footer.php'; ?>
    </div>
</div>

<?php include '../../partials/script.php'; ?>