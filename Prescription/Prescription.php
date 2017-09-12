<?php

echo $_GET['Name'].'<br>';
echo $_GET['email'].'<br>';
echo $_GET['age'].'<br>';
echo $_GET['sex'].'<br>';
echo $_GET['Weight'].'<br>';
echo $_GET['Bp'].'<br>';
echo $_GET['Phone'].'<br>';

echo $_GET["i10"];
echo $_GET["i11"];
echo $_GET["i12"];
echo $_GET["i13"];

echo $_GET["i0"];
echo $_GET["i1"];
echo $_GET["i2"];
echo $_GET["i3"];

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
$L1= array();
$L2= array();

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


    
    
    <body class="container"style="background-color: wheat" >
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
                <label class="control-label col-lg-4" >Patient Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="Name" placeholder="Enter Name" name="Name">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-4" >Patient Mail Id</label>
                <div class="col-sm-6">
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-4" for="age">Patient Age</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="age" placeholder="Enter Age" name="age">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-4" for="Sex">Sex </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="sex" placeholder="Enter sex" name="sex">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-4" for="Weight">Weight</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="weight" placeholder="Enter Weight" name="Weight">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-4" for="Bp">Blood Pressure</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="Bp" placeholder="Blood Pressure" name="Bp">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-4" for="Phone">Phone No</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="Phone" placeholder="Phone Number" name="Phone">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-4" for="Current Problems List">Current Problems List</label>
                <div class="col-sm-6">
                    <div id="demo"></div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-4" for="Previous Problems">Previous Problems </label>
                <div class="col-sm-6">
                    <div id="demo1"></div>
                    
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-6">
                    <button>Medication</button>
                </div>
            </div>
            
        </form>

        <div class="col-lg-12"><br><br><br></div><div class="col-lg-12"><br><br><br></div>

        <script type="text/javascript">
            var fruits = [];
            var fruits1 = [];
            function myFunction() {
                fruits.push(document.getElementById("add").value);

                fLen = fruits.length;
                text = "";
                for (i = 0; i < fLen; i++) {
                    text += "<input name="+"i"+i+" value=" + fruits[i] + "><button onclick="+"del("+i+")"+"> Delete It </button><br><br> ";
                }
                text += "";
                document.getElementById("demo").innerHTML = text;
            }

            function del(x) {
                fruits.splice(x, 1);
                //delete fruits[x];
                fLen = fruits.length;
                text = "";
                for (i = 0; i < fLen; i++) {
                    text += "<input name="+"i"+i+" value=" + fruits[i] + "><button onclick="+"del("+i+")"+"> Delete It </button><br><br>";
                }
                text += "";
                document.getElementById("demo").innerHTML = text;
            }

            function myFunction1() {
                fruits1.push(document.getElementById("add").value);

                fLen = fruits1.length;
                text = "";
                for (i = 0; i < fLen; i++) {
                    text += "<input name="+"i1"+i+" value=" + fruits1[i] + "><button onclick="+"del1("+i+")"+"> Delete It </button><br><br>";
                }
                text += "";
                document.getElementById("demo1").innerHTML = text;
            }

            function del1(x) {
                fruits1.splice(x, 1);
                //delete fruits[x];
                fLen = fruits1.length;
                text = "";
                for (i = 0; i < fLen; i++) {
                    text += "<input name="+"i1"+i+" value=" + fruits1[i] + "><button onclick="+"del1("+i+")"+"> Delete It </button><br><br>";
                }
                text += "";
                document.getElementById("demo1").innerHTML = text;
            }
        </script>


    </body>
</html>
