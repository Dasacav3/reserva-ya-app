<?php

class ReservaModel extends Model implements IModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function save($array)
    {

        $connect = $this->db->connect();

        try {
            $queryReserva = $connect->prepare("INSERT INTO reservacion (id_cliente, fecha_reservacion, hora_reservacion, estado_reservacion, asiento) VALUES (:id, :fecha, :hora, :estado, :asiento)");
            $queryReserva->execute(['id' => $array['id'], 'fecha' => $array['fecha'], 'hora' => $array['hora'], 'estado' => $array['estado'], 'asiento' => $array['asiento']]);
        } catch (Exception $e) {
            echo "Conexion fallida " . $e->getMessage();
            die();
        }

        $id_reserva = $connect->lastInsertId();

        try {
            $queryReservaMesa = $connect->prepare("INSERT INTO reservacion_reserva_mesa (id_reservacion,id_mesa) VALUES (:id_reserva, :id_mesa)");
            $queryReservaMesa->execute(['id_reserva' => $id_reserva, 'id_mesa' => $array['mesa']]);
        } catch (Exception $e) {
            echo "Conexion fallida " . $e->getMessage();
            die();
        }

        try {
            $queryMesa2 = $connect->prepare("UPDATE mesa SET estado_mesa = 'Ocupada' WHERE id_mesa = :mesa");
            $queryMesa2->execute(['mesa' => $array['mesa']]);
        } catch (Exception $e) {
            echo "Conexion fallida " . $e->getMessage();
            die();
        }

        return true;
    }

    public function saveCli($array)
    {

        $connect = $this->db->connect();

        try {
            $queryReserva = $connect->prepare("INSERT INTO reservacion (id_cliente, fecha_reservacion, hora_reservacion, estado_reservacion, asiento) VALUES (:id, :fecha, :hora, :estado, :asiento)");
            $queryReserva->execute(['id' => $array['id'], 'fecha' => $array['fecha'], 'hora' => $array['hora'], 'estado' => $array['estado'], 'asiento' => $array['asiento']]);
        } catch (Exception $e) {
            echo "Conexion fallida " . $e->getMessage();
            die();
        }

        $id_reserva = $connect->lastInsertId();

        try {
            $queryReservaMesa = $connect->prepare("INSERT INTO reservacion_reserva_mesa (id_reservacion,id_mesa) VALUES (:id_reserva, :id_mesa)");
            $queryReservaMesa->execute(['id_reserva' => $id_reserva, 'id_mesa' => $array['mesa']]);
        } catch (Exception $e) {
            echo "Conexion fallida " . $e->getMessage();
            die();
        }

        try {
            $queryMesa2 = $connect->prepare("UPDATE mesa SET estado_mesa = 'Ocupada' WHERE id_mesa = :mesa");
            $queryMesa2->execute(['mesa' => $array['mesa']]);
        } catch (Exception $e) {
            echo "Conexion fallida " . $e->getMessage();
            die();
        }

        return true;
    }

    public function getAll($search)
    {
        try {
            $query = $this->prepare("SELECT reservacion.ESTADO_RESERVACION, reservacion.ID_RESERVACION, cliente.NOMBRE_CLIENTE, cliente.APELLIDO_CLIENTE, 
            reservacion.FECHA_RESERVACION, reservacion.HORA_RESERVACION, mesa.ID_MESA, reservacion.ASIENTO, reservacion_reserva_mesa.ID_RESERVACION_RESERVA_MESA
            FROM reservacion_reserva_mesa
            INNER JOIN reservacion ON reservacion_reserva_mesa.ID_RESERVACION = reservacion.ID_RESERVACION
            INNER JOIN mesa ON reservacion_reserva_mesa.ID_MESA = mesa.ID_MESA
            INNER JOIN cliente ON reservacion.ID_CLIENTE = cliente.ID_CLIENTE
            WHERE reservacion.ESTADO_RESERVACION = 'Activa'
            ORDER BY reservacion.FECHA_RESERVACION ASC");
            $query->execute();

            if ($search != "") {
                $query = $this->prepare("SELECT reservacion.ESTADO_RESERVACION, reservacion.ID_RESERVACION, cliente.NOMBRE_CLIENTE, cliente.APELLIDO_CLIENTE, 
                reservacion.FECHA_RESERVACION, reservacion.HORA_RESERVACION, mesa.ID_MESA, reservacion.ASIENTO,reservacion_reserva_mesa.ID_RESERVACION_RESERVA_MESA
                FROM reservacion_reserva_mesa
                INNER JOIN reservacion ON reservacion_reserva_mesa.ID_RESERVACION = reservacion.ID_RESERVACION
                INNER JOIN mesa ON reservacion_reserva_mesa.ID_MESA = mesa.ID_MESA
                INNER JOIN cliente ON reservacion.ID_CLIENTE = cliente.ID_CLIENTE
                WHERE reservacion.ESTADO_RESERVACION = 'Activa' AND (reservacion.ESTADO_RESERVACION LIKE '%" . $search . "%' OR reservacion.ID_RESERVACION LIKE '%" . $search . "%' OR cliente.NOMBRE_CLIENTE LIKE '%" . $search . "%' OR cliente.APELLIDO_CLIENTE LIKE '%" . $search . "%' OR reservacion.FECHA_RESERVACION LIKE '%" . $search . "%' OR reservacion.HORA_RESERVACION LIKE '%" . $search . "%' OR mesa.ID_MESA LIKE '%" . $search . "%' OR reservacion.ASIENTO LIKE '%" . $search . "%')");
                $query->execute();
            }
            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Conexion fallida " . $e->getMessage();
            die();
        }

        echo json_encode($resultado);

        $this->close();
    }

    public function get($id)
    {
        try {
            $query = $this->prepare("SELECT reservacion.ID_RESERVACION, cliente.ID_CLIENTE, reservacion.ESTADO_RESERVACION, reservacion.FECHA_RESERVACION, 
            reservacion.HORA_RESERVACION, mesa.ID_MESA, reservacion.ASIENTO
            FROM reservacion_reserva_mesa
            INNER JOIN reservacion ON reservacion_reserva_mesa.ID_RESERVACION = reservacion.ID_RESERVACION
            INNER JOIN mesa ON reservacion_reserva_mesa.ID_MESA = mesa.ID_MESA
            INNER JOIN cliente ON reservacion.ID_CLIENTE = cliente.ID_CLIENTE
            WHERE reservacion_reserva_mesa.ID_RESERVACION_RESERVA_MESA = :id");
            $query->execute(['id' => $id]);
            $resultado = $query->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Conexion fallida " . $e->getMessage();
            die();
        }

        echo json_encode($resultado);
    }

    public function getMesa()
    {
        try {
            $query = $this->prepare("SELECT id_mesa,capacidad_mesa,estado_mesa FROM mesa WHERE estado_mesa = 'Disponible'");
            $query->execute();
        } catch (Exception $e) {
            echo "Conexion fallida " . $e->getMessage();
            die();
        }

        echo "<option value=''></option>";
        while ($mesa = $query->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value=" . $mesa['id_mesa'] . ">Mesa #" . $mesa['id_mesa'] . " - Asientos: " . $mesa['capacidad_mesa'] . "</option>";
        }

        $this->close();
    }

    public function getCliente()
    {
        try {
            $query = $this->prepare("SELECT id_cliente,nombre_cliente,apellido_cliente FROM cliente");
            $query->execute();
        } catch (Exception $e) {
            echo "Conexion fallida " . $e->getMessage();
            die();
        }

        echo "<option value=''></option>";
        while ($cliente = $query->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value=" . $cliente['id_cliente'] . ">" . $cliente['id_cliente'] . " - " . $cliente['nombre_cliente'] . " " . $cliente['apellido_cliente'] . "</option>";
        }

        $this->close();
    }

    public function delete($id)
    {

        $connect = $this->db->connect();

        try{
            $connect->beginTransaction();
    
            $querySelect = "SELECT reservacion.ID_RESERVACION, mesa.ID_MESA
            FROM reservacion_reserva_mesa
            INNER JOIN reservacion ON reservacion_reserva_mesa.ID_RESERVACION = reservacion.ID_RESERVACION
            INNER JOIN mesa ON reservacion_reserva_mesa.ID_MESA = mesa.ID_MESA
            INNER JOIN cliente ON reservacion.ID_CLIENTE = cliente.ID_CLIENTE
            WHERE reservacion_reserva_mesa.ID_RESERVACION_RESERVA_MESA = :id";
            $query = $connect->prepare($querySelect);
            $query->bindValue(":id",$id);
            $query->execute();
            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
            foreach($resultado as $dat){
                $id_reserva = $dat['ID_RESERVACION'];
                $id_mesa = $dat['ID_MESA'];
            }
            
            $queryUpdateMesa = "UPDATE mesa SET estado_mesa = 'Disponible' WHERE id_mesa = :id_mesa";
            $query = $connect->prepare($queryUpdateMesa);
            $query->bindValue(":id_mesa",$id_mesa);
            $query->execute();
    
            $queryUpdateReserva = "UPDATE reservacion SET estado_reservacion = 'Cancelada' WHERE id_reservacion = :id_reserva";
            $query = $connect->prepare($queryUpdateReserva);
            $query->bindValue(":id_reserva",$id_reserva);
            $query->execute();
    
            $connect->commit();
    
        }catch(Exception $e){
            $connect->rollBack();
            echo "Conexion fallida " . $e->getMessage();
            die();
        }
        return true;
    }

    public function update($array)
    {
        $estado = $array['estado'];
        if ($estado == 'Cancelada' || $estado == 'Completada') {

            try {
                $query = $this->prepare("UPDATE reservacion SET fecha_reservacion = :fecha, hora_reservacion = :hora, estado_reservacion = :estado, asiento = :asientos WHERE id_reservacion = :id");
                $query->execute(['id' => $array['id'], 'fecha' => $array['fecha'], 'hora' => $array['hora'], 'estado' => $array['estado'], 'asientos' => $array['asientos']]);
            } catch (Exception $e) {
                echo "Conexion fallida " . $e->getMessage();
                die();
            }

            try {
                $queryUpdateMesa = $this->prepare("UPDATE mesa SET estado_mesa = 'Disponible' WHERE id_mesa = :mesa");
                $queryUpdateMesa->execute(['mesa' => $array['mesa']]);
            } catch (Exception $e) {
                echo "Conexion fallida " . $e->getMessage();
                die();
            }

            return true;
        } else {

            try {
                $query = $this->prepare("UPDATE reservacion SET fecha_reservacion = :fecha, hora_reservacion = :hora, estado_reservacion = :estado, asiento = :asientos WHERE id_reservacion = :id");
                $query->execute(['id' => $array['id'], 'fecha' => $array['fecha'], 'hora' => $array['hora'], 'estado' => $array['estado'], 'asientos' => $array['asientos']]);
            } catch (Exception $e) {
                echo "Conexion fallida " . $e->getMessage();
                die();
            }

            try {
                $queryUpdateMesa = $this->prepare("UPDATE mesa SET estado_mesa = 'Ocupada' WHERE id_mesa = :mesa");
                $queryUpdateMesa->execute(['mesa' => $array['mesa']]);
            } catch (Exception $e) {
                echo "Conexion fallida " . $e->getMessage();
                die();
            }

            return true;
        }
    }
}
