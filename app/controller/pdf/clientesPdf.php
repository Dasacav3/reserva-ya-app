<?php
function getPlantillaClientes($listadoCliente, $today){

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
            <h1 class='header_title'>Reporte Reservaciones Cliente</h1>
        </header>
        <main>";
        foreach ($listadoCliente as $dat){
            $plantilla .= "
                        <p>Nombre: " . $dat['NOMBRE_CLIENTE'] . "</p>
                        <p>Apellido: " . $dat['APELLIDO_CLIENTE'] . "</p>";
            break;
            } 
            $plantilla .= "
            <p>Conteo de reservaciones: ".count($listadoCliente)."</p>
            <p>Fecha de creación: ".$today."</p>
            <table class='tabla'>
                <thead>
                    <tr>
                        <th>Estado</th>
                        <th>ID</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Mesa</th>
                        <th>Asientos</th>
                    </tr>
                </thead>
                <tbody>";
                foreach ($listadoCliente as $dat){
                $plantilla .= "
                        <tr>
                            <td>" . $dat['ESTADO_RESERVACION'] . "</td>
                            <td>" . $dat['ID_RESERVACION'] . "</td>
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
