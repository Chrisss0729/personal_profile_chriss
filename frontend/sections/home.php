<!-- home -->
<?php
include "../config/koneksi.php";
$qAbout = "SELECT * FROM abouts";
$result = mysqli_query($connect, $qAbout) or die(mysqli_error($connect));
$qSosmed = "SELECT * FROM sosmeds";
$resultSosmed = mysqli_query($connect, $qSosmed) or die(mysqli_error($connect));
$item = $result->fetch_object();
?>
<div class="site-blocks-cover overlay" style="background-image: url(../storages/about/<?= $item->image ?>); position: relative;" data-aos="fade" id="home-section">

    <!-- Overlay gelap -->
    <div style="position: absolute; inset: 0; background: rgba(0,0,0,0.5);"></div>

    <div class="container" style="position: relative; z-index: 1;">
        <div class="row align-items-center justify-content-center">

            <div class="col-md-8 mt-lg-5 text-center">
                <h1 class="text-uppercase text-light" data-aos="fade-up">Selamat Datang di Web Personal Saya</h1>
                <p class="mb-5 desc text-light" data-aos="fade-up" data-aos-delay="100"></p>

                <!-- Tanggal + Jam -->
                <h3 id="tanggal" class="text-white mb-2" style="font-weight: 500;"></h3>
                <h1 id="jam" class="text-white mb-4" style="font-weight: bold; font-size: 3rem;"></h1>

                <div data-aos="fade-up" data-aos-delay="100">
                    <a href="#contact-section" class="btn smoothscroll mr-2 mb-2" style="background-color: blue; color: white;">Kirim Pesan</a>
                    <a href="#about-section" class="btn smoothscroll mr-2 mb-2" style="background-color: blue; color: white;">About</a>
                    <?php while ($sosmed = mysqli_fetch_object($resultSosmed)): ?>
                        <a href="<?= htmlspecialchars($sosmed->link) ?>" target="_blank" class="px-2 text-light">
                            <span class="icon <?= htmlspecialchars($sosmed->icon) ?>" style="font-size: 30px;"></span>
                        </a>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script Jam + Tanggal -->
<script>
    function updateDateTime() {
        const now = new Date();

        // Format tanggal
        const hariList = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
        const bulanList = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli",
            "Agustus", "September", "Oktober", "November", "Desember"
        ];

        const hari = hariList[now.getDay()];
        const tanggal = now.getDate();
        const bulan = bulanList[now.getMonth()];
        const tahun = now.getFullYear();

        document.getElementById("tanggal").innerText = `${hari}, ${tanggal} ${bulan} ${tahun}`;

        // Format jam
        const jam = String(now.getHours()).padStart(2, '0');
        const menit = String(now.getMinutes()).padStart(2, '0');
        const detik = String(now.getSeconds()).padStart(2, '0');
        document.getElementById("jam").innerText = jam + ":" + menit + ":" + detik;
    }

    setInterval(updateDateTime, 1000);
    updateDateTime();
</script>