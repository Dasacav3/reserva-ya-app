<?php

class ClienteModel extends Model
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
        if($file['error'] == 0) {
            // "name" contiene el nombre real del archivo
            $foto = $file['name'];
            // Mover el archivo a su ubicación final
            // Revisa que exista la carpeta y tiene permisos de escritura
            if(move_uploaded_file($file['tmp_name'], $url = "public/profile_photo/$foto")) {
                // Ahora sí puedes insertar en base de datos
                $url = "public/profile_photo/$foto";
            } else {
                echo 'El archivo se subió, pero no se pudo mover a ubicación final';
            }
        } else {
            echo 'No se pudo subir el archivo';
        }

        try{
            $query = $this->prepare("UPDATE usuario SET foto_perfil = :link WHERE id_usuario = :id");
            $query->execute(['id' => $data['id'], 'link' => $url]);
        }catch(Exception $e){
            echo "Conexión fallida " . $e->getMessage();
            die();
        }
        return true;
    }

    public function get($id)
    {
        try {
            $query = $this->prepare("SELECT nombre_cliente, apellido_cliente, fecha_nacimiento_cliente, email_cliente, celular_cliente FROM cliente WHERE id_usuario = :id");
            $query->execute(['id' => $id]);
            $result = $query->fetch(PDO::FETCH_ASSOC);
        }catch (Exception $e) {
            echo "Conexion fallida " . $e->getMessage();
            die();
        }
        return json_encode($result);
    }

    public function update($array)
    {
        try {
            $query = $this->prepare("UPDATE cliente SET nombre_cliente = :nom, apellido_cliente = :ape, fecha_nacimiento_cliente = :fecha, email_cliente = :mail, celular_cliente = :cel WHERE id_usuario = :id");
            $query->execute(['nom' => $array['nombre'], 'fecha' => $array['fecha'], 'id' => $array['id'], 'ape' => $array['apellido'], 'cel' => $array['cel'], 'mail' => $array['email']]);
        }catch (Exception $e) {
            echo "Conexion fallida " . $e->getMessage();
            die();
        }
        return true;
    }

    public function changePassword($data) {
        try {
            $query = $this->prepare("SELECT id_usuario,clave_usuario FROM usuario WHERE id_usuario = :id");
            $query->execute(['id' => $data['id']]);
            $array = $query->fetch(PDO::FETCH_NUM);
        } catch (Exception $e) {
            echo "Conexion fallida " . $e->getMessage();
        }
    
        if(password_verify($data['pass_old'],$array[1]) && $data['pass_new'] == $data['pass_new2']){
            try {
                $queryupdate = $this->prepare("UPDATE usuario SET clave_usuario = :pass WHERE id_usuario= :id");
                $queryupdate->execute(['id' => $data['id'], 'pass' => $data['pass_hash']]);
            }catch (Exception $e) {
                echo "Conexion fallida " . $e->getMessage();
                die();
            }
            return true;
        }else{
            echo "Las verificación de contraseña fallo";
        }
    }
}
