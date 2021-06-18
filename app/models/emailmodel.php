<?php

class EmailModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getDataAdd($data)
    {
        try {
            $query = $this->prepare("SELECT reservacion.ESTADO_RESERVACION, MAX(reservacion.ID_RESERVACION) AS 'ID_RESERVACION', cliente.NOMBRE_CLIENTE, cliente.APELLIDO_CLIENTE, cliente.EMAIL_CLIENTE,
            reservacion.FECHA_RESERVACION, reservacion.HORA_RESERVACION, mesa.ID_MESA, reservacion.ASIENTO, reservacion_reserva_mesa.ID_RESERVACION_RESERVA_MESA
            FROM reservacion_reserva_mesa
            INNER JOIN reservacion ON reservacion_reserva_mesa.ID_RESERVACION = reservacion.ID_RESERVACION
            INNER JOIN mesa ON reservacion_reserva_mesa.ID_MESA = mesa.ID_MESA
            INNER JOIN cliente ON reservacion.ID_CLIENTE = cliente.ID_CLIENTE WHERE cliente.ID_CLIENTE = :id AND mesa.ID_MESA = :mesa AND reservacion.FECHA_RESERVACION = :fecha AND reservacion.HORA_RESERVACION = :hora");
            $query->execute(['id' => $data['id'], 'fecha' => $data['fecha'], 'hora' => $data['hora'], 'mesa' => $data['mesa']]);
            $result = $query->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Conexion Fallida " . $e->getMessage();
            die();
        }
        return $result;
    }

    public function getDataEdit($data)
    {
        try {
            $query = $this->prepare("SELECT reservacion.ESTADO_RESERVACION, reservacion.ID_RESERVACION, cliente.NOMBRE_CLIENTE, cliente.APELLIDO_CLIENTE, cliente.EMAIL_CLIENTE,
            reservacion.FECHA_RESERVACION, reservacion.HORA_RESERVACION, mesa.ID_MESA, reservacion.ASIENTO, reservacion_reserva_mesa.ID_RESERVACION_RESERVA_MESA
            FROM reservacion_reserva_mesa
            INNER JOIN reservacion ON reservacion_reserva_mesa.ID_RESERVACION = reservacion.ID_RESERVACION
            INNER JOIN mesa ON reservacion_reserva_mesa.ID_MESA = mesa.ID_MESA
            INNER JOIN cliente ON reservacion.ID_CLIENTE = cliente.ID_CLIENTE WHERE cliente.ID_CLIENTE = :id AND reservacion.ID_RESERVACION = :reserva AND mesa.ID_MESA = :mesa");
            $query->execute(['id' => $data['id'], 'reserva' => $data['reserva'], 'mesa' => $data['mesa']]);
            $result = $query->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Conexion Fallida " . $e->getMessage();
            die();
        }

        return $result;
    }

    public function getDataCancel($data)
    {
        try {
            $query = $this->prepare("SELECT reservacion.ID_RESERVACION, cliente.NOMBRE_CLIENTE, cliente.APELLIDO_CLIENTE, cliente.EMAIL_CLIENTE
            FROM reservacion_reserva_mesa
            INNER JOIN reservacion ON reservacion_reserva_mesa.ID_RESERVACION = reservacion.ID_RESERVACION
            INNER JOIN mesa ON reservacion_reserva_mesa.ID_MESA = mesa.ID_MESA
            INNER JOIN cliente ON reservacion.ID_CLIENTE = cliente.ID_CLIENTE WHERE reservacion_reserva_mesa.ID_RESERVACION_RESERVA_MESA = :reserva");
            $query->execute(['reserva' => $data['reserva']]);
            $result = $query->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Conexion Fallida " . $e->getMessage();
            die();
        }

        return $result;
    }
}
