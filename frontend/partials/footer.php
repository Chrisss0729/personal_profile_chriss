<?php
include "../config/koneksi.php";

// Ambil data About
$qAbout = "SELECT * FROM abouts LIMIT 1";
$result = mysqli_query($connect, $qAbout) or die(mysqli_error($connect));
$item = $result->fetch_object();

// Ambil data Sosial Media
$qSosmed = "SELECT * FROM sosmeds";
$resultSosmed = mysqli_query($connect, $qSosmed) or die(mysqli_error($connect));
?>
<!-- Footer -->
<footer class="site-footer">
    <div class="container">
        <div class="row text-center justify-content-center">
            <div class="col-md-5">
                <h2 class="footer-heading mb-4">About Us</h2>
                <p><?= htmlspecialchars($item->name) ?></p>
            </div>
            <div class="col-md-3">
                <h2 class="footer-heading mb-4">Quick Links</h2>
                <ul class="list-unstyled">
                    <li><a href="#about-section" class="smoothscroll">About Me</a></li>
                    <li><a href="#services-section" class="smoothscroll">Services</a></li>
                    <li><a href="#contact-section" class="smoothscroll">Contact Me</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h2 class="footer-heading mb-4">Follow Us</h2>
                <?php while ($sosmed = mysqli_fetch_object($resultSosmed)): ?>
                    <a href="<?= htmlspecialchars($sosmed->link) ?>" target="_blank" class="px-2">
                        <span class="<?= htmlspecialchars($sosmed->icon) ?>"></span>
                    </a>
                <?php endwhile; ?>
            </div>
        </div>

        <div class="row pt-5 mt-5 text-center">
            <div class="col-md-12">
                <div class="border-top pt-4">
                    <p>
                        Copyright &copy;<script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved <i class="icon-heart text-danger"></i> by <a href="#">Chriss</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
    .site-footer {
        background: #333;
        color: #fff;
        padding: 40px 0;
    }

    .site-footer a {
        color: #fff;
        text-decoration: none;
    }

    .site-footer a:hover {
        text-decoration: underline;
    }

    .footer-heading {
        font-weight: bold;
    }

    .site-footer p,
    .site-footer ul,
    .site-footer h2 {
        text-align: center;
    }
</style>