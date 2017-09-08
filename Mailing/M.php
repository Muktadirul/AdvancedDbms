<?php
require './PHPMailer-master/PHPMailer-master/PHPMailerAutoload.php';

$mail = new PHPMailer;
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com;';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'testproject149@gmail.com';                 // SMTP username
$mail->Password = 'tp1hello';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to
$mail->setFrom('testproject149@gmail.com', 'Open To See ');
$mail->addAddress('testproject149@gmail.com', 'Joe User');     // Add a recipient
$mail->isHTML(true);                                  // Set email format to HTML
$mail->Subject = 'Learning';
$mail->Body    = 'This one is from localhost Enjoying';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

?>
