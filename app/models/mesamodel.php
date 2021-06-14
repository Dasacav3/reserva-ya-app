<?php

class MesaModel extends Model implements IModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function save($data)
    {
        try {
            $query = $this->prepare("INSERT INTO mesa (capacidad_mesa,estado_mesa) VALUES (:capacidad,:estado)");
            $query->execute(['capacidad' => $data['capacidad'], 'estado' => $data['estado']]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return true;

        $this->close();
    }

    public function getAll($busqueda)
    {
        try {
            $query = $this->prepare("SELECT * FROM mesa");
            $query->execute();
            if ($busqueda != "") {
                $query = $this->prepare("SELECT * FROM mesa WHERE id_mesa LIKE '%$busqueda%' OR capacidad_mesa LIKE '%$busqueda%' OR estado_mesa LIKE '%$busqueda%'");
                $query->execute();
            }
            $data = $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return $data;

        $this->close();
    }

    public function get($id)
    {
        try {
            $query = $this->prepare("SELECT * FROM mesa WHERE id_mesa = :id");
            $query->execute(['id' => $id]);
            $resultado = $query->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return $e->getMessage();
        }

        echo '
            <a href="#" id="closePopup-edit" class="closePopup"><i class="fas fa-times-circle"></i></a>
            <h4 class="form-title">Editar mesa</h4>
            <div class="form-fields">
            <div>
                <label>ID Mesa</label> <br />
                <input type="number" value="'.$resultado['ID_MESA'].'" name="idMesa" id="idMesa" readonly> <br />
                <label>Capacidad Mesa</label> <br />
                <input type="number" value="'.$resultado['CAPACIDAD_MESA'].'" name="capacidadMesaUpdate" id="capacidadMesaUpdate"> <br />
                <label>Estado Mesa</label> <br />
                <select name="estadoMesa" id="estadoMesa"> <br /> 
                    <option value="'.$resultado['ESTADO_MESA'].'">'.$resultado['ESTADO_MESA'].' - Actual</option>
                    <option value="Disponible">Disponible</option>
                    <option value="Ocupada">Ocupada</option>
                </select>
            </div>
            </div>
            <input type="button" value="Guardar" id="edit" />
        ';

        $this->close();
    }

    public function update($data)
    {
        try {
            $query = $this->prepare("UPDATE mesa SET capacidad_mesa = :capacidad, estado_mesa = :estado WHERE id_mesa = :id");
            $query->execute(['capacidad' => $data['capacidad'], 'estado' => $data['estado'], 'id' => $data['id']]);
        } catch (Exception $e) {
            return $e->getMessage();
        }

        return true;

        $this->close();
    }

    public function delete($id)
    {
        try {
            $query = $this->prepare("DELETE FROM mesa WHERE id_mesa = :id");
            $query->execute(['id' => $id]);
        } catch (Exception $e) {
            return $e->getMessage();
        }

        return true;

        $this->close();
    }
}
