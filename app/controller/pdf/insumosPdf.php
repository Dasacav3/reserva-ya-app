<?php
function getPlantillaInsumos($listadoInsumos,$valorTotal,$today,$fecha_inicio,$fecha_final){

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
                <img class='header_img' src='../../views/dist/img/logo-reservaya.png' />
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
            <p>Valor total: $ ".$valorTotal[0]."</p>
        </main>
    </div>
</body>
</html>";
return $plantillaInsumos;

}



?>