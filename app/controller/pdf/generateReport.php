<?php

require_once("../../../lib/mpdf/vendor/autoload.php");
require_once("reservasPdf.php");
require_once("insumosPdf.php");
require_once("clientesPdf.php");
require_once("../database.php");

error_reporting(0);

$insumos = $_POST['insumos'];
$cliente = $_POST['cliente'];
$reserva = $_POST['reservas'];
$fecha_inicio = $_POST['fecha_inicio'];
$fecha_final = $_POST['fecha_final'];

$today = date('Y-m-d h:i:s A');
$codigo = strtotime($today);
$strToday = settype($today, "string");


if (isset($reserva)) {
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


    try {
        $queryFecha = $pdo->prepare("SELECT reservacion.FECHA_RESERVACION, COUNT(*) AS 'VECES'
        FROM reservacion_reserva_mesa
        INNER JOIN reservacion ON reservacion_reserva_mesa.ID_RESERVACION = reservacion.ID_RESERVACION
        INNER JOIN mesa ON reservacion_reserva_mesa.ID_MESA = mesa.ID_MESA
        INNER JOIN cliente ON reservacion.ID_CLIENTE = cliente.ID_CLIENTE
        WHERE reservacion.FECHA_RESERVACION >= '$fecha_inicio' AND reservacion.FECHA_RESERVACION <= '$fecha_final'
        GROUP BY reservacion.FECHA_RESERVACION
        HAVING COUNT(*) > 1
        ORDER BY 'VECES' ASC");
        $queryFecha->execute();
        $fechaMasReservada = $queryFecha->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo "Conexion fallida " . $e->getMessage();
        die();
    }

    try {
        $queryMesa = $pdo->prepare("SELECT reservacion_reserva_mesa.ID_MESA, COUNT(*) AS 'VECES'
        FROM reservacion_reserva_mesa
        INNER JOIN reservacion ON reservacion_reserva_mesa.ID_RESERVACION = reservacion.ID_RESERVACION
        INNER JOIN mesa ON reservacion_reserva_mesa.ID_MESA = mesa.ID_MESA
        INNER JOIN cliente ON reservacion.ID_CLIENTE = cliente.ID_CLIENTE
        WHERE reservacion.FECHA_RESERVACION >= '$fecha_inicio' AND reservacion.FECHA_RESERVACION <= '$fecha_final'
        GROUP BY reservacion_reserva_mesa.ID_MESA
        HAVING COUNT(*) > 1");
        $queryMesa->execute();
        $mesaMasReservada = $queryMesa->fetchAll(PDO::FETCH_ASSOC);
        json_encode($mesaMasReservada);
    } catch (Exception $e) {
        echo "Conexion fallida " . $e->getMessage();
        die();
    }
} else if (isset($insumos)) {
    try {
        $queryInsumo = $pdo->prepare("SELECT NOMBRE_INSUMO,CANTIDAD_INSUMO,FECHA_COMPRA_INSUMO, CONCAT('$ ',VALOR_INSUMO) AS 'VALOR_INSUMO' FROM insumo WHERE FECHA_COMPRA_INSUMO >= '$fecha_inicio' AND FECHA_COMPRA_INSUMO <= '$fecha_final'");
        $queryInsumo->execute();
        $listadoInsumos = $queryInsumo->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo "Conexion fallida " . $e->getMessage();
        die();
    }

    try {
        $queryInsumo = $pdo->prepare("SELECT SUM(CANTIDAD_INSUMO * VALOR_INSUMO) AS 'VALOR_TOTAL' FROM insumo WHERE FECHA_COMPRA_INSUMO >= '$fecha_inicio' AND FECHA_COMPRA_INSUMO <= '$fecha_final'");
        $queryInsumo->execute();
        $valorTotal = $queryInsumo->fetch(PDO::FETCH_NUM);
    } catch (Exception $e) {
        echo "Conexion fallida " . $e->getMessage();
        die();
    }
} else if (isset($cliente)) {
    try {
        $queryCliente = $pdo->prepare("SELECT reservacion.ESTADO_RESERVACION, reservacion.ID_RESERVACION, cliente.NOMBRE_CLIENTE, cliente.APELLIDO_CLIENTE, 
        reservacion.FECHA_RESERVACION, reservacion.HORA_RESERVACION, mesa.ID_MESA, reservacion.ASIENTO
        FROM reservacion_reserva_mesa
        INNER JOIN reservacion ON reservacion_reserva_mesa.ID_RESERVACION = reservacion.ID_RESERVACION
        INNER JOIN mesa ON reservacion_reserva_mesa.ID_MESA = mesa.ID_MESA
        INNER JOIN cliente ON reservacion.ID_CLIENTE = cliente.ID_CLIENTE
        WHERE cliente.ID_CLIENTE = '$cliente'
        ORDER BY reservacion.FECHA_RESERVACION ASC");
        $queryCliente->execute();
        $listadoCliente = $queryCliente->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo "Conexion fallida " . $e->getMessage();
    }
}

// Creando objeto para PDF


$mpdf = new \Mpdf\Mpdf([
    'mode' => 'utf-8',
    'format' => [279, 216],
    'orientation' => 'L'
]);


if (isset($insumos)) {
    $plantillaInsumo = getPlantillaInsumos($listadoInsumos, $valorTotal, $today, $fecha_inicio, $fecha_final);
} else if (isset($reserva)) {
    $plantillaReserva = getPlantillaReservas($reservas, $fecha_inicio, $fecha_final, $today, $fechaMasReservada, $mesaMasReservada);
} else if (isset($cliente)) {
    $plantillaCliente = getPlantillaClientes($listadoCliente, $today);
}


$css = file_get_contents($_ENV['URL']."public/css/pdf.css");

$mpdf->SetTitle("Reporte reservaciones");
$mpdf->SetAuthor("Reserva Ya");
$mpdf->SetHTMLFooter("
        <footer class='footer'>
            <p>© Todos los derechos reservados | Reserva Ya 2021</p>
        </footer>");

$mpdf->WriteHTML($css, 1);

if (isset($insumos)) {
    $mpdf->WriteHTML($plantillaInsumo, 2);
} else if (isset($reserva)) {
    $mpdf->WriteHTML($plantillaReserva, 2);
} else if (isset($cliente)) {
    $mpdf->WriteHTML($plantillaCliente, 2);
}

if (isset($insumos)) {
    $mpdf->Output('../../../public/reports/Reporte-' . $insumos . '-' . $codigo . '.pdf', 'F');
    echo ('public/reports/Reporte-' . $insumos . '-' . $codigo . '.pdf');
} else if (isset($reserva)) {
    $mpdf->Output('../../../public/reports/Reporte-' . $reserva . '-' . $codigo . '.pdf', 'F');
    echo ('public/reports/Reporte-' . $reserva . '-' . $codigo . '.pdf');
} else if (isset($cliente)) {
    $mpdf->Output('../../../public/reports/Reporte-cliente-' . $codigo . '.pdf', 'F');
    echo ('public/reports/Reporte-cliente-' . $codigo . '.pdf');
}


