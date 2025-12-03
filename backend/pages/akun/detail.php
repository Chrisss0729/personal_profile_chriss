<?php
include "../../partials/header.php";
include "../../partials/sidebar.php";
include "../../partials/navbar.php";
include "../../action/akun/show.php";
?>

<!-- content -->
<div class="row">
    <div class="card">
        <div class="card-header">
            <h5>Detail Data Akun</h5>
        </div>
        <div class="card-body">
            <form>
                <div class="mb-3">
                    <label class="form-label">ID</label>
                    <input type="text" class="form-control" value="<?= $user->id ?>" disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" value="<?= ($user->username ?? '') ?>" disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" value="<?= $user->email ?>" disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Dibuat</label>
                    <input type="text" class="form-control" value="<?= date('d F Y H:i:s', strtotime($user->created_at)) ?>" disabled>
                </div>

                <a href="./index.php" class="btn btn-primary">Kembali</a>
            </form>
        </div>
    </div>
</div>

<?php
include '../../partials/footer.php';
include '../../partials/script.php';
?>