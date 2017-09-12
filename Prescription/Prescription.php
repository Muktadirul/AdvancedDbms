<?php
$PName = $_GET['Name'] . '<br>';
$Pmail = $_GET['email'] . '<br>';
$Page = $_GET['age'] . '<br>';
$Psex = $_GET['sex'] . '<br>';
$PWeight = $_GET['Weight'] . '<br>';
$PBP = $_GET['Bp'] . '<br>';
$Pphone = $_GET['Phone'] . '<br>';
$Previous = array();
$Current = array();
$duration=150;
$C = 0;
if (isset($_GET["i10"])) {
    $Previous[$C++] = $_GET["i10"];
}
if (isset($_GET["i11"])) {
    $Previous[$C++] = $_GET["i11"];
}
if (isset($_GET["i12"])) {
    $Previous[$C++] = $_GET["i12"];
}
if (isset($_GET["i13"])) {
    $Previous[$C++] = $_GET["i13"];
}
if (isset($_GET["i14"])) {
    $Previous[$C++] = $_GET["i14"];
}
if (isset($_GET["i15"])) {
    $Previous[$C++] = $_GET["i15"];
}
if (isset($_GET["i16"])) {
    $Previous[$C++] = $_GET["i16"];
}
if (isset($_GET["i17"])) {
    $Previous[$C++] = $_GET["i17"];
}
if (isset($_GET["i18"])) {
    $Previous[$C++] = $_GET["i18"];
}

$C = 0;
if (isset($_GET["i0"])) {
    $Current[$C++] = $_GET["i0"];
}
if (isset($_GET["i1"])) {
    $Current[$C++] = $_GET["i1"];
}
if (isset($_GET["i2"])) {
    $Previous[$C++] = $_GET["i2"];
}
if (isset($_GET["i3"])) {
    $Current[$C++] = $_GET["i3"];
}
if (isset($_GET["i4"])) {
    $Current[$C++] = $_GET["i4"];
}
if (isset($_GET["i5"])) {
    $Current[$C++] = $_GET["i5"];
}
if (isset($_GET["i6"])) {
    $Current[$C++] = $_GET["i6"];
}
if (isset($_GET["i7"])) {
    $Current[$C++] = $_GET["i7"];
}
if (isset($_GET["i8"])) {
    $Current[$C++] = $_GET["i8"];
}
?>
<?php
session_start();
if (isset($_SESSION['USERNAME'])) {
    $USER = $_SESSION['USERNAME'];
} else {
    header("Location: http://localhost/ADDBMS/Login/LoginView.php");
    die();
}
$link = mysqli_connect("127.0.0.1", "root", "", "doc_schedule_prescription");
$pdo = new PDO("mysql:host=localhost;dbname=doc_schedule_prescription", "root", "");
$sql = ' CALL ALLProblem(:m1);';
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':m1', $UID, PDO::PARAM_STR);
$stmt->execute();
$all = $stmt->fetchAll();
$L1 = array();
$L2 = array();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="http://localhost/ADDBMS/Resource/bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <link href="http://localhost/ADDBMS/Resource/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="http://localhost/ADDBMS/Resource/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="http://localhost/ADDBMS/Resource/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body class="container"style="background-color: wheat;" >
        <div class="jumbotron " style="text-align: center;"style="height: 800px;">
            <h1>Doctor's Helper</h1>
        </div>
        <div>
            <div class="col-lg-2"><a href="http://localhost/ADDBMS/">Home</a></div>
            <div class="col-lg-offset-8 col-lg-2"> 
<?php
if (!isset($_SESSION['USERNAME'])) {
    echo '<a href="http://localhost/ADDBMS/Login/RegisterView.php">Register</a> <a href="http://localhost/ADDBMS/Login/LoginView.php">Login</a></div>';
} else {
    echo '<a href="http://localhost/ADDBMS/Login/Logout.php">Logout</a></div>';
}
?> 


            </div>
        </div>
        <div class="col-lg-offset-4 col-lg-8">
            <h1> Patient Prescription </h1>
        </div>
        <div class="col-lg-12"><br><br><br></div>

        <form method="GET" class="form-horizontal" action="Prescription.php" >
            <div class="form-group">
                <label class="control-label col-lg-3" >Patient Name <?php echo $PName; ?></label>
                <label class="control-label col-lg-3" >Patient Mail Id <?php echo $PName; ?></label>
                <label class="control-label col-lg-3" for="age">Patient Age<?php echo $PName; ?></label>
                <label class="control-label col-lg-3" for="Sex">Sex <?php echo $PName; ?></label>
                <label class="control-label col-lg-3" for="Weight">Weight <?php echo $PName; ?></label>
                <label class="control-label col-lg-3" for="Bp">Blood Pressure<?php echo $PName; ?></label>
                <label class="control-label col-lg-3" for="Phone">Phone No<?php echo $PName; ?></label>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-3" for="Current Problems List">Current Problems List</label>
                <label class="control-label col-lg-3" for="Current Problems List"><?php echo '<ul>';
                foreach ($Current as $C)
                    echo '<li>' . $C . '</li>';echo'</ul>'; ?></label>
                <label class="control-label col-lg-3" for="Previous Problems">Previous Problems </label>
                <label class="control-label col-lg-3" for="Previous Problems"><?php echo '<ul>';
                foreach ($Previous as $P)
                    echo '<li>' . $P . '</li>';echo'</ul>'; ?></label>
            </div>
            
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-3">
                    <input type="text" class="form-control" id="m1" placeholder="Medicine" name="m1">
                </div>
                <div class="col-sm-1">
                    <select class="control-label " name="time1">
                        <option value="-1">----</option>
                        <?php for ($i = 1; $i < $duration; $i++): ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
                <div class="col-sm-1">
                    Morning
                <input type="checkbox" name="mrn1" value="1">
                </div>
                <div class="col-sm-1">
                    Noon
                <input type="checkbox" name="noon1" value="1">
                </div>
                <div class="col-sm-1">
                    Night
                <input type="checkbox" name="night1" value="1">
                </div>
                <div class="col-sm-1">
                    Before
                <input type="checkbox" name="before1" value="1">
                </div>
                <div class="col-sm-1">
                    After
                <input type="checkbox" name="after1" value="1">
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-3">
                    <input type="text" class="form-control" id="m2" placeholder="Medicine" name="m2">
                </div>
                <div class="col-sm-1">
                    <select class="control-label " name="time2">
                        <option value="-1">----</option>
                        <?php for ($i = 1; $i < $duration; $i++): ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
                <div class="col-sm-1">
                    Morning
                <input type="checkbox" name="mrn2" value="1">
                </div>
                <div class="col-sm-1">
                    Noon
                <input type="checkbox" name="noon2" value="1">
                </div>
                <div class="col-sm-1">
                    Night
                <input type="checkbox" name="night2" value="1">
                </div>
                <div class="col-sm-1">
                    Before
                <input type="checkbox" name="before2" value="1">
                </div>
                <div class="col-sm-1">
                    After
                <input type="checkbox" name="after2" value="1">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-3">
                    <input type="text" class="form-control" id="m3" placeholder="Medicine" name="m3">
                </div>
                <div class="col-sm-1">
                    <select class="control-label " name="time3">
                        <option value="-1">----</option>
                        <?php for ($i = 1; $i < $duration; $i++): ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
                <div class="col-sm-1">
                    Morning
                <input type="checkbox" name="mrn3" value="1">
                </div>
                <div class="col-sm-1">
                    Noon
                <input type="checkbox" name="noon3" value="1">
                </div>
                <div class="col-sm-1">
                    Night
                <input type="checkbox" name="night3" value="1">
                </div>
                <div class="col-sm-1">
                    Before
                <input type="checkbox" name="before3" value="1">
                </div>
                <div class="col-sm-1">
                    After
                <input type="checkbox" name="after3" value="1">
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-3">
                    <input type="text" class="form-control" id="m4" placeholder="Medicine" name="m4">
                </div>
                <div class="col-sm-1">
                    <select class="control-label " name="time4">
                        <option value="-1">----</option>
                        <?php for ($i = 1; $i < $duration; $i++): ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
                <div class="col-sm-1">
                    Morning
                <input type="checkbox" name="mrn4" value="1">
                </div>
                <div class="col-sm-1">
                    Noon
                <input type="checkbox" name="noon4" value="1">
                </div>
                <div class="col-sm-1">
                    Night
                <input type="checkbox" name="night4" value="1">
                </div>
                <div class="col-sm-1">
                    Before
                <input type="checkbox" name="before4" value="1">
                </div>
                <div class="col-sm-1">
                    After
                <input type="checkbox" name="after4" value="1">
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-3">
                    <input type="text" class="form-control" id="m5" placeholder="Medicine" name="m5">
                </div>
                <div class="col-sm-1">
                    <select class="control-label " name="time5">
                        <option value="-1">----</option>
                        <?php for ($i = 1; $i < $duration; $i++): ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
                <div class="col-sm-1">
                    Morning
                <input type="checkbox" name="mrn5" value="1">
                </div>
                <div class="col-sm-1">
                    Noon
                <input type="checkbox" name="noon5" value="1">
                </div>
                <div class="col-sm-1">
                    Night
                <input type="checkbox" name="night5" value="1">
                </div>
                <div class="col-sm-1">
                    Before
                <input type="checkbox" name="before5" value="1">
                </div>
                <div class="col-sm-1">
                    After
                <input type="checkbox" name="after5" value="1">
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-3">
                    <input type="text" class="form-control" id="m6" placeholder="Medicine" name="m6">
                </div>
                <div class="col-sm-1">
                    <select class="control-label " name="time6">
                        <option value="-1">----</option>
                        <?php for ($i = 1; $i < $duration; $i++): ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
                <div class="col-sm-1">
                    Morning
                <input type="checkbox" name="mrn6" value="1">
                </div>
                <div class="col-sm-1">
                    Noon
                <input type="checkbox" name="noon6" value="1">
                </div>
                <div class="col-sm-1">
                    Night
                <input type="checkbox" name="night6" value="1">
                </div>
                <div class="col-sm-1">
                    Before
                <input type="checkbox" name="before6" value="1">
                </div>
                <div class="col-sm-1">
                    After
                <input type="checkbox" name="after6" value="1">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-6">
                    <button>Medication</button>
                </div>
            </div>
        </form>
        <div class="col-lg-12"><br><br><br></div><div class="col-lg-12"><br><br><br></div>
    </body>
</html>
