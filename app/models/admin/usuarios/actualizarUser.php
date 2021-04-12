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

    try {
        $query = $pdo->prepare("SELECT tipo_usuario FROM usuario WHERE id_usuario = :id");
        $query->bindParam(":id",$data);
        $query->execute();
        $resultado = $query->fetch(PDO::FETCH_NUM);
        foreach($resultado as $dat){
            $tipo = $dat;
        }
    }catch (Exception $e) {
        echo "Conexion fallida " . $e->getMessage();
        die();
    }

    if($tipo == 'Empleado'){
        try {
            $querySelectEmp = $pdo->prepare("SELECT usuario.ID_USUARIO, usuario.TIPO_USUARIO, empleado.DOC_EMPLEADO, empleado.NOMBRE_EMPLEADO, empleado.APELLIDO_EMPLEADO, empleado.EMAIL_EMPLEADO, empleado.CELULAR_EMPLEADO, usuario.CLAVE_USUARIO,usuario.ESTADO_USUARIO FROM empleado INNER JOIN usuario ON empleado.ID_USUARIO = usuario.ID_USUARIO WHERE usuario.ID_USUARIO = :id");
            $querySelectEmp->bindParam(":id",$data);
            $querySelectEmp->execute();
            $resultado2 = $querySelectEmp->fetchAll(PDO::FETCH_ASSOC);
        }catch (Exception $e) {
            echo "Conexion fallida " . $e->getMessage();
            die();
        }

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
        try {
            $querySelectCli = $pdo->prepare("SELECT usuario.ID_USUARIO, usuario.TIPO_USUARIO, usuario.ESTADO_USUARIO, cliente.NOMBRE_CLIENTE, cliente.APELLIDO_CLIENTE, cliente.FECHA_NACIMIENTO_CLIENTE, cliente.EMAIL_CLIENTE, cliente.CELULAR_CLIENTE, usuario.CLAVE_USUARIO FROM cliente INNER JOIN usuario ON cliente.ID_USUARIO = usuario.ID_USUARIO WHERE usuario.ID_USUARIO = :id");
            $querySelectCli->bindParam(":id",$data);
            $querySelectCli->execute();
            $resultado2 = $querySelectCli->fetchAll(PDO::FETCH_ASSOC);
        }catch (Exception $e) {
            echo "Conexion fallida " . $e->getMessage();
            die();
        }

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

    $pdo=null;

?>