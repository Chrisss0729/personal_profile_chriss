<?php
include "../../partials/header.php";
$page = 'about';
include "../../partials/sidebar.php";
include "../../partials/navbar.php";
?>

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
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h4 class="fw-bold text-primary">👤 Detail Tabel About</h4>
                    </div>
                    <table class="table table-modern align-middle">
                        <?php
                        include '../../action/about/show.php';
                        ?>
                        <form>
                            <div class="mb-3">
                                <label for="nameInput" class="form-label">Nama</label>
                                <input type="text" class="form-control" value="<?= $about->name ?>" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="bornInput" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" value="<?= $about->born ?>" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="zip_codeInput" class="form-label">Kode Pos</label>
                                <input type="number" class="form-control" value="<?= $about->zip_code ?>" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="emailInput" class="form-label">Email</label>
                                <input type="email" class="form-control" value="<?= $about->email ?>" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="phoneInput" class="form-label">No.Telepon</label>
                                <input type="text" class="form-control" value="<?= $about->phone ?>" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="total_projectInput" class="form-label">total Project</label>
                                <input type="number" class="form-control" value="<?= $about->total_project ?>" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="workInput" class="form-label">Pekerjaan Sekarang</label>
                                <input type="text" class="form-control" value="<?= $about->work ?>" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="addressInput" class="form-label">Alamat</label>
                                <textarea class="form-control" rows="5" disabled><?= $about->address ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="descriptionInput" class="form-label">Deskripsi</label>
                                <textarea class="form-control" rows="5" disabled><?= $about->description ?></textarea>
                            </div>
                            <div class="mb-3">
                                <h6>Gambar</h6>
                                <img class="w-25" src="../../../storages/about/<?= $about->image ?>" alt="">
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