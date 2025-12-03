<?php
$qBlog = "SELECT * FROM blogs ORDER BY date DESC LIMIT 3";
$result = mysqli_query($connect, $qBlog) or die(mysqli_error($connect));
?>
<link rel="shortcut icon" href="./../../templates-user/images/user_icon.png" type="image/png">
<style>
    /* Membuat container gambar 1x1 */
    .blog-img-wrapper {
        position: relative;
        width: 100%;
        padding-top: 100%;
        /* 1x1 ratio */
        overflow: hidden;
        border-radius: 10px;
    }

    .blog-img-wrapper img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        /* Potong gambar supaya rapi */
        transition: transform 0.3s ease;
    }

    .blog-img-wrapper:hover img {
        transform: scale(1.05);
    }

    /* Judul blog */
    .h-entry h2 {
        font-size: 1.2rem;
        margin-top: 10px;
        font-weight: bold;
    }
</style>

<section class="site-section" id="blog-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center" data-aos="fade">
                <h2 class="section-title mb-3">Blog</h2>
            </div>
        </div>

        <div class="row">
            <?php
            $delay = 0;
            while ($row = mysqli_fetch_assoc($result)):
                $imagePath = "../storages/blog/" . $row['image'];
            ?>
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="<?= $delay ?>">
                    <div class="h-entry">
                        <a>
                            <div class="blog-img-wrapper">
                                <img src="<?= $imagePath ?>"
                                    alt="<?= htmlspecialchars($row['tittle']) ?>"
                                    onerror="this.src='../storages/blog/default.jpg'">
                            </div>
                        </a>
                        <h2 class="font-size-regular">
                            <a href=""><?= htmlspecialchars($row['tittle']) ?></a>
                        </h2>
                        <div class="meta mb-4">
                            <?= htmlspecialchars($row['author']) ?>
                            <span class="mx-2">&bullet;</span>
                            <?= date("M d, Y", strtotime($row['date'])) ?>
                        </div>
                        <p><?= substr(htmlspecialchars($row['description']), 0, 100) ?>...</p>
                    </div>
                </div>
            <?php
                $delay += 100;
            endwhile;
            ?>
        </div>

        <div class="row">
            <div class="col-12 text-center mt-4">
                <a href="../../../../personal_profile_chriss/frontend/sections/blog/list_blog.php" class="btn btn-primary">Lihat Semua Blog</a>
            </div>
        </div>
    </div>
</section>