<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="<?= constant('URL') ?>app/views/dist/img/favicon.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= constant('URL') ?>app/views/dist/css/errors.css">
    <title>Gateway Timeout</title>
</head>
<body>
    <h1 class="title_error">504 Tiempo de respuesta inesperado</h1>
    <div class="img_error">
        <img src="<?= constant('URL') ?>app/views/dist/img/errors/504.png" alt="">
    </div>
    <p class="info_error">El servidor esta tardando demasiado en responder y no podemos atender tu solicitud</p>
    <button class="button_return"><a href="<?= constant('URL') ?>">Volver al inicio</a></button>
</body>
</html>