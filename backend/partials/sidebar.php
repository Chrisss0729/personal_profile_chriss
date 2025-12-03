<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo" style="display: flex; align-items: center; gap: 10px;">
                    <!-- Foto Profile -->
                    <img src="../../../storages/about/me.jpeg"
                        alt="Profile"
                        style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;">
                    <!-- Teks Logo -->
                    <a href="../dashboard/index.php"
                        style="font-size: 20px; font-weight: bold; color: #333; text-decoration: none;">
                        Personal Profile
                    </a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block">
                        <i class="bi bi-x bi-middle"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">
                    <h6>Menu Navigation</h6>
                </li>

                <li class="nav-item <?= ($page == 'dashboard') ? 'active' : '' ?>">
                    <a href="../dashboard/index.php" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="nav-item <?= ($page == 'about') ? 'active' : '' ?>">
                    <a href="../about/index.php" class='sidebar-link'>
                        <i class="bi bi-person-fill"></i>
                        <span>About</span>
                    </a>
                </li>

                <li class="nav-item <?= ($page == 'blog') ? 'active' : '' ?>">
                    <a href="../blog/index.php" class='sidebar-link'>
                        <i class="bi bi-journal-text"></i>
                        <span>Blog</span>
                    </a>
                </li>

                <li class="nav-item <?= ($page == 'contact') ? 'active' : '' ?>">
                    <a href="../contact/index.php" class='sidebar-link'>
                        <i class="bi bi-envelope-fill"></i>
                        <span>Contact</span>
                    </a>
                </li>

                <li class="nav-item <?= ($page == 'project') ? 'active' : '' ?>">
                    <a href="../project/index.php" class='sidebar-link'>
                        <i class="bi bi-folder-fill"></i>
                        <span>Projects</span>
                    </a>
                </li>

                <li class="nav-item <?= ($page == 'resume') ? 'active' : '' ?>">
                    <a href="../resume/index.php" class='sidebar-link'>
                        <i class="bi bi-file-earmark-text-fill"></i>
                        <span>Resume</span>
                    </a>
                </li>

                <li class="nav-item <?= ($page == 'service') ? 'active' : '' ?>">
                    <a href="../service/index.php" class='sidebar-link'>
                        <i class="bi bi-briefcase-fill"></i>
                        <span>Services</span>
                    </a>
                </li>

                <li class="nav-item <?= ($page == 'skill') ? 'active' : '' ?>">
                    <a href="../skill/index.php" class='sidebar-link'>
                        <i class="bi bi-tools"></i>
                        <span>Skills</span>
                    </a>
                </li>

                <li class="nav-item <?= ($page == 'socmed') ? 'active' : '' ?>">
                    <a href="../socmed/index.php" class='sidebar-link'>
                        <i class="bi bi-share-fill"></i>
                        <span>Social Media</span>
                    </a>
                </li>

                <li class="nav-item <?= ($page == 'akun') ? 'active' : '' ?>">
                    <a href="../akun/index.php" class='sidebar-link'>
                        <i class="bi bi-person-badge-fill"></i>
                        <span>User</span>
                    </a>
                </li>

            </ul>
        </div>

        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">
                    <h6>Auth</h6>
                </li>

                <li class="nav-item">
                    <a href="../../action/auth/logout.php" class='sidebar-link'>
                        <i class="bi bi-box-arrow-right text-danger"></i>
                        <span class="text-danger">Log Out</span>
                    </a>
                </li>
            </ul>
        </div>

        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>

<style>
    .sidebar-menu ul.menu,
    .sidebar-menu ul.menu li {
        list-style: none;
    }

    .sidebar-menu ul.auth li {
        list-style: none;
    }

    /* Styling link menu */
    .sidebar-menu .nav-item a {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px 15px;
        border-radius: 6px;
        text-decoration: none;
        transition: all 0.3s ease-in-out;
        color: #000;
    }

    /* Hover effect */
    .sidebar-menu .nav-item a:hover {
        background-color: #888;
        color: #000;
    }

    /* Menu aktif dengan animasi RGB */
    .sidebar-menu .nav-item.active a {
        background: linear-gradient(270deg, #ff3239ff, #2ecafaff, #dc2cffff, #ff5bd0ff);
        background-size: 600% 600%;
        animation: rgbActive 10s ease infinite;
        padding: 10px 15px;
        border-radius: 12px;
        color: #fff !important;
        font-weight: 600;
        transition: all 0.3s ease-in-out;
    }

    .sidebar-menu .nav-item.active a i {
        color: #fff !important;
    }

    @keyframes rgbActive {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }

    /* Sidebar title */
    .sidebar-title {
        font-size: 12px;
        font-weight: bold;
        text-transform: uppercase;
        color: #dbdbdbff;
        padding: 10px 15px;
    }
</style>