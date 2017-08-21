<?php

$link = mysqli_connect("127.0.0.1", "root", "", "doc_schedule_prescription");
$pdo = new PDO("mysql:host=localhost;dbname=doc_schedule_prescription", "root", "");
$MId = mysqli_real_escape_string($link, stripslashes($_POST["mid"]));
$PWd = md5(mysqli_real_escape_string($link, stripslashes($_POST["pwd"])));
mysqli_close($link);
$pdo = new PDO("mysql:host=localhost;dbname=doc_schedule_prescription", "root", "");
$sql = ' CALL `LOGIN`(:m, :p, @x);';
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':m', $MId, PDO::PARAM_STR);
$stmt->bindParam(':p', $PWd, PDO::PARAM_STR);
$stmt->execute();
$row = $pdo->query("SELECT @x AS level")->fetch(PDO::FETCH_OBJ);
$X = $row->level;
if ($X == 1) {
    $sql ='CALL GET_VAL(@id,@fn,@ln,:m);';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':m', $MId, PDO::PARAM_STR);
    $stmt->execute();
    $row1 = $pdo->query("SELECT @id AS id;")->fetch(PDO::FETCH_OBJ);
    $row2 = $pdo->query("SELECT @fn AS firstname;")->fetch(PDO::FETCH_OBJ);
    $row3 = $pdo->query("SELECT @ln AS lastname;")->fetch(PDO::FETCH_OBJ);
    $U_id = $row1->id;
    $U_fn = $row2->firstname;
    $U_ln = $row3->lastname;
    session_start();
    $_SESSION['MID'] = $MId;
    $_SESSION['USERID'] = $U_id;
    $_SESSION['USERNAME'] = $U_fn.' '.$U_ln;
    //echo $_SESSION['USERID'],$_SESSION['USERNAME'],$_SESSION['MID'];
    header("Location: ../UserHome.php");
    
} else {

    echo 'Login Not Done';
}
