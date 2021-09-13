
<div id="sidebar">
    <div class="sidebar__title">
        <div class="sidebar__img">
            <img src="<?= constant('URL') ?>public/img/logo-reservaya.png" alt="logo" />
        </div>
        <div id="sidebarIcon">
            <i class="fa fa-times" aria-hidden="true"></i>
        </div>
    </div>
    <div class="sidebar__menu sidebar__link sidebar__username">
        <a>¡Bienvenid<i class="fas fa-at"></i> <?= $this->session->get('user')['nombre_cliente'] . " " . $this->session->get('user')['apellido_cliente'] ?>!</a>
        <hr>
    </div>
    <div class="sidebar__menu" id="sidebar__menu">
        <div class="sidebar__link">
            <i class="fa fa-home"></i>
            <a href="<?= constant('URL') ?>cliente">Inicio</a>
        </div>
        <div class="sidebar__link">
            <i class="fa fa-id-card" aria-hidden="true"></i>
            <a href="<?= constant('URL') ?>cliente/updateInfo">Actualizar información</a>
        </div>
        <div class="sidebar__link">
            <i class="fas fa-book"></i>
            <a href="<?= constant('URL') ?>cliente/reservas">Reservaciones</a>
        </div>
        <div class="sidebar__link">
            <i class="fa fa-question-circle"></i>
            <a href="<?= constant('URL') ?>cliente/soporte">Soporte</a>
        </div>

        <div class="sidebar__divider">
            <hr />
        </div>

        <div> 
            <p class="sidebar__role">Rol cliente</p>
        </div>
    </div>
</div>
</div>