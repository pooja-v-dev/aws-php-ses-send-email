<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

$sender = '';
$senderName = '';

$recipient = '';

// Replace smtp_username with your Amazon SES SMTP user name.
$usernameSmtp = '';

// Replace smtp_password with your Amazon SES SMTP password.
$passwordSmtp = '';

$host = '';
$port = 587;

// The subject line of the email
$subject = 'Test email from AWS SES';

// The plain-text body of the email
$bodyText =  "-- Put body text here --";

// The HTML-formatted body of the email
$bodyHtml = '<b>This is email from AWS SES for testing by Pooja</b>';

$mail = new PHPMailer(true);

try {
    // Specify the SMTP settings.
    $mail->isSMTP();
    $mail->setFrom($sender, $senderName);
    $mail->Username   = $usernameSmtp;
    $mail->Password   = $passwordSmtp;
    $mail->Host       = $host;
    $mail->Port       = $port;
    $mail->SMTPAuth   = true;
    $mail->SMTPSecure = 'tls';
    //  $mail->addCustomHeader('X-SES-CONFIGURATION-SET', $configurationSet);

    // Specify the message recipients.
    $mail->addAddress($recipient);
    // You can also add CC, BCC, and additional To recipients here.

    // Specify the content of the message.
    $mail->isHTML(true);
    $mail->Subject    = $subject;
    $mail->Body       = $bodyHtml;
    $mail->AltBody    = $bodyText;
    $mail->addAttachment('screen-0.jpg', 'image.jpg');
    $mail->Send();
    echo "Email sent!", PHP_EOL;
} catch (Exception $e) {
    echo "An error occurred. {$e->errorMessage()}", PHP_EOL; //Catch errors from PHPMailer.
}
