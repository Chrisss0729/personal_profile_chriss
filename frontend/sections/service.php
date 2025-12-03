<!-- Load Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<!-- Custom CSS untuk membesarkan icon -->
<style>
    .unit-4-icon i {
        font-size: 100px;
        /* Ukuran icon, bisa diubah sesuai selera */
    }
</style>
<?php $page = 'service'; ?>

<!-- Services -->
<section class="site-section border-bottom bg-light" id="services-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center" data-aos="fade">
                <h2 class="section-title mb-3">Services</h2>
            </div>
        </div>
        <div class="row align-items-stretch">
            <?php
            include "../config/koneksi.php"; // koneksi database

            $query = "SELECT * FROM services ORDER BY id ASC";
            $result = mysqli_query($connect, $query);

            $delay = 0;
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
                    <div class="unit-4">
                        <div class="unit-4-icon mr-4">
                            <i class="<?php echo htmlspecialchars($row['icon']); ?> text-primary"></i>
                        </div>
                        <div>
                            <h3><?php echo htmlspecialchars($row['job']); ?></h3>
                            <p><?php echo htmlspecialchars($row['description']); ?></p>
                        </div>
                    </div>
                </div>
            <?php
                $delay += 100;
            }
            ?>
        </div>
    </div>
</section>