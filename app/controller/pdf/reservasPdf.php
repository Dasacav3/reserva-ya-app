<?php
function getPlantillaReservas($reservas, $fecha_inicio, $fecha_final,$today,$fechaMasReservada,$mesaMasReservada){
    print_r($mesaMasReservada);
    // usort($mesaMasReservada, function($a, $b) {
    //     return $a['VECES'] <=> $b['VECES'];
    // });
    arsort($fechaMasReservada);
    arsort($mesaMasReservada);
    print_r($mesaMasReservada);
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
                <img class='header_img' src='../../views/dist/img/logo-reservaya.png' />
            </div>
            <h1 class='header_title'>Reporte Reservaciones</h1>
        </header>
        <main>
            <p>Fecha de creación: ".$today."</p>";
            foreach($fechaMasReservada as $dat){
                $plantilla .= "
                    <p>Dia más reservado: ".$dat['FECHA_RESERVACION']."</p> 
                ";
                break;
            }
            foreach($mesaMasReservada as $dat){
                $plantilla .= "
                    <p>Mesa más reservada: ".$dat['ID_MESA']."</p> 
                ";
                break;
            }
            $plantilla .= "
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