<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="shortcut icon" href="<?= constant('URL') ?>public/img/favicon.png" type="image/x-icon" />
<!-- SweetAlert -->
<script src="<?= constant('URL') ?>lib/sweetaler2/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="<?= constant('URL') ?>lib/sweetaler2/sweetalert2.min.css" />
<!-- FontAwesome -->
<link rel="stylesheet" href="<?= constant('URL') ?>lib/fontawesome-5.15.2/css/all.min.css" />
<script src="<?= constant('URL') ?>lib/fontawesome-5.15.2/js/all.min.js"></script>
<!-- Datatables -->
<script src="<?= constant('URL') ?>lib/jquery/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="<?= constant('URL') ?>lib/datatables/datatables.min.css" />
<script src="<?= constant('URL') ?>lib/datatables/datatables.min.js"></script>
<!-- Styles CSS -->
<link rel="stylesheet" href="<?= constant('URL') ?>public/css/normalize.css" />
<link rel="stylesheet" href="<?= constant('URL') ?>public/css/dashboard.css" />
<link rel="stylesheet" href="<?= constant('URL') ?>public/css/datatable.css" />
<link rel="stylesheet" href="<?= constant('URL') ?>public/css/modals.css" />
<link rel="stylesheet" href="<?= constant('URL') ?>public/css/checkbox_comp.css" />
<link rel="stylesheet" href="<?= constant('URL') ?>public/css/drag_and_drop.css" />
<link rel="stylesheet" href="<?= constant('URL') ?>public/css/calendar.css" />

<?php

if ($this->session->get('user') == null || $this->session->get('user')['tipo_usuario'] != "Cliente") {
    header("location: " . constant('URL'));
}

?>