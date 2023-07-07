<?php

use PHPMailer\PHPMailer\{PHPMailer, SMTP, Eception};

class mailer 
{
    function enviarEmail($email, $asunto, $cuerpo)
    {
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
    $mail->Password   = 'wiofmncheyokilve';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;

    //Recipients
    $mail->setFrom('wilberpaitan1612@gmail.com', 'Agroplaza');
    $mail->addAddress('$email');

    //Content
    $mail->isHTML(true);
    $mail->Subject = $asunto;

    $mail->Body    = utf8_decode($cuerpo);
    $mail->AltBody = 'le enviamos su correo';

    $mail->setLanguage('es','phpmailer/language/phpmailer.lang-es.php');

    if($mail->send()){
        return true;
    }else{
        return false;
    }
    } catch (Exception $e) {
    echo "error al enviar el correo: {$mail->ErrorInfo}";
    return false;
    }


    }
}
?>
