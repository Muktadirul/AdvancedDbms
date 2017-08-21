<?php

if(!isset($_POST['hr']) || empty($_POST['hr']) || !isset($_POST['min']) ||empty($_POST['min']) ||!isset($_POST['day']) ||empty($_POST['day']) ||!isset($_POST['month']) ||empty($_POST['month']) ||!isset($_POST['year']) ||empty($_POST['year']) ||!isset($_POST['msg']) ||empty($_POST['msg']) ||!isset($_POST['topics_name']) ||empty($_POST['topics_name'])){
    $X = 'Please Set the values First';
    header('Location: http://localhost/ADDBMS/Notifier/ErrorMessage.php?t=' . $X);
    die();
}

session_start();
$UID= $_SESSION['USERID'];
$link = mysqli_connect("127.0.0.1", "root", "", "doc_schedule_prescription");
$pdo = new PDO("mysql:host=localhost;dbname=doc_schedule_prescription", "root", "");
$Time = mysqli_real_escape_string($link, stripslashes($_POST["hr"])).':';
$Time=$Time.mysqli_real_escape_string($link, stripslashes($_POST["min"])).':00';
$Date=mysqli_real_escape_string($link, stripslashes($_POST["year"])).'-';
$Date =$Date. mysqli_real_escape_string($link, stripslashes($_POST["month"])).'-';
$Date =$Date.mysqli_real_escape_string($link, stripslashes($_POST["day"]));
$MSG=mysqli_real_escape_string($link, stripslashes(htmlentities($_POST["msg"])));
$TopicsName=mysqli_real_escape_string($link, stripslashes(htmlentities($_POST["topics_name"])));

$sql = ' CALL `NotifierAdd`(:m1, :m2, :m3, :m4, :m5, @res);';
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':m1', $UID, PDO::PARAM_STR);
$stmt->bindParam(':m2', $TopicsName, PDO::PARAM_STR);
$stmt->bindParam(':m3', $MSG, PDO::PARAM_STR);
$stmt->bindParam(':m4', $Time, PDO::PARAM_STR);
$stmt->bindParam(':m5', $Date, PDO::PARAM_STR);
$stmt->execute();
$row = $pdo->query("SELECT @res AS level")->fetch(PDO::FETCH_OBJ);
$X = $row->level;
if ($X == 1) {
    header("Location: ViewNotifier.php");
} else {
    $X = 'Please Set the Values Correctly';
    header('Location: http://localhost/ADDBMS/Notifier/ErrorMessage.php?t=' . $X);
    die();
}

