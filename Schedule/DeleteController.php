<?php

$link = mysqli_connect("127.0.0.1", "root", "", "doc_schedule_prescription");
$pdo = new PDO("mysql:host=localhost;dbname=doc_schedule_prescription", "root", "");
$sql = ' CALL `ScheduleDelete`(:m1,@res);';
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':m1',  $_GET['scid'], PDO::PARAM_STR);
$stmt->execute();
$row = $pdo->query("SELECT @res AS level")->fetch(PDO::FETCH_OBJ);
$X = $row->level;
if ($X){
    $Xx='Data Have been Deleted Successfully';
    header('Location: http://localhost/ADDBMS/Schedule/ViewSchedule.php');
}else {
    echo 'Failed to delte data';
}
?>