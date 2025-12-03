<?php
// Ambil kategori unik
$categoryQuery = mysqli_query($connect, "SELECT DISTINCT category FROM projects WHERE category IS NOT NULL AND category != '' ORDER BY category ASC");

// Ambil project terbaru
$qProject = "SELECT * FROM projects ORDER BY id DESC LIMIT 3";
$result = mysqli_query($connect, $qProject) or die(mysqli_error($connect));

// Fungsi untuk membuat slug kategori
function slugify($text)
{
    $text = preg_replace('~[^\pL\d]+~u', '-', $text); // ganti spasi/simbol jadi -
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text); // translit ke ASCII
    $text = preg_replace('~[^-\w]+~', '', $text); // hapus selain huruf/angka/-
    $text = trim($text, '-'); // hapus - di awal/akhir
    $text = preg_replace('~-+~', '-', $text); // hapus -- ganda
    return strtolower($text);
}
?>
<?php $page = 'project'; ?>
<?php
// Header
?>
<link rel="shortcut icon" href="./../../templates-user/images/user_icon.png" type="image/png">
<style>
    .project-img-wrapper {
        position: relative;
        width: 100%;
        padding-top: 100%;
        overflow: hidden;
        border-radius: 10px;
    }

    .project-img-wrapper img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .project-img-wrapper:hover img {
        transform: scale(1.05);
    }

    .h-entry h2 {
        font-size: 1.2rem;
        margin-top: 10px;
        font-weight: bold;
    }

    /* Tombol filter */
    #filters .btn {
        margin: 0 5px 10px;
    }

    /* Animasi filter Isotope */
    .element-item {
        transition: transform 0.4s ease, opacity 0.4s ease;
    }

    .isotope-hidden {
        pointer-events: none;
        opacity: 0;
        transform: scale(0.95);
    }
</style>

<section class="site-section" id="project-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center" data-aos="fade">
                <h2 class="section-title mb-3">My Projects</h2>
            </div>
        </div>

        <!-- Filter Kategori -->
        <div class="row justify-content-center mb-5" data-aos="fade-up">
            <div id="filters" class="filters text-center button-group col-md-7">
                <button class="btn btn-primary active" data-filter="*">All</button>
                <?php while ($cat = mysqli_fetch_assoc($categoryQuery)) : ?>
                    <?php if (!empty($cat['category'])) : ?>
                        <?php $slug = slugify($cat['category']); ?>
                        <button class="btn btn-primary" data-filter=".<?= $slug ?>">
                            <?= htmlspecialchars($cat['category']) ?>
                        </button>
                    <?php endif; ?>
                <?php endwhile; ?>
            </div>
        </div>

        <!-- Daftar Project -->
        <div class="row grid">
            <?php
            $delay = 0;
            while ($row = mysqli_fetch_assoc($result)):
                $imagePath = "../storages/project/" . $row['image'];
                $slugCategory = slugify($row['category']);
            ?>
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-4 element-item <?= $slugCategory ?>" data-aos="fade-up" data-aos-delay="<?= $delay ?>">
                    <div class="h-entry">
                        <a href="../../../../personal_profile_chriss/frontend/sections/project/detail_project.php?id=<?= $row['id'] ?>">
                            <div class="project-img-wrapper">
                                <img src="<?= $imagePath ?>"
                                    alt="<?= htmlspecialchars($row['title']) ?>"
                                    onerror="this.src='../storages/project/default.jpg'">
                            </div>
                        </a>
                        <h2 class="font-size-regular">
                            <a href="../../../../personal_profile_chriss/frontend/sections/project/detail_project.php?id=<?= $row['id'] ?>">
                                <?= htmlspecialchars($row['title']) ?>
                            </a>
                        </h2>
                        <div class="meta mb-4">
                            <?= htmlspecialchars($row['job']) ?>
                            <span class="mx-2">&bullet;</span>
                            <?= htmlspecialchars($row['category']) ?>
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
                <a href="../../../../personal_profile_chriss/frontend/sections/project/list_project.php" class="btn btn-primary">View All Projects</a>
            </div>
        </div>
    </div>
</section>

<!-- Isotope untuk filter -->
<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
<script>
    var grid = document.querySelector('.grid');
    var iso = new Isotope(grid, {
        itemSelector: '.element-item',
        layoutMode: 'fitRows',
        transitionDuration: '0.4s' // durasi transisi filter
    });

    var filtersElem = document.querySelector('#filters');
    filtersElem.addEventListener('click', function(event) {
        if (!event.target.matches('button')) {
            return;
        }
        var filterValue = event.target.getAttribute('data-filter');
        iso.arrange({
            filter: filterValue
        });

        // Efek delay bertahap setelah filter dipilih
        var items = document.querySelectorAll('.element-item:not(.isotope-hidden)');
        items.forEach((item, index) => {
            item.style.transitionDelay = (index * 0.05) + 's'; // 50ms delay antar item
        });

        filtersElem.querySelectorAll('button').forEach(btn => btn.classList.remove('active'));
        event.target.classList.add('active');
    });
</script>