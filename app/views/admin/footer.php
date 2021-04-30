
<div id="sidebar">
    <div class="sidebar__title">
        <div class="sidebar__img">
            <img src="<?= constant('URL') ?>public/img/logo-reservaya.png" alt="logo" />
        </div>
        <i onclick="closeSidebar()" class="fa fa-times" id="sidebarIcon" aria-hidden="true"></i>
    </div>
    <div class="sidebar__menu sidebar__link sidebar__username">
        <a>¡Bienvenid<i class="fas fa-at"></i> <?php echo $_SESSION['datos'][3] . " " . $_SESSION['datos'][4]; ?>!</a>
        <hr>
    </div>
    <div class="sidebar__menu" id="sidebar__menu">
        <div class="sidebar__link">
            <i class="fa fa-home"></i>
            <a href="<?= constant('URL') ?>admin">Inicio</a>
        </div>
        <div class="sidebar__link">
            <i class="fa fa-id-card" aria-hidden="true"></i>
            <a href="<?= constant('URL') ?>admin/updateInfo">Actualizar información</a>
        </div>
        <div class="sidebar__link">
            <i class="fas fa-book"></i>
            <a href="<?= constant('URL') ?>admin/reservas">Reservaciones</a>
        </div>
        <div class="sidebar__link">
            <i class="fa fa-archive"></i>
            <a href="<?= constant('URL') ?>admin/mesas">Mesas</a>
        </div>
        <div class="sidebar__link">
            <i class="fa fa-utensils"></i>
            <a href="<?= constant('URL') ?>admin/productos">Productos</a>
        </div>
        <div class="sidebar__link">
            <i class="fa fa-check-circle"></i>
            <a href="<?= constant('URL') ?>admin/insumos">Insumos</a>
        </div>
        <div class="sidebar__link">
            <i class="fa fa-truck"></i>
            <a href="<?= constant('URL') ?>admin/proveedores">Proveedores</a>
        </div>
        <div class="sidebar__link">
            <i class="fa fa-user"></i>
            <a href="<?= constant('URL') ?>admin/usuarios">Usuarios</a>
        </div>
        <div class="sidebar__link">
            <i class="fa fa-address-book"></i>
            <a href="<?= constant('URL') ?>admin/informacion">Información</a>
        </div>
        <div class="sidebar__link">
            <i class="fa fa-question-circle"></i>
            <a href="<?= constant('URL') ?>admin/soporte">Soporte</a>
        </div>

        <div class="sidebar__divider">
            <hr />
        </div>

        <div> 
            <p class="sidebar__role">Rol administrador</p>
        </div>
    </div>
</div>
</div>