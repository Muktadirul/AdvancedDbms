<?php
session_start();
if (isset($_SESSION['USERNAME'])) {
    $USER = $_SESSION['USERNAME'];
}  else {
    header("Location: ./Login/LoginView.php");die();
}
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
    <body class="container"style="background-color: wheat" >
        <div class="jumbotron " style="text-align: center;"style="height: 800px;">
            <h1>Doctor's Helper</h1>
        </div>
        <div>
            <div class="col-lg-2"><a href="http://localhost/ADDBMS/">Home</a></div>
            <div class="col-lg-offset-8 col-lg-2"> 
                <?php if (!isset($_SESSION['USERNAME'])) {
                    echo '<a href="http://localhost/ADDBMS/Login/RegisterView.php">Register</a> <a href="http://localhost/ADDBMS/Login/LoginView.php">Login</a></div>';
                }  else {
                   echo '<a href="http://localhost/ADDBMS/Login/Logout.php">Logout</a></div>'; 
                }
                 ?> 

            
        </div>
        </div>
        <div class="col-lg-offset-3 col-lg-9">
            <h1>Welcome <?php echo $USER; ?></h1>
        </div>
        <div class="col-lg-10"><br><br><br></div>
        <div class="row col-lg-12" >
            <div class="col-lg-offset-1 col-lg-3" style="background-color:  #bce8f1; height: 500px;">
                <h3>Notifier</h3>
                <table>
                    <tr>
                        <td class="btn-default btn-group-lg"><a href="http://localhost/ADDBMS/Notifier/AddNotifier.php">Add to Notifier List</a></td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                    <tr>
                        <td class="btn-default btn-group-lg"><a href="http://localhost/ADDBMS/Notifier/ViewNotifier.php">Show Notifier List</a></td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                    <tr>
                        <td class="btn-default btn-group-lg"><a href="http://localhost/ADDBMS/Notifier/ViewNotifier.php">Update Notifier List</a></td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                    <tr>
                        <td class="btn-default btn-group-lg"><a href="http://localhost/ADDBMS/Notifier/ViewNotifier.php">Delete From Notifier List</a></td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                    
                </table>
                <p>&nbsp;&nbsp;
                </p>
            </div>

            <div class="col-lg-offset-1 col-lg-3" style="background-color:  #bce8f1;height: 500px;">
                <h3>Scheduler</h3>
                <table>
                    <tr>
                        <td class="btn-default btn-group-lg"><a href="http://localhost/ADDBMS/Schedule/AddSchedule.php">Add to Notifier List</a></td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                    <tr>
                        <td class="btn-default btn-group-lg"><a href="">Show Notifier List</a></td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                    <tr>
                        <td class="btn-default btn-group-lg"><a href="">Update Notifier List</a></td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                    <tr>
                        <td class="btn-default btn-group-lg"><a href="">Delete From Notifier List</a></td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                    <tr>
                        <td class="btn-default btn-group-lg">Genaret Schedule</td>
                    </tr>
                </table>
                <p>&nbsp;&nbsp;
                </p>
            </div>
            <div class="col-lg-offset-1 col-lg-3" style="background-color: #bce8f1;height: 500px;">
                <h3>Prescription</h3>
                <table>
                    <tr>
                        <td class="btn-default btn-group-lg">Genrel precrition</td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                    <tr>
                        <td class="btn-default btn-group-lg">Alergy precrition</td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                    <tr>
                        <td class="btn-default btn-group-lg">Pregnent precrition</td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                    <tr>
                        <td class="btn-default btn-group-lg">Kidny Patient precrition</td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                    <tr>
                        <td class="btn-default btn-group-lg">Diabetic precrition</td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                    <tr>
                        <td class="btn-default btn-group-lg">Neoro precrition</td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                    <tr>
                        <td class="btn-default btn-group-lg">orthopadics precrition</td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                    <tr>
                        <td class="btn-default btn-group-lg">Skin Sensetive precrition</td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                    <tr>
                        <td class="btn-default btn-group-lg">Sergry precrition</td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                    <tr>
                        <td class="btn-default btn-group-lg">Dentist precrition</td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                    <tr>
                        <td class="btn-default btn-group-lg">ENT precrition</td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                    <tr>
                        <td class="btn-default btn-group-lg">Last 3 Month's Patients List</td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                    <tr>
                        <td class="btn-default btn-group-lg">Last 6 Month's Patients List</td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                </table>
                <p>&nbsp;&nbsp;
                </p>
            </div>
            
            <footer style="background-color: yellow"><center>Copyright<?php echo '@';echo date("Y"); ?></center></footer>
            
        </div> 
    </body>
</html>


