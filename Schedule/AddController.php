<?php

if(!isset($_POST['shr']) || empty($_POST['shr']) || !isset($_POST['smin']) ||empty($_POST['smin']) ||!isset($_POST['sday']) ||empty($_POST['sday']) ||!isset($_POST['smonth']) ||empty($_POST['smonth']) ||!isset($_POST['syear']) ||empty($_POST['syear']) ||!isset($_POST['des']) ||empty($_POST['des']) ||!isset($_POST['title']) ||empty($_POST['title'])||!isset($_POST['ehr']) || empty($_POST['ehr']) || !isset($_POST['emin']) ||empty($_POST['emin']) ||!isset($_POST['eday']) ||empty($_POST['eday']) ||!isset($_POST['emonth']) ||empty($_POST['emonth']) ||!isset($_POST['eyear']) ||empty($_POST['eyear'])){
    $X = 'Please Set the values First';
    header('Location: http://localhost/ADDBMS/Schedule/ErrorMessage.php?t=' . $X);
    die();
}
$title=$_POST['title'];
session_start();
$UID= $_SESSION['USERID'];
$link = mysqli_connect("127.0.0.1", "root", "", "doc_schedule_prescription");
$pdo = new PDO("mysql:host=localhost;dbname=doc_schedule_prescription", "root", "");

$Time = mysqli_real_escape_string($link, stripslashes($_POST["shr"])).':';
$Time=$Time.mysqli_real_escape_string($link, stripslashes($_POST["smin"])).':00';
$Date=mysqli_real_escape_string($link, stripslashes($_POST["syear"])).'-';
$Date =$Date. mysqli_real_escape_string($link, stripslashes($_POST["smonth"])).'-';
$Date =$Date.mysqli_real_escape_string($link, stripslashes($_POST["sday"]));
$Time1 = mysqli_real_escape_string($link, stripslashes($_POST["ehr"])).':';
$Time1=$Time1.mysqli_real_escape_string($link, stripslashes($_POST["emin"])).':00';
$Date1=mysqli_real_escape_string($link, stripslashes($_POST["eyear"])).'-';
$Date1 =$Date1. mysqli_real_escape_string($link, stripslashes($_POST["emonth"])).'-';
$Date1 =$Date1.mysqli_real_escape_string($link, stripslashes($_POST["eday"]));
$DES =mysqli_real_escape_string($link, stripslashes($_POST['des']));
$T1=$Date.' '.$Time;
$T2=$Date1.' '.$Time1;

$sql = ' CALL `SceduleAdd`(:m1, :m2, :m3, :m4,  :m5,@res);';
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':m1', $UID, PDO::PARAM_STR);
$stmt->bindParam(':m2', $T1, PDO::PARAM_STR);
$stmt->bindParam(':m3', $T2, PDO::PARAM_STR);
$stmt->bindParam(':m4', $DES, PDO::PARAM_STR);
$stmt->bindParam(':m5', $title, PDO::PARAM_STR);
$stmt->execute();
$row = $pdo->query("SELECT @res AS level")->fetch(PDO::FETCH_OBJ);
$X = $row->level;


if ($X == 1) {
    header("Location: ViewSchedulephp");
} else {
    $X = 'Please Set the Values Correctly';
    header('Location: http://localhost/ADDBMS/Notifier/ErrorMessage.php?t=' . $X);
    die();
}

