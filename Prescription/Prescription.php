<?php
$PName = $_GET['Name'] ;
$Pmail = $_GET['email'];
$Page = $_GET['age'] ;
$Psex = $_GET['sex'] ;
$PWeight = $_GET['Weight'] ;
$PBP = $_GET['Bp'] ;
$Pphone = $_GET['Phone'] ;
$Previous = array();
$Current = array();
$duration=150;
$C = 0;
$sql='';
if (isset($_GET["i10"])) {
    $Previous[$C++] = $_GET["i10"];
    $sql=$sql.' % '.$_GET["i10"];
}
if (isset($_GET["i11"])) {
    $Previous[$C++] = $_GET["i11"];
    $sql=$sql.' % AND  % '.$_GET["i11"];
}
if (isset($_GET["i12"])) {
    $Previous[$C++] = $_GET["i12"];
    $sql=$sql.' % AND % '.$_GET["i12"];
}
if (isset($_GET["i13"])) {
    $Previous[$C++] = $_GET["i13"];
    $sql=$sql.' % AND % '.$_GET["i13"];
}
if (isset($_GET["i14"])) {
    $Previous[$C++] = $_GET["i14"];
    $sql=$sql.' % AND % '.$_GET["i14"];
}
if (isset($_GET["i15"])) {
    $Previous[$C++] = $_GET["i15"];
    $sql=$sql.' % AND % '.$_GET["i15"];
}
if (isset($_GET["i16"])) {
    $Previous[$C++] = $_GET["i16"];
    $sql=$sql.' % AND % '.$_GET["i16"];
}
if (isset($_GET["i17"])) {
    $Previous[$C++] = $_GET["i17"];
    $sql=$sql.' % AND  % '.$_GET["i17"].' %';
}
if (isset($_GET["i18"])) {
    $Previous[$C++] = $_GET["i18"];
    $sql=$sql.' AND  % '.$_GET["i18"].' %';
}
$sql1='';
$C = 0;
if (isset($_GET["i0"])) {
    $Current[$C++] = $_GET["i0"];
    $sql1=$sql1.' % '.$_GET["i0"].' %';
}
if (isset($_GET["i1"])) {
    $Current[$C++] = $_GET["i1"];
    $sql1=$sql1.' AND % '.$_GET["i1"].' %';
}
if (isset($_GET["i2"])) {
    $Previous[$C++] = $_GET["i2"];
    $sql1=$sql1.' AND % '.$_GET["i2"].' %';
}
if (isset($_GET["i3"])) {
    $Current[$C++] = $_GET["i3"];
    $sql1=$sql1.' AND % '.$_GET["i3"].' %';
}
if (isset($_GET["i4"])) {
    $Current[$C++] = $_GET["i4"];
    $sql1=$sql1.' AND % '.$_GET["i4"].' %';
}
if (isset($_GET["i5"])) {
    $Current[$C++] = $_GET["i5"];
    $sql1=$sql1.' AND % '.$_GET["i5"].' %';
}
if (isset($_GET["i6"])) {
    $Current[$C++] = $_GET["i6"];
    $sql1=$sql1.' AND  % '.$_GET["i6"].' %';
}
if (isset($_GET["i7"])) {
    $Current[$C++] = $_GET["i7"];
    $sql1=$sql1.' AND % '.$_GET["i7"].' %';
}
if (isset($_GET["i8"])) {
    $Current[$C++] = $_GET["i8"];
    $sql1=$sql1.' AND % '.$_GET["i8"].' %';
}
//echo $sql.'<br>';
//echo $sql1;//die();
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
    <style type="text/css">
        body{
            font-family: Arail, sans-serif;
        }
        /* Formatting search box */
        .search-box{
            width: 300px;
            position: relative;
            display: inline-block;
            font-size: 14px;
        }
        .search-box input[type="text"]{
            height: 32px;
            padding: 5px 10px;
            border: 1px solid #CCCCCC;
            font-size: 14px;
        }
        .result{
            position: absolute;        
            z-index: 999;
            top: 100%;
            left: 0;
        }
        .search-box input[type="text"], .result{
            width: 100%;
            box-sizing: border-box;
        }
        /* Formatting result items */
        .result p{
            margin: 0;
            padding: 7px 10px;
            border: 2px solid #CCCCCC;
            border-top: none;
            cursor: pointer;
        }
        .result p:hover{
            background: #004af9;
        }
    </style>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.search-box input[type="text"]').on("keyup input", function () {
                /* Get input value on change */
                var inputVal = $(this).val();
                var resultDropdown = $(this).siblings(".result");
                if (inputVal.length) {
                    $.get("SearchMedicine.php", {term: inputVal}).done(function (data) {
                        // Display the returned data in browser
                        resultDropdown.html(data);
                    });
                } else {
                    resultDropdown.empty();
                }
            });

            // Set search input value on click of result item
            $(document).on("click", ".result p", function () {
                $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
                $(this).parent(".result").empty();
            });
        });
            </script>
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
        <form method="GET" class="form-horizontal" action="Medication.php">
            <div class="form-group">
                <label class="control-label col-lg-3" >Patient Name <input name="name" value="<?php echo $PName; ?>"></label>
                <label class="control-label col-lg-3" >Patient Mail Id <input name="mail" value="<?php echo $Pmail; ?>"></label>
                <label class="control-label col-lg-3" for="age">Patient Age<input name="age" value="<?php echo $Page; ?>"></label>
                <label class="control-label col-lg-3" for="Sex">Sex <input name="sex" value="<?php echo $Psex; ?>"></label>
                <label class="control-label col-lg-3" for="Weight">Weight <input name="weight" value="<?php echo $PWeight; ?>"></label>
                <label class="control-label col-lg-3" for="Bp">Blood Pressure<input name="bp" value="<?php echo $PBP; ?>"></label>
                <label class="control-label col-lg-3" for="Phone">Phone No<input name="phn" value="<?php echo $Pphone; ?>"></label>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-3" for="Current Problems List">Current Problems List</label>
                <label class="control-label col-lg-3" for="Current Problems List"><?php echo '<ul>';
                foreach ($Current as $C)
                    echo '<li>' . $C . '</li>';echo'</ul>'; ?></label>
                <label class="control-label col-lg-3" for="Previous Problems">Previous Problems </label>
                <label class="control-label col-lg-3" for="Previous Problems">
                    <?php echo '<ul>';
                foreach ($Previous as $P):
                    echo '<li>' . $P . '</li>';
                    endforeach;
                echo'</ul>'; ?></label>
            </div>
            
            
            <div class="form-group">
                <div class="search-box col-sm-offset-2 col-sm-3">
                    <div class="search-box">
                        <input id="add1" name="val1" type="text" autocomplete="on" placeholder="Medicine" />
                    <div class="result">
                    </div>
             </div>
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
                <div class="search-box col-sm-offset-2 col-sm-3">
                    <div class="search-box">
                        <input id="add" name="val2" type="text" autocomplete="on" placeholder="Medicine" />
                    <div class="result">
                    </div>
             </div>
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
                <div class="search-box col-sm-offset-2 col-sm-3">
                    <div class="search-box">
                        <input id="add" name="val3" type="text" autocomplete="on" placeholder="Medicine" />
                    <div class="result">
                    </div>
             </div>
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
                <div class="search-box col-sm-offset-2 col-sm-3">
                    <div class="search-box">
                        <input id="add" name="val4" type="text" autocomplete="on" placeholder="Medicine" />
                    <div class="result">
                    </div>
             </div>
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
                <div class="col-sm-offset-9 col-sm-2">
                    <button>Send Mail & Prepare TO Print</button>
                </div>
            </div>
        </form>
        <div class="col-lg-12"><br><br><br></div><div class="col-lg-12"><br><br><br></div>
    </body>
</html>
