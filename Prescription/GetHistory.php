<?php
$val=md5($_GET['x']);
include '../Mailing/M1.php';
$History = new History();
$History->ShowHistory($val);
?>

<a href="http://localhost/ADDBMS/Prescription/">Back</a>