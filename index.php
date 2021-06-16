<?php

    require_once "app/libraries/database.php";
    require_once "app/libraries/controller.php";
    require_once "app/libraries/model.php";
    require_once "app/libraries/view.php";
    require_once "app/libraries/app.php";

    require_once "lib/mpdf/vendor/autoload.php";

    require_once "app/controller/session.php";

    require_once "app/config/config.php";

    date_default_timezone_set("America/Bogota");

    $app = new App;