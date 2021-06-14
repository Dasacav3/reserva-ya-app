<?php

class InsumoModel extends Model implements IModel
{

    public function __construct()
    {
        parent::__construct();
    }

    public function save($array)
    {
        try {
            $query = $this->prepare("INSERT INTO insumo (nombre_insumo, cantidad_insumo, fecha_compra_insumo, valor_insumo, id_proveedor,id_categoria_insumo)
             VALUES (:nombre, :cantidad, :fecha, :valor, :proveedor, :categoria)");
            $query->execute(['nombre' => $array['nombre'], 'cantidad' => $array['cantidad'], 'fecha' => $array['fecha'], 'valor' => $array['valor'], 'proveedor' => $array['proveedor'], 'categoria' => $array['categoria']]);
        } catch (Exception $e) {
            echo "Conexion fallida " . $e->getMessage();
            die();
        }

        return true;
    }

    public function saveCategory($nombre)
    {
        try {
            $query = $this->prepare("INSERT INTO categoria_insumo (nombre_categoria_insumo) VALUES (:nombre)");
            $query->execute(['nombre' => $nombre]);
        } catch (Exception $e) {
            echo "Conexion fallida " . $e->getMessage();
            die();
        }
        return true;
    }

    public function get($id)
    {
        try {
            $query = $this->prepare("SELECT * FROM insumo WHERE ID_INSUMO = :id");
            $query->bindParam(":id", $id);
            $query->execute();
            $resultado = $query->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return false;
        }

        return json_encode($resultado);
    }

    public function getCategory()
    {
        try {
            $query = $this->prepare("SELECT id_categoria_insumo,nombre_categoria_insumo FROM categoria_insumo");
            $query->execute();
        } catch (Exception $e) {
            echo "Conexion fallida " . $e->getMessage();
            die();
        }

        echo "<option value=''></option>";
        while ($mesa = $query->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value=" . $mesa['id_categoria_insumo'] . ">" . $mesa['id_categoria_insumo'] . " - " . $mesa['nombre_categoria_insumo'] . "</option>";
        }
    }

    public function getProveedor()
    {
        try {
            $query = $this->prepare("SELECT id_proveedor,nombre_proveedor FROM proveedor");
            $query->execute();
        } catch (Exception $e) {
            echo "Conexion fallida " . $e->getMessage();
            die();
        }

        echo "<option value=''></option>";
        while ($proveedor = $query->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value=" . $proveedor['id_proveedor'] . ">" . $proveedor['id_proveedor'] . " - " . $proveedor['nombre_proveedor'] . "</option>";
        }
    }

    public function getAll($search)
    {
        try {
            $query = $this->prepare("SELECT * FROM insumo ORDER BY id_insumo ASC");
            $query->execute();
            if ($search != "") {
                $query = $this->prepare("SELECT * FROM insumo WHERE id_insumo LIKE '%" . $search . "%' OR nombre_insumo LIKE  '%" . $search . "%' OR  cantidad_insumo LIKE '%" . $search . "%' OR fecha_compra_insumo LIKE '%" . $search . "%'OR valor_insumo LIKE '%" . $search . "%' OR id_proveedor LIKE '%" . $search . "%' OR id_categoria_insumo LIKE '%" . $search . "%'");
                $query->execute();
            }
            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Conexion fallida " . $e->getMessage();
            die();
        }
        echo json_encode($resultado);
    }

    public function update($array)
    {
        try {
            $queryInsumo = $this->prepare("UPDATE insumo SET nombre_insumo = :nombre_insumo, cantidad_insumo = :cantidad_insumo, fecha_compra_insumo = :fecha_compra_insumo, valor_insumo = :valor_insumo, id_proveedor = :id_proveedor, id_categoria_insumo = :id_categoria_insumo WHERE id_insumo = :id");
            $queryInsumo->execute(['nombre_insumo' => $array['nombre_insumo'], 'cantidad_insumo' => $array['cantidad_insumo'], 'fecha_compra_insumo' => $array['fecha_compra_insumo'], 'valor_insumo' => $array['valor_insumo'], 'id_proveedor' => $array['id_proveedor'], 'id_categoria_insumo' => $array['id_categoria_insumo'], 'id' => $array['id']]);
        } catch (Exception $e) {
            echo "Conexion fallida " . $e->getMessage();
            die();
        }
        return true;
    }

    public function updateCategory($array)
    {

        try {
            $query = $this->prepare("UPDATE categoria_insumo SET nombre_categoria_insumo = :nombre WHERE id_categoria_insumo = :id");
            $query->execute(['nombre' => $array['nombre'], 'id' => $array['id']]);
        } catch (Exception $e) {
            echo "Conexion fallida " . $e->getMessage();
            die();
        }
        return true;
    }

    public function delete($id)
    {
        try {
            $query = $this->prepare("DELETE FROM insumo WHERE id_insumo = :id");
            $query->bindParam(":id", $id);
            $query->execute();
        } catch (Exception $e) {
            echo "Conexion fallida " . $e->getMessage();
            die();
        }
        return true;
    }
}
