<!-- About Section -->
<div class="site-section" id="about-section">
    <div class="container">
        <div class="row mb-5">
            <!-- Image Column (Left) -->
            <div class="col-lg-5 mb-5 mb-lg-0" data-aos="fade-right">
                <figure class="img-border">
                    <img src="../storages/about/<?= $item->image ?>"
                        alt="About Us"
                        class="img-fluid rounded shadow">
                </figure>
            </div>

            <!-- Content Column (Right) -->
            <div class="col-lg-6 ml-auto" data-aos="fade-left">
                <?php
                // Include database connection
                require_once __DIR__ . '../../../config/koneksi.php';

                // Fetch about data from database
                $query = "SELECT * FROM abouts LIMIT 1";
                $result = mysqli_query($connect, $query);

                if ($result && mysqli_num_rows($result) > 0) {
                    $about = mysqli_fetch_assoc($result);
                ?>
                    <h2 class="section-title mb-4">About</h2>

                    <h3 class="h4 mb-4"><?= htmlspecialchars($about['name'] ?? 'For the next great business') ?></h3>

                    <div class="mb-4">
                        <?php
                        $description = $about['description'] ?? 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo tempora cumque eligendi in nostrum labore omnis quaerat.';
                        $paragraphs = explode("\n", wordwrap($description, 500));
                        foreach ($paragraphs as $paragraph) {
                            echo '<p>' . htmlspecialchars(trim($paragraph)) . '</p>';
                        }
                        ?>
                    </div>

                    <div class="mb-4">
                        <ul class="list-unstyled check-list">
                            <?php
                            $work_items = array_filter(explode(',', $about['work'] ?? ''));

                            if (!empty($work_items)) {
                                foreach ($work_items as $item) {
                                    echo '<li class="mb-2">Pekerjaan: ' . htmlspecialchars(trim($item)) . '</li>';
                                }
                            } else {
                                echo '<li class="mb-2"> Pekerjaan: Officia quaerat eaque neque</li>';
                            }
                            ?>

                            <!-- Additional Information Fields -->
                            <li class="mb-2">Email: <?= htmlspecialchars($about['email'] ?? 'N/A') ?></li>
                            <li class="mb-2">Telepon: <?= htmlspecialchars($about['phone'] ?? 'N/A') ?></li>
                            <li class="mb-2">Total Proyek: <?= htmlspecialchars($about['total_project'] ?? '0') ?></li>
                            <li class="mb-2">Kode Pos: <?= htmlspecialchars($about['zip_code'] ?? 'N/A') ?></li>
                            <li class="mb-2">Alamat: <?= htmlspecialchars($about['address'] ?? 'N/A') ?></li>
                        </ul>
                    </div>
                <?php
                } else {
                    // Fallback content
                    echo '<h2 class="section-title mb-4">About Us</h2>
                          <h3 class="h4 mb-4">For the next great business</h3>
                          <div class="mb-4">
                              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                              <p>Quo tempora cumque eligendi in nostrum labore omnis quaerat.</p>
                          </div>
                          <div class="mb-4">
                              <ul class="list-unstyled check-list">
                                  <li class="mb-2">Officia quaerat eaque neque</li>
                                  <li class="mb-2">Possimus aut consequuntur incidunt</li>
                                  <li class="mb-2">Lorem ipsum dolor sit amet</li>
                                  <li class="mb-2">Consectetur adipisicing elit</li>
                              </ul>
                          </div>';
                }
                ?>
            </div>
        </div>
    </div>
</div>

<style>
    /* Custom styling */
    #about-section {
        padding: 80px 0;
    }

    .img-border {
        position: relative;
        padding: 10px;
        background: #fff;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .img-border img {
        width: 100%;
        aspect-ratio: 9 / 11;
        /* proporsi 9:16 */
        object-fit: cover;
        /* biar gambar tidak ketarik aneh */
        border: 10px solid #fff;
    }


    .section-title {
        font-size: 2.2rem;
        color: #333;
        position: relative;
        padding-bottom: 15px;
    }

    .section-title:after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 50px;
        height: 3px;
        background: #007bff;
    }

    .check-list li {
        position: relative;
        padding-left: 30px;
        margin-bottom: 10px;
        color: #555;
    }

    .check-list li:before {
        content: '-';
        position: absolute;
        left: 0;
        color: #007bff;
        font-weight: bold;
    }

    @media (max-width: 991.98px) {
        #about-section .row {
            flex-direction: column;
        }

        #about-section .col-lg-5 {
            margin-bottom: 40px;
        }
    }
</style>

<script>
    document.addEventListener("scroll", setActiveNav);
    document.addEventListener("DOMContentLoaded", setActiveNav);

    function setActiveNav() {
        let sections = document.querySelectorAll("[id]"); // ambil semua elemen yg ada id-nya
        let scrollPos = window.scrollY || document.documentElement.scrollTop;
        let navbarHeight = document.querySelector(".site-navbar").offsetHeight;

        let found = false;

        sections.forEach(section => {
            let id = section.getAttribute("id");
            // filter hanya section yang memang ada di menu nav
            if (!document.querySelector('.site-navbar .nav-link[href="#' + id + '"]')) return;

            let offset = section.offsetTop - navbarHeight - 20;
            let height = section.offsetHeight;

            if (scrollPos >= offset && scrollPos < offset + height) {
                document.querySelectorAll(".site-navbar .nav-link").forEach(link => {
                    link.classList.remove("active");
                });
                let activeLink = document.querySelector('.site-navbar .nav-link[href="#' + id + '"]');
                if (activeLink) activeLink.classList.add("active");
                found = true;
            }
        });

        // fallback default: Home aktif kalau posisi masih di atas
        if (!found) {
            document.querySelectorAll(".site-navbar .nav-link").forEach(link => {
                link.classList.remove("active");
                if (link.getAttribute("href") === "#home-section") {
                    link.classList.add("active");
                }
            });
        }
    }
</script>