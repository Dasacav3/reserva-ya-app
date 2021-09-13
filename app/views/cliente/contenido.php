<div class="container">
    <nav class="navbar">
        <div class="nav_icon" id="nav_icon">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
        <div class="navbar__left">
            <h4>¡Bienvenid<i class="fas fa-at"></i> <?= $this->session->get('user')['nombre_cliente'] . " " . $this->session->get('user')['apellido_cliente'] ?>!</h4>
        </div>
        <div class="navbar__right">
            <button class="switch" id="switch">
                <span><i class="fas fa-sun"></i></span>
                <span><i class="fas fa-moon"></i></span>
            </button>
            <a href="<?= constant('URL') ?>cliente/soporte">
                <i class="fa fa-question-circle" aria-hidden="true"></i>
            </a>
            <a href="<?= constant('URL') ?>app/models/logout.php">
                <i class="fa fa-power-off" aria-hidden="true"></i>
            </a>
            <a href="<?= constant('URL') ?>cliente/updateInfo">
                <img class="foto_perfil" src="<?= $this->session->get('user')['foto_perfil'] ?>" />
            </a>
        </div>
    </nav>