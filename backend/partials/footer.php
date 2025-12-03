<body>
    <div id="app">
        <div class="page-container">
            <div id="main">
                <!-- Konten halaman -->
            </div>

            <footer class="footer-sticky">
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2025 &copy;</p>
                    </div>
                    <div class="float-end">
                        <p>
                            Create with <span class="text-danger"><i class="bi bi-heart"></i></span> by
                            <a href="http://ahmadsaugi.com">Chriss</a>
                        </p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>


<style>
    html,
    body {
        height: 100%;
        margin: 0;
    }

    #app {
        min-height: 100%;
        display: flex;
        flex-direction: column;
    }

    .page-container {
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    #main {
        flex: 1;
        padding-bottom: 60px;
        /* sesuaikan dengan tinggi footer */
    }

    .footer-sticky {
        position: fixed;
        bottom: 0;
        right: 0;
        width: 85%;
        background: #fff;
        border-top: 1px solid #ddd;
        padding: 10px 20px;
        z-index: 999;
        /* biar di atas konten lain */
    }
</style>