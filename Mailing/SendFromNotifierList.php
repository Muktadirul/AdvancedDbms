<?php

include './NotifierMail.php';

$NFM = new NotifierMail();
$link = mysqli_connect("127.0.0.1", "root", "", "doc_schedule_prescription");
$pdo = new PDO("mysql:host=localhost;dbname=doc_schedule_prescription", "root", "");
$sql = ' CALL `GetListOfNotifier`(:m1);';
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':m1', $UID, PDO::PARAM_STR);
$stmt->execute();
$c=0;
$IDLIST=  array();
while ($row = $stmt->fetch()) {
    $res = $NFM->NotificationSend($row['mail'], $row['topics'], $row['msg']);
    array_push($IDLIST, $row['id']) ;

}

$link = mysqli_connect("127.0.0.1", "root", "", "doc_schedule_prescription");
$pdo = new PDO("mysql:host=localhost;dbname=doc_schedule_prescription", "root", "");

foreach ($IDLIST as $id){    
    $sql = ' CALL `DeleteFromSendAll`(:m1);';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':m1', $id, PDO::PARAM_STR);
    $stmt->execute();
}
    