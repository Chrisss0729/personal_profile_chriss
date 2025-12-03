<header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">
    <div class="container">
        <div class="row align-items-center">

            <!-- Logo -->
            <div class="col-6 col-xl-2">
                <h1 class="mb-0 site-logo">
                    <a href="index.php" class="h2 mb-0" style="display: inline-block; line-height: 1.2;">
                        My Profile<span class="text-primary"></span>
                    </a>
                </h1>
            </div>

            <!-- Menu -->
            <div class="col-12 col-md-10 d-none d-xl-block">
                <nav class="site-navigation position-relative text-right" role="navigation">
                    <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                        <li><a href="#home-section" class="nav-link <?= ($page == 'home') ? 'active' : '' ?>">Home</a></li>
                        <li><a href="#about-section" class="nav-link <?= ($page == 'about') ? 'active' : '' ?>">About</a></li>
                        <li><a href="#blog-section" class="nav-link <?= ($page == 'blog') ? 'active' : '' ?>">Blog</a></li>
                        <li><a href="#skill-section" class="nav-link <?= ($page == 'skill') ? 'active' : '' ?>">Skill</a></li>
                        <li><a href="#resume-section" class="nav-link <?= ($page == 'resume') ? 'active' : '' ?>">Resume</a></li>
                        <li><a href="#project-section" class="nav-link <?= ($page == 'project') ? 'active' : '' ?>">Project</a></li>
                        <li><a href="#services-section" class="nav-link <?= ($page == 'service') ? 'active' : '' ?>">Services</a></li>
                        <li><a href="#contact-section" class="nav-link <?= ($page == 'contact') ? 'active' : '' ?>">Contact</a></li>
                    </ul>
                </nav>
            </div>

            <!-- Mobile Menu Toggle -->
            <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;">
                <a href="#" class="site-menu-toggle js-menu-toggle float-right">
                    <span class="icon-menu h3"></span>
                </a>
            </div>

        </div>
    </div>
</header>




<!-- CSS -->
<style>
    /* Active menu */
    .site-navbar .nav-link.active {
        color: #00d9ff !important;
        font-weight: bold;
        position: relative;
    }

    /* Underline active */
    .site-navbar .nav-link.active::after {
        content: "";
        position: absolute;
        bottom: -5px;
        left: 0;
        width: 100%;
        height: 2px;
        background: #00d9ff;
        border-radius: 2px;
    }
</style>
<script>
    document.addEventListener("scroll", setActiveNav);
    document.addEventListener("DOMContentLoaded", setActiveNav);

    function setActiveNav() {
        let sections = document.querySelectorAll("section[id]");
        let scrollPos = window.scrollY || document.documentElement.scrollTop;
        let navbarHeight = document.querySelector(".site-navbar").offsetHeight;

        let found = false;

        sections.forEach(section => {
            let id = section.getAttribute("id");
            let offset = section.offsetTop - navbarHeight - 20; // tambahin margin biar pas
            let height = section.offsetHeight;

            if (scrollPos >= offset && scrollPos < offset + height) {
                document.querySelectorAll(".site-navbar .nav-link").forEach(link => {
                    link.classList.remove("active");
                    if (link.getAttribute("href") === "#" + id) {
                        link.classList.add("active");
                        found = true;
                    }
                });
            }
        });

        // fallback: kalau belum ada yang ketemu, default ke home
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