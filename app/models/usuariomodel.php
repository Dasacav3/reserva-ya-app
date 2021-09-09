<?php

class UsuarioModel extends Model implements IModel
{

    public function __construct()
    {
        parent::__construct();
    }

    public function save($array)
    {
        $pass_hash = password_hash($array['clave'], PASSWORD_BCRYPT);
        $conection = $this->db->connect();

        try {
            $queryUser = $conection->prepare("INSERT INTO usuario (nombre_usuario,clave_usuario,tipo_usuario,estado_usuario,foto_perfil) VALUES (:email, :pass_hash, :tipo, :estado, :foto)");
            $queryUser->execute(['email' => $array['email'], 'pass_hash' => $pass_hash, 'tipo' => $array['tipo'], 'estado' => $array['estado'], 'foto' => $array['foto']]);
        } catch (Exception $e) {
            echo "Conexion fallida " . $e->getMessage();
            die();
        }

        $id_User = $conection->lastInsertId();

        try {
            $queryEmpleado = $conection->prepare("INSERT INTO empleado (doc_empleado, nombre_empleado, apellido_empleado, email_empleado, celular_empleado, id_usuario) VALUES (:doc,:nombre,:apellido,:email,:cel,:id)");
            $queryEmpleado->execute(['doc' => $array['doc'], 'nombre' => $array['nombre'], 'apellido' => $array['apellido'], 'email' => $array['email'], 'cel' => $array['cel'], 'id' => $id_User]);
        } catch (Exception $e) {
            echo "Conexion fallida " . $e->getMessage();
            die();
        }

        return true;
    }

    public function getAll($search)
    {
        try {
            $query = $this->prepare("SELECT * FROM usuario WHERE tipo_usuario = 'Empleado' OR tipo_usuario = 'Cliente' ORDER BY id_usuario DESC");
            $query->execute();

            if ($search != "") {
                $query = $this->prepare("SELECT * FROM usuario WHERE (tipo_usuario = 'Empleado' OR tipo_usuario = 'Cliente') AND (id_usuario LIKE '%" . $search . "%' OR nombre_usuario LIKE  '%" . $search . "%' OR  tipo_usuario LIKE '%" . $search . "%' OR estado_usuario LIKE '%" . $search . "%')");
                $query->execute();
            }

            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Conexion fallida " . $e->getMessage();
            die();
        }

        return json_encode($resultado);

        $this->close();
    }

    public function get($id)
    {
        try {
            $query = $this->prepare("SELECT tipo_usuario FROM usuario WHERE id_usuario = :id");
            $query->bindParam(":id", $id);
            $query->execute();
            $resultado = $query->fetch(PDO::FETCH_NUM);
            foreach ($resultado as $dat) {
                $tipo = $dat;
            }
        } catch (Exception $e) {
            echo "Conexion fallida " . $e->getMessage();
            die();
        }

        if ($tipo == 'Empleado') {
            try {
                $querySelectEmp = $this->prepare("SELECT usuario.ID_USUARIO, usuario.TIPO_USUARIO, empleado.DOC_EMPLEADO, empleado.NOMBRE_EMPLEADO, empleado.APELLIDO_EMPLEADO, empleado.EMAIL_EMPLEADO, empleado.CELULAR_EMPLEADO, usuario.CLAVE_USUARIO,usuario.ESTADO_USUARIO FROM empleado INNER JOIN usuario ON empleado.ID_USUARIO = usuario.ID_USUARIO WHERE usuario.ID_USUARIO = :id");
                $querySelectEmp->bindParam(":id", $id);
                $querySelectEmp->execute();
                $resultado2 = $querySelectEmp->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                echo "Conexion fallida " . $e->getMessage();
                die();
            }

            foreach ($resultado2 as $dat) {
                echo '
                    <a href="#" class="closePopup-edit closePopup"><i class="fas fa-times-circle"></i></a>
                    <h4 class="form-title">Editar empleado</h4>
                    <div class="form-fields">
                        <div>
                            <label for="">ID usuario</label> <br />
                            <input type="text" name="id_empleado" value="' . $dat["ID_USUARIO"] . '" readonly/> <br />
                            <label for="">Tipo de usuario</label> <br />
                            <input type="text" name="tipo_usuario" value="' . $dat["TIPO_USUARIO"] . '" readonly/> <br />
                            <label for="">Estado de usuario</label> <br />
                            <select name="estado_usuario" id="estado_usuario">
                                <option value="' . $dat["ESTADO_USUARIO"] . '">' . $dat["ESTADO_USUARIO"] . ' - Actual</option>
                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>
                            </select> <br />
                            <label for="">N° Documento</label> <br />
                            <input type="text" name="doc_emp_1" id="doc_emp_1" value="' . $dat["DOC_EMPLEADO"] . '" /> <br />
                        </div>
                        <div>
                            <label for="">Nombre</label> <br />
                            <input type="text" name="name_emp_1" id="name_emp_1" value="' . $dat["NOMBRE_EMPLEADO"] . '" /> <br />
                            <label for="">Apellido</label> <br />
                            <input type="text" name="last_emp_1" id="last_emp_1" value="' . $dat["APELLIDO_EMPLEADO"] . '" /> <br />
                            <label for="">Email</label> <br />
                            <input type="email" name="email_emp_1" id="email_emp_1" value="' . $dat["EMAIL_EMPLEADO"] . '" /> <br />
                            <label for="">Celular</label> <br />
                            <input type="tel" name="cel_emp_1" id="cel_emp_1" value="' . $dat["CELULAR_EMPLEADO"] . '" /> <br />
                        </div>
                    </div>
                    <input type="button" value="Guardar" id="editarEmpleado" />
                ';
            }
        } else if ($tipo == 'Cliente') {
            try {
                $querySelectCli = $this->prepare("SELECT usuario.ID_USUARIO, usuario.TIPO_USUARIO, usuario.ESTADO_USUARIO, cliente.NOMBRE_CLIENTE, cliente.APELLIDO_CLIENTE, cliente.FECHA_NACIMIENTO_CLIENTE, cliente.EMAIL_CLIENTE, cliente.CELULAR_CLIENTE, usuario.CLAVE_USUARIO FROM cliente INNER JOIN usuario ON cliente.ID_USUARIO = usuario.ID_USUARIO WHERE usuario.ID_USUARIO = :id");
                $querySelectCli->bindParam(":id", $id);
                $querySelectCli->execute();
                $resultado2 = $querySelectCli->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                echo "Conexion fallida " . $e->getMessage();
                die();
            }

            foreach ($resultado2 as $dat) {
                echo '
                    <a href="#" class="closePopup-edit closePopup"><i class="fas fa-times-circle"></i></a>
                    <h4 class="form-title">Editar cliente</h4>
                    <div class="form-fields">
                        <div>
                            <label for="">ID usuario</label> <br />
                            <input type="text" name="id_cliente" value="' . $dat["ID_USUARIO"] . '" readonly/> <br />
                            <label for="">Tipo de usuario</label> <br />
                            <input type="text" name="tipo_usuario" value="' . $dat["TIPO_USUARIO"] . '" readonly/> <br />
                            <label for="">Estado de usuario</label> <br />
                            <select name="estado_usuario" id="estado_usuario">
                                <option value="' . $dat["ESTADO_USUARIO"] . '">' . $dat["ESTADO_USUARIO"] . ' - Actual</option>
                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>
                            </select> <br />
                            <label for="">Nombre</label> <br />
                            <input type="text" name="name_cliente_1" id="name_cliente_1" value="' . $dat["NOMBRE_CLIENTE"] . '" /> <br />
                        </div>
                        <div>
                            <label for="">Apellido</label> <br />
                            <input type="text" name="last_cliente_1" id="last_cliente_1" value="' . $dat["APELLIDO_CLIENTE"] . '" /> <br />
                            <label for="">Fecha nacimiento</label> <br />
                            <input type="date" name="fecha_cliente_1" id="fecha_cliente_1" value="' . $dat["FECHA_NACIMIENTO_CLIENTE"] . '" /> <br />
                            <label for="">Email</label> <br />
                            <input type="email" name="email_cliente_1" id="email_cliente_1" value="' . $dat["EMAIL_CLIENTE"] . '" /> <br />
                            <label for="">Celular</label> <br />
                            <input type="tel" name="cel_cliente_1" id="cel_cliente_1" value="' . $dat["CELULAR_CLIENTE"] . '" /> <br />
                        </div>
                    </div>
                    <input type="button" value="Guardar" id="editarCliente" />
                ';
            }
        }
    }

    public function delete($id)
    {
        try {
            $query = $this->prepare("SELECT * FROM usuario WHERE id_usuario = :id");
            $query->bindParam(":id", $id);
            $query->execute();
            $resultado = $query->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Conexion fallida " . $e->getMessage();
            die();
        }

        echo $resultado['TIPO_USUARIO'];

        if ($resultado['TIPO_USUARIO'] == 'Empleado') {
            try {
                $this->beginTransaction();

                $queryDeleteEmpleado = "DELETE FROM empleado WHERE id_usuario = :id";
                $query = $this->prepare($queryDeleteEmpleado);
                $query->bindValue(":id", $id);
                $query->execute();

                $queryDeleteUser = "DELETE FROM usuario WHERE id_usuario = :id";
                $query = $this->prepare($queryDeleteUser);
                $query->bindValue(":id", $id);
                $query->execute();

                $this->commit();
            } catch (Exception $e) {
                $this->rollBack();
                echo "Conexion fallida " . $e->getMessage();
                die();
            }
        } else if ($resultado['TIPO_USUARIO'] == 'Cliente') {
            try {
                $this->beginTransaction();

                $queryDeleteCliente = "DELETE FROM cliente WHERE id_usuario = :id";
                $query = $this->prepare($queryDeleteCliente);
                $query->bindValue(":id", $id);
                $query->execute();

                $queryDeleteUser = "DELETE FROM usuario WHERE id_usuario = :id";
                $query = $this->prepare($queryDeleteUser);
                $query->bindValue(":id", $id);
                $query->execute();

                $this->commit();
            } catch (Exception $e) {
                $this->rollBack();
                echo "Conexion fallida " . $e->getMessage();
                die();
            }
        }
        return "ok";
    }

    public function update($array)
    {
        $tipo = $array['tipo'];

        if ($tipo == 'Empleado') {
            try {
                $queryEmpleado = $this->prepare("UPDATE empleado SET doc_empleado = :doc, nombre_empleado = :nombre, apellido_empleado = :apellido, email_empleado = :email, celular_empleado = :cel WHERE id_usuario = :id");
                $queryEmpleado->execute(['doc' => $array['doc'], 'nombre' => $array['nombre'], 'apellido' => $array['apellido'], 'email' => $array['email'], 'cel' => $array['cel'], 'id' => $array['id']]);
            } catch (Exception $e) {
                echo "Conexion fallida " . $e->getMessage();
                die();
            }

            try {
                $queryUser = $this->prepare("UPDATE usuario SET estado_usuario = :estado WHERE id_usuario = :id");
                $queryUser->execute(['estado' => $array['estado'], 'id' => $array['id']]);
            } catch (Exception $e) {
                echo "Conexion fallida " . $e->getMessage();
                die();
            }

            echo "ok";
        } else if ($tipo == 'Cliente') {
            $id = $_POST['id_cliente'];
            $nombre = $_POST['name_cliente_1'];
            $apellido = $_POST['last_cliente_1'];
            $fecha = $_POST['fecha_cliente_1'];
            $estado = $_POST['estado_usuario'];
            $email = $_POST['email_cliente_1'];
            $cel = $_POST['cel_cliente_1'];

            try {
                $queryCliente = $this->prepare("UPDATE cliente SET nombre_cliente = :nombre, apellido_cliente = :apellido, fecha_nacimiento_cliente = :fecha, email_cliente = :email, celular_cliente = :cel WHERE id_usuario = :id");
                $queryCliente->execute(['nombre' => $array['nombre'], 'apellido' => $array['apellido'], 'fecha' => $array['fecha'], 'email' => $array['email'], 'cel' => $array['cel'], 'id' => $id]);
            } catch (Exception $e) {
                echo "Conexion fallida " . $e->getMessage();
                die();
            }

            try {
                $queryUser = $this->prepare("UPDATE usuario SET estado_usuario = :estado WHERE id_usuario = :id");
                $queryUser->bindParam(":estado", $estado);
                $queryUser->bindParam(":id", $id);
                $queryUser->execute();
            } catch (Exception $e) {
                echo "Conexion fallida " . $e->getMessage();
                die();
            }

            echo "ok";
        }
    }
}
