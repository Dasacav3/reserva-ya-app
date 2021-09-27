# Reserva Ya Application

Reserva ya es una aplicación de software que permite la gestión de reservaciones, productos, insumos y proveedores para el establecimiento Gastrobar Sephia PUB.

![image](https://user-images.githubusercontent.com/57577210/123087218-e7849a80-d3e9-11eb-988e-bb7817242343.png)
![image](https://user-images.githubusercontent.com/57577210/123087268-f8351080-d3e9-11eb-877d-8b47e43ce380.png)
![image](https://user-images.githubusercontent.com/57577210/123087321-097e1d00-d3ea-11eb-9dea-3f7794f2dfca.png)

El aplicativo cuenta con tres roles (Administrador,Empleado,Cliente) cada uno con sus diferentes permisos asociados como se describe a continación:

### Administrador:

![image](https://user-images.githubusercontent.com/57577210/123087373-1438b200-d3ea-11eb-9a4d-ab1c794810f0.png)

### Empleado:

![image](https://user-images.githubusercontent.com/57577210/123087666-68dc2d00-d3ea-11eb-8408-9a563d578afb.png)

### Cliente:

![image](https://user-images.githubusercontent.com/57577210/123087856-a50f8d80-d3ea-11eb-805f-384126ca866a.png)

# ¿Cómo probarlo?

- Crear un archivo .env y agregar las variables del archivo .env example

    ```
    HOST="localhost"
    DB=
    URL=
    USER=
    PASSWORD=
    CHARSET="utf8"

    PHPMAILER_USER=
    PHPMAILER_PASSWORD=
    ```


- Importar el archivo ReservaYa BD.sql que se encuentra en la carpeta /docs

    Tener en cuenta los siguientes datos para el ingreso:
    ```
    _ADMINISTRADOR_
    usuario: admin@gmail.com
    contraseña: 1234

    _EMPLEADO_
    usuario: empleado@gmail.com
    contraseña: 1234

    _CLIENTE_
    usuario: cliente@gmail.com
    contraseña: 1234
    ```

- Ingresar a los archivos `/public/js/modules.js` `/public/js/insumos_admin.js` y cambiar la variable `URL` por la misma URL que uso en el archivo .env
- Ingresar al archivo `/app/controller/database.php` y configurar los datos de la BD
- Por ultimo, ya puedes ingresar a la URL y utilizar el sistema