<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="http://localhost/ADDBMS/Resource/bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <link href="http://localhost/ADDBMS/Resource/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="http://localhost/ADDBMS/Resource/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="http://localhost/ADDBMS/Resource/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body class="container" style="height: 800px;">
        <div class="jumbotron " style="text-align: center;">
            <h1>Doctor's Helper</h1>
        </div>
        <div>
            <div class="col-lg-2"><a href="http://localhost/ADDBMS/">Home</a></div><div class="col-lg-offset-8 col-lg-2"> 
                <?php if (isset($_SESSION['USERNAME'])) {
                    echo '<a href="http://localhost/ADDBMS/Login/RegisterView.php">Register</a> <a href="http://localhost/ADDBMS/Login/LoginView.php">Login</a></div>';
                }  else {
                   echo '<a href="http://localhost/ADDBMS/Login/Logout.php">Logout</a></div>'; 
                }
                 ?> 

            
        </div>
        <div class="row col-lg-10" >
            <div class="col-lg-6" style="height: 500px;">
                <h3>Notifier</h3>
                <p>&nbsp;&nbsp;
                </p>
            </div>
            <div class="col-lg-6" style="height: 500px;">
                <h3>Scheduler</h3>
                <p>&nbsp;&nbsp;
                </p>
            </div>
            <div>
                <footer>Copyright<?php echo '@';echo date("Y"); ?></footer>
            </div>
        </div> 
    </body>
</html>
