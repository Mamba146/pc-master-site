<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp-relay.brevo.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'a08a83001e@smtp-relay.brevo.com';
    $mail->Password   = 'arWzzHXBpkyqSSBh';
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    $mail->setFrom('avdoev@gmail.com', 'PC Master Nice');
    $mail->addAddress('avdoev@gmail.com');

    $mail->Subject = 'Новое сообщение с сайта';
    $mail->Body =
        "Имя: " . $_POST['name'] . "\n" .
        "Email: " . $_POST['email'] . "\n" .
        "Телефон: " . $_POST['phone'] . "\n\n" .
        "Сообщение:\n" . $_POST['message'];

    $mail->send();
    header("Location: merci.html");
    exit;

} catch (Exception $e) {
    echo "Ошибка SMTP: " . $mail->ErrorInfo;
}