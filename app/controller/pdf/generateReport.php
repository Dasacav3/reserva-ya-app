<?php

require_once("../../../lib/mpdf/vendor/autoload.php");
require_once("reservasPdf.php");
require_once("../database.php");


$fecha_inicio = $_POST['fecha_inicio'];
$fecha_final = $_POST['fecha_final'];

$today = date('Y-m-d h:i:s A');
$codigo = strtotime($today);
$strToday = settype($today,"string");

// PETICION PARA PDF RESERVAS
try {
    $query = $pdo->prepare("SELECT reservacion.ESTADO_RESERVACION, reservacion.ID_RESERVACION, cliente.NOMBRE_CLIENTE, cliente.APELLIDO_CLIENTE, 
        reservacion.FECHA_RESERVACION, reservacion.HORA_RESERVACION, mesa.ID_MESA, reservacion.ASIENTO, reservacion_reserva_mesa.ID_RESERVACION_RESERVA_MESA
        FROM reservacion_reserva_mesa
        INNER JOIN reservacion ON reservacion_reserva_mesa.ID_RESERVACION = reservacion.ID_RESERVACION
        INNER JOIN mesa ON reservacion_reserva_mesa.ID_MESA = mesa.ID_MESA
        INNER JOIN cliente ON reservacion.ID_CLIENTE = cliente.ID_CLIENTE
        WHERE reservacion.FECHA_RESERVACION >= '$fecha_inicio' AND reservacion.FECHA_RESERVACION <= '$fecha_final'
        ORDER BY reservacion.FECHA_RESERVACION ASC");
    $query->execute();
    $reservas = $query->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo "Conexion fallida " . $e->getMessage();
    die();
}

$mpdf = new \Mpdf\Mpdf([
    'mode' => 'utf-8',
    'format' => [279, 216],
    'orientation' => 'L'
]);

$plantilla = getPlantilla($reservas, $fecha_inicio, $fecha_final,$today);

$css = file_get_contents("../../views/dist/css/pdf.css");

$mpdf->SetTitle("Reporte reservaciones");
$mpdf->SetAuthor("Reserva Ya");
$mpdf->SetHTMLFooter("
        <footer class='footer'>
            <p>© Todos los derechos reservados | Reserva Ya 2021</p>
        </footer>");

$mpdf->WriteHTML($css, 1);
$mpdf->WriteHTML($plantilla, 2);


$mpdf->Output('../../../public/Reporte-Reserva'.$codigo.'.pdf', 'F');

echo('public/Reporte-Reserva'.$codigo.'.pdf');
