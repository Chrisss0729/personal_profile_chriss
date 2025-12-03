<?php
include "../config/koneksi.php";
$qAbout = "SELECT * FROM abouts LIMIT 1";
$result = mysqli_query($connect, $qAbout) or die(mysqli_error($connect));
$about = mysqli_fetch_assoc($result); // Changed to fetch_assoc() instead of object
?>
<?php $page = 'contact'; ?>

<!-- Contact -->
<section class="site-section bg-light" id="contact-section" data-aos="fade">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h2 class="section-title mb-3">Contact</h2>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-md-4 text-center">
                <p class="mb-4">
                    <span class="icon-room d-block h4 text-primary"></span>
                    <span style="color: #007beeff;"><?= htmlspecialchars($about['address'] ?? 'Address not specified') ?></span>
                </p>
            </div>
            <div class="col-md-4 text-center">
                <p class="mb-4">
                    <span class="icon-phone d-block h4 text-primary"></span>
                    <a href="tel:<?= htmlspecialchars($about['phone'] ?? '') ?>">
                        <?= htmlspecialchars($about['phone'] ?? 'Phone not specified') ?>
                    </a>
                </p>
            </div>
            <div class="col-md-4 text-center">
                <p class="mb-0">
                    <span class="icon-mail_outline d-block h4 text-primary"></span>
                    <a href="mailto:<?= htmlspecialchars($about['email'] ?? '') ?>">
                        <?= htmlspecialchars($about['email'] ?? 'Email not specified') ?>
                    </a>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-5">
                <form action="./action/contact/create_contact.php" class="p-5 bg-white" method="POST">
                    <h2 class="h4 text-black mb-5">Masukan Saran</h2>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="name">Nama</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="phone">No Telephone</label>
                            <input type="number" name="phone" id="phone" class="form-control" required>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="subject">Subjek</label>
                            <input type="text" name="subject" id="subject" class="form-control" required>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="message">Pesan</label>
                            <textarea name="message" id="message" cols="30" rows="7" class="form-control"
                                placeholder="Isi Pesan Deskripsimu disini..." required></textarea>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <input type="submit" name="tombol" value="Send Message" class="btn btn-primary btn-md text-white">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>