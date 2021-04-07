<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validando...</title>
    <!-- Sweer Alert -->
    <script src="../../lib/sweetaler2/sweetalert2.all.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="../../lib/sweetaler2/sweetalert2.min.css">
    <link rel="shortcut icon" href="../views/dist/img/favicon.png">
</head>
<body>
<?php

    session_start();
    session_destroy();
    header("location:../views/login.php")

?>
</body>
<html>