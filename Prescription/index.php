<?php
session_start();
if (isset($_SESSION['USERNAME'])) {
    $USER = $_SESSION['USERNAME'];
} else {
    header("Location: http://localhost/ADDBMS/Login/LoginView.php");
    die();
}
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
        <div class="col-lg-12"><br><br><br></div>
        <div class="col-lg-offset-3 col-lg-8">
            <table  >
                <tr >
                    <td >
                        <div ><b>Problems list</b></div>
                    </td>
                    <td >
                        <div class="search-box">
                            <input id="add" name="val" type="text" autocomplete="on" placeholder="Add Problems ..." />
                            <div class="result">
                            </div>
                        </div>
                    </td>
                    <td>
                        <button onclick="myFunction()"> Add To Current </button>
                        <button onclick="myFunction1()"> Add To Previous</button>
                    </td>

                </tr>
                
                <tr>

                    <td><b>Show History</b></td>
                    <td><input class="form-control" placeholder="Phone no" id="history"></td>
                    <td><button>History</button></td>
                </tr>
                <tr>
                <div id="history"></div>
                </tr>
            </table>
            <div class="col-lg-12"><br><br><br></div>
            <div class="col-lg-12"><br><br><br></div>
        </div>
        <form enctype="multipart/form-data" method="GET" class="form-horizontal" action="Prescription.php" >
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
                var x=document.getElementById("add").value;
                fruits.push(x);

                fLen = fruits.length;
                text = "";
                for (i = 0; i < fLen; i++) {
                    //alert(fruits[i]);
                    text += "<input name="+"i"+i+" value='" + fruits[i] + "'><button onclick="+"del("+i+")"+"> Delete It </button><br><br> ";
                    
                }
                
                document.getElementById("demo").innerHTML = text;
            }

            function del(x) {
                fruits.splice(x, 1);
                //delete fruits[x];
                fLen = fruits.length;
                text = "";
                for (i = 0; i < fLen; i++) {
                    text += "<input name="+"i"+i+" value='" + fruits[i] + "'><button onclick="+"del("+i+")"+"> Delete It </button><br><br>";
                }
                text += "";
                document.getElementById("demo").innerHTML = text;
            }

            function myFunction1() {
                fruits1.push(document.getElementById("add").value);

                fLen = fruits1.length;
                text = "";
                for (i = 0; i < fLen; i++) {
                    text += "<input name="+"i1"+i+" value='" + fruits1[i] + "'><button onclick="+"del1("+i+")"+"> Delete It </button><br><br>";
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
                    text += "<input name="+"i1"+i+" value='" + fruits1[i] + "'><button onclick="+"del1("+i+")"+"> Delete It </button><br><br>";
                }
                text += "";
                document.getElementById("demo1").innerHTML = text;
            }
        </script>


    </body>
</html>
