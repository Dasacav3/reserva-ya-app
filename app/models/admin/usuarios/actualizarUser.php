<?php

    $data = file_get_contents("php://input");

    include("../../../controller/database.php");

    session_start();

    $sesion = $_SESSION['datos'];

    if($sesion == null || $sesion = ''){
        echo 'Usted no tiene autorización';
        header("location: ../../views/login.php");
        die();
    }

    $query1 = "SELECT * FROM usuario WHERE id_usuario = $data";
    $result1 = mysqli_query($conn, $query1);

    if(!$result1){
        die('Seleccion fallida: ' . mysqli_error($conn));
    }

    $resultado1 = $result1->fetch_all(MYSQLI_ASSOC);

    foreach($resultado1 as $dat){
        $tipo = $dat['TIPO_USUARIO'];
    }

    if($tipo == 'Empleado'){
        $query2 = "SELECT usuario.ID_USUARIO, usuario.TIPO_USUARIO, empleado.DOC_EMPLEADO, empleado.NOMBRE_EMPLEADO, empleado.APELLIDO_EMPLEADO, empleado.EMAIL_EMPLEADO, empleado.CELULAR_EMPLEADO, usuario.CLAVE_USUARIO,usuario.ESTADO_USUARIO FROM empleado INNER JOIN usuario ON empleado.ID_USUARIO = usuario.ID_USUARIO WHERE usuario.ID_USUARIO = $data";

        $result2 = mysqli_query($conn,$query2);

        if(!$result2){
            die('Query failed' . mysqli_error($conn));
        }
    
        $resultado2 = $result2->fetch_all(MYSQLI_ASSOC);

        foreach($resultado2 as $dat){
            echo '
                <a href="#" class="closePopup-edit closePopup" onclick="cerrar()"><i class="fas fa-times-circle"></i></a>
                <h4 class="form-title">Editar empleado</h4>
                <div class="form-fields">
                    <div>
                        <label for="">ID usuario</label> <br />
                        <input type="text" name="id_empleado" value="'.$dat["ID_USUARIO"].'" readonly/> <br />
                        <label for="">Tipo de usuario</label> <br />
                        <input type="text" name="tipo_usuario" value="'.$dat["TIPO_USUARIO"].'" readonly/> <br />
                        <label for="">Estado de usuario</label> <br />
                        <select name="estado_usuario" id="estado_usuario">
                            <option value="'.$dat["ESTADO_USUARIO"].'">'.$dat["ESTADO_USUARIO"].' - Actual</option>
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                        </select> <br />
                        <label for="">N° Documento</label> <br />
                        <input type="text" name="doc_emp_1" id="doc_emp_1" value="'.$dat["DOC_EMPLEADO"].'" /> <br />
                    </div>
                    <div>
                        <label for="">Nombre</label> <br />
                        <input type="text" name="name_emp_1" id="name_emp_1" value="'.$dat["NOMBRE_EMPLEADO"].'" /> <br />
                        <label for="">Apellido</label> <br />
                        <input type="text" name="last_emp_1" id="last_emp_1" value="'.$dat["APELLIDO_EMPLEADO"].'" /> <br />
                        <label for="">Email</label> <br />
                        <input type="email" name="email_emp_1" id="email_emp_1" value="'.$dat["EMAIL_EMPLEADO"].'" /> <br />
                        <label for="">Celular</label> <br />
                        <input type="tel" name="cel_emp_1" id="cel_emp_1" value="'.$dat["CELULAR_EMPLEADO"].'" /> <br />
                    </div>
                </div>
                <input type="button" value="Guardar" onclick="editarEmpleado()" />
            ';
        }
    }else if($tipo == 'Cliente'){
        $query2 = "SELECT usuario.ID_USUARIO, usuario.TIPO_USUARIO, usuario.ESTADO_USUARIO, cliente.NOMBRE_CLIENTE, cliente.APELLIDO_CLIENTE, cliente.FECHA_NACIMIENTO_CLIENTE, cliente.EMAIL_CLIENTE, cliente.CELULAR_CLIENTE, usuario.CLAVE_USUARIO FROM cliente INNER JOIN usuario ON cliente.ID_USUARIO = usuario.ID_USUARIO WHERE usuario.ID_USUARIO = $data";

        $result2 = mysqli_query($conn,$query2);

        if(!$result2){
            die('Query failed' . mysqli_error($conn));
        }
    
        $resultado2 = $result2->fetch_all(MYSQLI_ASSOC);

        foreach($resultado2 as $dat){
            echo '
                <a href="#" class="closePopup-edit closePopup" onclick="cerrar()"><i class="fas fa-times-circle"></i></a>
                <h4 class="form-title">Editar cliente</h4>
                <div class="form-fields">
                    <div>
                        <label for="">ID usuario</label> <br />
                        <input type="text" name="id_cliente" value="'.$dat["ID_USUARIO"].'" readonly/> <br />
                        <label for="">Tipo de usuario</label> <br />
                        <input type="text" name="tipo_usuario" value="'.$dat["TIPO_USUARIO"].'" readonly/> <br />
                        <label for="">Estado de usuario</label> <br />
                        <select name="estado_usuario" id="estado_usuario">
                            <option value="'.$dat["ESTADO_USUARIO"].'">'.$dat["ESTADO_USUARIO"].' - Actual</option>
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                        </select> <br />
                        <label for="">Nombre</label> <br />
                        <input type="text" name="name_cliente_1" id="name_cliente_1" value="'.$dat["NOMBRE_CLIENTE"].'" /> <br />
                    </div>
                    <div>
                        <label for="">Apellido</label> <br />
                        <input type="text" name="last_cliente_1" id="last_cliente_1" value="'.$dat["APELLIDO_CLIENTE"].'" /> <br />
                        <label for="">Fecha nacimiento</label> <br />
                        <input type="date" name="fecha_cliente_1" id="fecha_cliente_1" value="'.$dat["FECHA_NACIMIENTO_CLIENTE"].'" /> <br />
                        <label for="">Email</label> <br />
                        <input type="email" name="email_cliente_1" id="email_cliente_1" value="'.$dat["EMAIL_CLIENTE"].'" /> <br />
                        <label for="">Celular</label> <br />
                        <input type="tel" name="cel_cliente_1" id="cel_cliente_1" value="'.$dat["CELULAR_CLIENTE"].'" /> <br />
                    </div>
                </div>
                <input type="button" value="Guardar" onclick="editarCliente()" />
            ';
        }

    }

?>