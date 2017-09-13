<?php

class SendPrescription {

    function sendmail($mail,$phone,$msg) {
        session_start();
        include '../Mailing/PrescriptionMail.php';
        $NFM = new PrescriptionMail();
        $res = $NFM->PrescriptionSend($_SESSION['USERNAME'], $mail, 'Prescription', $phone, $msg);
        if ($res == 1) {
            echo '<div class="col-lg-offset-2 col-lg-1"><h4>Mail Send</h4></div><br>';
        }
    }
}
