<?php

class ReporteModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function reporteReservas($data)
    {
        $fecha_inicio = $data['fecha_inicio'];
        $fecha_final = $data['fecha_final'];

        try {
            $query = $this->prepare("SELECT reservacion.ESTADO_RESERVACION, reservacion.ID_RESERVACION, cliente.NOMBRE_CLIENTE, cliente.APELLIDO_CLIENTE, 
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
            $queryFecha = $this->prepare("SELECT reservacion.FECHA_RESERVACION, COUNT(*) AS 'VECES'
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
            $queryMesa = $this->prepare("SELECT reservacion_reserva_mesa.ID_MESA, COUNT(*) AS 'VECES'
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

        $resultado = ['reservas' => $reservas, 'fechaMasReservada' => $fechaMasReservada, 'mesaMasReservada' => $mesaMasReservada];

        return $resultado;
    }

    public function reporteInsumos($data)
    {
        $fecha_inicio = $data['fecha_inicio'];
        $fecha_final = $data['fecha_final'];

        try {
            $queryInsumo = $this->prepare("SELECT NOMBRE_INSUMO,CANTIDAD_INSUMO,FECHA_COMPRA_INSUMO, CONCAT('$ ',VALOR_INSUMO) AS 'VALOR_INSUMO' FROM insumo WHERE FECHA_COMPRA_INSUMO >= '$fecha_inicio' AND FECHA_COMPRA_INSUMO <= '$fecha_final'");
            $queryInsumo->execute();
            $listadoInsumos = $queryInsumo->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Conexion fallida " . $e->getMessage();
            die();
        }

        try {
            $queryInsumo = $this->prepare("SELECT SUM(CANTIDAD_INSUMO * VALOR_INSUMO) AS 'VALOR_TOTAL' FROM insumo WHERE FECHA_COMPRA_INSUMO >= '$fecha_inicio' AND FECHA_COMPRA_INSUMO <= '$fecha_final'");
            $queryInsumo->execute();
            $valorTotal = $queryInsumo->fetch(PDO::FETCH_NUM);
        } catch (Exception $e) {
            echo "Conexion fallida " . $e->getMessage();
            die();
        }

        $resultado = ['listadoInsumos' => $listadoInsumos, 'valorInsumos' => $valorTotal];

        return $resultado;

    }

    public function reporteCliente($cliente)
    {
        try {
            $queryCliente = $this->prepare("SELECT reservacion.ESTADO_RESERVACION, reservacion.ID_RESERVACION, cliente.NOMBRE_CLIENTE, cliente.APELLIDO_CLIENTE, 
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

        return $listadoCliente;
    }

    public function plantillaReservas($data,$fecha_final,$fecha_inicio,$today){

        $reservas = $data['reservas'];
        $fechaMasReservada = $data['fechaMasReservada'];
        $mesaMasReservada = $data['mesaMasReservada'];

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
                        <img class='header_img' src='http://34.67.243.191/public/img/logo-reservaya.png' />
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

    public function plantillaInsumos($data,$fecha_final,$fecha_inicio,$today){

        $listadoInsumos = $data['listadoInsumos'];
        $valorTotal = $data['valorInsumos'][0];

        $plantillaInsumos="
        <!DOCTYPE html>
        <html lang='es'>
        <head>
            <meta charset='UTF-8'>
        </head>
        <body>
            <div class='container'>
                <header class='header'>
                    <div class='header_img_container'>
                        <img class='header_img' src='http://34.67.243.191/public/img/logo-reservaya.png' />
                    </div>
                    <h1 class='header_title'>Reporte Insumos</h1>
                </header>
                <main>
                    <p>Fecha de creación: ".$today."</p>
                    <p class='periodo'>Período: (".$fecha_inicio.") | (".$fecha_final.")</p>
                    <table class='tabla'>
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Cantidad</th>
                                <th>Fecha compra</th>
                                <th>Valor unitario</th>
                            </tr>
                        </thead>
                        <tbody>";
                        foreach ($listadoInsumos as $dat){
                            $plantillaInsumos .= "
                                <tr>
                                    <td>" . $dat['NOMBRE_INSUMO'] . "</td>
                                    <td>" . $dat['CANTIDAD_INSUMO'] . "</td>
                                    <td>" . $dat['FECHA_COMPRA_INSUMO'] . "</td>
                                    <td>" . $dat['VALOR_INSUMO'] . "</td>
                                </tr>";
                        }        
                        $plantillaInsumos .= "</tbody>
                    </table>
                    <p>Valor total: $ ".$valorTotal."</p>
                </main>
            </div>
        </body>
        </html>";

        return $plantillaInsumos;
    }

    public function plantillaClientes($data){

        $listadoCliente = $data['listadoCliente'];
        $today = $data['today'];

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
                        <img class='header_img' src='http://34.67.243.191/public/img/logo-reservaya.png' />
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
}
