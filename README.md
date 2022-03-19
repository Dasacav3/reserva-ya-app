# Reserva Ya Application

Reserva Ya is a software application that allows the management of reservations, products, supplies and suppliers for the Gastrobar Sephia PUB establishment.

![image](https://user-images.githubusercontent.com/57577210/123087218-e7849a80-d3e9-11eb-988e-bb7817242343.png)
![image](https://user-images.githubusercontent.com/57577210/123087268-f8351080-d3e9-11eb-877d-8b47e43ce380.png)
![image](https://user-images.githubusercontent.com/57577210/123087321-097e1d00-d3ea-11eb-9dea-3f7794f2dfca.png)

The application has three roles (Administrator, Employee, Client) each with its different associated permissions as described below:

### Administrator:

![image](https://user-images.githubusercontent.com/57577210/123087373-1438b200-d3ea-11eb-9a4d-ab1c794810f0.png)

### Employee:

![image](https://user-images.githubusercontent.com/57577210/123087666-68dc2d00-d3ea-11eb-8408-9a563d578afb.png)

### Client:

![image](https://user-images.githubusercontent.com/57577210/123087856-a50f8d80-d3ea-11eb-805f-384126ca866a.png)

# How to test it?

- Create a .env file and add the variables from the .env.example

    ```
    APP_NAME=
    APP_URL=

    APP_DB_ADMIN_PORT=8001
    APP_SERVER_PORT=8002

    DB_HOST=      // Gateway docker network
    DB_NAME=
    DB_USER=
    DB_PASSWORD=
    DB_CHARSET=utf8
    DB_PORT=23306
    MYSQL_ROOT_PASSWORD=

    PHPMAILER_USER=
    PHPMAILER_PASSWORD=
    ```
    
- Now you can execute the command (You must have docker installed and running)

    ```
    docker-compose up -d --build
    ```

    - If it doesn't run correctly, check that the .env file exists and that the variable values are correct.
    - To query the `network_id` of the docker network, run the command: `docker network ls`


- To query the `DB_HOST` it is necessary to run the command `docker network inspect 'network_id'` and look for the value of `Gateway`

- Import the ReservaYa BD.sql file found in the /docs folder

    Take into account the following data for admission:
    ```
    _ADMINISTRATOR_
    usuario: admin@gmail.com
    contraseña: 1234

    _EMPLOYEE_
    usuario: empleado@gmail.com
    contraseña: 1234

    _CLIENT_
    usuario: cliente@gmail.com
    contraseña: 1234
    ```

- Change the `APP_URL` variable to the same URL you used in the .env file

- __Important__ If you want to use the sending of emails, you need to have the PHPMAILER_USER and PHPMAILER_PASSWORD variables with the email account credentials (preferably a gmail account)

- Finally, you can now enter the URL and use the system
