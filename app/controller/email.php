<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'lib/PHPmailer/Exception.php';
require 'lib/PHPmailer/PHPMailer.php';
require 'lib/PHPmailer/SMTP.php';

class Email extends Controller
{
    private $session;

    public function __construct()
    {
        parent::__construct();
        $this->session = new Session();
    }

    public function sendEmailAdd()
    {
        $idCliente = $_POST['cliente'];
        $fechaReserva = $_POST['fecha_reserva'];
        $horaReserva = $_POST['hora_reserva'];
        $idMesa = $_POST['mesa'];
        $data = $this->model->getDataAdd(['id' => $idCliente, 'fecha' => $fechaReserva, 'hora' => $horaReserva, 'mesa' => $idMesa]);
        $email = $data['EMAIL_CLIENTE'];

        try {
            //Server settings
            $mail = new PHPMailer(true);
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                        //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = '';               //SMTP username
            $mail->Password   = '';              //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;                                  //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('micuenta3719@gmail.com', 'Notificaciones Reserva Ya App');
            $mail->addAddress($email);                          //Add a recipient

            //Content
            $mail->CharSet = 'UTF-8';
            $mail->isHTML(true);
            $mail->addEmbeddedImage('public/img/logo-reservaya.png', 'logo', 'logo-reservaya.png');
            $mail->addEmbeddedImage('public/img/email_banner.png', 'banner', 'email_banner.png');
            $mail->Subject = 'Reservación #00890' . $data['ID_RESERVACION'] . ' agendada para ' . $data['FECHA_RESERVACION'];
            $mail->Body   = ' <!DOCTYPE html>
            <html lang="es">
                <head>
                    <meta charset="UTF-8" />
                    <style>
                    *{
                        font-family: "Arial", sans-serif;
                        margin: 0;
                        padding: 0;
                        box-sizing: border-box;
                    }
                    body{
                        margin: auto;
                    }
                    .container {
                        display: grid;
                        gap: 0;
                        width: 500px;
                        border: 1px solid black;
                    }
                    .header {
                        display: flex;
                        align-items: center;
                        height: 80px;
                        background: #7a6563ff;
                    }
                    .header img {
                        width: 200px;
                        margin-left: 1em;
                    }
                    .image img{
                        height: 300px;
                        width: 500px;
                    }
                    .main {
                        margin: 1em;
                        font-size: 20px
                    }
                    .main h1{
                        font-size: 38px;
                    }
                    .main ul li{
                        list-style: none;
                        font-weight: bold;
                    }
                    .info{
                        font-size: 15px;
                        font-style: italic;
                        text-align: center;
                    }
                    .footer {
                        color: #fff;
                        height: 50px;
                        background: #7a6563ff;
                        display: flex;
                        align-items: center;
                    }
                    .footer p {
                        text-align: center;
                        width: 100%;
                        font-weight: bold;
                    }
                    </style>
                </head>
                <body>
                    <div class="container">
                        <div class="header">
                            <img src="cid:logo" alt="" />
                        </div>
                        <div class="image">
                            <img src="cid:banner" alt="" /> 
                        </div>
                        <div class="main">
                            <h1>Reservación Sephia PUB</h1> <br>
                            <p>Se ha registrado una reservación para <b>' . $data['NOMBRE_CLIENTE'] . '  ' . $data['APELLIDO_CLIENTE'] . '</b>  con el correo electronico ' . $data['EMAIL_CLIENTE'] . '</p> <br>
                            <p>Los datos de la reservación son los siguientes:</p>
                            <br />
                            <ul>
                                <li>ID: 00876' . $data['ID_RESERVACION'] . '</li>
                                <li>Fecha: ' . $data['FECHA_RESERVACION'] . '</li>
                                <li>Hora: ' . date("h:i A", strtotime($data['HORA_RESERVACION'])) . '</li>
                                <li>Mesa: ' . $data['ID_MESA'] . '</li>
                                <li>Asientos: ' . $data['ASIENTO'] . '</li>
                                <li>Estado: Activa</li>
                            </ul>
                        </div>
                        <div class="info">
                            <p>
                                Si crees que se trata de un error, por favor comunicate con el administrador para obtener mas
                                información.
                            </p> <br>
                            <p>*POR FAVOR NO RESPONDER ESTE MENSAJE - CORREO GENERADO AUTOMATICAMENTE*</p>
                        </div>
                        <div class="footer">
                            <p>© Todos los derechos reservados | 2020 - 2021 | Sephia PUB</p>
                        </div>
                    </div>
                </body>
            </html>
            
                ';
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Correo enviado';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    public function sendEmailEdit()
    {
        $idCliente = $_POST['cliente1'];
        $idMesa = $_POST['edit_mesa'];
        $idReserva = $_POST['id_reserva'];
        $data = $this->model->getDataEdit(['id' => $idCliente, 'reserva' => $idReserva, 'mesa' => $idMesa]);
        $email = $data['EMAIL_CLIENTE'];

        try {
            //Server settings
            $mail = new PHPMailer(true);
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                        //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = '';               //SMTP username
            $mail->Password   = '';              //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;                                  //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('micuenta3719@gmail.com', 'Notificaciones Reserva Ya App');
            $mail->addAddress($email);                          //Add a recipient

            //Content
            $mail->CharSet = 'UTF-8';
            $mail->isHTML(true);
            $mail->addEmbeddedImage('public/img/logo-reservaya.png', 'logo', 'logo-reservaya.png');
            $mail->addEmbeddedImage('public/img/email_banner.png', 'banner', 'email_banner.png');
            $mail->Subject = 'Reservación #00890' . $data['ID_RESERVACION'] . ' ' . $data['ESTADO_RESERVACION'];
            $mail->Body   = ' <!DOCTYPE html>
            <html lang="es">
                <head>
                    <meta charset="UTF-8" />
                    <style>
                    *{
                        font-family: "Arial", sans-serif;
                        margin: 0;
                        padding: 0;
                        box-sizing: border-box;
                    }
                    body{
                        margin: auto;
                    }
                    .container {
                        display: grid;
                        gap: 0;
                        width: 500px;
                        border: 1px solid black;
                    }
                    .header {
                        display: flex;
                        align-items: center;
                        height: 80px;
                        background: #7a6563ff;
                    }
                    .header img {
                        width: 200px;
                        margin-left: 1em;
                    }
                    .image img{
                        height: 300px;
                        width: 500px;
                    }
                    .main {
                        margin: 1em;
                        font-size: 20px
                    }
                    .main h1{
                        font-size: 38px;
                    }
                    .main ul li{
                        list-style: none;
                        font-weight: bold;
                    }
                    .info{
                        font-size: 15px;
                        font-style: italic;
                        text-align: center;
                    }
                    .footer {
                        color: #fff;
                        height: 50px;
                        background: #7a6563ff;
                        display: flex;
                        align-items: center;
                    }
                    .footer p {
                        text-align: center;
                        width: 100%;
                        font-weight: bold;
                    }
                    </style>
                </head>
                <body>
                    <div class="container">
                        <div class="header">
                            <img src="cid:logo" alt="" />
                        </div>
                        <div class="image">
                            <img src="cid:banner" alt="" /> 
                        </div>
                        <div class="main">
                            <h1>Reservación Sephia PUB</h1> <br>
                            <p>Se ha modificado una reservación para <b>' . $data['NOMBRE_CLIENTE'] . '  ' . $data['APELLIDO_CLIENTE'] . '</b>  con el correo electronico ' . $data['EMAIL_CLIENTE'] . '</p> <br>
                            <p>Los datos nuevos de la reservación son los siguientes:</p>
                            <br />
                            <ul>
                                <li>ID: 00876' . $data['ID_RESERVACION'] . '</li>
                                <li>Fecha: ' . $data['FECHA_RESERVACION'] . '</li>
                                <li>Hora: ' . date("h:i A", strtotime($data['HORA_RESERVACION'])) . '</li>
                                <li>Mesa: ' . $data['ID_MESA'] . '</li>
                                <li>Asientos: ' . $data['ASIENTO'] . '</li>
                                <li>Estado: ' . $data['ESTADO_RESERVACION'] . '</li>
                            </ul>
                        </div>
                        <div class="info">
                            <p>
                                Si crees que se trata de un error, por favor comunicate con el administrador para obtener mas
                                información.
                            </p> <br>
                            <p>*POR FAVOR NO RESPONDER ESTE MENSAJE - CORREO GENERADO AUTOMATICAMENTE*</p>
                        </div>
                        <div class="footer">
                            <p>© Todos los derechos reservados | 2020 - 2021 | Sephia PUB</p>
                        </div>
                    </div>
                </body>
            </html>
            
                ';
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Correo enviado';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    public function sendEmailCancel()
    {
        $idReserva = file_get_contents("php://input");
        $data = $this->model->getDataCancel(['reserva' => $idReserva]);
        $email = $data['EMAIL_CLIENTE'];

        try {
            //Server settings
            $mail = new PHPMailer(true);
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                        //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = '';               //SMTP username
            $mail->Password   = '';              //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;                                  //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('micuenta3719@gmail.com', 'Notificaciones Reserva Ya App');
            $mail->addAddress($email);                          //Add a recipient

            //Content
            $mail->CharSet = 'UTF-8';
            $mail->isHTML(true);
            $mail->addEmbeddedImage('public/img/logo-reservaya.png', 'logo', 'logo-reservaya.png');
            $mail->addEmbeddedImage('public/img/email_banner.png', 'banner', 'email_banner.png');
            $mail->Subject = 'Reservación #00890' . $data['ID_RESERVACION'] . ' Cancelada';
            $mail->Body   = ' <!DOCTYPE html>
            <html lang="es">
                <head>
                    <meta charset="UTF-8" />
                    <style>
                    *{
                        font-family: "Arial", sans-serif;
                        margin: 0;
                        padding: 0;
                        box-sizing: border-box;
                    }
                    body{
                        margin: auto;
                    }
                    .container {
                        display: grid;
                        gap: 0;
                        width: 500px;
                        border: 1px solid black;
                    }
                    .header {
                        display: flex;
                        align-items: center;
                        height: 80px;
                        background: #7a6563ff;
                    }
                    .header img {
                        width: 200px;
                        margin-left: 1em;
                    }
                    .image img{
                        height: 300px;
                        width: 500px;
                    }
                    .main {
                        margin: 1em;
                        font-size: 20px
                    }
                    .main h1{
                        font-size: 38px;
                    }
                    .main ul li{
                        list-style: none;
                        font-weight: bold;
                    }
                    .info{
                        font-size: 15px;
                        font-style: italic;
                        text-align: center;
                    }
                    .footer {
                        color: #fff;
                        height: 50px;
                        background: #7a6563ff;
                        display: flex;
                        align-items: center;
                    }
                    .footer p {
                        text-align: center;
                        width: 100%;
                        font-weight: bold;
                    }
                    </style>
                </head>
                <body>
                    <div class="container">
                        <div class="header">
                            <img src="cid:logo" alt="" />
                        </div>
                        <div class="image">
                            <img src="cid:banner" alt="" /> 
                        </div>
                        <div class="main">
                            <h1>Reservación Sephia PUB</h1> <br>
                            <p>Se ha cancelado una reservación para <b>' . $data['NOMBRE_CLIENTE'] . '  ' . $data['APELLIDO_CLIENTE'] . '</b>  con el correo electronico ' . $data['EMAIL_CLIENTE'] . '</p> <br>
                            <br />
                            <ul>
                                <li>ID: 00876' . $data['ID_RESERVACION'] . '</li>
                            </ul>
                        </div>
                        <div class="info">
                            <p>
                                Si crees que se trata de un error, por favor comunicate con el administrador para obtener mas
                                información.
                            </p> <br>
                            <p>*POR FAVOR NO RESPONDER ESTE MENSAJE - CORREO GENERADO AUTOMATICAMENTE*</p>
                        </div>
                        <div class="footer">
                            <p>© Todos los derechos reservados | 2020 - 2021 | Sephia PUB</p>
                        </div>
                    </div>
                </body>
            </html>
            
                ';
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Correo enviado';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
