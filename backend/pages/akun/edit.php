<?php include '../../partials/header.php'; ?>
<?php $page = 'akun'; ?>
<?php include '../../partials/sidebar.php'; ?>
<?php include '../../action/akun/show.php'; ?>

<style>
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
                        <h4 class="fw-bold text-primary">👤 Edit Data Akun</h4>
                        <a href="./index.php" class="btn btn-primary">❮❮ Kembali</a>
                    </div>
                    <table class="table table-modern align-middle">
                        <form action="../../action/akun/update.php?id=<?= $user->id ?>" method="POST">
                            <input type="hidden" name="id" value="<?= $user->id ?>">

                            <div class="mb-3">
                                <label for="usernameInput" class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" id="usernameInput"
                                    placeholder="Masukkan username.."
                                    required value="<?= $user->username ?>"
                                    maxlength="100">
                            </div>

                            <div class="mb-3">
                                <label for="emailInput" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="emailInput"
                                    placeholder="Masukkan email.." required value="<?= $user->email ?>">
                            </div>

                            <div class="mb-3">
                                <label for="passwordInput" class="form-label">Password (Kosongkan jika tidak diubah)</label>
                                <input type="password" name="password" class="form-control" id="passwordInput"
                                    placeholder="Masukkan password baru..">
                                <small class="text-muted">Biarkan kosong jika tidak ingin mengubah password</small>
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