<?php
include "../../partials/header.php";
include "../../partials/sidebar.php";
include "../../partials/navbar.php";
?>

<!-- content -->
<div class="row">
    <div class="card">
        <div class="card-header">
            <h5>Detail Data Service</h5>
        </div>
        <div class="card-body">
            <?php
            include '../../action/service/show.php';
            ?>
            <form>
                <div class="mb-3">
                    <label class="form-label">Pekerjaan</label>
                    <input type="text" class="form-control" value="<?= $services->job ?>" disabled>
                </div>
                <div class="mb-3">
                    <i class="<?= htmlspecialchars($data->icon) ?>" style="font-size: 50px;"></i>
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