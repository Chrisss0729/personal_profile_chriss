<?php
include "../../partials/header.php";
include "../../partials/sidebar.php";
include "../../partials/navbar.php";
?>

<!-- content -->
<div class="row">
    <div class="card">
        <div class="card-header">
            <h5>Detail Data Skill</h5>
        </div>
        <div class="card-body">
            <form>
                <div class="mb-3">
                    <label class="form-label">ID</label>
                    <input type="text" class="form-control" value="<?= $skills->id ?>" disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label">Skill</label>
                    <input type="text" class="form-control" value="<?= ($skills->skills ?? '') ?>" disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label">Persentase</label>
                    <div class="progress">
                        <div class="progress-bar"
                            role="progressbar"
                            style="width: <?= $skills->percent ?>%"
                            aria-valuenow="<?= $skills->percent ?>"
                            aria-valuemin="0"
                            aria-valuemax="100">
                            <?= $skills->percent ?>%
                        </div>
                    </div>
                    <input type="text" class="form-control mt-2" value="<?= $skills->percent ?>%" disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <input type="text" class="form-control" value="<?= ($skills->description ?? '') ?>" disabled>
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