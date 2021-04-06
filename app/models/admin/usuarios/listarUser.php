<?php

    $data = file_get_contents("php://input");
    require("../../../controller/database.php");

    $query = "SELECT * FROM usuario WHERE tipo_usuario = 'Empleado' OR tipo_usuario = 'Cliente' ORDER BY id_usuario DESC;";
    $result = mysqli_query($conn, $query);
    

    if($data != ""){
        $query = "SELECT * FROM usuario WHERE (tipo_usuario = 'Empleado' OR tipo_usuario = 'Cliente') AND (id_usuario LIKE '%".$data."%' OR nombre_usuario LIKE  '%".$data."%' OR  tipo_usuario LIKE '%".$data."%' OR estado_usuario LIKE '%".$data."%')";
        $result = mysqli_query($conn, $query);
    }


    if(!$result){
        die('Query failed' . mysqli_error($conn));
    }

    $resultado = $result->fetch_all(MYSQLI_ASSOC);

    foreach ($resultado as $dat) {
    echo "<tr>
            <td>" . $dat['ID_USUARIO'] . "</td>
            <td>" . $dat['NOMBRE_USUARIO'] . "</td>
            <td>" . $dat['TIPO_USUARIO'] . "</td>
            <td>" . $dat['ESTADO_USUARIO'] . "</td>
            <td>
                <button class='abrirPopup-edit btn-edit' type='button' onclick=Editar('" . $dat['ID_USUARIO'] . "');abrir()>Editar</button>
                <button class='btn-delete' type='button' onclick=eliminarUser('" . $dat['ID_USUARIO'] ."')>Eliminar</button>
            </td>
        </tr>";
    }
