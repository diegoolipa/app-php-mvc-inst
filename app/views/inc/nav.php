<nav class="is-fixed-top navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <button class="button is-white menu-click">

        </button>
        <a class="navbar-item" href="#">
            <img src="<?php echo APP_URL ?>./app/views/img/logo.png" alt="logo"  height="400">
        </a>

        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item">
                Home
            </a>

            <a class="navbar-item">
                Documentation
            </a>
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                    PDF
                </a>

                <div class="navbar-dropdown">
                    <a href="<?php echo APP_URL ?>pdf/reporte_usuario.php" class="navbar-item">
                        pdf usuario
                    </a>
                    <a class="navbar-item is-selected">
                        Jobs
                    </a>
                    <a class="navbar-item">
                        Contact
                    </a>
                    <hr class="navbar-divider">
                    <a class="navbar-item">
                        Report an issue
                    </a>
                </div>
            </div>
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                    More
                </a>

                <div class="navbar-dropdown">
                    <a class="navbar-item">
                        About
                    </a>
                    <a class="navbar-item is-selected">
                        Jobs
                    </a>
                    <a class="navbar-item">
                        Contact
                    </a>
                    <hr class="navbar-divider">
                    <a class="navbar-item">
                        Report an issue
                    </a>
                </div>
            </div>
        </div>

        <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                    <a class="button is-light">
                        Salir
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>