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
    APP_NAME=
    APP_URL=

    APP_DB_ADMIN_PORT=8001
    APP_SERVER_PORT=8002

    DB_HOST=127.0.0.1
    DB_NAME=
    DB_USER=
    DB_PASSWORD=
    DB_CHARSET=utf8
    DB_PORT=23306
    MYSQL_ROOT_PASSWORD=

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

- Cambiar la variable `URL` por la misma URL que utilizó en el archivo .env

- __Importante__ Si se quiere utilizar el envio de correos electronicos es necesario que tenga las variables de PHPMAILER_USER y PHPMAILER_PASSWORD con las credenciales de la cuenta de correo (preferiblemente una cuenta de gmail)

- Por ultimo, ya puedes ingresar a la URL y utilizar el sistema