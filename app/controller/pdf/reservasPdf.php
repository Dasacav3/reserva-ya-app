<?php
function getPlantillaReservas($reservas, $fecha_inicio, $fecha_final,$today,$fechaMasReservada,$mesaMasReservada){
    usort($mesaMasReservada, function($a, $b) {
        return $b['VECES'] <=> $a['VECES'];
    });
    usort($fechaMasReservada, function($a, $b) {
        return $b['VECES'] <=> $a['VECES'];
    });
$plantilla="
<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
</head>
<body>
    <div class='container'>
        <header class='header'>
            <div class='header_img_container'>
                <img class='header_img' src='".$_ENV['URL']."public/img/logo-reservaya.png' />
            </div>
            <h1 class='header_title'>Reporte Reservaciones</h1>
        </header>
        <main>
            <p>Fecha de creación: ".$today."</p>
            <p>Mesa más reservada: ".$mesaMasReservada[0]['ID_MESA']."</p>
            <p>Fecha más reservada: ".$fechaMasReservada[0]['FECHA_RESERVACION']."</p> 
            <p>Conteo de reservaciones: ".count($reservas)."</p>
            <p class='periodo'>Período: (".$fecha_inicio.") | (".$fecha_final.")</p>
            <table class='tabla'>
                <thead>
                    <tr>
                        <th>Estado</th>
                        <th>ID</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Mesa</th>
                        <th>Asientos</th>
                    </tr>
                </thead>
                <tbody>";
                foreach ($reservas as $dat){
                $plantilla .= "
                        <tr>
                            <td>" . $dat['ESTADO_RESERVACION'] . "</td>
                            <td>" . $dat['ID_RESERVACION'] . "</td>
                            <td>" . $dat['NOMBRE_CLIENTE'] . "</td>
                            <td>" . $dat['APELLIDO_CLIENTE'] . "</td>
                            <td>" . $dat['FECHA_RESERVACION'] . "</td>
                            <td>" . $dat['HORA_RESERVACION'] . "</td>
                            <td>" . $dat['ID_MESA'] . "</td>
                            <td>" . $dat['ASIENTO'] . "</td>  
                        </tr>";
                }        
                $plantilla .= "</tbody>
            </table>
        </main>
    </div>
</body>
</html>";
return $plantilla;

}



?>