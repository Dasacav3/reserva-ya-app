<div class="container">
    <nav class="navbar">
        <div class="nav_icon" onclick="toggleSidebar()">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
        <div class="navbar__left">
            <h4>¡Bienvenid<i class="fas fa-at"></i> <?php echo $_SESSION['datos'][3] . " " . $_SESSION['datos'][4]; ?>!</h4>
        </div>
        <div class="navbar__right">
            <button class="switch" id="switch">
                <span><i class="fas fa-sun"></i></span>
                <span><i class="fas fa-moon"></i></span>
            </button>
            <a href="./informacion/soporte.php">
                <i class="fa fa-question-circle" aria-hidden="true"></i>
            </a>
            <a href="<?= constant('URL') ?>app/models/logout.php">
                <i class="fa fa-power-off" aria-hidden="true"></i>
            </a>
            <a href="./usuarios/updateInfo.php">
                <img class="foto_perfil" src="<?php echo $img; ?>" />
            </a>
        </div>
    </nav>

           

    