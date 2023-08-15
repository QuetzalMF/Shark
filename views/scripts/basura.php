<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../Vista_Usuario/src/Exception.php';
require '../../Vista_Usuario/src/PHPMailer.php';
require '../../Vista_Usuario/src/SMTP.php';
require '../../vendor/autoload.php'; // Assuming you installed PHPMailer using Composer

//Create an instance; passing `true` enables exceptions

if(isset($_POST['send']))
{
    $mail = new PHPMailer(true);

    try {
    extract($_POST);
    $token = 1111;


        //Configuracion del servidor
       
        $mail -> SMTPDebug = 2;
        $mail->isSMTP();
        $mail->Host      ='smtp.gmail.com';
        $mail->SMTPAuth  = true;
        $mail->Username = 'noharagnarsson127@gmail.com';
        $mail->Password = 'wrqhjojxutilblzs';
        $mail->SMTPSecure = 'tls';
        $mail->Port      = 587;
        $mail->isHTML(true);
        
    

        $correo = htmlentities($correo);
        $nombre = htmlentities($nombre);
        $apellidos = htmlentities($apellidos);

        //Destinatario
        $mail->setFrom($correo);
        $mail->addAddress($correo);
       
        $mail->CharSet = 'UTF-8';
        $mail->Encoding = 'base64';

        


        $subject = "Verificacion de Correo Electronico de ".($nombre)." ".($apellidos);                
        $body =' <html>
        <head>
            <style>
             
                body {
                    font-family: Arial, sans-serif;
                   
                }
                .container {
                    max-width: 600px;
                    margin: 0 auto;
                    padding: 20px;
                    background-color: #f4f4f4;
                    border-radius: 10px;
                    box-shadow: 0px 1rem 1rem darkorchid;
                }
                .logo {
                    display: block;
                    margin: 0 auto;
                }
                

            </style>
        </head>
        <body>
            <div class="container">
                <h1 style="font-family: Arial, sans-serif;">Bienvenido/a a SharkShop '.$nombre.' '.$apellidos.'!</h1>
                <h2 style="font-family: Arial, sans-serif;">
                 Sea bienvenido/a a nuestra tienda SharkShop, esperemos disfrute de su estadia.
                </h2>
                <h3 style="font-family: Arial, sans-serif;">Te damos un codigo de verificacion para dar de alta tu correo.</h3>
                <h2 style="font-family: Arial, sans-serif;">Este es tu codigo de verificacion:</h2>
                <h2 style="font-family: Arial, sans-serif;">'.$token.'</h2>
                <p style="font-family: Arial, sans-serif;">Favor de copiar y pegar el codigo en: <a href="">LINK</a></p>
                <p style="font-family: Arial, sans-serif;">Muchas gracias por pertencer a nuestra pagina, tenga un excelente día.</p>
                 </div>
             </body>
        </html>';    

        $mail->Subject = $subject;
        $mail->Body = $body;
      
            
            $mail->send();
            echo 'El mensaje se envio';
        } catch (Exception $e) {
            echo "Hubo un error: {$mail->ErrorInfo}";
        }

    }




?>