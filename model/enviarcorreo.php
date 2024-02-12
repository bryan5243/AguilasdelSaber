<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once '../vendor/phpmailer/src/Exception.php';


require_once '../vendor/phpmailer/src/PHPMailer.php';
require_once '../vendor/phpmailer/src/SMTP.php';
if (isset($_POST["enviar"])) {
    // Recoger datos del formulario
    $nombre = $_POST['nombre'];
    $asunto = $_POST['asunto'];
    $email = $_POST['email'];
    $mensaje = $_POST['message'];

    // Crear una nueva instancia de PHPMailer
    $mail = new PHPMailer(true);
    try {
        // Configurar el servidor SMTP
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = '';
        $mail->Password = 'dkba rurf hkpw njlk';

        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        // Configurar remitente y destinatario
        $mail->addAddress('', 'Contactos');

        // Configurar el contenido del correo
        $mail->isHTML(true);
        $mail->Subject = $asunto;
        $mail->Body = "Mi nombre es:" . $nombre . '<br> Mi correo de contacto:' . $email . '<br>' . $mensaje;

        // Enviar el correo
        $mail->send();

    } catch (Exception $e) {
        echo 'Error al enviar el mensaje: ', $mail->ErrorInfo;
    }
}