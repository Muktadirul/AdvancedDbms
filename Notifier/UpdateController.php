<?php

$link = mysqli_connect("127.0.0.1", "root", "", "doc_schedule_prescription");
$pdo = new PDO("mysql:host=localhost;dbname=doc_schedule_prescription", "root", "");

$sql = ' CALL `NotifierUpdate`(:m1,:m2,:m3,:m5,@result);';
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':m1',  $_GET['id'], PDO::PARAM_STR);
$stmt->bindParam(':m2',  $_POST['topics'], PDO::PARAM_STR);
$stmt->bindParam(':m3',  $_POST['msg'], PDO::PARAM_STR);

$stmt->bindParam(':m5',  $_POST['Time'], PDO::PARAM_STR);


$stmt->execute();
$row = $pdo->query("SELECT @result AS level")->fetch(PDO::FETCH_OBJ);
$X = $row->level;

if ($X){
    header('Location: http://localhost/ADDBMS/Notifier/ViewNotifier.php');
}else {
    echo 'Failed to Update data';
}
?>