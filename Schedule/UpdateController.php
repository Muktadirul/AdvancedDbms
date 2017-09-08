<?php

$link = mysqli_connect("127.0.0.1", "root", "", "doc_schedule_prescription");
$pdo = new PDO("mysql:host=localhost;dbname=doc_schedule_prescription", "root", "");
$sql = ' CALL ScheduleUpdate(:m1,:m2,:m3,:m4,:m5,@result);';
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':m1',  $_GET['scid'], PDO::PARAM_STR);
$stmt->bindParam(':m2',  $_POST['title'], PDO::PARAM_STR);
$stmt->bindParam(':m3',  $_POST['st'], PDO::PARAM_STR);
$stmt->bindParam(':m4',  $_POST['et'], PDO::PARAM_STR);
$stmt->bindParam(':m5',  $_POST['des'], PDO::PARAM_STR);
$stmt->execute();
$row = $pdo->query("SELECT @result AS level")->fetch(PDO::FETCH_OBJ);
$X = $row->level;
if ($X){
    header('Location: http://localhost/ADDBMS/Schedule/ViewSchedule.php');
}else {
    echo 'Failed to Update data';
}
?>