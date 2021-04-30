<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="<?= constant('URL') ?>public/img/favicon.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= constant('URL') ?>public/css/errors.css">
    <title>Unauthorized</title>
</head>
<body>
    <h1 class="title_error">401 No autorizado</h1>
    <div class="img_error">
        <img src="<?= constant('URL') ?>public/img/errors/401.png" alt="">
    </div>
    <p class="info_error">Algo fallo y no se pudo hacer la autenticación</p>
    <button class="button_return"><a href="<?= constant('URL') ?>">Volver al inicio</a></button>
</body>
</html>