<?php

class AdminModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function changePhoto($data)
    {
        // Usar una variable para tratar de simplificar
        $file = $data['photo_user'];
        // Si la propiedad "error" es cero, el archivo se subió correctamente
        if ($file['error'] == 0) {
            // "name" contiene el nombre real del archivo
            $foto = $file['name'];
            // Mover el archivo a su ubicación final
            // Revisa que exista la carpeta y tiene permisos de escritura
            if (move_uploaded_file($file['tmp_name'], $url = "public/profile_photo/$foto")) {
                // Ahora sí puedes insertar en base de datos
                $url = "public/profile_photo/$foto";
            } else {
                echo 'El archivo se subió, pero no se pudo mover a ubicación final';
            }
        } else {
            echo 'No se pudo subir el archivo';
        }

        try {
            $query = $this->prepare("UPDATE usuario SET foto_perfil = :link WHERE id_usuario = :id");
            $query->execute(['id' => $data['id'], 'link' => $url]);
        } catch (Exception $e) {
            echo "Conexión fallida " . $e->getMessage();
            die();
        }
        return true;
    }

    public function get($id)
    {
        try {
            $query = $this->prepare("SELECT nombre_admin,apellido_admin,email_admin,celular_admin FROM administrador WHERE id_usuario = :id");
            $query->execute(['id' => $id]);
            $result = $query->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Conexion fallida " . $e->getMessage();
            die();
        }
        return json_encode($result);
    }

    public function update($array)
    {
        try {
            $query = $this->prepare("UPDATE administrador SET nombre_admin = :nombre, apellido_admin = :apellido, email_admin = :email, celular_admin = :cel WHERE id_usuario = :id");
            $query->execute(['nombre' => $array['nombre'], 'id' => $array['id'], 'apellido' => $array['apellido'], 'cel' => $array['cel'], 'email' => $array['email']]);
        } catch (Exception $e) {
            echo "Conexion fallida " . $e->getMessage();
            die();
        }
        return true;
    }

    public function changePassword($data)
    {
        try {
            $query = $this->prepare("SELECT id_usuario,clave_usuario FROM usuario WHERE id_usuario = :id");
            $query->execute(['id' => $data['id']]);
            $array = $query->fetch(PDO::FETCH_NUM);
        } catch (Exception $e) {
            echo "Conexion fallida " . $e->getMessage();
        }

        if (password_verify($data['pass_old'], $array[1]) && $data['pass_new'] == $data['pass_new2']) {
            try {
                $queryupdate = $this->prepare("UPDATE usuario SET clave_usuario = :pass WHERE id_usuario= :id");
                $queryupdate->execute(['id' => $data['id'], 'pass' => $data['pass_hash']]);
            } catch (Exception $e) {
                echo "Conexion fallida " . $e->getMessage();
                die();
            }
            return true;
        } else {
            echo "Las verificación de contraseña fallo";
        }
    }
}
