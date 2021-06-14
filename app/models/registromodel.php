<?php

class RegistroModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function registrarCliente($data)
    {
        $pass_hash = password_hash($data['clave'], PASSWORD_BCRYPT);

        $connect = $this->db->connect();

        try {
            $queryUsuario = $connect->prepare("INSERT INTO usuario (nombre_usuario,clave_usuario,tipo_usuario,estado_usuario,foto_perfil) VALUES (:user,:clave,:tipo,:estado,:foto)");
            $queryUsuario->execute(['user' => $data['username'], 'clave' => $pass_hash, 'estado' => $data['estado'], 'tipo' => $data['tipo'], 'foto' => $data['foto']]);

            $id = $connect->lastInsertId();

            $queryCliente = $connect->prepare("INSERT INTO cliente (nombre_cliente,apellido_cliente,fecha_nacimiento_cliente,celular_cliente,email_cliente,id_usuario) VALUES (:nombre,:apellido,:fecha,:cel,:email,:id)");
            $queryCliente->execute(['nombre' => $data['nombre'], 'apellido' => $data['apellido'], 'fecha' => $data['fecha'], 'cel' => $data['celular'], 'email' => $data['correo'], 'id' => $id]);
        } catch (Exception $e) {
            return $e->getMessage();
        }

        return true;

        $this->close();
    }

    public function registrarEmpleado()
    {
        try {
        } catch (Exception $e) {
            return $e->getMessage();
        }

        return true;

        $this->close();
    }
}
