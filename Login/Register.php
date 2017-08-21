<?php
$pdo = new PDO("mysql:host=localhost;dbname=doc_schedule_prescription", "root", "");
$Track = 0;
if (!isset($_POST['fn']) || empty($_POST['fn']) || !isset($_POST['ln']) || empty($_POST['ln']) || !isset($_POST['mid']) || empty($_POST['mid']) || !isset($_POST['pwd']) || empty($_POST['pwd']) || !isset($_POST['pwd1']) || empty($_POST['pwd1']) || isset($_POST['img']) || isset($_POST['cer']) || isset($_POST['nid']) || !isset($_POST['wp'])) {
    $Track = 1;
}
if ($Track == 1) {
    $X = 'Set the values and you are trying to override the function.Don\'t do this again .Thank you';
    header('Location: http://localhost/ADDBMS/Login/Error.php?t=' . $X);
    die();
}

function C() {
    $link = mysqli_connect("127.0.0.1", "root", "", "doc_schedule_prescription");
    if (!$link) {
        die();
    } else {
        return $link;
    }
}

function available($fn, $ln, $mid) {
    $pdo = new PDO("mysql:host=localhost;dbname=doc_schedule_prescription", "root", "");
    $sql='call available(:fn , :ln , :mid  ,@x);';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':fn', $fn, PDO::PARAM_STR);
    $stmt->bindParam(':ln', $ln, PDO::PARAM_STR);
    $stmt->bindParam(':mid', $mid, PDO::PARAM_STR);
    $stmt->execute();
    $row = $pdo->query("SELECT @x AS level")->fetch(PDO::FETCH_OBJ);
    $X=$row->level;
    if ( $X> 0) {
        return TRUE;
    }
    return FALSE;
}


$FN = mysqli_real_escape_string(C(), stripslashes($_POST['fn']));
$LN = mysqli_real_escape_string(C(), stripslashes($_POST['ln']));
$EId = mysqli_real_escape_string(C(), stripslashes($_POST["mid"]));
$PWD = md5(mysqli_real_escape_string(C(), stripslashes($_POST["pwd"])));
$WP = mysqli_real_escape_string(C(), stripslashes($_POST["wp"]));
if (available($FN, $LN, $EId)) {
    $X = 'Sorry your Name mail id has been taken.Try with a new name and mailid';
    header('Location: http://localhost/ADDBMS/Login/Error.php?t=' . $X);
    die();
}
$path = 'C:/wamp64/www/ADDBMS/Resource/';
$errors = array();
$file_name = $_FILES['img']['name'];
$file_tmp = $_FILES['img']['tmp_name'];
$file_type = $_FILES['img']['type'];
$v = explode('.', $file_name);
$file_name1 = end($v);
$file_ext = strtolower($file_name1);
$expensions = array("jpeg", "jpg", "png");
if (in_array($file_ext, $expensions) === false) {
    $errors[] = "extension not allowed, please choose a JPEG ,JPG or PNG file.";
}
$IMAGELOC1 = '';
$IMAGELOC2 = '';
if (empty($errors) == true) {
    $IMAGELOC1 = $file_tmp;
    $IMAGELOC2 = $path . "Image/" . $file_name;
} else {
    print_r($errors);
}
$IMG = $FN;
$errors = array();
$file_name = $_FILES['cer']['name'];
$file_tmp = $_FILES['cer']['tmp_name'];
$file_type = $_FILES['cer']['type'];
$v = explode('.', $file_name);
$file_name1 = end($v);
$file_ext = strtolower($file_name1);
$expensions = array("jpeg", "jpg", "png", "pdf");
$CERLOC1 = '';
$CERLOC2 = '';
if (in_array($file_ext, $expensions) === false) {
    $errors[] = "extension not allowed, please choose a JPEG ,JPG or PNG or Pdf file.";
}
if (empty($errors) == true) {
    $CERLOC1 = $file_tmp;
    $CERLOC2 = $path . "Certificates/" . $file_name;
    //move_uploaded_file($file_tmp, $path . "Certificates/" . $file_name);
} else {
    print_r($errors);
}
$CER = $FN;
$errors = array();
$file_name = $_FILES['nid']['name'];
$file_tmp = $_FILES['nid']['tmp_name'];
$file_type = $_FILES['nid']['type'];
$v = explode('.', $file_name);
$file_name1 = end($v);
$file_ext = strtolower($file_name1);
$expensions = array("jpeg", "jpg", "png", "pdf");

if (in_array($file_ext, $expensions) === false) {
    $errors[] = "extension not allowed, please choose a JPEG ,JPG or PNG or Pdf file.";
}
$NIDLOC1 = '';
$NIDLOC2 = '';
if (empty($errors) == true) {
    $NIDLOC1 = $file_tmp;
    $NIDLOC2 = $path . "Nid/" . $file_name;
//move_uploaded_file($file_tmp, $path . "Nid/" . $file_name);
} else {
    print_r($errors);
}
$NID = $FN;


$sql = 'CALL  `REGUSERDATAINSERT`(:fn,:ln,:eid,:pwd,:img,:cer,:wp,:nid,@X)';
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':fn', $FN, PDO::PARAM_STR);
$stmt->bindParam(':ln', $LN, PDO::PARAM_STR);
$stmt->bindParam(':eid', $EId, PDO::PARAM_STR);
$stmt->bindParam(':pwd', $PWD, PDO::PARAM_STR);
$stmt->bindParam(':img', $IMG, PDO::PARAM_STR);
$stmt->bindParam(':cer', $CER, PDO::PARAM_STR);
$stmt->bindParam(':wp', $WP, PDO::PARAM_INT);
$stmt->bindParam(':nid', $NID, PDO::PARAM_STR);
$stmt->execute();
$row = $pdo->query("SELECT @X AS level")->fetch(PDO::FETCH_ASSOC);
$X=$row['level'];
$stmt->closeCursor();
if ($X == 1) {
    move_uploaded_file($CERLOC1,$CERLOC2);
    move_uploaded_file($IMAGELOC1,$IMAGELOC2);
    move_uploaded_file($NIDLOC1,$NIDLOC2);
    $X = 'Registration Successful.Thank you.';
    header('Location: http://localhost/ADDBMS/Login/RegSuccess.php?t=' . $X);
} else {
    print 'err';
}





