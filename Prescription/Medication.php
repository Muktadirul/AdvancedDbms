<?php
/*
echo $_GET['name'].'<br>';
echo $_GET['mail'].'<br>';
echo $_GET['age'].'<br>';
echo $_GET['sex'].'<br>';
echo $_GET['weight'].'<br>';
echo $_GET['bp'].'<br>';
echo $_GET['phn'].'<br>';
//echo .' '..' '.' '..' '.' '..' '.' '..' '.' '..' '..' '.' '.'<br>' ;
//echo $_GET['val2'].' '.$_GET['time2'].' '.' '.$_GET['mrn2'].' '.' '.$_GET['noon2'].' '.' '.$_GET['night2'].' '.' '.$_GET['before2'].' '.$_GET['after2'].' '.' '.'<br>' ;
//echo $_GET['val3'].' '.$_GET['time3'].' '.' '.$_GET['mrn3'].' '.' '.$_GET['noon3'].' '.' '.$_GET['night3'].' '.' '.$_GET['before3'].' '.$_GET['after3'].' '.' '.'<br>' ;
//echo $_GET['val4'].' '.$_GET['time4'].' '.' '.$_GET['mrn4'].' '.' '.$_GET['noon4'].' '.' '.$_GET['night4'].' '.' '.$_GET['before4'].' '.$_GET['after4'].' '.' '.'<br>' ;
*/


if(isset($_GET['val1'])){
    $M1=$_GET['val1'];
    if(isset($_GET['time1'])){
        $T1=$_GET['time1'];
    }  else {
        $T1=0;
    }
    if (isset($_GET['mrn1'])){
        $MR1=$_GET['mrn1'];
    }  else {
        $MR1=0;
    }
    if(isset($_GET['noon1'])){
        $N1=$_GET['noon1'];
    }  else {
        $N1=0;
    }
    if (isset($_GET['night1'])){
        $NN1=$_GET['night1'];
    }  else {
        $NN1=0;
    }
    if(isset($_GET['after1'])){
        $AF1=$_GET['after1'];
    }  else {
        $AF1=0;
    }
    if(isset($_GET['before1'])){
        $BF1=$_GET['before1'];
    }  else {
        $BF1=0;
    }
}else{
    $M1='';
}
if(isset($_GET['val2'])){
    $M2=$_GET['val2'];
    if(isset($_GET['time2'])){
        $T2=$_GET['time2'];
    }  else {
        $T2=0;
    }
    if (isset($_GET['mrn2'])){
        $MR2=$_GET['mrn2'];
    }  else {
        $MR2=0;
    }
    if(isset($_GET['noon2'])){
        $N2=$_GET['noon2'];
    }  else {
        $N2=0;
    }
    if (isset($_GET['night2'])){
        $NN2=$_GET['night2'];
    }  else {
        $NN2=0;
    }
    if(isset($_GET['after2'])){
        $AF2=$_GET['after2'];
    }  else {
        $AF2=0;
    }
    if(isset($_GET['before2'])){
        $BF2=$_GET['before2'];
    }  else {
        $BF2=0;
    }
}else{
    $M2='';
}

if(isset($_GET['val3'])){
    $M3=$_GET['val3'];
    if(isset($_GET['time3'])){
        $T3=$_GET['time3'];
    }  else {
        $T3=0;
    }
    if (isset($_GET['mrn3'])){
        $MR3=$_GET['mrn3'];
    }  else {
        $MR3=0;
    }
    if(isset($_GET['noon3'])){
        $N3=$_GET['noon3'];
    }  else {
        $N3=0;
    }
    if (isset($_GET['night3'])){
        $NN3=$_GET['night3'];
    }  else {
        $NN3=0;
    }
    if(isset($_GET['after3'])){
        $AF3=$_GET['after3'];
    }  else {
        $AF3=0;
    }
    if(isset($_GET['before3'])){
        $BF3=$_GET['before3'];
    }  else {
        $BF3=0;
    }
}else{
    $M3='';
}

if(isset($_GET['val4'])){
    $M4=$_GET['val4'];
    if(isset($_GET['time4'])){
        $T4=$_GET['time4'];
    }  else {
        $T4=0;
    }
    if (isset($_GET['mrn4'])){
        $MR4=$_GET['mrn4'];
    }  else {
        $MR4=0;
    }
    if(isset($_GET['noon4'])){
        $N4=$_GET['noon4'];
    }  else {
        $N4=0;
    }
    if (isset($_GET['night4'])){
        $NN4=$_GET['night4'];
    }  else {
        $NN4=0;
    }
    if(isset($_GET['after4'])){
        $AF4=$_GET['after4'];
    }  else {
        $AF4=0;
    }
    if(isset($_GET['before4'])){
        $BF4=$_GET['before4'];
    }  else {
        $BF4=0;
    }
}else{
    $M4='--';
}

$MSG='<b><h1><center>Prescription</center></h1></b><br><b>Name : </b> '.$_GET['name'];
$MSG=$MSG.'<b> Mail Id </b> '.$_GET['mail'];
$MSG=$MSG.'<br><b> Age : </b>'.$_GET['age'];
$MSG=$MSG.'<br><b> SEX : </b>'.$_GET['sex'];
$MSG=$MSG.'<br><b> Weight : </b>'.$_GET['weight'];
$MSG=$MSG.'<br><b> BP : </b>'.$_GET['bp'];
$MSG=$MSG.'<br><b> Phone :</b>'.$_GET['phn'];


$MSG1='<table border=1>
    <tr>
        <th>Medicine</th>
        <th>Duration</th>
        <th>Morning</th>
        <th>NOON</th>
        <th>Night</th>
        <th>Before</th>
        <th>After</th>
    </tr>
    <tr>
        <th>'.$M1.'</th>
        <th>'.$T1.'</th>
        <th>'.$MR1.'</th>
        <th>'.$N1.'</th>
        <th>'.$NN1.'</th>
        <th>'.$BF1.'</th>
        <th>'.$AF1.'</th>
    </tr>
    <tr>
        <th>'.$M2.'</th>
        <th>'.$T2.'</th>
        <th>'.$MR2.'</th>
        <th>'.$N2.'</th>
        <th>'.$NN2.'</th>
        <th>'.$BF2.'</th>
        <th>'.$AF2.'</th>
    </tr>
    <tr>
        <th>'.$M3.'</th>
        <th>'.$T3.'</th>
        <th>'.$MR3.'</th>
        <th>'.$N3.'</th>
        <th>'.$NN3.'</th>
        <th>'.$BF3.'</th>
        <th>'.$AF3.'</th>
    </tr>
    <tr>
        <th>'.$M4.'</th>
        <th>'.$T4.'</th>
        <th>'.$MR4.'</th>
        <th>'.$N4.'</th>
        <th>'.$NN4.'</th>
        <th>'.$BF4.'</th>
        <th>'.$AF4.'</th>
    </tr>
</table>';
$MSG=$MSG.$MSG1;
session_start();
include '../Mailing/PrescriptionMail.php';
$NFM = new PrescriptionMail();
$res=$NFM->PrescriptionSend($_SESSION['USERNAME'], $_GET['mail'], 'Prescription', $_GET['phn'], $MSG);

if($res==1){
    echo 'mail Send';
}







?>
