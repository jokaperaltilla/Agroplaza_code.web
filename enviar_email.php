<?php

use PHPMailer\PHPMailer\{PHPMailer, SMTP, Eception};

require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
require 'phpmailer/src/Exception.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'wilberpaitan1612@gmail.com';
    $mail->Password   = 'fdetmdrfwfcgkgfz';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;

    //Recipients
    $mail->setFrom('wilberpaitan1612@gmail.com', 'Agroplaza');
    $mail->addAddress('wilber16119@gmail.com', 'wilber User');

    //Content
    $mail->isHTML(true);
    $mail->Subject = 'Prueba de correo';

    $cuerpo = '<h4>Gracias por su registro</h4>';
    $cuerpo .= '<p>Su correo es <b>'.'@gmail.com'.'</b></p>';

    $mail->Body    = utf8_decode($cuerpo);
    $mail->AltBody = 'le enviamos su correo';

    $mail->setLanguage('es','phpmailer/language/phpmailer.lang-es.php');

    $mail->send();
    } catch (Exception $e) {
    echo "error al enviar el correo: {$mail->ErrorInfo}";
    }

?>