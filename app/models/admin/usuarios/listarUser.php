<?php

    $data = file_get_contents("php://input");
    require("../../controller/databasePDO.php");

    $consulta = $pdo->prepare("SELECT * FROM usuario ORDER BY id_usuario DESC");
    $consulta->execute();
    $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    foreach ($resultado as $data) {
    echo "<tr>
            <td> <span><input type='checkbox' name='' id='' /></span> </td>
            <td>" . $data['ID_USUARIO'] . "</td>
            <td>" . $data['NOMBRE_USUARIO'] . "</td>
            <td>" . $data['TIPO_USUARIO'] . "</td>
            <td>" . $data['ESTADO_USUARIO'] . "</td>       
        </tr>";
    }

?>