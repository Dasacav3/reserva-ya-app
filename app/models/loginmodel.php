<?php

class LoginModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get($userdata)
    {
        try {
            $query = $this->prepare("SELECT id_usuario,tipo_usuario,clave_usuario,estado_usuario,nombre_usuario FROM usuario WHERE nombre_usuario = :nombre");
            $query->execute(['nombre' => $userdata['user']]);
            $data = $query->fetch(PDO::FETCH_NUM);
        } catch (Exception $e) {
            return $e->getMessage();
        }

        if ($data) {
            if ($data[1] == 'Administrador' and password_verify($userdata['clave'], $data[2]) and $data[3] == 'Activo') {
                try {
                    $query = $this->prepare("SELECT usuario.id_usuario, usuario.nombre_usuario, usuario.tipo_usuario, administrador.nombre_admin, administrador.apellido_admin, administrador.id_admin, usuario.foto_perfil FROM administrador INNER JOIN usuario ON administrador.id_usuario = usuario.id_usuario WHERE nombre_usuario = :nombre");
                    $query->execute(['nombre' => $userdata['user']]);
                    $user_data = $query->fetch(PDO::FETCH_ASSOC);
                } catch (Exception $e) {
                    echo "Conexion fallida " . $e->getMessage();
                }
                return $user_data;
            } else if ($data[1] == "Empleado" and password_verify($userdata['clave'], $data[2]) and $data[3] == 'Activo') {
                try {
                    $query = $this->prepare("SELECT usuario.id_usuario, usuario.nombre_usuario, usuario.tipo_usuario, empleado.nombre_empleado, empleado.apellido_empleado, empleado.id_empleado, usuario.foto_perfil FROM empleado INNER JOIN usuario ON empleado.id_usuario = usuario.id_usuario WHERE nombre_usuario = :nombre");
                    $query->execute(['nombre' => $userdata['user']]);
                    $user_data = $query->fetch(PDO::FETCH_ASSOC);
                } catch (Exception $e) {
                    echo "Conexion fallida " . $e->getMessage();
                }
                return $user_data;
            } else if ($data[1] == "Cliente" and password_verify($userdata['clave'], $data[2]) and $data[3] == 'Activo') {
                try {
                    $query = $this->prepare("SELECT usuario.id_usuario, usuario.nombre_usuario, usuario.tipo_usuario, cliente.nombre_cliente, cliente.apellido_cliente, cliente.id_cliente, usuario.foto_perfil FROM cliente INNER JOIN usuario ON cliente.id_usuario = usuario.id_usuario WHERE nombre_usuario = :nombre");
                    $query->execute(['nombre' => $userdata['user']]);
                    $user_data = $query->fetch(PDO::FETCH_ASSOC);
                } catch (Exception $e) {
                    echo "Conexion fallida " . $e->getMessage();
                }
                return $user_data;
            } else if ($data[4] != $userdata['user'] || $data[2] != $userdata['clave']) {
                echo "usuario o contraseña incorrecto";
            } else {
                echo "el usuario no esta activo en el sistema";
            }
        } else if(empty($data)) {
            echo "este usuario no existe";
        }

        $this->close();
    }
}
