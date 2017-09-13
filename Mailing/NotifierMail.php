<?php

require './PHPMailer-master/PHPMailer-master/PHPMailerAutoload.php';

class NotifierMail {

    function NotificationSend($NotifierMail, $title, $Msg) {
        $mailingid = 'projectt149@gmail.com';
        $pwd = 'tp1hello';
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com;';
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = $mailingid;                 // SMTP username
        $mail->Password = $pwd;                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to
        $mail->setFrom('Notifications From Doctor\'s Helper', 'Doctor\'s Helper');
        $mail->addAddress($NotifierMail, 'From Notifiers');     // Add a recipient
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $title;
        $mail->Body = $Msg;
        $mail->AltBody = '';
        if (!$mail->send()) {
            return 0;
        } else {
            return 1;
        }
    }

}

?>