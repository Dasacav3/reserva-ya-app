<?php

require "../database.php";

session_start();

$sesion = $_SESSION['datos'];

$id = file_get_contents("php://input");

try{
    $query = $pdo->prepare("SELECT reservacion.ID_RESERVACION, cliente.NOMBRE_CLIENTE, cliente.APELLIDO_CLIENTE, cliente.EMAIL_CLIENTE
    FROM reservacion_reserva_mesa
    INNER JOIN reservacion ON reservacion_reserva_mesa.ID_RESERVACION = reservacion.ID_RESERVACION
    INNER JOIN mesa ON reservacion_reserva_mesa.ID_MESA = mesa.ID_MESA
    INNER JOIN cliente ON reservacion.ID_CLIENTE = cliente.ID_CLIENTE WHERE reservacion_reserva_mesa.ID_RESERVACION_RESERVA_MESA = :id");
    $query->bindParam(":id",$id);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
}catch(Exception $e){
    echo "Conexion Fallida " . $e->getMessage();
    die();
}
    while($result){
        $email_cliente = $result['EMAIL_CLIENTE'];
        $nombre = $result['NOMBRE_CLIENTE'];
        $apellido = $result['APELLIDO_CLIENTE'];
        $id_reserva = $result['ID_RESERVACION'];
    }


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../../lib/PHPmailer/Exception.php';
require '../../../lib/PHPmailer/PHPMailer.php';
require '../../../lib/PHPmailer/SMTP.php';


try {
    //Server settings
    $mail = new PHPMailer(true);
    $mail->SMTPDebug = 0;                                       //Enable verbose debug output
    $mail->isSMTP(true);                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = '';               //SMTP username
    $mail->Password   = '';              //SMTP password
    $mail->SMTPSecure = 'tls';                                  //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                                  //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('micuenta3719@gmail.com', 'ReservaYaNotifications');
    $mail->addAddress($email_cliente);                          //Add a recipient
    // $mail->addAddress('ellen@example.com');                  //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('../views/dist/img/logo-reservaya.png');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->CharSet = 'UTF-8';
    $mail->isHTML(true);       
    $mail->addEmbeddedImage('../../views/dist/img/logo-reservaya.png','logo','logo-reservaya.png'); 
    $mail->addEmbeddedImage('../../views/dist/img/email_banner.png','banner','email_banner.png');                       //Set email format to HTML
    $mail->Subject = 'Reservación #00876'.$id_reserva.' Cancelada' ;
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
                    <p>Se ha cancelado una reservación para <b>'.$nombre.'  '.$apellido.'</b>  con el correo electronico ' . $email_cliente . '</p> <br>
                    <br />
                    <ul>
                        <li>ID: 00876' . $id_reserva . '</li>
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

$pdo=null;