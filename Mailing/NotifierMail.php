<?php

require './PHPMailer-master/PHPMailer-master/PHPMailerAutoload.php';

class PrescriptionMail {

    private $mailingid = 'testproject149@gmail.com';
    private $pwd = 'tp1hello';

    function PrescriptionSend($UserName, $NotifierMail, $title, $Msg) {

        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com;';
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = $this->mailingid;                 // SMTP username
        $mail->Password = $this->pwd;                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to
        $mail->setFrom($this->mailingid, 'Doctor\'s Helper');
        $mail->addAddress($NotifierMail, $UserName);     // Add a recipient
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $title;
        $mail->Body = $Msg;
        $mail->AltBody = '';
        if (!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }
    }

}

?>