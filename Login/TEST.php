 <?php
$procInput1 = (int)123;
$procInput2 = (int)456;
$procInput3 =(int)789;
$conn=new PDO("mysql:host=localhost;dbname=testt",'root','');
//$conn->query("set @SUM1=''");
//$conn->prepare("set @SUM1=''");
$sql='set @SUM1="";CALL CREATEUSER(:procInput1,:procInput2,:procInput3,@SUM1)';
$conn->query("SET @msg = '';");
print $conn->query('CALL CREATEUSER(procInput1,procInput2,procInput3,@SUM1)');
$stmt=$conn->prepare($sql);
$stmt->bindParam(':procInput1', $procInput1, PDO::PARAM_INT);
$stmt->bindParam(':procInput2', $procInput2, PDO::PARAM_INT);
$stmt->bindParam(':procInput3', $procInput3, PDO::PARAM_INT);
//$stmt->bindParam('@SUM!', $procInput33, PDO::PARAM_INT);
//$stmt->execute();
//$stmt->closeCursor();
$r = $conn->query("SELECT @SUM1")->fetch(PDO::FETCH_ASSOC);
var_dump($r['@SUM1']);
/*


$mysqli = new mysqli("localhost", "root", "", "doc_schedule_prescription");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}



if (!$mysqli->query("SET @msg = ''") || !$mysqli->query("CALL p(@msg)")) {
    echo "CALL failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

if (!($res = $mysqli->query("SELECT @msg as _p_out"))) {
    echo "Fetch failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

$row = $res->fetch_assoc();
echo $row['_p_out'];
?>
 * */
 