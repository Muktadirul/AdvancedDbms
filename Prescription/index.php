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
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="http://localhost/ADDBMS/Resource/bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <link href="http://localhost/ADDBMS/Resource/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="http://localhost/ADDBMS/Resource/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="http://localhost/ADDBMS/Resource/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

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
                    $.get("SearchProblems.php", {term: inputVal}).done(function (data) {
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
        $(document).ready(function () {
            $('.search-box input[type="text"]').on("keyup input", function () {
                /* Get input value on change */
                var inputVal = $(this).val1();
                var resultDropdown = $(this).siblings(".result");
                if (inputVal.length) {
                    $.get("SearchProblems.php", {term: inputVal}).done(function (data) {
                        // Display the returned data in browser
                        resultDropdown.html(data);
                    });
                } else {
                    resultDropdown.empty();
                }
            });

            // Set search input value on click of result item
            $(document).on("click", ".result p", function () {
                $(this).parents(".search-box").find('input[type="text"]').val1($(this).text());
                $(this).parent(".result").empty();
            });
        });
    </script>
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
        <div class="col-lg-10"><br><br><br></div>
        <div class="col-lg-10">
            <table style="width: 130%">
                <tr>

                    <td>Name</td>
                    <td><input></td>
                    <td>Address</td>
                    <td><textarea></textarea></td>
                    <td>mail id</td>
                    <td><input></td>
                    <td>Age
                        <select>
                            <option value="-1">----</option>
                            <?php for ($i = 1; $i < 80; $i++): ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php endfor; ?>
                        </select></td>
                    <td>Sex <select>
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                        </select>
                    </td>
                    <td>
                        Weight
                        <select>
                            <option value="-1">----</option>
                            <?php for ($i = 1; $i < 151; $i++): ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php endfor; ?>
                        </select>
                    </td>
                    <td>
                        Blood Pressure
                        <select>
                            <option value="-1">----</option>
                            <?php for ($i = 1; $i < 180; $i++): ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php endfor; ?>
                        </select>  /
                        <select>
                            <option value="-1">----</option>
                            <?php for ($i = 1; $i < 180; $i++): ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php endfor; ?>
                        </select>
                    </td>
                </tr>   

            </table>
        </div>
        <table  style="width: 100%">
            <tr class="col-lg-12">
                <td class="col-lg-3">
                    <div ><b>Previous Problems list</b></div>
                </td>
                <td class="col-lg-3">
                    <div ><div class="search-box">
                            <input id="add" name="val" type="text" autocomplete="off" placeholder="Add Problems ..." />
                            <div class="result"></div>
                            <button onclick="myFunction()"> Add </button>
                        </div></div>
                </td>
                <td class="col-lg-3">
                    <div class="col-lg-3"><b>Current Problems list</b></div>
                </td class="col-lg-3">
                <td class="col-lg-3">
                    <div class="col-lg-3"><div class="search-box">
                            <input id="add1" name="val1" type="text" autocomplete="off" placeholder="Add Problems ..." />
                            <div class="result"></div>
                            <button onclick="myFunction1()"> Add </button>
                        </div></div>
                </td>
            </tr>
        </table>
        <table>
            <tr class="col-lg-12">
                <td class="col-lg-6">
                    <div id="demo"></div>
                </td>
                <td class="col-lg-6">
                    <div  id="demo1"></div>
                </td>
            </tr>
        </table>
        <script type="text/javascript">
    var fruits=[];
    var fruits1=[];
</script>


<script>
function myFunction() {
    fruits.push(document.getElementById("add").value);

    fLen = fruits.length;
    text = "<ul>";
    for (i = 0; i < fLen; i++) {
        text += "<li>" + fruits[i] + "<button onclick="+"del("+i+")"+"> Delete It </button> </li>";
    }
    text += "</ul>";
    document.getElementById("demo").innerHTML = text;
}

function del(x) {
    fruits.splice(x,1); 
    //delete fruits[x];
    fLen = fruits.length;
    text = "<ul>";
    for (i = 0; i < fLen; i++) {
        text += "<li>" + fruits[i] + "<button onclick="+"del("+i+")"+"> Delete It </button> </li>";
    }
    text += "</ul>";
    document.getElementById("demo").innerHTML = text;
}

function myFunction1() {
    fruits1.push(document.getElementById("add1").value);

    fLen = fruits1.length;
    text = "<ul>";
    for (i = 0; i < fLen; i++) {
        text += "<li>" + fruits1[i] + "<button onclick="+"del1("+i+")"+"> Delete It </button> </li>";
    }
    text += "</ul>";
    document.getElementById("demo1").innerHTML = text;
}

function del1(x) {
    fruits1.splice(x,1); 
    //delete fruits[x];
    fLen = fruits1.length;
    text = "<ul>";
    for (i = 0; i < fLen; i++) {
        text += "<li>" + fruits1[i] + "<button onclick="+"del1("+i+")"+"> Delete It </button> </li>";
    }
    text += "</ul>";
    document.getElementById("demo1").innerHTML = text;
}
</script>
        <button>Medications</button>

    </body>
</html>
